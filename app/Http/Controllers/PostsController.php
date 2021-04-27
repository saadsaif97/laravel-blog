<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatingPostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostsController extends Controller
{
    /**
     * This middleware checks category count.
     * 
     * If no category in list, redirect to create category route 
     * with warning flash message.
     */
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatingPostRequest $request)
    {   

        $image = $request->image->store('posts');

        $post = Post::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'content'=> $request->content,
            'image'=> $image,
            'published_at'=> $request->published_at,
            'category_id'=> $request->category_id,
        ]);

        if($request->tags)
        {
            $post->tags()->attach($request->tags);
        }

        session()->flash('success','Post created succesully');

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create', compact('post'))->with('categories',Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {


        $data = $request->only('title','description','content','published_at', 'category_id');

        if ($request->hasFile('image')) {

            $image = $request->image->store('posts');
            
            $data['image'] = $image;
            
            $post->deleteImage();
        }

        if($request->tags)
        {
            $post->tags()->sync($request->tags);
        }

        $post->update($data);

        session()->flash('success','Post updated successfully');

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        if ($post->trashed()) {

            $post->deleteImage();
            $post->forceDelete();

        }else{

            $post->delete();

        }

        session()->flash('success','Post deleted succesully');

        return redirect(route('post.index'));
    }


    /**
     * Display the list of soft deleted posts
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed(){

        return view('posts.index')->with('posts',Post::onlyTrashed()->get());
    }

    /**
     * Restores the soft deleted post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        // we cannot use route model binding here because post is already deleted
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        $post->restore();

        session()->flash('success','Post restored successfully');

        return redirect()->back();
    }
}
