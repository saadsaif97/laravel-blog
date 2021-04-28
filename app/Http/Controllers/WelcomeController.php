<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Returns welcome page
     * 
     */
    public function index()
    {
        return view('welcome')
            ->with('categories',Category::all())
            ->with('posts',Post::simplePaginate(2))
            ->with('tags',Tag::all());
    }
}
