<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use App\Models\SocialMediaAccessTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
class TwitterController extends Controller
{

    public function redirectToTwitter(){
        $state=Crypt::encryptString(Auth::user()->id);
        $redirecturl='https://twitter.com/i/oauth2/authorize?response_type=code&client_id=bHFRTVU3TmxqMHloQTlvaXROSjQ6MTpjaQ&redirect_uri=http://localhost:8000/home/twitter/callback&scope=tweet.write+tweet.read+users.read+follows.read+offline.access&state='.$state.'&code_challenge=challenge&code_challenge_method=plain';
        return redirect($redirecturl) ;
    }

    public function handleTwitterCallback(Request $request){
        
        $res= Http::asForm()->post('https://api.twitter.com/2/oauth2/token',
        [
             'code'=>$request->code,
             'grant_type'=>'authorization_code',
             'client_id'=>'bHFRTVU3TmxqMHloQTlvaXROSjQ6MTpjaQ',
             'redirect_uri'=>'http://localhost:8000/home/twitter/callback',
             'code_verifier'=>'challenge'
         ]);
         if (isset($res['error'])){ abort(404);}
         $userid=Crypt::decryptString($request->state);
         SocialMediaAccessTokens::where('user_id',$userid)
         ->update([
             'tw_access_token'=>$res['access_token'],
             'tw_refresh_token'=>$res['refresh_token']
           ]);
          
         
         return redirect()->route('twitter');
 
     }
   
   
     public function index()
    {   

        return view('dashboard.socialmedia.twitter');
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


  


    
}
