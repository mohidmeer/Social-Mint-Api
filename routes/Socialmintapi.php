<?php

use App\Http\Controllers\Api\SocialMintFrontend\SocialmintController;
use App\Http\Controllers\Api\SocialMintFrontend\SocialCallBacks;
use App\Models\SocialMediaAccessTokens;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;



// callbackroutes no middleware
Route::get('/twitter/callback'  ,   [SocialCallBacks::class,'twittercallback' ]);
Route::get('/facebook/callback' ,   [SocialCallBacks::class,'facebookcallback']);
Route::get('/instagram/callback',   [SocialCallBacks::class,'instacallback']);
Route::get('/reddit/callback'   ,   [SocialCallBacks::class,'redditcallback']);
Route::get('/discord/callback'   ,   [SocialCallBacks::class,'redditcallback']);
Route::get('/pintrest/callback'   ,   [SocialCallBacks::class,'pintrestcallback']);

// Auth Url Genarations 
Route::get('/facebook/login',[SocialmintController::class, 'getFacebookRedirectUrl'])->middleware(['auth:sanctum']);
Route::get('/instagram/login',[SocialmintController::class,'getInstagramRedirectUrl'])->middleware(['auth:sanctum']);
Route::get('/twitter/login',[SocialmintController::class,  'getTwitterRedirectUrl'])->middleware(['auth:sanctum']);
Route::get('/reddit/login',[SocialmintController::class,   'getRedditRedirectUrl'])->middleware(['auth:sanctum']);
Route::get('/discord/login',[SocialmintController::class,  'getDiscordRedirectUrl'])->middleware(['auth:sanctum']);
Route::get('/pintrest/login',[SocialmintController::class, 'getPintrestRedirectUrl'])->middleware(['auth:sanctum']);










Route::post('/signup',[SocialmintController::class,'signup']);
Route::get('/accounts',[SocialmintController::class,'AccountsData'])->middleware(['auth:sanctum']);





Route::delete('/unlinktwitter',[SocialmintController::class,'UnlinkTwitter'])->middleware(['auth:sanctum']);
Route::delete('/unlinkfacebook',[SocialmintController::class,'UnlinkFacebook'])->middleware(['auth:sanctum']);
Route::delete('/unlinkinstagram',[SocialmintController::class,'UnlinkInstagram'])->middleware(['auth:sanctum']);



Route::post('/facebookselection',[SocialmintController::class,'SelectFacebookPages'])->middleware(['auth:sanctum']);
Route::post('/instagramselection',[SocialmintController::class,'SelectInstagramPages'])->middleware(['auth:sanctum']);