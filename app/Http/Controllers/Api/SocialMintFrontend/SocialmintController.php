<?php

namespace App\Http\Controllers\Api\SocialMintFrontend;

use App\Http\Controllers\Controller;
use App\Models\ApiRequests;
use App\Models\RequestLimit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialmintController extends Controller
{

   


    public function signup(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'useremail'=>'required|email'
        ]);
        $username = $request->username;
        $email    = $request->useremail;
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
        ApiRequests::create([
            'user_id' => $user['id'],
        ])->save();
        
        
        return response(["Bearer_Token" => $token], 201);
    }



    public function AccountsData()
    { 
        $facebook  =  array("Status"  =>  false  );
        $instagram =  array("Status"  =>  false  );
        $twitter   =  array("Status"  =>  false  );
        $reddit    =  array("Status"  =>  false  );
        $telegram  =  array("Status"  =>  false  );
        $discord   =  array("Status"  =>  false  );
        $pintrest  =  array("Status"  =>  false  );
        $telegram  =  array("Status"  =>  false  );


    
        $Facebook_Pages  =   Auth::user()->fbpages;
        $Facebook        =   Auth::user()->Facebook;
        $Instagram       =   Auth::user()->Instagram;
        $InstaAccounts   =   Auth::user()->instaAccounts;
        $TwitterAccount  =   Auth::user()->Twitter;
        $RedditAccount   =   Auth::user()->Reditt;
        $DiscordAccount  =   Auth::user()->Discord;
        $PintrestAccount =   Auth::user()->Pintrest;        
        $Channels        =   Auth::user()->DChannels;
        $PintrestBoards  =   Auth::user()->BPintrest;
        $Telegram        =   Auth::user()->Telegram;


        if (isset($PintrestAccount))
        {
            $pintrest["name"]=$PintrestAccount->name;
            $pintrest["Status"]=true;
            if (count ($PintrestBoards)>1){
                $pintrest["Multiple_Boards"]=true;
                $result=array();$i=0;
                foreach($PintrestBoards as $Board)
                {
                    $result[$i]=array("name"=>$Board->name,"Id"=>$Board->id);
                    $i++;
                }
                $pintrest["Multiple_Boards_Data"]=$result;
            }elseif(count($PintrestBoards)==1){
                $pintrest["Board id"] = $PintrestBoards[0]->id;
                $pintrest["Board Name"] = $PintrestBoards[0]->name;
                
            }elseif(count($PintrestBoards)==0){
                $pintrest["Board Name"]= null;
            }
        }
        if (isset($DiscordAccount) )
        {
            $discord['Status']=true;
            $discord["name"] = $DiscordAccount->name;
          
            if (count($Channels)>1){
                $discord['Multiple_Channels']=true;
                $result=array();$i=0;
            foreach($Channels as $channel)
            {
                $result[$i]=array("name"=>$channel->name,"Id"=>$channel->id);
                $i++;
            }
            $discord["Multiple_Channel_Data"]=$result;
            }elseif (count($Channels) == 1) {
                $discord["Channel Id"] = $Channels[0]->id;
                $discord["Channel Name"] = $Channels[0]->name;
            } elseif(count($Channels) == 0){
                $discord["Channel Name"] = null;
            }
            
        }
        if (isset($Facebook))
        {
            $facebook['status']=true;
            $facebook['name']  =$Facebook->name;
            if (count($Facebook_Pages)>1)
            {
                $facebook['Multiple_Pages']=true;
                $result = array();
                $i = 0;
                foreach ($Facebook_Pages as $page) {
                    $result[$i] = array("name" => $page->name, "Id" => $page->id);
                    $i++;
                }
                $facebook["Multiple_Page_Data"] = $result;
            }elseif (count($Facebook_Pages) == 1) {
                $facebook["Page Id"] = $Channels[0]->id;
                $facebook["Page Name"] = $Channels[0]->name;
            } elseif(count($Channels) == 0){
                $facebook["Page Name"] = null;
            }
        }
        if (isset($Instagram))
        {
            $Instagram['status']=true;
            $Instagram['name']  =$Instagram->name;
            if (count($InstaAccounts)>1)
            {
                $instagram['Multiple_Accounts']=true;
                $result = array();
                $i = 0;
                foreach ($InstaAccounts as $account) {
                    $result[$i] = array("name" => $account->name, "Id" => $account->id);
                    $i++;
                }
                $instagram["Multiple_Account_Data"] = $result;
            }elseif (count($InstaAccounts) == 1) {
                $instagram["Account Id"] = $InstaAccounts[0]->id;
                $instagram["Account Name"] = $InstaAccounts[0]->name;
            } elseif(count($InstaAccounts) == 0){
                $instagram["Page Name"] = null;
            }
        }
        if (isset($TwitterAccount->name)) {
            $twitter["Status"] = true;
            $twitter["Name"]   =$TwitterAccount->name;
          
        }
        if (isset($RedditAccount)){
            $reddit["Status"]=true;
            $reddit["name"]=$RedditAccount->name;
        }
        if (isset($Telegram)){
            $telegram['Status']=true;
            $telegram['name']=$Telegram->name;
        }

        
        $Accounts = array(
            "FACEBOOK" => $facebook,
            "INSTAGRAM" => $instagram,
            "TWITTER" => $twitter,
            "REDDIT"=>$reddit,
            "DISCORD"=>$discord,
            "PINTREST"=>$pintrest,
            "TELEGRAM"=>$telegram
           );
        return response($Accounts, 200);
    }


   




}
