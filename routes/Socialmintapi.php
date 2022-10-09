<?php

use App\Http\Controllers\Api\SocialMintFrontend\LoginUrlController;
use App\Http\Controllers\Api\SocialMintFrontend\SocialCallBackController;
use App\Http\Controllers\Api\SocialMintFrontend\SocialmintController;

use App\Models\SocialMediaAccessTokens;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;



// callbackroutes no middleware
Route::get('/twitter/callback'  ,   [SocialCallBackController::class,'twittercallback' ]);
Route::get('/facebook/callback' ,   [SocialCallBackController::class,'facebookcallback']);
Route::get('/instagram/callback',   [SocialCallBackController::class,'instacallback']);
Route::get('/reddit/callback'   ,   [SocialCallBackController::class,'redditcallback']);
Route::get('/discord/callback'  ,   [SocialCallBackController::class,'redditcallback']);
Route::get('/pintrest/callback' ,   [SocialCallBackController::class,'pintrestcallback']);

// Auth Url Genarations 
Route::get('/facebook/login'    ,[LoginUrlController::class, 'getFacebookRedirectUrl'])->middleware(['auth:sanctum']);
Route::get('/instagram/login'   ,[LoginUrlController::class,'getInstagramRedirectUrl'])->middleware(['auth:sanctum']);
Route::get('/twitter/login'     ,[LoginUrlController::class,  'getTwitterRedirectUrl'])->middleware(['auth:sanctum']);
Route::get('/reddit/login'      ,[LoginUrlController::class,   'getRedditRedirectUrl'])->middleware(['auth:sanctum']);
Route::get('/discord/login'     ,[LoginUrlController::class,  'getDiscordRedirectUrl'])->middleware(['auth:sanctum']);
Route::get('/pintrest/login'    ,[LoginUrlController::class, 'getPintrestRedirectUrl'])->middleware(['auth:sanctum']);










Route::post('/signup',[SocialmintController::class,'signup']);
Route::get('/accounts',[SocialmintController::class,'AccountsData'])->middleware(['auth:sanctum']);


Route::delete('/unlinktwitter',[SocialmintController::class,'UnlinkTwitter'])->middleware(['auth:sanctum']);
Route::delete('/unlinkfacebook',[SocialmintController::class,'UnlinkFacebook'])->middleware(['auth:sanctum']);
Route::delete('/unlinkinstagram',[SocialmintController::class,'UnlinkInstagram'])->middleware(['auth:sanctum']);



Route::post('/facebookselection',[SocialmintController::class,'SelectFacebookPages'])->middleware(['auth:sanctum']);
Route::post('/instagramselection',[SocialmintController::class,'SelectInstagramPages'])->middleware(['auth:sanctum']);