<?php

namespace App\Http\Controllers\SocialMedia;
use App\Http\Controllers\Controller;
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

    $RedirectUrl=config('services.discord.ReditrectUrlWeb').Crypt::encryptString(Auth::user()->id); 

     return redirect($RedirectUrl);

   }


   public function HandleCallback(Request $request)
   {

    $user_id=Crypt::decryptString($request->state);


    // Exchange Code For Access Tokens 

    $AccessTokens=Http::asForm()->post('https://discord.com/api/oauth2/token',
    [
        'client_id'     =>config('services.discord.clientId'),
        'client_secret' =>config('services.discord.clientSecret'),
        'grant_type'    =>'authorization_code',
        'redirect_uri'  =>config('services.discord.WebRedirectUri')
    ]);

    // Getting User
    $User=Http::withToken($AccessTokens['access_token'])->get('https://discord.com/api/users/@me');

    Discord::create([
        'user_id'=>$user_id,
        'name'=>$User['username'],
        'avatar'=>$User['avatar'],
        'access_token'=>$AccessTokens['access_token'],
        'refresh_token'=>$AccessTokens['refresh_token'],

    ]);


    // Getting Guilds 





    // Saving All Guilds 


    


    return redirect()->route('discord')->with('success','Account Successfully Connected');

   }

  
   




}
