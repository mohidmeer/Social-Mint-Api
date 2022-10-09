<?php

namespace App\Http\Controllers\Api\SocialMintFrontend;

use App\Http\Controllers\Controller;
use App\Models\Facebook\Pages;
use App\Models\Instagram\InstagramAccounts;
use App\Models\SocialMediaAccessTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeauthorizationController extends Controller
{
     // Unlinking Accounts
     public function UnlinkFacebook()
     {
 
          // Setting Facebook Access Tokens To Null 
          SocialMediaAccessTokens::where('user_id',Auth::user()->id)->update(['fb_access_token'=>null]);
 
          // Deleting All Pages for user 
          Pages::where('user_id',Auth::user()->id)->delete();
  
          return response('Facebook Unlinked Successfully',200);
 
     }
     public function UnlinkInstagram()
     {
 
         // Setting Insta Access Tokens To Null 
         SocialMediaAccessTokens::where('user_id',Auth::user()->id)->update(['insta_access_token'=>null]);
 
         InstagramAccounts::where('user_id',Auth::user()->id)->delete();
 
         return response('Instagram Unlinked Successfully',200);
 
     }
     public function UnlinkTwitter()
     {
         SocialMediaAccessTokens::where('user_id', Auth::user()->id)
             ->update([
                 'tw_access_token' => null,
                 'tw_secret_token' => null,
                 'tw_name' => null,
 
             ]);
         return response('Twitter Unlinked Successfully',200);
     }
     public function UnlinkReddit()
     {
         Auth::user()->Reddit->delete();
         return response('Reddit Unlinked Successfully',200);
     }
     public function UnlinkTelegram()
     {
        Auth::user()->Telegram->delete();
         return response('Telegram Unlinked Successfully',200);
     }
     public function UnlinkPintrest()
     {
         Auth::user()->Pintrest->delete();
         Auth::user()->BPintrest->delete();
         return response('Pinterest Unlinked Successfully',200);
     }
     public function UnlinkDiscord()
     {
         Auth::user()->Discord->delete();
         Auth::user()->DChannels->delete();
         return response('Discord Unlinked Successfully',200);
     }
 
}
