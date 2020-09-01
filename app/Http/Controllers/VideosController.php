<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * Shows the video tutorials.
     */
    public function showVideos() {
        return view('video.tutorials');
    }
}
