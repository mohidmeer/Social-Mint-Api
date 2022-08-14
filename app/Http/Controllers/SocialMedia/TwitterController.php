<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function index()
    {
        return view('dashboard.socialmedia.twitter');
    }
    public function redirectToTwitter(){
        return view ('dashboard.socialmedia.twitter');
    }
    public function deauthorize(){
        return view ('dashboard.socialmedia.twitter');
    }
    public function deactivate(){
        return view ('dashboard.socialmedia.twitter');
    }
    public function activate(){
        return view ('dashboard.socialmedia.twitter');
    }
    public function handleTwitterCallback(){
        return view ('dashboard.socialmedia.twitter');
    }
}
