<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pintrest\Board;
use App\Models\Pintrest\Pintrest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PintrestController extends Controller
{

    public function Pin(Request $request)
    {
        // validate the request 

        $request->validate([ 
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'img_url' =>  'required|url' ]);

            $Pintrest=Auth::user()->Pintrest;
            if (!(isset($Pintrest))) {
                return response("No Pintrest Account Linked ", 404);
            }
        
        $Boards=Board::where('user_id',Auth::user()->id)->where('status',1)->get();
        if ($Boards->count()==0){return response('No Boards Found For Pinning',404);}


        $bearer_token=$Pintrest->access_token;

        $New_token=$this->refreshtoken($Pintrest->updated_at);

        if (!($New_token==false)){$bearer_token=$New_token;}

        $Result=array();
    
        foreach($Boards as $Board )
        {
            
           $req = Http::acceptJson()
            ->withToken($bearer_token)
            ->post('https://api.pinterest.com/v5/pins',
            [
                'board_id'=>$Board->board_id,
                'title' => $request->title,
                'description' => $request->description,
                'media_source'=> [
                    "source_type"=> "image_url",
                    "url"=> $request->img_url
                ]
             ]);
             $Result = Arr::add($Result, $Board->name, $req->json());

        }

        return response($Result,200);


    }
    

    public function refreshtoken(Carbon $date)
    {

        if ($date->diffInSeconds(Carbon::now()) > 2592000) {

            // making call to refresh token and returning TOken

        $AccessToken=Http::withBasicAuth(config('services.pintrest.clientId'),config('services.pintrest.clientSecret'))
        ->asForm()
        ->post('https://api.pinterest.com/v5/oauth/token',
        [
         'grant_type'=>'refresh_token',
         'refresh_token'=>Auth::user()->Pintrest->refresh_token,
         'scope'=>'boards:read,pins:read,pins:write,boards:write,user_accounts:read'
         
        ] );
        Pintrest::where('user_id',Auth::user()->id)->update(['access_token'=>$AccessToken['access_token']]);

         return $AccessToken['access_token'] ;
        }
        return false;
    }


}
