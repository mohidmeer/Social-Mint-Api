<?php

namespace App\Http\Controllers\Api\SocialMintFrontend;

use App\Http\Controllers\Controller;
use App\Models\Facebook\Pages;
use App\Models\Instagram\InstagramAccounts;
use App\Models\SocialMediaAccessTokens;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialmintController extends Controller
{

   


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



    public function AccountsData()
    { 
        $facebook  =  array("Status"   =>  false,   "Multiple_Pages" => false, "Name" => " No Account Linked",);
        $instagram =  array("Status"   => false,  "Multiple_Pages" => false,  "Name" => " No Account Linked",);
        $twitter   =  array("Status"  =>  false,   "Name" => " No Account Linked");
        $reddit    =  array("Status"  =>  false,   "Name" => " No Account Linked");
        $telegram  =  array("Status"  =>  false,   "Name" => " No Account Linked");
        $discord   =  array("Status"  =>  false,   "Multiple_Channels" => false,  "Name" => " No Account Linked",);
        $pintrest  =  array("Status"  =>  false,   "Multiple_Boards" => false,    "Name" => " No Account Linked",);


    
        $Facebook_Pages  =   Auth::user()->fbpages;
        $InstaAccounts   =   Auth::user()->instaAccounts;
        $TwitterAccounts =   Auth::user()->Twitter;
        $RedditAccount   =   Auth::user()->Reditt;
        $DiscordAccount  =   Auth::user()->Discord;
        $PintrestAccount =   Auth::user()->Pintrest;        
        $Channels=Auth::user()->DChannels;
        $PintrestBoards=Auth::user()->BPintrest;


        if (isset($PintrestAccount))
        {
            $pintrest["Name"]=$PintrestAccount->name;
            $pintrest["Status"]=true;
            if (count ($PintrestBoards)>1){
                $pintrest["Multiple_Boards"]=true;
                $result=array();$i=0;
                foreach($PintrestBoards as $Board)
                {
                    $result[$i]=array("Name"=>$Board->name,"Id"=>$Board->id);
                    $i++;
                }
                $pintrest["Multiple_Boards_Data"]=$result;
            }elseif(count($PintrestBoards)==1){
                $pintrest["Board Name"] = $PintrestBoards[0]->name;
                
            }elseif(count($PintrestBoards)==0){
                $pintrest["Board Name"]= null;
            }
        }

        if (isset($DiscordAccount) )
        {
            $discord['Status']=true;
            $discord["Name"] = $DiscordAccount->name;
          
            if (count($Channels)>1){
                $discord['Multiple_Channels']=true;
                $result=array();$i=0;
            foreach($Channels as $channel)
            {
                $result[$i]=array("Name"=>$channel->name,"Id"=>$channel->id);
                $i++;
            }
            $discord["Multiple_Channel_Data"]=$result;
            }elseif (count($Channels) == 1) {
                $discord["Channel Name"] = $Channels[0]->name;
            } elseif(count($Channels) == 0){
                $discord["Channel Name"] = null;
            }
            
        }

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
           
        }

        if (isset($TwitterAccounts->name)) {
            $twitter["Status"] = true;
            $twitter["Name"]   =$TwitterAccounts->name;
          
        }

        if (isset($RedditAccount)){
            $reddit["Status"]=true;
            $reddit["Name"]=$RedditAccount->name;
   
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


   




}
