<?php

use App\Http\Controllers\Api\SocialmintController;
use App\Models\SocialMediaAccessTokens;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;



// callbackroutes no middleware
Route::get('/twitter/callback',  [SocialmintController::class,'twittercallback' ]);
Route::get('/facebook/callback', [SocialmintController::class,'facebookcallback']);
Route::get('/instagram/callback',[SocialmintController::class,'instacallback']);






Route::post('/signup',[SocialmintController::class,'signup']);
Route::get('/twitterredirect',[SocialmintController::class,'twitterurlredirectgenarator'])->middleware(['auth:sanctum']);
Route::get('/accounts',[SocialmintController::class,'AccountsData'])->middleware(['auth:sanctum']);





Route::delete('/unlinktwitter',[SocialmintController::class,'UnlinkTwitter'])->middleware(['auth:sanctum']);
Route::delete('/unlinkfacebook',[SocialmintController::class,'UnlinkFacebook'])->middleware(['auth:sanctum']);
Route::delete('/unlinkinstagram',[SocialmintController::class,'UnlinkInstagram'])->middleware(['auth:sanctum']);



Route::post('/facebookselection',[SocialmintController::class,'SelectFacebookPages'])->middleware(['auth:sanctum']);
Route::post('/instagramselection',[SocialmintController::class,'SelectInstagramPages'])->middleware(['auth:sanctum']);