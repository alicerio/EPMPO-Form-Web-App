<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function showVideos() {
        return view('video.tutorials');
    }
}
