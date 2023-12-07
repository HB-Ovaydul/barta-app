<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use function Pest\Laravel\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pages.post.create_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'barta' => 'required',
        ]);

        Post::create([
            // 'id' => Str::uuid(),
            'user_id' => Auth::user()->id,
            'author' => Auth::user()->username,
            'description' => $validate['barta'],
        ]);

        return redirect()->route('home.page');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit_post = Post::findOrFail($id);

        return view('frontend.pages.post.edit_post', [
            'edit_post' => $edit_post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post_update = Post::findOrFail($id);
        $post_update->update([
            'author' => $request->user(),
            'description' => $request->barta,
        ]);

        return redirect()->route('home.page');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();

        return redirect()->route('home.page');
    }

    /**
     * Show Single Post
     */
    public function singlePost($id): View
    {

        $single_post = Post::findOrFail($id);
        return view('frontend.pages.post.single_post',[
            'single_post'   => $single_post,
        ]);
    }
}
