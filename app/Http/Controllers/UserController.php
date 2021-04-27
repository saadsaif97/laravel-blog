<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }


    /**
     * Display the form to edit the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }


    /**
     * Updates the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request ,User $user)
    {
        $user->update([
            'name'=>$request->name,
            'bio'=>$request->bio,
        ]);

        session()->flash('success', "Updated user profile successfully");

        return redirect(route('user.index'));
    }


    /**
     * Updates the user role to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function make_admin(User $user)
    {
        $user->update([
            'role'=>'admin'
        ]);
       
        session()->flash('success', "Updated role to ADMIN successfully");

        return redirect(route('user.index'));
    }

    
}
