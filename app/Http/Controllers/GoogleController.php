<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class GoogleController extends Controller
{
     public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
  
        try {
      
            $user = Socialite::driver('google')->stateless()->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('home');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
      
                Auth::login($newUser);
                $token = $newUser->createToken('auth_token')->plainTextToken;
                $newUser->api_access_token = $token;
                $newUser->save();

      
                return redirect()->intended('home');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
    
    }
  

