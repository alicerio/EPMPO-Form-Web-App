<?php

namespace App\Http\Controllers;

use App\BProject;
use App\Agency;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class BProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new project (5310).
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects/5310.create2');
    }
}
