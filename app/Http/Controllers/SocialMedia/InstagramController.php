<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function index()
    {
        return view('dashboard.socialmedia.instagram');
    }
}
