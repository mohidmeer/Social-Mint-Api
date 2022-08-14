<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;

class FrontApiController extends Controller
{
    public function index()
    {
        $user= Auth::user()->api_access_token;
        return view('dashboard.api',['accesstoken'=>$user ]);
    }
}
