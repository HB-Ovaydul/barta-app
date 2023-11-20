<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;

class FrontendtViewController extends Controller
{
    /**
     * Show home Page
     */
    public function viewHomePage()
    {
        $posts = Post::latest()->get();

        return view('frontend.pages.home', compact('posts'));
    }
}
