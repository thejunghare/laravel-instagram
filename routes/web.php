<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "web" middleware group. Make something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// show profile -> localhost/profile/1
Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');

// create post
Route::get('/p/create', 'App\Http\Controllers\PostsController@create');

// store the post
Route::post('/p', 'App\Http\Controllers\PostsController@store');

//see indivudal post
Route::get('/p/{post}', [PostsController::class, 'show']);

// edit user profile -> localhost/profile/1/edit
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
// this is actually update the profile
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
