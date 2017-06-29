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
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * Add a tag from AJAX request (from add/edit post admin)
     */
    public function addTag(Request $request)
    {
        $props = $request->all();
        $props['slug'] = null; // set slug to null for automatic slug completion entity Tag
        Tag::create($props);  // create tag
        // return last inserted tag as a response
        return response(Tag::orderBy('id', 'desc')->first(), 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * get tags by locale --> dashboard analytics
     */
    public function getTagsByLocale(Request $request)
    {
        $tags = Tag::where('locale', $request->all())->get();
        return response($tags, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * get categories by locale for back office analytics
     */
    public function getCategoriesByLocale(Request $request)
    {
        $categories = Category::where('locale', $request->all())->get();
        return response($categories, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * Get views by type of entity --> tags / posts / categories to refresh dashboard
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response|void
     * Get all views from View Entity (relationship with post) and current post's views by Month
     * --> graphics dashboard visites analytics
     */
    public function getViewsByPost(Request $request)
    {
        // setting Carbon locale to french even though it doesn't work yet T_T
        Carbon::setLocale('fr');
        $post = Post::find($request->id); // get concerned post
        if (!$post) {
            return;
        }
        $views = $post->views()->orderBy('created_at', 'asc')->get(); // get different count of views from post
        $to_send = [];
        foreach ($views as $view) { // foreach views, add a month attribute to make front-dev's life easier with months
            $to_send[] = $view;
            $to_send[count($to_send) - 1]['month'] = $view->created_at->format('F');
        }
        $to_send[] = ['views' => $post->view, "month" => Carbon::now()->format('F')];
        // send different month's count views for concerned post
        return response($to_send);
    }
}
