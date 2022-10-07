<?php

namespace App\Http\Controllers\Api;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Http\Controllers\Controller;
use App\Models\Facebook\Pages;
use App\Models\Instagram\InstagramAccounts;
use App\Models\SocialMediaAccessTokens;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use League\OAuth1\Client\Server\Twitter;

class SocialmintController extends Controller
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



    // insta callback
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


    // Twitter Url Genaration 
    public function twitterurlredirectgenarator()
    {
        $state = Crypt::encryptString(Auth::user()->id);
        $connection = new TwitterOAuth(
            config('services.twitter.consumer_key'),
            config('services.twitter.consumer_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_token_secret'),
        );
        $oauth_token = $connection->oauth("oauth/request_token?oauth_callback=".config('services.twitter.callback') ."?state=" . $state)['oauth_token'];

        return response('https://api.twitter.com/oauth/authorize?oauth_token=' . $oauth_token, 200);
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




    public function AccountsData()
    { 
        $facebook  = array("Status"   =>  false,   "Multiple_Pages" => false, "Name" => " No Account Linked",);
        $instagram  = array("Status"   => false,  "Multiple_Pages" => false,  "Name" => " No Account Linked",);
        $twitter   =  array("Status"  =>  false,   "Name" => " No Account Linked",);
        $reddit    =  array("Status"  =>  false,   "Name" => " No Account Linked",);
        $discord   =  array("Status"  =>  false,   "Multiple_Channels" => false,  "Name" => " No Account Linked",);
        $pintrest  =  array("Status"  =>  false,   "Multiple_Boards" => false,    "Name" => " No Account Linked",);


        // Get The Auth User Data Pages And Accounts
        $Facebook_Pages = Auth::user()->fbpages;
        $InstaAccounts  = Auth::user()->instaAccounts;
        $TwitterAccounts = Auth::user()->Socialtoken;
        $RedditAccount=Auth::user()->Reddit;
        $DiscordAccount=Auth::user()->Discord;
        $Channels=Auth::user()->DChannel;


        // if (isset($DiscordAccount) )
        // {
        //     $discord['Status']=true;
        //     if (count($Channels)>1){
        //         $discord['Multiple_Channels']=true;
        //         $discord["Name"] = "Multiple Channels";
        //         $result=array();$i=0;
        //     foreach($Channels as $channel)
        //     {
        //         $result[$i]=array("Name"=>$channel->name,"Id"=>$channel->id);
        //         $i++;
        //     }
        //     $discord["Multiple_Channel_Data"]=$result;
        //     }
        // } elseif (count($Channels) == 1) {
        //     $facebook["Name"] = $Facebook_Pages[0]->name;
        //     $facebook["ImgUrl"]=$DiscordAccount->avatar;
        // }





        if (count($Facebook_Pages) > 1) {
            $facebook["Status"] = true;
            $facebook["Multiple_Accounts"] = true;
            $facebook["Name"] = "Multiple Accounts";
            $result=array();$i=0;
            foreach($Facebook_Pages as $account)
            {
                $result[$i]=array("Name"=>$account->name,"Id"=>$account->id);
                $i++;
            }
            $facebook["Multiple_Accounts_Data"]=$result;
        } elseif (count($Facebook_Pages) == 1) {
            $facebook["Status"] = true;
            $facebook["Name"] = $Facebook_Pages[0]->name;
            $facebook["ImgUrl"]=$Facebook_Pages[0]->img_url;
        }

        if (count($InstaAccounts) > 1) {
            $instagram["Status"] = true;
            $instagram["Multiple_Accounts"] = true;
            $instagram["Name"] = "Multiple Accounts";
            $result=array();$i=0;
            foreach($InstaAccounts as $account)
            {
                $result[$i]=array("Name"=>$account->name,"Id"=>$account->id);
                $i++;
            }
            $instagram["Multiple_Accounts_Data"]=$result;
        } elseif (count($InstaAccounts) == 1) {
            $instagram["Status"] = true;
            $instagram["Name"] = $InstaAccounts[0]->name;
            $instagram["ImgUrl"]=$InstaAccounts[0]->profile_picture_url;
        }

        if (isset($TwitterAccounts->tw_name)) {
            $twitter["Status"] = true;
            $twitter["Name"]   =$TwitterAccounts->tw_name;
            $twitter["ImgUrl"] =$TwitterAccounts->tw_img_url;
        }

        if (isset($RedditAccount->name)){
            $reddit["Status"]=true;
            $reddit["Name"]=$RedditAccount->name;
            $reddit["ImgUrl"]=$RedditAccount->avatar_url;
        }

        
        

        $Accounts = array(
            "FACEBOOK" => $facebook,
            "INSTAGRAM" => $instagram,
            "TWITTER" => $twitter,
            "REDDIT"=>$reddit,
            "DISCORD"=>$discord,
            "PINTREST"=>$pintrest
           );
        return response($Accounts, 200);
    }





  


    public function signup(Request $request)
    {
        $username = $request->user['result']['name'];
        $email    = $request->user['result']['email'];
        $password = "ANYTHINGRANDOM";

        //  WE will return the user if already exsists
        $finduser = User::where('email', $email)->first();
        if ($finduser) {
            return response(['message' => $email . " Already Exists"], 409);
        }

        // Creating New User Account 
        $user = User::create([
            'name' => $username,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        $user->api_access_token = $token;
        $user->save();
        SocialMediaAccessTokens::create([
            'user_id' => $user['id'],
        ])->save();
        return response(["Bearer_Token" => $token], 201);
    }

    public function SelectInstagramPages(Request $request)
    {
        // We Will delete all pages except the selected Id Page 

        // return $request->page_id;

       InstagramAccounts::where('id','!=' ,$request->page_id )->delete();
        return response('Successfully Connected',200 );
        
    }
    public function SelectFacebookPages(Request $request)
    {
        // We Will delete all pages except the selected Id Page 

        // return $request->all;

        // Deleting Page for user 
         Pages::where('id','!=',$request->page_id)->delete();

        return response('Successfully Connected ',200 );


    }

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


}
