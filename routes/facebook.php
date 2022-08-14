<?php

use App\Http\Controllers\Api\FacebookController;
use App\Http\Requests\PostFacebookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/pic/post',[FacebookController::class, 'postPic']);
    Route::post('/feed/post',[FacebookController::class, 'postFeed']);
    
    
});





