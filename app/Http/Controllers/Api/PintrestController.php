<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pintrest\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PintrestController extends Controller
{

    public function Pin(Request $request)
    {
        // validate the request 

        $request->validate([ 
            'title' => 'required|min:5',
            'description' => 'required|min:4',
            'img_url' =>  'required|url' ]);
        // Getting Pintrst User Aceess Token If Not then returning 

        $AccessToken=Auth::user()->Pintrest->access_token;

        // Auth user Pintrest Boards where status is 1
        $Boards=Board::where('user_id',Auth::user()->id)->where('status',1);


        if ($Boards->count()==0){return response('No Boards Found For Pinning',404);}


        // Checking Token Expiration Time and Then Continuing Flow


        


        // forech loop for posting IN  bOARDS




        





    }
    




}
