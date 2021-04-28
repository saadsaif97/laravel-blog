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
     * route: '/'
     * 
     */
    public function index()
    {

        return view('welcome')
            ->with('categories',Category::all())
            ->with('posts',Post::searched()->simplePaginate(2))
            ->with('tags',Tag::all());
    }

    /**
     * Returns the welcome page with category selected 
     * route: '/blog/category/{category} name: ('blog.category')
     */
    public function category(Category $category)
    {

        return view('blog.categories')
            ->with('categories',Category::all())
            ->with('category',$category)
            ->with('posts',$category->posts()->searched()->simplePaginate(2))
            ->with('tags',Tag::all());
    }

     /**
     * Returns the welcome page with tag selected 
     * route: '/blog/tag/{tag} name: ('blog.tag')
     */
    public function tag(Tag $tag)
    {

        return view('blog.tags')
            ->with('categories',Category::all())
            ->with('tag',$tag)
            ->with('posts',$tag->posts()->searched()->simplePaginate(2))
            ->with('tags',Tag::all());
    }


}
