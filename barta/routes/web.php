<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Frontend\FrontendtViewController;
use App\Http\Controllers\frontend\UserProfileController;

/**
 * Authentication Routes
 */
// Register Route
Route::get('/register-page',[RegisterController::class,'registerPage'])->name('register.page');
Route::post('/user-register',[RegisterController::class,'userRegister'])->name('user.register');
// Login page route
Route::get('/login-page',[RegisterController::class,'loginPage'])->name('login.page');
Route::post('/login',[RegisterController::class,'loginUser'])->name('user.login');
// Frontend view pages Routes
Route::get('/',[FrontendtViewController::class,'viewHomePage'])->name('home.page');
Route::get('/user-profile/{id}',[UserProfileController::class,'viewUserProfile'])->name('user.profile');
Route::get('/edit-profile/{id}',[UserProfileController::class,'editProfile'])->name('edit.profile');
Route::put('/update-profile/{id}',[UserProfileController::class,'updateProfile'])->name('update.profile');
Route::get('/user-logout',[UserProfileController::class,'logOut'])->name('user.logout');







