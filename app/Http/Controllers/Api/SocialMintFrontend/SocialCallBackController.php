<?php

namespace App\Http\Controllers\Api\SocialMintFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

class SocialCallBacks extends Controller
{


    // facebook callback
    public function facebookcallback(Request $request)
    {

        $userid = User::where('email', $request->state)->get('id')[0]->id;

        // Making URL For Exchanging Code For Facebook Access Token
        $AccessTokenUrl = "https://graph.facebook.com/v14.0/oauth/access_token?client_id=" . env('facebook_client_id') . "&client_secret=" . env('facebook_client_secret') . "&redirect_uri=http://localhost:8000/api/socialmintshare/facebook/callback&code=" . $request->code . "";


        // Getting Access Token From Facebook
        $AccessToken = Http::get($AccessTokenUrl);




        // IF NOT ACCESS TOKEN NOT FOUND THEN RETURN USER WITH MESSAGE
        if (isset($AccessToken['error'])) {
            return response('No Access Token Granted', 404);
        }



        // Checking That does current user exists in  Table Columns if not we will create new entry
        $SocialMediaAccessToken = SocialMediaAccessTokens::where('user_id', $userid)->first();


        // Saving User Facebook Access Token In Database or updating its record
        if (isset($SocialMediaAccessToken)) {
            SocialMediaAccessTokens::where('user_id', $userid)->update(['fb_access_token' => $AccessToken['access_token']]);
        } else {
            SocialMediaAccessTokens::create(['user_id' =>  $userid, 'fb_access_token' => $AccessToken['access_token']])->save();
        }


        // Getting Pages Name And Page Respective  Access Token
        $pages = Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/me/accounts?fields=name,access_token');


        //  Saving The Pages To Database
        $NoOfPages = $pages['data'];
        foreach ($NoOfPages as $page) {
            $getimgurl = Http::withToken($page['access_token'])
                ->get("https://graph.facebook.com/" . $page['id'] . "/picture?redirect=0");
            $DbPageTokken = Pages::create([
                'user_id' =>  $userid,
                'name' => $page['name'],
                'page_id' => $page['id'],
                'page_access_token' => $page['access_token'],
                'img_url' => $getimgurl['data']['url']
            ]);
            $DbPageTokken->save();
        }

        return redirect(config('services.socialmint.redirect'), 201);
    }

    // instagram callback
    public function instacallback(Request $request)
    {
        $userid = User::where('email', $request->state)->get('id')[0]->id;
        // Making URL For Exchanging Code For Facebook Access Token
        $AccessTokenUrl = "https://graph.facebook.com/v14.0/oauth/access_token?client_id=" . env('facebook_client_id') . "&client_secret=" . env('facebook_client_secret') . "&redirect_uri=http://localhost:8000/api/socialmintshare/instagram/callback&code=" . $request->code . "";

        // Getting Access Token From Facebook
        $AccessToken = Http::get($AccessTokenUrl);

        // IF NOT ACCESS TOKEN NOT FOUND THEN RETURN USER WITH MESSAGE
        if (isset($AccessToken['error'])) {
            return response("Not Authorized Try Again Latter", 404);
        }

        // Updating the Access Token for Instagram
        SocialMediaAccessTokens::where('user_id', $userid)->update(['insta_access_token' => $AccessToken['access_token']]);

        // Getting Instagram FacebookLinked Business Account
        $InstaAccounts = Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/me/accounts?fields=instagram_business_account,access_token');
        $NoOfAccounts = $InstaAccounts['data'];

        //  Saving All Accounts to database
        foreach ($NoOfAccounts as $account) {

            // Making Sure That User Have Insta Bussinees Field in Json Data If Not We Will Not Save The Account For Use
            if (empty($account['instagram_business_account'])) {
                continue;
            }

            // Getting THe Account Name And Profile Pic URL
            $Accountname = Http::withToken($AccessToken['access_token'])
                ->get('https://graph.facebook.com/' . $account['instagram_business_account']['id'] . '/?fields=username,profile_picture_url');

            InstagramAccounts::create([
                'user_id' =>  $userid,
                'name' => $Accountname['username'],
                'profile_picture_url' => $Accountname['profile_picture_url'],
                'insta_business_id' => $account['instagram_business_account']['id'],
                'page_access_token' => $account['access_token'],
                'page_id' => $account['id']
            ])->save();
        }


        return redirect(config('services.socialmint.redirect'), 201);
    }

     // twitter callback
     public function twittercallback(Request $request)
     {
         // finding user by id
         $userid = Crypt::decryptString($request->state);
 
         $AccessTokens = Http::post("https://api.twitter.com/oauth/access_token?oauth_token=" . $request->oauth_token . "&oauth_verifier=" . $request->oauth_verifier . "");
 
         // Condition for checing if we get the access token or not 
         // if (!(isset($AccessTokens->oauth_token))){ return response($AccessTokens,404) ;}
 
 
         $url = 'https://www.g.com/r?' . $AccessTokens;
         $url_components = parse_url($url);
         parse_str($url_components['query'], $params);
 
 
         $con = new TwitterOAuth(
             config('services.twitter.consumer_key'),
             config('services.twitter.consumer_secret'),
             $params['oauth_token'],
             $params['oauth_token_secret'],
         );
 
        
 
         $imgurl = $con->get("users/show",['screen_name'=>$params['screen_name']]);
 
           
         $imgurl->profile_image_url_https;
 
 
         SocialMediaAccessTokens::where('user_id', $userid)
             ->update([
                 'tw_access_token' => $params['oauth_token'],
                 'tw_secret_token' => $params['oauth_token_secret'],
                 'tw_name' => $params['screen_name'],
                 'tw_img_url'=>$imgurl->profile_image_url_https
 
             ]);
         return redirect(config('services.socialmint.redirect'), 201);
     }


    //  Reddit callback
     public function redditcallback(Request $request)
     {
        
     }

    //  Discord callback
     public function discordcallback(Request $request)
     {

     }


    //  Pintrest callback
    public function pintrestcallback(Request $request)
     {

     }
 
}