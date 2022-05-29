<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'srch'=>'required'
        ]);
        $srch = $request->srch;
        $posts = Post::where('title', 'LIKE',"%{$srch}%")->with('category')->paginate(3);
        return view('posts.search', compact('srch','posts')) ;
    }
}
