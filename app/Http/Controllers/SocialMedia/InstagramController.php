<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use App\Models\Instagram\InstagramAccounts;
use App\Models\SocialMediaAccessTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InstagramController extends Controller
{
    public function index()
    {
        if (empty(Auth::user()->Socialtoken['insta_access_token'])){return view('dashboard.socialmedia.instagram');}
         $InstaAccounts=Auth::user()->instaAccounts;
        $fbusername=Http::withToken(Auth::user()->Socialtoken['insta_access_token'])->get('https://graph.facebook.com/me');


        return view('dashboard.socialmedia.instagram',['InstaAccounts'=>$InstaAccounts,'fbusername'=>$fbusername]);
        
    }


    public function redirectToInstagram()
    {
        $facebookauthorizeurl = "https://www.facebook.com/v14.0/dialog/oauth?client_id=".config('services.facebook.client_id')."&redirect_uri=" . config('services.facebook.redirectinstagram')
        ."&scope=instagram_basic,instagram_content_publish,pages_read_engagement,pages_show_list";
        return redirect($facebookauthorizeurl);
        
    }


    public function handleInstagramCallback(Request $request)
    {
        
         // Making URL For Exchanging Code For Facebook Access Token
         $AccessTokenUrl="https://graph.facebook.com/v14.0/oauth/access_token?client_id=".config('services.facebook.client_id')."&client_secret=".config('services.facebook.client_secret')."&redirect_uri=".config('services.facebook.redirectinstagram')."&code=".$request->code."";
        
        // Getting Access Token From Facebook
        $AccessToken=Http::get($AccessTokenUrl);

        // IF NOT ACCESS TOKEN NOT FOUND THEN RETURN USER WITH MESSAGE
        if (isset($AccessToken['error'])){return redirect()->route('instagram')->with('error','Not Authorized Try Again Latter');}







        

         // Getting Instagram FacebookLinked Business Account
         $InstaAccounts=Http::withToken($AccessToken['access_token'])->get('https://graph.facebook.com/me/accounts?fields=instagram_business_account,access_token'); 
         $NoOfAccounts= $InstaAccounts['data'];
        
         //  Saving All Accounts to database
         $i=1;
        foreach($NoOfAccounts as $account ){

             // Making Sure That User Have Insta Bussinees Field in Json Data If Not We Will Not Save The Account For Use
            if (empty($account['instagram_business_account'])){continue;}

                // Getting THe Account Name And Profile Pic URL
                $Accountname = Http::withToken($AccessToken['access_token'])
                ->get('https://graph.facebook.com/'.$account['instagram_business_account']['id'].'/?fields=username,profile_picture_url');
                
                InstagramAccounts::create([
                    'user_id' =>  Auth::user()->id, 
                    'name'=> $Accountname['username'],
                    'profile_picture_url'=> isset($Accountname['profile_picture_url']) ? $Accountname['profile_picture_url'] : null   ,
                    'insta_business_id'=> $account['instagram_business_account']['id'],
                    'page_access_token'=>$account['access_token'],
                    'status'=>$i,
                    'page_id' => $account['id']])->save();
                    $i=0;
            }
       
            return redirect()->route('instagram');
    }
    
    public function deauthorize()
    {
        // Setting Insta Access Tokens To Null 
        SocialMediaAccessTokens::where('user_id',Auth::user()->id)->update(['insta_access_token'=>null]);

        InstagramAccounts::where('user_id',Auth::user()->id)->delete();





        return view('dashboard.socialmedia.instagram');
    }
    public function deactivate($id)
    {
    // changing page Status
    InstagramAccounts::where('id',$id)->update(['status'=>0]);

    return redirect()->route('instagram');
    }
    public function activate($id)
    {
        InstagramAccounts::where('id',$id)->update(['status'=>1]);
        return redirect()->route('instagram');
    }
    public function unlinkaccount($id){

        // Deleting Page for user 
        InstagramAccounts::where('id',$id)->delete();

        return redirect()->route('instagram');
    }
}
