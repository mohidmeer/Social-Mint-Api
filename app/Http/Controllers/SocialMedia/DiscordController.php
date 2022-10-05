<?php

namespace App\Http\Controllers\SocialMedia;
use App\Http\Controllers\Controller;
use App\Models\Discord\Channels;
use App\Models\Discord\Discord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

class DiscordController extends Controller
{
   

   public function index()
   {
     return view('dashboard.socialmedia.discord');

   }

   public function RedirectToDiscord()
   {

     $RedirectUrl=config('services.discord.RedirectUrlWeb').Crypt::encryptString(Auth::user()->id); 
     return redirect($RedirectUrl);

   }


   public function handleDiscordCallback(Request $request)
   {

    $user_id=Crypt::decryptString($request->state);


    // Exchange Code For Access Tokens 

    $AccessTokens=Http::asForm()->post('https://discord.com/api/oauth2/token',
    [
        'client_id'     =>config('services.discord.clientId'),
        'client_secret' =>config('services.discord.clientSecret'),
        'grant_type'    =>'authorization_code',
        'code'          =>$request->code,
        'redirect_uri'  =>config('services.discord.WebRedirectUri')
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
        'user_id'=>Auth::user()->id,
        'channel_id'=>$Channel['id'],
        'name'=>$Channel['name'],
         'status'=>$i]
      );
      $i=0;
    }


    return redirect()->route('discord')->with('success','Account Successfully Connected');

   }


   public function deauthorize()
   {

     Discord::where('user_id',Auth::user()->id)->delete();
     Channels::where('user_id',Auth::user()->id)->delete();

     return redirect()->route('discord')->with('success','Unlinked Account Successfully');

   }


   public function activate($id)
   {
    // changing page Status
    Channels::where('channel_id',$id)->update(['status'=>1]);

    return redirect()->route('discord')->with('success','Activated Successfully');

   }
   public function unlink($id)
   {
    // changing page Status
    Channels::where('channel_id',$id)->delete();

    return redirect()->route('discord')->with('success','Deleted Successfully');

   }


  public function deactivate($id){

    Channels::where('channel_id',$id)->update(['status'=>0]);

    return redirect()->route('discord')->with('success','Activated Deactivated');
  }

  
   




}
