<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use App\Models\Telegram\Telegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TelegramController extends Controller
{


    public function index(){


        return view ('dashboard.socialmedia.telegram');


    }

    public function save(Request $request){

        $request->validate([ 
            'name' => 'required|min:4']);


        Telegram::create([
            'user_id'=>Auth::user()->id,
            'name'=>$request->name

        ]);

        return redirect()->route('telegram')->with('success','Telegram Name Added Make Sure to Send Test Message');





    }
    




}
