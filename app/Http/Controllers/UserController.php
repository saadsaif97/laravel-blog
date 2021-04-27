<?php

namespace App\Http\Controllers;

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
     * Updates the user role to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $user->update([
            'role'=>'admin'
        ]);
       
        session()->flash('success', "Updated role to ADMIN successfully");

        return redirect(route('user.index'));
    }

    
}
