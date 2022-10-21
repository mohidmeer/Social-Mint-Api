<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFacebookRequest;
use App\Http\Requests\PostFeedFacebookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class FacebookController extends Controller
{


    public function postPic(PostFacebookRequest $request)
    {
        $Result = array();

        // Checking that does user have any linked facebook pages
        if (!(isset(Auth::user()->Facebook))) {
            return response()->json(["message" => "You Don't Have Any Linked Facebook Account"], 404);
        }

        // Checking that does user have any linked facebook pages
        if (!(isset(Auth::user()->fbpages))) {
            return response()->json(["message" => "You Don't Have Any Linked Facebook Pages"], 404);
        }
        $userpages = Auth::user()->fbpages->where('status', 1);

        if ($userpages->count() == 0) {
            return response()->json(["message" => "You Did'nt Allow Any Pages For Posting,Visit Social Mint Share"], 404);
        }

        foreach ($userpages as $page) {
            if ($page->status == 0) {
                continue;
            }
            $postimageurl = Http::withToken($page['page_access_token'])
                ->post("https://graph.facebook.com/" . $page['page_id'] . "/photos?message=" . $request->message . "&url=" . $request->img_url . "");
            $Result = Arr::add($Result, $page->name, $postimageurl->json());
            Auth::user()->RequestsMade->increment('facebook');
        }
        return $Result;
    }
    public function postFeed(PostFeedFacebookRequest $request)
    {
        $Result = array();

        // Checking that does user have any linked facebook pages
        if (!(isset(Auth::user()->Facebook))) {
            return response()->json(["message" => "You Don't Have Any Linked Facebook Account"], 404);
        }

        // Checking that does user have any linked facebook pages
        if (!(isset(Auth::user()->fbpages))) {
            return response()->json(["message" => "You Don't Have Any Linked Facebook Pages"], 404);
        }
        $userpages = Auth::user()->fbpages->where('status', 1);

        if ($userpages->count() == 0) {
            return response()->json(["message" => "You Did'nt Allow Any Pages For Posting,Visit Social Mint Share"], 404);
        }

        foreach ($userpages as $page) {
            if ($page->status == 0) {
                continue;
            }
            $postimageurl = Http::withToken($page['page_access_token'])
                ->post("https://graph.facebook.com/" . $page['page_id'] . "/feed?message=" . $request->message . "");
            $Result = Arr::add($Result, $page->name, $postimageurl->json());
            Auth::user()->RequestsMade->increment('facebook');
        }
        return $Result;
    }
}
