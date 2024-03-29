<?php

namespace App\Http\Controllers\SocialMedia;
use App\Http\Controllers\Controller;
use App\Models\Facebook\Facebook;
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
       
        return view('dashboard.socialmedia.facebook');
    }
    public function redirectToFacebook(){
        
        $facebookauthorizeurl="https://www.facebook.com/v14.0/dialog/oauth?client_id="
        .config('services.facebook.client_id')."&redirect_uri=".config('services.facebook.redirectfacebook').
        "&scope=public_profile,pages_show_list,email,pages_manage_posts";
        return redirect($facebookauthorizeurl);
    }
    public function handleFacebookCallback(Request $request){

           
        // Making URL For Exchanging Code For Facebook Access Token
        $AccessTokenUrl="https://graph.facebook.com/v14.0/oauth/access_token?client_id=".config('services.facebook.client_id')."&client_secret=".config('services.facebook.client_secret')."&redirect_uri=".config('services.facebook.redirectfacebook')."&code=".$request->code."";
       
        
        // Getting Access Token From Facebook
        $AccessToken=Http::get($AccessTokenUrl);


        // IF NOT ACCESS TOKEN NOT FOUND THEN RETURN USER WITH MESSAGE
        if (isset($AccessToken['error'])){return redirect()->route('facebook')->with('success','Account Successfully Connected');}
        
        // MAKING CALL FOR GETTING USERNAME
        $user=Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/me');
        $avatar=Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/'.$user['id'].'/picture?redirect=false&type=square');
        
        Facebook::create([
            'user_id'=>Auth::user()->id,
            'name'=>$user['name'],
            'access_token'=>$AccessToken['access_token'],
            'avatar'=>isset($avatar['data']['url']) ? $avatar['data']['url'] : null
        ])->save();

        
        // Getting Pages Name And Page Respective  Access Token
        $pages=Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/me/accounts?fields=name,access_token');


        //  Saving The Pages To Database
        $NoOfPages= $pages['data'];
        $i=1;
        foreach($NoOfPages as $page){
            $getimgurl=Http::withToken($page['access_token'])
            ->get("https://graph.facebook.com/".$page['id']."/picture?redirect=0");
            $DbPageTokken = Pages::create([
            'user_id' =>  Auth::user()->id,
            'name' => $page['name'],
            'page_id'=>$page['id'],
            'page_access_token'=>$page['access_token'],
            'status'=>$i,
            'img_url' => isset($getimgurl['data']['url']) ? $getimgurl['data']['url'] : null           
                   
        ]);
            $DbPageTokken->save();
            $i=0;
        }
      

  
        return redirect()->route('facebook')->with('success','Account Successfully Connected');
    }

    public function deauthorize(){

        // Deleting User Facebook account  
        Auth::user()->Facebook->delete();
        // Deleting All Pages for user 
        Pages::where('user_id',Auth::user()->id)->delete();

        return redirect()->route('facebook')->with('success','Successfully Removed');
    }

    public function deactivate($id){
        // changing page Status
        Pages::where('page_id',$id)->update(['status'=>0]);
        
        return redirect()->route('facebook');
    }
    public function activate($id){
        // changing page Status
        Pages::where('page_id',$id)->update(['status'=>1]);

        return redirect()->route('facebook');
    }

    public function unlinkpage($id){


        // Deleting Page for user 
        Pages::where('page_id',$id)->delete();

        return redirect()->route('facebook');
    }


}
