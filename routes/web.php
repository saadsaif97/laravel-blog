<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/blog/post/{post}', [App\Http\Controllers\Blog\PostsController::class, 'index'])->name('blog.index');

Auth::routes();

Route::middleware(['auth'])->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('category', CategoriesController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostsController::class);
    Route::get('trashed-post', [PostsController::class, 'trashed'])->name('trashed-posts.index');
    Route::put('trashed-post/{id}', [PostsController::class, 'restore'])->name('trashed-posts.restore');
    
});

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::put('/user/{user}/make_admin', [UserController::class, 'make_admin'])->name('user.make_admin');

});
