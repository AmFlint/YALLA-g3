<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function about()
    {
        return view('front.aboutUs');
    }

    public function listPosts()
    {
        $posts = Post::where('locale', App::getLocale())->get();
        return view('front/posts', compact('posts'));
    }
}
