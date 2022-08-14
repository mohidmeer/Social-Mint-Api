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


    public function redirectToInstagram(){
        return view ('dashboard.socialmedia.instagram');
    }
    public function deauthorize(){
        return view ('dashboard.socialmedia.instagram');
    }
    public function deactivate(){
        return view ('dashboard.socialmedia.instagram');
    }
    public function activate(){
        return view ('dashboard.socialmedia.instagram');
    }
    public function handleInstagramCallback(){
        return view ('dashboard.socialmedia.instagram');
    }
}
