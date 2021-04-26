<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('category', CategoriesController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostsController::class);
    Route::get('trashed-posts', [PostsController::class, 'trashed'])->name('trashed-posts.index');
    Route::put('trashed-posts/{id}', [PostsController::class, 'restore'])->name('trashed-posts.restore');
    
});

