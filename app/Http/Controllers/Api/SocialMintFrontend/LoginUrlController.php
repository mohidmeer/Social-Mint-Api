<?php

namespace App\Http\Controllers\Api\SocialMintFrontend;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LoginUrlController extends Controller
{


    
    public function getFacebookRedirectUrl(Request $request)
    {
        $request->validate([
            'redirect_uri' => 'required|url'
        ]);

        $URL=config('services.authorizeurls.facebook').Crypt::encryptString(Auth::user()->id).','.$request->redirect_uri;
        return response($URL,200);
    }
    public function getInstagramRedirectUrl(Request $request)
    {
        $request->validate([
            'redirect_uri' => 'required|url'
        ]);
        $URL=config('services.authorizeurls.instagram').Crypt::encryptString(Auth::user()->id).','.$request->redirect_uri;
        return response($URL,200);
        
    }
    public function getTwitterRedirectUrl(Request $request)
    {
        $request->validate([
            'redirect_uri' => 'required|url'
        ]);
        $state = Crypt::encryptString(Auth::user()->id).','.$request->redirect_uri;
        $connection = new TwitterOAuth(
            config('services.twitter.consumer_key'),
            config('services.twitter.consumer_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_token_secret'),
        );
        $oauth_token = $connection->oauth("oauth/request_token?oauth_callback=".config('services.twitter.callback') ."?state=" . $state)['oauth_token'];

        return response('https://api.twitter.com/oauth/authorize?oauth_token=' . $oauth_token, 200);
    }
    public function getRedditRedirectUrl(Request $request)
    {
        $request->validate([
            'redirect_uri' => 'required|url'
        ]);
        $URL=config('services.authorizeurls.reddit').Crypt::encryptString(Auth::user()->id).','.$request->redirect_uri;
        return response($URL,200);
    }
    public function getDiscordRedirectUrl(Request $request)
    {
        $request->validate([
            'redirect_uri' => 'required|url'
        ]);
        $URL=config('services.authorizeurls.discord').Crypt::encryptString(Auth::user()->id).','.$request->redirect_uri;
        return response($URL,200);
    }
    public function getPintrestRedirectUrl(Request $request)
    {
        $request->validate([
            'redirect_uri' => 'required|url'
        ]);
        $URL=config('services.authorizeurls.pintrest').Crypt::encryptString(Auth::user()->id).','.$request->redirect_uri;
        return response($URL,200);
    }


}
