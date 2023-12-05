<?php

use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::withCount('comments')->get();
    return view('frontend.pages.home', compact('posts'));
})->middleware(['auth'])->name('home.page');

Route::middleware('auth')->group(function () {
    Route::get('/show-profile', [ProfileController::class, 'showProfile'])
        ->name('show.profile');

    Route::get('/profile/{id}', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile-update/{id}', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/my-profile/{id}', [ProfileController::class, 'profiles'])
        ->name('my.profile');
    //Post Routes
    Route::resource('/posts', PostController::class);
    //Comment Routes
    Route::resource('/posts.comments', CommentController::class);

    Route::get('/single-post/{id}', [PostController::class, 'singlePost'])
        ->name('single.post');

});

require __DIR__.'/auth.php';
