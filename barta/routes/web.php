<?php

use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Frontend\FrontendtViewController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\frontend\UserProfileController;
use Illuminate\Support\Facades\Route;

/**
 * Authentication Routes
 */
// Register Route
Route::get('/register-page', [RegisterController::class, 'registerPage'])->name('register.page');
Route::post('/user-register', [RegisterController::class, 'userRegister'])->name('user.register');
// Login page route
Route::get('/login-page', [RegisterController::class, 'loginPage'])->name('login.page')->middleware('auth.redirect');
Route::post('/login', [RegisterController::class, 'loginUser'])->name('user.login');
Route::get('/user-logout', [RegisterController::class, 'logOut'])->name('user.logout');
// Frontend view pages Routes
Route::get('/', [FrontendtViewController::class, 'viewHomePage'])->name('home.page')->middleware('logout');
Route::get('/user-profile/{id}', [UserProfileController::class, 'viewUserProfile'])->name('user.profile');
Route::get('/edit-profile/{id}', [UserProfileController::class, 'editProfile'])->name('edit.profile');
Route::put('/update-profile/{id}', [UserProfileController::class, 'updateProfile'])->name('update.profile');
/**
 *  Post Resource Route
 */
Route::resource('/post', PostController::class);
Route::get('/delete/{id}', [PostController::class, 'delete'])->name('delete.post');
Route::get('/single-post/{uuid}', [PostController::class, 'singlePost'])->name('single.post');
