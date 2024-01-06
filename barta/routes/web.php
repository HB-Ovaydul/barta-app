<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\CommentController;

Route::get('/',[HomeController::class, 'homePage'])->middleware(['auth'])->name('home.page');

Route::middleware('auth')->group(function () {
    Route::get('/show-profile/{id}', [ProfileController::class, 'showProfile'])
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

    // Search User
    Route::get('/search', [SearchController::class, 'searchUser'])
        ->name('search.user');

});

require __DIR__.'/auth.php';
