<?php

use App\Http\Controllers\Api\FacebookController;
use App\Http\Controllers\Api\InstagramController;
use App\Http\Controllers\Api\TwitterController;
use App\Http\Controllers\Api\RedditController;
use App\Http\Controllers\Api\TelegramController;
use App\Http\Requests\PostFacebookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  

// All Social Media Api Routes Here
Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('facebook/pic',[FacebookController::class, 'postPic']);
    
    Route::post('facebook/feed',[FacebookController::class, 'postFeed']);

    Route::post('instagram/pic',[InstagramController::class, 'postPic']);

    Route::post('twitter/tweet',[TwitterController::class, 'PostTweet']);
    
    Route::post('twitter/tweetMedia',[TwitterController::class, 'PostMediaTweet']);


    Route::post('reddit/feed',[RedditController::class, 'Postmessage']);
    
  
    Route::post('reddit/pic',[RedditController::class, 'PostMedia']);


    Route::post('telegram/feed',[TelegramController::class, 'PostMessage']);

    
    Route::post('telegram/pic',[TelegramController::class, 'PostMedia']);

    
    
});

  

Route::fallback(function(){
    return response()->json([
        'message' => 'Not Found. If error persists, contact info@website.com'], 404);
});



