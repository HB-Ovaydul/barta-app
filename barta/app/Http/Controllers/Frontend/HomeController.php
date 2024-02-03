<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show Home page
     */
    public function homePage()
    {
        $posts = Post::withCount('comments')->latest()->get();
        return view('frontend.pages.home', compact('posts'));
    }

}
