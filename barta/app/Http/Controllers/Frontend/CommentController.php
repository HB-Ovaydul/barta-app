<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentFormRequest;
use App\Models\Post;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;

use function Pest\Laravel\post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $posts = Post::where('id', $id)->with('comments')->withCount('comments')->get();
        return view('frontend.pages.post.comment',[
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentFormRequest $request, $post)
    {
        $validate = $request->validated();
        Comment::create([
            'post_id'  => $post,
            'user_id'  => auth()->user()->id,
            'body'  =>  $validate['body'],
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($postId, $commentId)
    {
        $post = Post::findOrFail($postId);
        $comment = $post->comments()->findOrFail($commentId);
        // dd($posts, $commentId);
        return view('frontend.pages.post.edit_comment',compact('post', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentFormRequest $request, $postId, $commentId)
    {
        $validate = $request->validated();
        $post = Post::findOrFail($postId);
        $commentUpdate = $post->comments()->findOrFail($commentId);
        $commentUpdate->update($validate->all());
        return redirect()->route('posts.comments.index',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId, $commentId)
    {
        $post = Post::findOrFail($postId);
        $comment = $post->comments()->findOrFail($commentId);
        $comment->delete();
        return back();
    }
}
