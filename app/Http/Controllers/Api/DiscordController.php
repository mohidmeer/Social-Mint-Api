<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discord\Channels;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DiscordController extends Controller
{


    public function PostMessage(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);
        $Result = array();

        $Channels = Channels::where('user_id', Auth::user()->id)->where('status', 1)->get();

        if ($Channels->count() == 0) {
            return response(['error' => 'You Dont Have Any Channel Allowed For Posting'], 404);
        }

        foreach ($Channels as $Channel) {

            $Req = Http::asForm()->withHeaders(['Authorization' => 'Bot ' . config('services.discord.bottoken')])->post('https://discord.com/api/channels/' . $Channel['channel_id'] . '/messages', [
                    'content' => $request->message

                ]);

            $Result = Arr::add($Result, $Channel->name, $Req->json());
        }

        return response($Result, 200);
    }

    public function PostMedia(Request $request)
    {


        $request->validate([
            'message' => 'required',
            'img_url' => 'required|url'
        ]);


        $Result = array();

        $Channels = Channels::where('user_id', Auth::user()->id)->where('status', 1)->get();

        if ($Channels->count() == 0) {
            return response(['error' => 'You Dont Have Any Channel Allowed For Posting'], 404);
        }

        foreach ($Channels as $Channel) {
            // For MEssage Part
            $Req0 = Http::asForm()->withHeaders(['Authorization' => 'Bot ' . config('services.discord.bottoken')])->post('https://discord.com/api/channels/' . $Channel['channel_id'] . '/messages', [
                    'content' => $request->message

                ]);
            //  For Image Part 😥
            $Req = Http::asForm()->withHeaders(['Authorization' => 'Bot ' . config('services.discord.bottoken')])->post('https://discord.com/api/v10/channels/' . $Channel['channel_id'] . '/messages', [
                    'content' => $request->img_url

                ]);

            $Result = Arr::add($Result, $Channel->name, $Req->json());
        }


        return response($Result, 200);
    }
}
