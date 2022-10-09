<?php

use App\Http\Controllers\Api\SocialMintFrontend\DeauthorizationController;
use App\Http\Controllers\Api\SocialMintFrontend\LoginUrlController;
use App\Http\Controllers\Api\SocialMintFrontend\SelectionController;
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
Route::get('/discord/callback'  ,   [SocialCallBackController::class,'discordcallback']);
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






Route::delete('/twitter/unlink',  [DeauthorizationController::class,'UnlinkTwitter'])->middleware(['auth:sanctum']);
Route::delete('/facebook/unlink', [DeauthorizationController::class,'UnlinkFacebook'])->middleware(['auth:sanctum']);
Route::delete('/instagram/unlink',[DeauthorizationController::class,'UnlinkInstagram'])->middleware(['auth:sanctum']);
Route::delete('/reddit/unlink',   [DeauthorizationController::class,'UnlinkReddit'])->middleware(['auth:sanctum']);
Route::delete('/discord/unlink',  [DeauthorizationController::class,'UnlinkDiscord'])->middleware(['auth:sanctum']);
Route::delete('/pinterest/unlink',[DeauthorizationController::class,'UnlinkPinterest'])->middleware(['auth:sanctum']);
Route::delete('/telegram/unlink', [DeauthorizationController::class,'UnlinkTelegram'])->middleware(['auth:sanctum']);



Route::post('/facebook/select' , [SelectionController::class,'SelectFacebookPages'])->middleware(['auth:sanctum']);
Route::post('/instagram/select', [SelectionController::class,'SelectInstagramPages'])->middleware(['auth:sanctum']);
Route::post('/discord/select',   [SelectionController::class,'SelectDiscordChannels'])->middleware(['auth:sanctum']);
Route::post('/pinterest/select', [SelectionController::class,'SelectPintrestBoards'])->middleware(['auth:sanctum']);
Route::post('/telegram/select',  [SelectionController::class,'SaveTelegramId'])->middleware(['auth:sanctum']);