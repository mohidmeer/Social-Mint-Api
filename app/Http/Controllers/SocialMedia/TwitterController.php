<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use App\Models\SocialMediaAccessTokens;
use Carbon\Carbon;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\Twitter\Twitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isNull;

class TwitterController extends Controller
{

    public function redirectToTwitter(){
        $state=Crypt::encryptString(Auth::user()->id);
        $connection = new TwitterOAuth(
            config('services.twitter.consumer_key'),
            config('services.twitter.consumer_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_token_secret'),
        );
        $oauth_token = $connection->oauth("oauth/request_token?oauth_callback=".config('services.twitter.callbackWeb')."?state=state")['oauth_token'];

        return redirect('https://api.twitter.com/oauth/authorize?oauth_token='.$oauth_token);



    }



    public function handleTwitterCallback(Request $request){
        $request->state;
        $AccessTokens=Http::post("https://api.twitter.com/oauth/access_token?oauth_token=".$request->oauth_token."&oauth_verifier=".$request->oauth_verifier."");
         
        // Condition for checing if we get the access token or not 
        // if (!(isset($AccessTokens->oauth_token))){ return response($AccessTokens,404) ;}


        $url = 'https://www.g.com/r?'.$AccessTokens;
        $url_components = parse_url($url);
         parse_str($url_components['query'], $params);
        $userid=Auth::user()->id;

        Twitter::create([
            'user_id'=>Auth::user()->id,
            'access_token'=>$params['oauth_token'],
            'secret_token'=>$params['oauth_token_secret'],
            'name'=>$params['screen_name'],
        ]);
       

       
         
         return redirect()->route('twitter')->with('success',"successfully Connected");
    }
   
    public function index()
    {   



        return view('dashboard.socialmedia.twitter');
    }
   
    public function deauthorize(){
        Auth::user()->Twitter->delete();
        return view ('dashboard.socialmedia.twitter');
    }



    // both functions not required till now 

    // public function deactivate(){
    //     return view ('dashboard.socialmedia.twitter');
    // }
    // public function activate(){
    //     return view ('dashboard.socialmedia.twitter');
    // }


  


    
}
