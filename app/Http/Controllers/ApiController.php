<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
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
}
