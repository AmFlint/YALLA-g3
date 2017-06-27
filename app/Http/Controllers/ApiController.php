<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\View;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function addTag(Request $request)
    {
//        $rules = ['name' => 'required|alpha|max:15'];
        $props = $request->all();
        $props['slug'] = null;
        Tag::create($props);
        return response(Tag::orderBy('id', 'desc')->first(), 200);

    }

    public function getTagsByLocale(Request $request)
    {
        $tags = Tag::where('locale', $request->all())->get();
        return response($tags, 200);
    }

    public function getCategoriesByLocale(Request $request)
    {
        $categories = Category::where('locale', $request->all())->get();
        return response($categories, 200);
    }

    public function getViewsByType(Request $request)
    {
        $entity = 'App\\' . ucfirst($request->type);
        if (isset($request->locale) && $request->locale != null) {
            $to_send = $entity::orderBy('created_at', 'desc')->where('locale', $request->locale)->get();
        } else {
            $to_send = $entity::orderBy('created_at', 'desc')->get();
        }
        return response($to_send, 200);
    }

    public function getViewsByPost(Request $request)
    {
        // setting Carbon locale to french even though it doesn't work yet T_T
        Carbon::setLocale('fr');
        $post = Post::find($request->id); // get concerned post
        $views = $post->views()->orderBy('created_at', 'asc')->get(); // get different count of views from post
        $to_send = [];
        foreach ($views as $view) { // foreach views, add a month attribute to make front-dev's life easier with months
            $to_send[] = $view;
            $to_send[count($to_send) - 1]['month'] = $view->created_at->format('F');
        }
        $to_send[] = ['views' => $post->view, "Month" => $post->created_at->format('F')];
        // send different month's count views for concerned post
        return response($to_send);
    }
}
