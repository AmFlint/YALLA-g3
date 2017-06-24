<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostRequestEdit;
use App\Post;
use App\PostSave;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //

    public function listPosts()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        return view('admin.posts.listing', compact('posts'));
    }

    public function createPost()
    {
        $categories = Category::where('locale', App::getLocale())->pluck('name', 'id');
        $tags = Tag::where('locale', 'fr_FR')->get();
        return view('admin.posts.create', compact('tags', 'categories'));
    }

    public function storePost(PostRequest $request)
    {
        $props = $request->all();
        $image = $this->upload($request->file('image'));
        $props['image'] = $image;
        $post = Post::create($props);
        $post->tags()->sync($request->tag_list);
        Session::flash('error', 'Votre article a bien été ajouté');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.posts'));
    }

    public function viewPost($id)
    {
        $post = Post::find($id);
        if (!$this->checkIfEntityExists($post, 'Le poste recherché n\'existe pas ! Vous ne pouvez le voir !', 'danger')) {
            return redirect(route('admin.posts'));
        };
        return view('admin.posts.details', compact('post'));
    }

    public function tag()
    {
        return view('admin.tag');
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
        PostSave::create($props);
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
        $categories = Category::where('locale', App::getLocale())->pluck('name', 'id');
        $tags = Tag::where('locale', $post->locale)->get();
	    return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function updatePost($id, PostRequestEdit $request)
    {
        $props = $request->all();
        if ($request->image) {
            $image = $this->upload($request->file('image'));
            $props['image'] = $image;
        }
        $post = Post::findOrFail($id);
        $propertiesSave = $post->getAttributes();
        $propertiesSave['post_id'] = $propertiesSave['id'];
        $propertiesSave['id'] = null;
        $propertiesSave['action'] = 'edit';
        PostSave::create($propertiesSave);
        $post->update($props);
        $post->tags()->sync($request->tag_list);
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
        $posts = PostSave::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.history', compact('posts'));
    }

    public function rollBackPost($id)
    {
        $postSave = PostSave::find($id);
        if (!$this->checkIfEntityExists($postSave, 'Impossible de remettre en circulation: l\'article demandé n\'existe pas !', 'danger')) {
            return redirect(route('admin.history'));
        }
        $post = Post::find($postSave->post_id);
        $props = $postSave->getAttributes();
        $props['id'] = $props['post_id'];
        if (!$post) {
            Post::create($props);
        } else {
            $post->update($props);
        }
        $postSave->delete();
        Session::flash('error', 'L\'article a été remis en circulation avec succès !');
        Session::flash('errorClass', 'success');
        return redirect(route('admin.posts'));
    }
}
