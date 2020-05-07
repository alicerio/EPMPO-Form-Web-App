<?php

namespace App\Http\Controllers;

use App\User;
use App\Agency;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->type == 2){
            $users = User::all();
            $types = ['Regular', 'Staff', 'Admin'];
            $agencies = Agency::all();
            return view('users.index', compact('users', 'types', 'agencies'));
        }else{
            return redirect(route('home'));
        }
    }

    // public function create()
    // {
    // }

    public function store(Request $request)
    {
        $user = new User();

        $user->name = request('name');
        $user->email = request('email');
        $user->type = request('type');
        $user->agency_id = request('agency_id');
        $user->password = \Hash::make(request('password'));

        $user->save();
        return redirect(route('users.index'));
    }

    // public function show(User $user)
    // {
    // }

    public function edit(User $user)
    {
        $agencies = Agency::all();
        return view('users.edit', compact('user', 'agencies'));
    }

    public function update(Request $request, User $user)
    {

        $user->name = request('name');
        $user->type = request('type');
        $user->agency_id = request('agency_id');

        $user->save();
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'));
    }
}
