<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use App\Models\Reditt\Reditt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

class RedittController extends Controller
{
 

    public function index()
    {
        return view ('dashboard.socialmedia.reditt');
    }


    public function redirectToReddit()
    {
        

        
        $redditoauthurl='https://www.reddit.com/api/v1/authorize?client_id='.config('services.reddit.client_id').'&response_type=code&redirect_uri='.config('services.reddit.callback').'&duration=permanent&scope=submit,edit,read,save,history,identity,modflair,modposts,flair&state=web';

        return redirect($redditoauthurl);



    }


    public function handleRedditCallback(Request $request)
    { 
        
        if (!(($request->state=='web'))){ return $this->handlePlatformCallack($request);} 

        if (isset($request->error)){ return redirect()->route('reddit')->with('error',$request->error);}

        $AccessToken=Http::withBasicAuth(config('services.reddit.client_id'),config('services.reddit.client_secret'))
        ->asForm()
        ->post('https://www.reddit.com/api/v1/access_token',
        [
         'grant_type'=>'authorization_code',
         'redirect_uri'=>config('services.reddit.callback'),
         'code'=>$request->code,
        ]);
        $Name=Http::withToken($AccessToken['access_token'])->get('https://oauth.reddit.com/api/v1/me');

        Reditt::create([
            'name'         => $Name['name'],
            'user_id'      => Auth::user()->id,
            'access_token' =>$AccessToken['access_token'],
            'refresh_token'=>$AccessToken['refresh_token'],
            'avatar_url'=>$Name['icon_img'],

        ]);


        return redirect()->route('reddit')->with('success','Successfully Connected');
    }


    public function handlePlatformCallack(Request $request)
    {

        
        
        if (isset($request->error)){return response($request->error, 404);}


        $userid = User::find(Crypt::decryptString($request->state))->id;
        

        $AccessToken=Http::withBasicAuth(config('services.reddit.client_id'),config('services.reddit.client_secret'))
        ->asForm()
        ->post('https://www.reddit.com/api/v1/access_token',
        [
         'grant_type'=>'authorization_code',
         'redirect_uri'=>config('services.reddit.callback'),
         'code'=>$request->code,
        ]);
        $Name=Http::withToken($AccessToken['access_token'])->get('https://oauth.reddit.com/api/v1/me');

        Reditt::create([
            'name'         => $Name['name'],
            'user_id'      => $userid,
            'access_token' =>$AccessToken['access_token'],
            'refresh_token'=>$AccessToken['refresh_token'],
            'avatar_url'=>$Name['icon_img'],

        ]);


        return redirect(config('services.socialmint.redirect'), 201);


    }


    public function deauthorize()
    {
        Reditt::where('user_id',Auth::user()->id)->delete();
        return redirect()->route('reddit')->with('success','Successfully Unlinked');
    }



}
