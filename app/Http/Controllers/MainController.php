<?php

namespace App\Http\Controllers;

use App\Category;
use App\Message;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function home()
    {
        $post = Post::orderBy('created_at', 'desc')->where('locale', App::getLocale())->where('published', 1)->first();
        return view('front.home', compact('post'));
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
            abort(404);
        }
        $post->increment('view');
        return view('front.article_single', compact('post'));
    }

    public function listPost()
    {
        $posts = Post::with('tags', 'category')->orderBy('created_at', 'desc')->where('locale', App::getLocale())->where('published', 1)->paginate(4);
        return view('front.articles', compact('posts'));
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

    public function viewPostByTag($slug)
    {
        $tag = Tag::where('locale', App::getLocale())->where('slug', $slug)->first();
        if (!$tag) {
            abort(404);
        }
        $tag->increment('view');
        $posts = $tag->posts()->where('published', 1)->get();
        dd($posts);
    }

    public function viewPostByCategory($slug)
    {
        $category = Category::where('locale', App::getLocale())->where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        }
        $category->increment('view');
        $posts = $category->posts()->where('published', 1)->get();
        dd($posts);
    }

    public function postMessage(Request $request)
    {
        $rules = [
            'email' => 'email|required|max:120',
            'name' => 'required|max:100',
            'content' => 'required|max:2000'
        ];

        $messages = [
            'email.required' => Lang::get('validation.email_required'),
            'email.email' => Lang::get('validation.email'),
            'email.max' => Lang::get('validation.email_max'),
            'name.required' => Lang::get('validation.name_required'),
            'name.max' => Lang::get('validation.name_max'),
            'content.required' => Lang::get('validation.content_required'),
        ];

        $this->validate($request, $rules, $messages);
        Message::create($request->all());
        Session::flash('error', Lang::get('validation.thanks'));
        Session::flash('errorClass', 'success');
        return redirect()->route('contact');
    }
}
