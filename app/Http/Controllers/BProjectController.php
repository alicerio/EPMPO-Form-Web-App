<?php

namespace App\Http\Controllers;

use App\BProject;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.form2.create');
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
        //
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
