<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->with('category')->OrderBy('id','desc')->paginate(2);
        return view('tags.show', compact('posts','tag'));
    }
}
