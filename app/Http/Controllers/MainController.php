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

    public function viewPost($slug)
    {
        $post = Post::where('locale', App::getLocale())->where('slug', $slug)->where('published', 1)->first();
        if (!$post) {
            dd('Need to abort(404) in the future');
        }
        $post->increment('view');
        return view('front.article_single', compact('post'));
    }

    public function listPost()
    {
//        $posts = Post::where('locale', App::getLocale())->get();
//        return view('front.articles', compact('posts'));
        return view('front.articles');
    }

    public function donate()
    {
        return view('front.donate');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function terms()
    {
        return view('front.terms');
    }

    public function quotidien()
    {
        return view('front.quotidien');
    }

    public function partners()
    {
        return view('front.partners');
    }
}
