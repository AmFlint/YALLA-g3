<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostRequestEdit;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //

    public function listPosts()
    {
        $posts = Post::orderBy('id', 'desc')->get();
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
		return view('admin.dashboard.dashboard');
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
}
