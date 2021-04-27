<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        Tag::create([
            'name'=> $request->name
        ]);

        session()->flash('success', 'Tag has been created successfully.');

        return redirect('/tag')->with('tags',Tag::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('tags.create')->with('tag', Tag::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name'=> $request->name
        ]);

        session()->flash('success', 'Tag has been created successfully.');

        return redirect('/tag')->with('tags',Tag::all());
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {

        if ($tag->posts->count() > 0) {
            session()->flash('error', 'Tag cannot be deleted as it has posts.');    

            return redirect()->back();
        }

        $tag->delete();

        session()->flash('success', 'Tag has been deleted successfully.');

        return redirect('/tag')->with('tags', Tag::all());
    }
}
