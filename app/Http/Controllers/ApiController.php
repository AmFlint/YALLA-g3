<?php

namespace App\Http\Controllers;

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
}
