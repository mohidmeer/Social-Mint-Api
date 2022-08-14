<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPostController extends Controller
{
    public function index()
    {
        return view('dashboard.post');
    }
}
