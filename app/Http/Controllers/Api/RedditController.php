<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reditt\Reditt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class RedditController extends Controller
{

    public function Postmessage(Request $request)
    {

      

        $request->validate([ 
            'title' => 'required|min:4',
            'text' =>  'required|min:10' ]);

        $reddit = Auth::user()->Reditt;

    

        if (!(isset($reddit))) {
            return response("No Reddit Account Linked Please Link First", 404);
        }


        // WE ARe Saving User Bearer Token IN Variable Because We May need TO REfresh It
        $bearer_token=$reddit->access_token;

        $New_token=$this->refreshtoken($reddit->updated_at);

        if (!($New_token===false)){$bearer_token=$New_token;}


        // Getting The updated refresh token from the function 

        //    return [
        //     'title'=> $request->title,
        //     'text' =>  $request->title,
        //     'sr'   =>'u_'.$reddit->name,
        //     'kind' =>'self',
        //     'bearer_token'=>$bearer_token
        // ];

        // Then Making Call To POst Message

        $url = 'https://oauth.reddit.com/api/submit';


        $res = Http::withToken($bearer_token)->asForm()->post($url,
        [
            'title'=> $request->title,
            'text' =>  $request->title,
            'sr'   =>'u_'.$reddit->name,
            'kind' =>'self'
        ]);

        return $res;
    }


    public function PostMedia(Request $request)
    {
        $request->validate([ 
            'title' => 'required|min:4',
            'img_url' =>  'required|url' ]);


        // Getting Current User OAuth Tokens 

        $reddit = Auth::user()->Reditt;

        // Returning NO REddit Token Found Please Login TO Rediit Api 

        if (!(isset($reddit))) {
            return response("No Reddit Account Linked Please Link First", 404);
        }

        // WE ARe Saving User Bearer Token IN Variable Because We May need TO REfresh It
        $bearer_token=$reddit->access_token;

        $New_token=$this->refreshtoken($reddit->updated_at);

        if (!($New_token==false)){$bearer_token=$New_token;}



        $url = 'https://oauth.reddit.com/api/submit';


        $res = Http::withToken($bearer_token)->asForm()->post($url,
        [
            'title'=> $request->title,
            'url' =>  $request->img_url,
            'sr'   =>'u_'.$reddit->name,
            'kind' =>'link'
        ]);
        
        return $res;


    }


    public function refreshtoken(Carbon $date)
    {

        if ($date->diffInSeconds(Carbon::now()) > 7000) {

            // making call to refresh token and returning TOken

        $AccessToken=Http::withBasicAuth(config('services.reddit.client_id'),config('services.reddit.client_secret'))
        ->asForm()
        ->post('https://www.reddit.com/api/v1/access_token',
        [
         'grant_type'=>'refresh_token',
         'refresh_token'=>Auth::user()->Reditt->refresh_token,
         
        ] );
        Reditt::where('user_id',Auth::user()->id)->update(['access_token'=>$AccessToken['access_token']]);

         return $AccessToken['access_token'] ;
        }
        return false;
    }
}
