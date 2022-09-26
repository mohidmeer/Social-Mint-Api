<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{



    public function PostMessage(Request $request){
        $request->validate([ 
            'message'=>'required'
        ]);

        if (!(isset(Auth::user()->Telegram))){ return response('No Account Linked',404); }

        $chat_id= Auth::user()->Telegram->name;

        $url='https://api.telegram.org/bot'
        .config('services.telegram.key').'/sendMessage?chat_id='.$chat_id.'&text='.$request->message.'';

        $sendMessageTelegram=Http::get($url);

        return response($sendMessageTelegram,200);

    }

    public function PostMedia(Request $request){


        $request->validate([ 
            'message'=>'required',
            'img_url'=>'required|url'
        ]);

        if (!(isset(Auth::user()->Telegram))){ return response('No Account Linked',404); }

        $chat_id= Auth::user()->Telegram->name;

        $url='https://api.telegram.org/bot'
        .config('services.telegram.key').'/sendPhoto?chat_id='.$chat_id.'&caption='.$request->message.'&photo='.$request->img_url.'';

        $sendMessageTelegram=Http::get($url);

        return response($sendMessageTelegram,200);





    }
}
