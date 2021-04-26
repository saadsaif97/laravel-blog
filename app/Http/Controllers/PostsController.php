<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatingPostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
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
        return view('posts.create');
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

        Post::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'content'=> $request->content,
            'image'=> $image,
            'published_at'=> $request->published_at,
        ]);

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
        return view('posts.create', compact('post'));
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
        $data = $request->only('title','description','content','published_at');

        if ($request->hasFile('image')) {

            $image = $request->image->store('posts');
            
            $data['image'] = $image;
            
            Storage::delete($post->image);
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

            Storage::delete($post->image);
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
    public function restore($id){

        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        $post->restore();

        session()->flash('success','Post restored successfully');

        return redirect(route('post.index'));
    }
}
