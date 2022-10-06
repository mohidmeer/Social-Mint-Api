<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use App\Models\Pintrest\Board;
use App\Models\Pintrest\Pintrest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

class PintrestController extends Controller
{

    public function handlePintrestCallback(Request $request)
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

        foreach($UserBoards['items'] as $Board )
        {
            Board::create([
                'user_id'=>$userid,
                'name'=>$Board['name'],
                'board_id'=>$Board['id']
            ]);
        }



        return redirect()->route('pintrest')->with('success', 'Successfully Connected');
    }


    public function index()
    {

        return view('dashboard.socialmedia.pintrest');
    }

    public function redirectToPintrest()
    {
        $Url = 'https://www.pinterest.com/oauth/?client_id='
        .config('services.pintrest.clientId').'&redirect_uri='
        .config('services.pintrest.RedirectUrl'). 
        '&response_type=code&scope=boards:read,pins:read,pins:write,boards:write,user_accounts:read&state='
        .Crypt::encryptString(Auth::user()->id);
        return redirect($Url);
    }


    public function deauthorize()
    {

        Pintrest::where('user_id',Auth::user()->id)->delete();
        return redirect()->route('pintrest')->with('success', 'Successfully Removed');

        
    }

}
