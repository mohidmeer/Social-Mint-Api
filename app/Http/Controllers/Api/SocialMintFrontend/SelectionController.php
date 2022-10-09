<?php

namespace App\Http\Controllers\Api\SocialMintFrontend;

use App\Http\Controllers\Controller;
use App\Models\Discord\Channels;
use App\Models\Facebook\Pages;
use App\Models\Instagram\InstagramAccounts;
use App\Models\Pintrest\Board;
use App\Models\Telegram\Telegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectionController extends Controller
{
    public function SelectInstagramPages(Request $request)
    {
       $request->validate(['id'=>'required']);
       InstagramAccounts::where('id',$request->id )->update(['status'=>1]);
       InstagramAccounts::where('id','!=' ,$request->id )->delete();
       return response('Successfully Connected',200 );
    }
    public function SelectFacebookPages(Request $request)
    {
        $request->validate(['id'=>'required']);
        Pages::where('id',$request->id )->update(['status'=>1]);
        Pages::where('id','!=',$request->id)->delete();
        return response('Successfully Connected ',200 );

    }
    public function SelectDiscordChannel(Request $request)
    {
        $request->validate(['id'=>'required']);
        Channels::where('id',$request->id )->update(['status'=>1]);
        Channels::where('id','!=',$request->id)->delete();
        return response('Successfully Connected ',200 );

    }

    public function SelectPintrestBoards(Request $request)
    {
        $request->validate(['id'=>'required']);
        Board::where('id',$request->id )->update(['status'=>1]);
        Board::where('id','!=',$request->id)->delete();
        return response('Successfully Connected ',200 );
    }
    public function SaveTelegram(Request $request)
    {
        $request->validate([ 
            'name' => 'required|min:4']);

        Telegram::create([
            'user_id'=>Auth::user()->id,
            'name'=>$request->name

        ]);
        return response('Successfully Saved ',200 );
    } 

}