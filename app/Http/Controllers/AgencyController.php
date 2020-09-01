<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Displays all of the agencies.
     */
    public function index()
    {
        if(auth()->user()->type == 2){
            $agencies = Agency::all();
            return view('agencies.index', compact('agencies'));
        }else{
            return redirect(route('home'));
        }
    }

    /**
     * Returns view to create a new agency.
     */
    public function create()
    {
        return view('agencies.create');
    }

    /**
     * Stores a new agency in the database.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $agency = new Agency();
        $agency->name = request('name');
        $agency->save();

        return redirect(route('agencies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        $agency->delete();
        return redirect(route('agencies.index'));
    }
}
