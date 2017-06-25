<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostRequestEdit;
use App\Media;
use App\Post;
use App\PostSave;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
            $propertiesMedia['type'] = 'image'; // set type to image (for future html structure)
            $imageMedia = $this->upload($request->file('imageMedia')); // Upload file and get name
            $propertiesMedia['url'] = $imageMedia; // set url link for image
            $media = Media::create($propertiesMedia); // create Media
        } else if ($request->url) { // if admin chose to upload image/youtube video from external site
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
        $post = Post::find($id);
        if (!$this->checkIfEntityExists($post, 'Le poste recherché n\'existe pas ! Vous ne pouvez le voir !', 'danger')) {
            return redirect(route('admin.posts'));
        };
        return view('admin.posts.details', compact('post'));
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        if (!$this->checkIfEntityExists($post, 'Impossible de supprimer, l\'article demandé n\'existe pas !', 'danger')) {
            return redirect(route('admin.posts'));
        }
        $props = $post->getAttributes();
        $props['post_id'] = $props['id'];
        $props['id'] = null;
        $props['action'] = 'delete';
        $postSave = PostSave::create($props);
        $postSave->tags()->sync($post->tags);
        $post->delete();
        Session::flash('error', 'Votre article a bien été supprimé');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.posts'));
    }

    private function upload($file)
    {
        $destinationPath = 'img-content/uploads';
        $extension = $file->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $file->move($destinationPath, $fileName); // uploading file to given pat
        return $fileName;
    }

	public function dashBoard()
	{
		$posts = Post::orderBy('created_at', 'desc')->get();
		return view('admin.dashboard.dashboard', compact('posts'));
    }

	public function editPost($id)
	{
	    $post = Post::where('id', $id)->get()->first();
	    if (!$this->checkIfEntityExists($post, 'Le poste recherché n\'existe pas !', 'danger')) {
	        return redirect(route('admin.posts'));
        };
        $categories = Category::where('locale', $post->locale)->get();
        $tags = Tag::where('locale', $post->locale)->get();
	    return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function updatePost($id, PostRequestEdit $request)
    {
        $props = $request->all();
        if ($request->image) { // if admin uploads a new image
            $image = $this->upload($request->file('image'));
            $props['image'] = $image;
        }
        $post = Post::findOrFail($id);
        if ($request->imageMedia) {
            $propertiesMedia['type'] = 'image'; // set type to image (for future html structure)
            $imageMedia = $this->upload($request->file('imageMedia')); // Upload file and get name
            $propertiesMedia['url'] = $imageMedia; // set url link for image
        } else if ($request->url) {
            $propertiesMedia['type'] = $request->type; // set type to image (for future html structure)
            $propertiesMedia['url'] = $request->url;
        }
        // If Article already has a relationship with a media
        if ($post->media) {
            $post->media->update($propertiesMedia); // update article's media
        } else { // else create a new one and save media_id in props
            $media = Media::create($propertiesMedia);
            $props['media_id'] = $media->id;
        }
        $propertiesSave = $post->getAttributes();
        $propertiesSave['post_id'] = $propertiesSave['id'];
        $propertiesSave['id'] = null;
        $propertiesSave['action'] = 'edit';
        $postSave = PostSave::create($propertiesSave);
        $postSave->tags()->sync($post->tags);
        $post->update($props);
        $post->tags()->sync($request->tag_list);
        Session::flash('error', 'L\'article a bien été édité, bravo.');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.posts'));
    }

    public function publishPost($id)
    {
        $post = Post::find($id);
        if (!$this->checkIfEntityExists($post, 'Impossible de changer la visibilité de l\'article : article inexistant', 'danger')) {
            return redirect(route('admin.posts'));
        }
        if ($post->published) {
            $post->published = 0;
            Session::flash('error', 'L\'article a été dépublié avec succès. Bravo.');
        } else {
            $post->published = 1;
            Session::flash('error', 'L\'article a été publié avec succès. Bravo.');
        }
        $post->save();
        Session::flash('errorClass', 'success');
        return redirect(route('admin.posts'));
    }

    public function previsualizePost($id)
    {
        $post = Post::find($id);
        if (!$this->checkIfEntityExists($post, 'Impossible de prévisualiser: l\'article demandé n\'existe pas !', 'danger')) {
            return redirect(route('admin.posts'));
        }
        return view('admin.posts.previsualize', compact('post'));
    }

    public function history()
    {
        Carbon::setLocale('fr');
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

    public function storeTag(Request $request)
    {
        if (!$request->name) {
            Session::flash('error', 'Merci de préciser au moins un nom pour votre tag (ou au moins une idée quoi ?)');
            Session::flash('errorClass', 'danger');
            return redirect(route('admin.tags'));
        }
        Tag::create($request->all());
        Session::flash('error', 'Le tag a bien été ajouté, bravo.');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.tags'));
    }

    public function deleteTag($id)
    {
        $tag = Tag::find($id);
        if (!$this->checkIfEntityExists($tag, 'Impossible de supprimer le tag: id inexistant !', 'danger')) {
            return redirect(route('admin.tags'));
        }
        $tag->delete();
        Session::flash('error', 'Le tag a été supprimé avec succès, bravo.');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.tags'));
    }

    public function editTag($id)
    {
        $tag = Tag::find($id);
        if (!$this->checkIfEntityExists($tag, 'Impossible d\'accéder au formulaire d\'édition, le tag demandé n\'existe pas !', 'danger')) {
            return redirect(route('admin.tags'));
        }
        return view('admin.tags.edit', compact('tag'));
    }

    public function updateTag($id, Request $request)
    {
        $rules = [
            'name' => 'required'
        ];
        $this->validate($request, $rules);
        Tag::find($id)->update($request->all());
        Session::flash('error', 'Le tag a été édité avec succès, bravo.');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.tags'));
    }

    public function viewTag($id)
    {
        $tag = Tag::find($id);
        if (!$this->checkIfEntityExists($tag, 'Impossible de voir le tag: l\'id demandée n\'existe pas !', 'danger')) {
            return redirect(route('admin.tags'));
        }
        return view('admin.tags.details', compact('tag'));
    }
}
