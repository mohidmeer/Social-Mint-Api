<?php

namespace App\Http\Controllers\Api;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TwitterController extends Controller
{

    public function PostMediaTweet(Request $request)
    {    

        $request->validate([ 
            'message' => 'required|min:3',
            'img_url' =>  'required|url' ]);

         $SocialTokens=Auth::user()->Twitter;
         if (!(isset($SocialTokens->name))){ return response('No Twitter Account Linked');}
         $status=$request->message;
         $img_url=$request->img_url;
         

         $connection = new TwitterOAuth(config('services.twitter.consumer_key'),
         config('services.twitter.consumer_secret'),
         $SocialTokens->access_token, 
         $SocialTokens->secret_token);

         try{

            $media = $connection->upload('media/upload', ['media' => $this->GetImagePath($img_url)]);

          } catch(Exception $e) {return $e->getMessage();}

          if (!(isset($media->media_id))){ return $media ;}

          try{

             $tweet=  $connection->post('statuses/update', ['status' => $request->message,'media_ids'=>$media->media_id]);
            }catch (Exception $e) {return $e ->getMessage();}


         return $tweet;

    }



   

    public function PostTweet(Request $request)
    {    
        $request->validate([ 'message' => 'required|min:3']);
         $SocialTokens=Auth::user()->Twitter;
         $status=$request->message;
         $connection = new TwitterOAuth(config('services.twitter.consumer_key'),
         config('services.twitter.consumer_secret'),
         $SocialTokens->access_token, 
         $SocialTokens->secret_token);
         $res = $connection->post("statuses/update", ["status" => $status]);
         if (!isset($res->created_at)){ return $res; }
         return $res->created_at;

    }



    public function GetImagePath($url)
    {
        $pic = Http::get($url);
        $filename = Str::random(15);
        $file = Storage::put('public/' . $filename, $pic);
        $fname = storage_path('public/' . $filename);
        return $path = Storage::path('public/' . $filename); 
    }





    
}
