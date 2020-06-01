<?php

namespace App\Http\Controllers;

use App\BProject;
use App\Agency;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class BProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = BProject::all()->where('parent_id', null);
        $agencies = Agency::all();
        $statuses = ['In Progress','PM Pending Review','Submitted', 'Approved','In Progress [Returned for Revision]'];
        return view('projects.index2', compact('projects', 'statuses','agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BProject  $bProject
     * @return \Illuminate\Http\Response
     */
    public function show(BProject $bProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BProject  $bProject
     * @return \Illuminate\Http\Response
     */
    public function edit(BProject $bProject)
    {
        return view('projects.edit2', compact('bProject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BProject  $bProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BProject $bProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BProject  $bProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(BProject $bProject)
    {
        //
    }
}
