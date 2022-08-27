<?php

use App\Http\Controllers\Api\FacebookController;
use App\Http\Controllers\Api\InstagramController;
use App\Http\Requests\PostFacebookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  

// All Social Media Api Routes Here
Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('facebook/pic',[FacebookController::class, 'postPic']);
    
    Route::post('facebook/feed',[FacebookController::class, 'postFeed']);

    Route::post('instagram/pic',[InstagramController::class, 'postPic']);
    
    
});





