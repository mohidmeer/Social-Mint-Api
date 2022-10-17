<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostInstagramRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class InstagramController extends Controller
{
    public function postPic(PostInstagramRequest $request)
    {

        $Result = array();

        // Checking that does user have any linked Accounts
        if (!(isset(Auth::user()->Instagram))) {
            return response()->json(["message" => "You Don't Have Any Linked Instagram Account"], 404);
        }


        // Checking that does user have any linked facebook pages
        if (!(isset(Auth::user()->instaAccounts))) {
            return response()->json(["message" => "You Don't Have Any Linked Instagram Account"], 404);
        }
        $useraccount = Auth::user()->instaAccounts->where('status', 1);

        if ($useraccount->count() == 0) {
            return response()->json(["message" => "You Did'nt Allow Any Account For Posting,Visit Social Mint Share"], 404);
        }



        // Looping through Each Account For Posting to instagram
        foreach ($useraccount as $account) {
            // Checking that if user disabled the account for posting
            if ($account['status'] == 0) {
                continue;
            }
            $postimgurlcontainer = "https://graph.facebook.com/" . $account['insta_business_id'] . "/media?image_url=" . $request->img_url . "&caption=" . $request->caption . "";
            $container = Http::withToken($account['page_access_token'])->post($postimgurlcontainer);

            // Checking For any Errors by server
            if (isset($container['error'])) {
                $Result = Arr::add($Result, $account->name, $container->json());
            } else {
                $containerpublishurl = "https://graph.facebook.com/" . $account['insta_business_id'] . "/media_publish?creation_id=" . $container['id'] . "";
                $postimg = Http::withToken($account['page_access_token'])->post($containerpublishurl);
                $Result = Arr::add($Result, $account->name, $postimg->json());
            }
        }
        return $Result;
    }
}
