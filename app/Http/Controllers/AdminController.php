<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

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
        return view('admin.posts.create');
    }

	public function dashBoard()
	{
		return view('admin.dashboard.dashboard');
    }
}
