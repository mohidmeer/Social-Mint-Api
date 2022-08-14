<?php

namespace App\Http\Controllers\SocialMedia;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use App\Models\SocialMediaAccessTokens;
use App\Models\Facebook\Pages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FacebookController extends Controller
{
    public function index()
    {     
        $Acc=Auth::user()->fbtoken;
        if (isset($Acc['fb_access_token'])){
            $user=Http::withToken($Acc['fb_access_token'])->get('https://graph.facebook.com/me');
            $pages= Auth::user()->fbpages;
             foreach($pages as $page){
                $getimgurl=Http::withToken($page['page_access_token'])
                ->get("https://graph.facebook.com/".$page['page_id']."/picture?redirect=0");
                // ddd($getimgurl['data']['url']);
                 $page['img_url']=$getimgurl['data']['url'];  
            }
        }else{
            $user=null;
            $pages=null;
        }
        return view('dashboard.socialmedia.facebook',
        ['access_token'=>$Acc,'fbusername'=>$user,'pages'=>$pages]);
    }

    public function redirectToFacebook(){
        $facebookauthorizeurl="https://www.facebook.com/v14.0/dialog/oauth?client_id="
        .env('facebook_client_id')."&redirect_uri=".env('facebook_redirect').
        "&scope=public_profile,pages_show_list,email,pages_manage_posts";
        return redirect($facebookauthorizeurl);
    }
    public function handleFacebookCallback(Request $request){
        $AccessTokenUrl="https://graph.facebook.com/v14.0/oauth/access_token?client_id=".env('facebook_client_id')."&client_secret=".env('facebook_client_secret')."&redirect_uri=".env('facebook_redirect')."&code=".$request->code."";
        $AccessToken=Http::get($AccessTokenUrl);
        $pages=Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/me/accounts?fields=name,access_token');
        $DbAccessToken = SocialMediaAccessTokens::where('user_id',Auth::user()->id)->first();
        $NoOfPages= $pages['data'];
        foreach($NoOfPages as $page){
            $DbPageTokken = Pages::create([
            'user_id' =>  Auth::user()->id,
            'name' => $page['name'],
            'page_id'=>$page['id'],
            'page_access_token'=>$page['access_token']
            ]);
            $DbPageTokken->save();
        }
        if ($DbAccessToken===null ){
            $DbAccessToken = SocialMediaAccessTokens::create([
                'user_id' =>  Auth::user()->id,
                'fb_access_token'=> $AccessToken['access_token']
            ]);

            $DbAccessToken->save();
        }else{
             SocialMediaAccessTokens::where('user_id',Auth::user()->id)->
             update(['fb_access_token'=>$AccessToken['access_token'] ]);
        }
  
        return redirect()->route('facebook');
    }

    public function deauthorize(){
        SocialMediaAccessTokens::where('user_id',Auth::user()->id)->
        update(['fb_access_token'=>null]);
        Pages::where('user_id',Auth::user()->id)->delete();

        return redirect()->route('facebook');
    }


    public function deactivate($id){

        Pages::where('page_id',$id)->update(['status'=>0]);
        
        return redirect()->route('facebook');
    }
    public function activate($id){

        Pages::where('page_id',$id)->update(['status'=>1]);

        return redirect()->route('facebook');
    }




}
