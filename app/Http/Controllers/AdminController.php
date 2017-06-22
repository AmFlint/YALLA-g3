<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    //

    public function listPosts()
    {
        $posts = Post::all();
        return view('admin.posts.listing', compact('posts'));
    }

    public function createPost()
    {
        $categories = Category::where('locale', App::getLocale())->pluck('name', 'id');
        $tags = Tag::where('locale', 'fr_FR')->pluck('name', 'id');
        return view('admin.posts.create', compact('tags', 'categories'));
    }

    public function storePost(Request $request)
    {
        $props = $request->all();
        $image = $this->upload($request->file('image'));
        $props['image'] = $image;
        $post = Post::create($props);
        $post->tags()->sync($request->tag_list);
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
}
