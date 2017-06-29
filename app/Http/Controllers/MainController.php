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
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Home method --> get last post from database for Site's current locale
     */
    public function home()
    {
        $post = Post::orderBy('created_at', 'desc')->where('locale', App::getLocale())->where('published', 1)->first();
        return view('front.home', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * About us page
     */
    public function about()
    {
        return view('front.aboutUs');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Post listing page for current site's locale
     */
    public function listPosts()
    {
        $posts = Post::where('locale', App::getLocale())->get();
        return view('front/posts', compact('posts'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * View post by slug --> get post from site's locale, with and slug (param) and if post is published
     * else 404
     */
    public function viewPost($slug)
    {
        $post = Post::where('locale', App::getLocale())->where('slug', $slug)->where('published', 1)->first();
        if (!$post) { // if post doesn't exist --> 404
            abort(404);
        }
        $post->increment('view');
        return view('front.article_single', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * post listing eager loading tags/category --> site's locale and published posts only, pagination 4 per pages
     */
    public function listPost()
    {
        $posts = Post::with('tags', 'category')->orderBy('created_at', 'desc')->where('locale', App::getLocale())->where('published', 1)->paginate(4);
        return view('front.articles', compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Donation page informations
     */
    public function donate()
    {
        return view('front.donate');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Contact page
     */
    public function contact()
    {
        return view('front.contact');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Terms of use page
     */
    public function terms()
    {
        return view('front.terms');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Day to day efforts page
     */
    public function quotidien()
    {
        return view('front.quotidien');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Patners listing page
     */
    public function partners()
    {
        return view('front.partners');
    }

    /**
     * @param $slug
     * View all posts for current tag --> slug else 404
     */
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

    /**
     * @param $slug
     * View all posts from current category
     */
    public function viewPostByCategory($slug)
    {
        $category = Category::where('locale', App::getLocale())->where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        }
        $category->increment('view'); // increment category's current views
        $posts = $category->posts()->where('published', 1)->get();
        dd($posts);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Post a message from contact page with validations
     */
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
