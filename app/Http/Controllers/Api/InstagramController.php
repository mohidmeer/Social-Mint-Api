<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostInstagramRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
class InstagramController extends Controller
{
    public function postPic(PostInstagramRequest $request ){

        $Result=array();
        $useraccount=Auth::user()->instaAccounts;
        // Checking That Any Account For Current User Exists or Not 
        if ( !(isset($useraccount[0])) ){return response()->json(["message"=>"You Don't Have Any Linked Instagram Accounts"],404);}

        // Checking That Is There Any Allowed Account For Posting By User By Summing the Accounts Status(booleans) 
        $disabledflag=[];foreach($useraccount as $account){$disabledflage =array_push($disabledflag,$account['status']);} 

        // if all account status sum to zero means no account is enabled by user from frontend 
        if(array_sum($disabledflag)==0){ return response()->json(["message"=>"You Did'nt Allow Any Account For Posting,Visit Social Mint Share"],404);}  

        // Looping through Each Account For Posting to instagram
        foreach($useraccount as $account){ 
            // Checking that if user disabled the account for posting
            if ($account['status']==0){ continue;}
            $postimgurlcontainer="https://graph.facebook.com/".$account['insta_business_id']."/media?image_url=".$request->img_url."&caption=".$request->caption."";
            $container= Http::withToken($account['page_access_token'])->post($postimgurlcontainer);
            
            // Checking For any Errors by server
            if (isset($container['error'])){$Result=Arr::add($Result,$account->name,$container->json());}
            else{$containerpublishurl="https://graph.facebook.com/".$account['insta_business_id']."/media_publish?creation_id=".$container['id']."";
                $postimg =Http::withToken($account['page_access_token'])->post($containerpublishurl);
                $Result=Arr::add($Result,$account->name,$postimg->json());
            }
        }
         return $Result;
        }
    
    
    
    }