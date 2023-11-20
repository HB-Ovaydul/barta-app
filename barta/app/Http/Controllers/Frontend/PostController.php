<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.pages.home');
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

         $this->validate($request, [
            'barta' => 'required',
        ]);
        Post::create([
            'uuid' => Str::uuid(),
            'author' => Auth::guard('register')->user()->name.' '.Auth::guard('register')->user()->username,
            'description' => $request->barta
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
            'description' => $request->barta,
        ]);

        return redirect()->route('home.page');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function delete($id)
    {
        $delete = Post::findOrFail($id);
        $delete->delete();

        return back()->withErrors('success', 'Post Deleted Successful');
    }

    /**
     * Show Single Post
     */
    public function singlePost($uuid) : View
    {

        $posts = Post::get();
        return view('frontend.pages.post.single_post',compact('posts'));
    }

}
