<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostRequestEdit;
use App\Media;
use App\Message;
use App\Post;
use App\PostSave;
use App\Tag;
use App\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Method used to list posts with pagination (20 per pages)
     */
    public function listPosts()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        return view('admin.posts.listing', compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Get form --> create a post
     * Send categories ad tags from db where locale = app's locale by default
     */
    public function createPost()
    {
        $categories = Category::where('locale', App::getLocale())->get();
        $tags = Tag::where('locale', 'fr')->get();
        return view('admin.posts.create', compact('tags', 'categories'));
    }

    /**
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Save post in Database --> send validation message with redirection
     */
    public function storePost(PostRequest $request)
    {
        // If admin chose to upload an image for external media input
        if ($request->imageMedia) {
            $propertiesMedia['type'] = 'imageLocale'; // set type to image (for future html structure)
            $imageMedia = $this->upload($request->file('imageMedia')); // Upload file and get name
            $propertiesMedia['url'] = $imageMedia; // set url link for image
            $media = Media::create($propertiesMedia); // create Media
        } else if ($request->url) { // if admin chose to upload image/youtube video from external site
            $propertiesMedia = $request->all();
            $propertiesMedia['url'] = $this->getEmbedUrl($propertiesMedia['url']);
            $media = Media::create($request->all()); // create media
        }
        $props = $request->all();
        $props['media_id'] = $media->id ?? null; // if admin uploaded media, attach it properties
        $image = $this->upload($request->file('image')); // upload title image
        $props['image'] = $image;
        $post = Post::create($props); // create article from properties
        $post->tags()->sync($request->tag_list); // and synchronize tags
        Session::flash('error', 'Votre article a bien été ajouté');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.posts')); // redirect with validation message
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * View a single post details
     */
    public function viewPost($id)
    {
        Carbon::setLocale('fr');
        $post = Post::find($id);
        if (!$this->checkIfEntityExists($post, 'Le poste recherché n\'existe pas ! Vous ne pouvez le voir !', 'danger')) {
            return redirect(route('admin.posts'));
        };
        return view('admin.posts.details', compact('post'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Delete a single post from database
     * redirect with error management if post doesn't exist
     * else saves post in post_saves table and synchronize views/tags relationships + delete current post
     */
    public function deletePost($id)
    {
        // find current post + error management if post not found
        $post = Post::find($id);
        if (!$this->checkIfEntityExists($post, 'Impossible de supprimer, l\'article demandé n\'existe pas !', 'danger')) {
            return redirect(route('admin.posts'));
        }
        // getting attributes from post to add an "action" property used for rollback
        $props = $post->getAttributes();
        $props['post_id'] = $props['id'];
        $props['id'] = null;
        $props['action'] = 'delete'; // set saved post's action property to delete
        $postSave = PostSave::create($props);
        $postSave->tags()->sync($post->tags); // sync tags to the archive
        $postSave->views()->sync($post->views); // sync view to the archive
        $post->delete(); // delete original post
        Session::flash('error', 'Votre article a bien été supprimé'); // redirect with validaiton msg
        Session::flash('errorClass', 'success');
        return redirect(route('admin.posts'));
    }

    /**
     * @param $file
     * @return string
     * Upload file to img-content/uploads directory
     * take $request->file(name-of-image-attribute) as a parameter and returns new name
     */
    private function upload($file)
    {
        $destinationPath = 'img-content/uploads';
        $extension = $file->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $file->move($destinationPath, $fileName); // uploading file to given path
        return $fileName;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Dashboard --> show current stats
     * get number of views for posts + tags + categories (only posts considered in sum calculation)
     */
	public function dashBoard()
	{
		$posts = Post::orderBy('created_at', 'desc')->get(); // get posts to see stats
		$totalView = Post::sum('view') + View::sum('views'); // sum of visites on all posts from all times
		$totalMessage = Message::where('viewed', 0)->count(); // count of messages in DB
		return view('admin.dashboard.dashboard', compact('posts', 'totalView', 'totalMessage'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * Edit post, takes id as parameter, checks if post exists in DB => error management + redirect
     * Otherwise return form view
     */
	public function editPost($id)
	{
	    $post = Post::where('id', $id)->get()->first(); // get post from id
        // if post doesn't exist, redirects with errors
	    if (!$this->checkIfEntityExists($post, 'Le poste recherché n\'existe pas !', 'danger')) {
	        return redirect(route('admin.posts'));
        };
	    // else return edit view with categories and tags
        $categories = Category::where('locale', $post->locale)->get();
        $tags = Tag::where('locale', $post->locale)->get();
	    return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * @param $id
     * @param PostRequestEdit $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Update post, takes request and id of post to update
     */
    public function updatePost($id, PostRequestEdit $request)
    {
        $props = $request->all(); // get request attributes
        if ($request->image) { // if admin uploads a new image
            $image = $this->upload($request->file('image'));
            $props['image'] = $image;
        }
        $post = Post::findOrFail($id);
        if ($request->imageMedia) {
            $propertiesMedia['type'] = 'imageLocale'; // set type to image (for future html structure)
            $imageMedia = $this->upload($request->file('imageMedia')); // Upload file and get name
            $propertiesMedia['url'] = $imageMedia; // set url link for image
        } else if ($request->url) {
            $propertiesMedia['type'] = $request->type; // set type to image (for future html structure)
            $propertiesMedia['url'] = $this->getEmbedUrl($request->url);
        }
        // If Article already has a relationship with a media
        if ($post->media && isset($propertiesMedia)) {
            $post->media->update($propertiesMedia); // update article's media
        } else if (isset($propertiesMedia)){ // else create a new one and save media_id in props
            $media = Media::create($propertiesMedia);
            $props['media_id'] = $media->id;
        }
        $propertiesSave = $post->getAttributes();  // get attributes to manage action and post_id for archive
        $propertiesSave['post_id'] = $propertiesSave['id'];
        $propertiesSave['id'] = null;
        $propertiesSave['action'] = 'edit'; // archive action set to edit
        $postSave = PostSave::create($propertiesSave); // create new archive
        $postSave->tags()->sync($post->tags); // sync tags to archive
        $postSave->views()->sync($post->views); // sync views to archive
        $post->update($props); // update original post
        $post->tags()->sync($request->tag_list); // sync new tags to original post
        Session::flash('error', 'L\'article a bien été édité, bravo.'); // redirect with validation message
        Session::flash('errorClass', 'success');
        return redirect(route('admin.posts'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Publish / unpublish post -> takes post if as parameter
     */
    public function publishPost($id)
    {
        $post = Post::find($id); // get post
        // check if post exists --> error Mangement + redirect
        if (!$this->checkIfEntityExists($post, 'Impossible de changer la visibilité de l\'article : article inexistant', 'danger')) {
            return redirect(route('admin.posts'));
        }
        // If post is published --> unpublish
        if ($post->published) {
            $post->published = 0;
            Session::flash('error', 'L\'article a été dépublié avec succès. Bravo.');
        } else { // else publish it
            $post->published = 1;
            Session::flash('error', 'L\'article a été publié avec succès. Bravo.');
        }
        $post->save(); // save changes + redirect with validation message
        Session::flash('errorClass', 'success');
        return redirect(route('admin.posts'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * Previsualize post in back office, takes post id as parameter
     */
    public function previsualizePost($id)
    {
        $post = Post::find($id); // get post
        // check if post exists + errorManagement
        if (!$this->checkIfEntityExists($post, 'Impossible de prévisualiser: l\'article demandé n\'existe pas !', 'danger')) {
            return redirect(route('admin.posts'));
        }
        // get front office's article_single view
        return view('front.article_single', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * History --> get post versionning from archives and rollback
     */
    public function history()
    {
        // set locale to fr for dates
        Carbon::setLocale('fr');
        // get archived posts with pagination
        $posts = PostSave::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.history', compact('posts'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Rollback a post --> reset original post / recreate it from archived post (after deletion/edition)
     */
    public function rollBackPost($id)
    {
        // get saved post in archives
        $postSave = PostSave::find($id);
        // check if row exists, if not-> redirect with error message to inform admin
        if (!$this->checkIfEntityExists($postSave, 'Impossible de remettre en circulation: l\'article demandé n\'existe pas !', 'danger')) {
            return redirect(route('admin.history'));
        }
        // get post from post table using archived post's parent id
        $post = Post::find($postSave->post_id);
        // get attributes from archived post to swap id
        $props = $postSave->getAttributes();
        $props['id'] = $props['post_id'];
        if (!$post) { // if original post has been deleted
            $post = Post::create($props); // recreate original post from archived post
        } else { // if original post has been edited, re-edit it to mirror archived one
            $post->update($props);
        }
        // synchronize original tags to the archived post's tags
        $post->tags()->sync($postSave->tags);
        $post->views()->sync($postSave->views);
        $postSave->delete(); // remove archived post and send validation message to admin along with redirection
        Session::flash('error', 'L\'article a été remis en circulation avec succès !');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Tag listing for admin panel
     */
    public function listTags()
    {
        $tags = Tag::orderBy('id', 'desc')->paginate(20);
        return view('admin.tags.listing', compact('tags'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Store a tag in database with request validation (color, name + slug)
     */
    public function storeTag(Request $request)
    {
        $rules = [
            'name' => 'required|max:20',
            'color' => 'required'
        ];
        $messages = [
            'name.required' => 'Vous devez choisir un nom pour votre tag.',
            'name.max' => 'Le nom du tag ne doit pas excéder 20 caractères',
            'color.required' => 'Vous devez préciser une couleur pour votre tag.'
        ];
        // if slug isn't set --> SetSlugAttribute in Tag entity to set it automatically
        $this->validate($request, $rules, $messages);
        Tag::create($request->all());
        Session::flash('error', 'Le tag a bien été ajouté, bravo.');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.tags'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Delete a tag --> pass tag id + error Management
     */
    public function deleteTag($id)
    {
        $tag = Tag::find($id); // get tag
        // if tag doesn't exist -> redirects with errors
        if (!$this->checkIfEntityExists($tag, 'Impossible de supprimer le tag: id inexistant !', 'danger')) {
            return redirect(route('admin.tags'));
        }
        // delete tag
        $tag->delete();
        // redirect with validation messages
        Session::flash('error', 'Le tag a été supprimé avec succès, bravo.');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.tags'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * Edit form for tags --> take id as param
     */
    public function editTag($id)
    {
        $tag = Tag::find($id); // get tag
        // if tag doesn't exist, redirect with errors
        if (!$this->checkIfEntityExists($tag, 'Impossible d\'accéder au formulaire d\'édition, le tag demandé n\'existe pas !', 'danger')) {
            return redirect(route('admin.tags'));
        }
        // else return form with current tag
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * update tag after edit form submission --> tag id + request
     */
    public function updateTag($id, Request $request)
    {
        $rules = [
            'name' => 'required'
        ];
        $this->validate($request, $rules); // request validaiton
        Tag::find($id)->update($request->all()); // update current tag
        // redirect with validation message
        Session::flash('error', 'Le tag a été édité avec succès, bravo.');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.tags'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * Details for single tag --> tag id as param
     */
    public function viewTag($id)
    {
        $tag = Tag::find($id); // get tag
        // if tag doesn't exist --> redirect to listing with error management
        if (!$this->checkIfEntityExists($tag, 'Impossible de voir le tag: l\'id demandée n\'existe pas !', 'danger')) {
            return redirect(route('admin.tags'));
        }
        // else return view details
        return view('admin.tags.details', compact('tag'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Listing for categories
     */
    public function listCategories()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.listing', compact('categories'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Delete single category --> param id
     */
    public function deleteCategory($id)
    {
        $category = Category::find($id); // get category
        // if category doesn't exist -> redirect with error to listing page
        if (!$this->checkIfEntityExists($category, 'Impossible de supprimer: la categéorie demandée n\'existe pas ', 'danger')) {
            return redirect(route('admin.categories'));
        }
        // if trying to delete default category ---> unable to delete
        if (in_array($category->name, ['Non classé', 'غير مصنفة', 'Non classified'])) {
            Session::flash('error', 'La catégorie par défaut ne peut pas être supprimée.');
            Session::flash('errorClass', 'danger');
            return redirect(route('admin.categories'));
        }
        // update all posts with current category to non classified default one
        if ($category->locale == 'fr') {
            $category_id = 1;
        } elseif ($category->locale == 'en') {
            $category_id = 3;
        } else {
            $category_id = 4;
        }
        Post::where('category_id', $category->id)->update(['category_id' => $category_id]);
        $category->delete(); // delete category
        Session::flash('error', 'La catégorie a bien été supprimé');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Store a category --> request param
     */
    public function storeCategory(Request $request)
    {
        $rules = ['name' => 'required|max:20'];
        $messages = [
            'name.required' => 'Vous devez indiquer un nom à votre catégorie.',
            'name.max' => 'Le nom de votre catégorie ne doit pas dépasser 20 caractères.'
        ];
        $this->validate($request, $rules, $messages); // request validation
        // create category + redirect with validation message
        Category::create($request->all());
        Session::flash('error', 'La catégorie a bien été crée');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.categories'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * View single category --> id param
     */
    public function viewCategory($id)
    {
        // get category + error management/redirect if doesn't exist
        $category = Category::find($id);
        if (!$this->checkIfEntityExists($category, 'La catégorie demandée n\'existe pas.', 'danger')) {
            return redirect(route('admin.categories'));
        }
        // view details
        return view('admin.categories.details', compact('category'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * Edit form for category --> id param
     */
    public function editCategory($id)
    {
        // get category + error management/redirect if doesn't exist
        $category = Category::find($id);
        if (!$this->checkIfEntityExists($category, 'La catégorie demandée n\'existe pas. Impossible d\'accéder à la page d\'édition.', 'danger')) {
            return redirect(route('admin.categories'));
        }
        $categories = Category::where('parent_id', null)->where('locale', $category->locale)->where('id', '!=', $category->id)->pluck('name', 'id');
        $categories = $categories->all();
        $categories[null] = 'Pas de parent'; // default no hierarchy
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * update single category --> id + request param
     */
    public function updateCategory($id, Request $request)
    {
        // get category + error management/redirect if doesn't exist
        $category = Category::find($id);
        if (!$this->checkIfEntityExists($category, 'La catégorie demandée n\'existe pas. Impossible d\'accéder à la page d\'édition.', 'danger')) {
            return redirect(route('admin.categories'));
        }
        $rules = ['name' => 'required|max:20'];
        $messages = [
            'name.required' => 'Vous devez indiquer un nom à votre catégorie.',
            'name.max' => 'Le nom de votre catégorie ne doit pas dépasser 20 caractères.'
        ];
        $this->validate($request, $rules, $messages); // request validation
        $category->update($request->all()); // update category + redirect with validation message
        Session::flash('error', 'La catégorie a bien été modfié, bravo.');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.categories'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * View all posts according to selected tag --> param tag id
     */
    public function viewPostsByTag($id)
    {
        // get tag + error management/redirect if doesn't exist
        $tag = Tag::find($id);
        if (!$this->checkIfEntityExists($tag, 'Impossible de voir les posts, le tag demandé n\'existe pas.', 'danger')) {
            return redirect(route('admin.tags'));
        }
        // get posts from tag relationship
        $posts = $tag->posts()->get();
        // get suggested tags from same locale for easy navigation + return view
        $tags = Tag::where('locale', $tag->locale)->where('id', '!=', $tag->id)->get();
        return view('admin.tags.listing_associated', compact('posts', 'tag', 'tags'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * View posts by Category --> category id param
     */
    public function viewPostsByCategory($id)
    {
        // get category + error management/redirect if doesn't exist
        $category = Category::find($id);
        if (!$this->checkIfEntityExists($category, 'Impossible de voir les posts, le tag demandé n\'existe pas.', 'danger')) {
            return redirect(route('admin.tags'));
        }
        // get psots from current category
        $posts = $category->posts()->get();
        // get categories from same locale for easy navigation + return view
        $categories = Category::where('locale', $category->locale)->where('id', '!=', $category->id)->get();
        return view('admin.categories.listing_associated', compact('posts', 'category', 'categories'));
    }

    public function login()
    {
        return view('front.connexion');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Migrate current posts views --> to table view, reset current views to 0 and attach new relationship
     * should be happening every end of month for analytics
     */
    public function migrateViews()
    {
        // get all posts
        $posts = Post::all();
        foreach($posts as $post) {
            // foreach post create a new view in table, attach it and reset post current views to 0
            $view = View::create(['views' => $post->view]);
            $post->views()->attach($view->id);
            $post->update(["view" => 0]);
        }
        return redirect(route('admin.dashboard'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Listing for messages
     */
    public function listMessages()
    {
        $messages = Message::all();
        return view ('admin.messages.listing', compact('messages'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * view single message --> message id param
     */
    public function viewMessage($id)
    {
        // get message + error management/redirect if doesn't exist
        $message = Message::find($id);
        if (!$this->checkIfEntityExists($message, 'Impossible de voir le message: l\'id demandée n\'existe pas.', 'danger')) {
            return redirect()->route('admin.messages');
        }
        return view('admin.messages.details', compact('message'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * delete single message --> message id param
     */
    public function deleteMessage($id)
    {
        // get message + error management/redirect if doesn't exist
        $message = Message::find($id);
        if (!$this->checkIfEntityExists($message, 'Impossible de supprimer le message: l\'id demandée n\'existe pas.', 'danger')) {
            return redirect()->route('admin.messages');
        }
        // delete + redirects with validation message
        $message->delete();
        Session::flash('error', 'Le message a bien été supprimé, bravo.');
        Session::flash('errorClass', 'success');
        return redirect()->route('admin.messages');
    }
}
