<?php

namespace App\Http\Controllers\Api\SocialMintFrontend;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Http\Controllers\Controller;
use App\Models\Discord\Channels;
use App\Models\Discord\Discord;
use App\Models\Facebook\Facebook;
use App\Models\Facebook\Pages;
use App\Models\Instagram\Instagram;
use App\Models\Instagram\InstagramAccounts;
use App\Models\Pintrest\Board;
use App\Models\Pintrest\Pintrest;
use App\Models\SocialMediaAccessTokens;
use App\Models\Twitter\Twitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

class SocialCallBackController extends Controller
{


    public function facebookcallback(Request $request)
    {

        $userid = Crypt::decryptString($request->state);

        // Making URL For Exchanging Code For Facebook Access Token
        $AccessTokenUrl = "https://graph.facebook.com/v14.0/oauth/access_token?client_id=" . env('facebook_client_id') . "&client_secret=" . env('facebook_client_secret') . "&redirect_uri=http://localhost:8000/api/socialmintshare/facebook/callback&code=" . $request->code . "";


        // Getting Access Token From Facebook
        $AccessToken = Http::get($AccessTokenUrl);




        // IF NOT ACCESS TOKEN NOT FOUND THEN RETURN USER WITH MESSAGE
        if (isset($AccessToken['error'])) {
            return response('No Access Token Granted', 404);
        }



        // MAKING CALL FOR GETTING USERNAME
        $user=Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/me');
        $avatar=Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/'.$user['id'].'/picture?redirect=false&type=square');
        
        Facebook::create([
            'user_id'=>$userid,
            'name'=>$user['name'],
            'access_token'=>$AccessToken['access_token'],
            'avatar'=>isset($avatar['data']['url']) ? $avatar['data']['url'] : null
        ])->save();


        // Getting Pages Name And Page Respective  Access Token
        $pages = Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/me/accounts?fields=name,access_token');


        //  Saving The Pages To Database
        $NoOfPages = $pages['data'];
        $i=1;
        foreach ($NoOfPages as $page) {
            $getimgurl = Http::withToken($page['access_token'])
                ->get("https://graph.facebook.com/" . $page['id'] . "/picture?redirect=0");
            $DbPageTokken = Pages::create([
                'user_id' =>  $userid,
                'name' => $page['name'],
                'page_id' => $page['id'],
                'page_access_token' => $page['access_token'],
                'img_url' => $getimgurl['data']['url'],
                'status'=>$i
            ]);
            $DbPageTokken->save();
            $i=0;
        }

        return redirect(config('services.socialmint.redirect'), 201);
    }

   
    public function instacallback(Request $request)
    {
        $userid = Crypt::decryptString($request->state);
        // Making URL For Exchanging Code For Facebook Access Token
        $AccessTokenUrl = "https://graph.facebook.com/v14.0/oauth/access_token?client_id=" . env('facebook_client_id') . "&client_secret=" . env('facebook_client_secret') . "&redirect_uri=http://localhost:8000/api/socialmintshare/instagram/callback&code=" . $request->code . "";

        // Getting Access Token From Facebook
        $AccessToken = Http::get($AccessTokenUrl);

        // IF NOT ACCESS TOKEN NOT FOUND THEN RETURN USER WITH MESSAGE
        if (isset($AccessToken['error'])) {
            return response("Not Authorized Try Again Latter", 404);
        }


        $user=Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/me');
        $avatar=Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/'.$user['id'].'/picture?redirect=false&type=square');


        Instagram::create([
            'user_id'=>$userid,
            'name'=>$user['name'],
            'access_token'=>$AccessToken['access_token'],
            'avatar'=>isset($avatar['data']['url']) ? $avatar['data']['url'] : null
        ])->save();

       

        // Getting Instagram FacebookLinked Business Account
        $InstaAccounts = Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/me/accounts?fields=instagram_business_account,access_token');
        $NoOfAccounts = $InstaAccounts['data'];

        //  Saving All Accounts to database
        $i=1;
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
                'profile_picture_url' => isset($Accountname['profile_picture_url']) ? $Accountname['profile_picture_url'] : null,
                'insta_business_id' => $account['instagram_business_account']['id'],
                'page_access_token' => $account['access_token'],
                'page_id' => $account['id'],
                'status'=>$i
            ])->save();
            $i=0;
        }


        return redirect(config('services.socialmint.redirect'), 201);
    }


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
 
 
         Twitter::create([
            'user_id'=>Auth::user()->id,
            'access_token'=>$params['oauth_token'],
            'secret_token'=>$params['oauth_token_secret'],
            'name'=>$params['screen_name'],
            'avatar'=>$imgurl->profile_image_url_https
        ]);

         return redirect(config('services.socialmint.redirect'), 201);
     }



     public function redditcallback(Request $request)
     {
        // THIS WILL BE HANDLED BY WEB REDDIT CONTROLLER WE HAVE A COMPLICATION AS REDDIT DOESNET ALLOW FOR MULTIPLE REDIRECT URIS
        // IF WE USE SEPARATE APP FOR AUTH HERE THEN WE WONT BE ABLE TO MAKE API REQUEST TO POST BECAUSE WE NEED TO MANAGE TWO
        // SEPARATE API KEYS FOR EACH REQUEST WE NEED TO MAKE SURE WHICH APP KEYS TO USE FOR MAKING POST CALLS ON REDDIT
     }

   
     public function discordcallback(Request $request)
     { 

        $user_id=Crypt::decryptString($request->state);

        // Exchange Code For Access Tokens 
    
        $AccessTokens=Http::asForm()->post('https://discord.com/api/oauth2/token',
        [
            'client_id'     =>config('services.discord.clientId'),
            'client_secret' =>config('services.discord.clientSecret'),
            'grant_type'    =>'authorization_code',
            'code'          =>$request->code,
            'redirect_uri'  =>config('services.discord.ClientRedirectUri')
        ]);
    
    
    
        // Getting User
        $User=Http::withToken($AccessTokens['access_token'])->get('https://discord.com/api/users/@me');
    
        Discord::create([
            'user_id'=>$user_id,
            'name'=>$User['username'],
            'avatar'=>$User['avatar'],
            'guild'=>$request->guild_id,
            'access_token'=>$AccessTokens['access_token'],
            'refresh_token'=>$AccessTokens['refresh_token'],
    
        ]);
    
        // Getting All Channels 
    
        $Channels=Http::withHeaders(
          ['Authorization'=>'Bot '.config('services.discord.bottoken')]
         )->
        get('https://discord.com/api/guilds/'.$request->guild_id.'/channels')->collect();
    
        // Saving Channels 
    
        // Flag for setting Only First Account As Enabled 
        $i=1;
    
        foreach($Channels as $Channel){
          Channels::create([
            'user_id'=>$user_id,
            'channel_id'=>$Channel['id'],
            'name'=>$Channel['name'],
             'status'=>$i]
          );
          $i=0;
        }
    
        return redirect(config('services.socialmint.redirect'), 201);
     }


    //  Pintrest callback
    public function pintrestcallback(Request $request)
     {
        $userid = Crypt::decryptString($request->state);

        $AccessTokenUrl = 'https://api.pinterest.com/v5/oauth/token';

        $AccessTokens = Http::asForm()->withBasicAuth(config('services.pintrest.clientId'), config('services.pintrest.clientSecret'))
            ->post($AccessTokenUrl, [
                'grant_type' => 'authorization_code',
                'code' => $request->code,
                'redirect_uri' => config('services.pintrest.RedirectUrl'),
            ]);

        $UserAccount = Http::withToken($AccessTokens['access_token'])->get('https://api.pinterest.com/v5/user_account');
        $UserBoards = Http::withToken($AccessTokens['access_token'])->get('https://api.pinterest.com/v5/boards');
         

        // return $UserBoards['items'][0]['name'];

        Pintrest::create([

            'user_id' => $userid,
            'name' => $UserAccount['username'],
            'avatar' => isset($UserAccount['profile_image']) ?  $UserAccount['profile_image'] : null,
            'access_token' => $AccessTokens['access_token'],
            'refresh_token' => $AccessTokens['refresh_token']

        ]);
        $i=1;
        foreach($UserBoards['items'] as $Board )
        {
            Board::create([
                'user_id'=>$userid,
                'name'=>$Board['name'],
                'board_id'=>$Board['id'],
                'status'=>$i
            ]);
            $i=0;
        }

        return redirect(config('services.socialmint.redirect'), 201);
     }
 
}