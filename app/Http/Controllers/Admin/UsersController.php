<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use Auth;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
        $this->middleware('can:manageUsers,App\Models\User');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('model', User::paginate(20));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if(Auth::user()->id == $user->id){
            return redirect()->route('users.index')
            ->with('status', 'You can\'t edit yourself');
        }

        return view('admin.users.edit', [
            'model' => $user,
            'roles' => Role::all()
        ]);

        //return view('admin.users.edit')->with('model', $user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(Auth::user()->id == $user->id){
            return redirect()->route('users.index');
        }

        $user->roles()->sync($request->roles);
        
        return redirect()->route('users.index')
        ->with('status', "$user->name was updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
