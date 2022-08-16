<?php

use App\Http\Controllers\FrontApiController;
use App\Http\Controllers\FrontPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SocialMedia\FacebookController;
use App\Http\Controllers\SocialMedia\InstagramController;
use App\Http\Controllers\SocialMedia\TwitterController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});
Route::get('/docs', function () {
    return view('docs');
})->name('docs');
Route::get('/privacy-policy', function () {
    return view('privacypolicy');
})->name('privacypolicy');
Route::get('/termsofservice', function () {
    return view('termsofservice');
})->name('termsofsevice');




Auth::routes();
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('home/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
Route::get('home/instagram/callback', [InstagramController::class, 'handleInstagramCallback']);
Route::get('home/twitter/callback', [twitterController::class, 'handleTwitterCallback']);







Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/api', [FrontApiController::class, 'index'])->name('api');
    Route::get('/home/post', [FrontPostController::class, 'index'])->name('post');



    Route::get('home/facebook', [FacebookController::class, 'index'])->name('facebook');
    Route::get('home/facebook/deauth', [FacebookController::class, 'deauthorize'])->name('facebookdeauthorize');
    Route::get('home/facebook/deactivate/{id}', [FacebookController::class, 'deactivate'])->name('deactivate');
    Route::get('home/facebook/activate/{id}', [FacebookController::class, 'activate'])->name('activate');
    Route::get('home/facebook/login', [FacebookController::class, 'redirectToFacebook'])->name('facebooklogin');
    


    Route::get('/home/instagram', [InstagramController::class, 'index'])->name('instagram');
    Route::get('home/instagram/deauth', [InstagramController::class, 'deauthorize'])->name('instagramdeatuthorize');
    Route::get('home/instagram/deactivate/{id}', [InstagramController::class, 'deactivate'])->name('instagramdeactivate');
    Route::get('home/instagram/activate/{id}', [InstagramController::class, 'activate'])->name('instagramactivate');
    Route::get('home/instagram/login', [InstagramController::class, 'redirectToInstagram'])->name('instagramlogin');
    


    Route::get('/home/twitter', [TwitterController::class, 'index'])->name('twitter');
    Route::get('home/twitter/deauth', [twitterController::class, 'deauthorize'])->name('twitterdeatuthorize');
    Route::get('home/twitter/deactivate/{id}', [twitterController::class, 'deactivate'])->name('twitterdeactivate');
    Route::get('home/twitter/activate/{id}', [twitterController::class, 'activate'])->name('twitteractivate');
    Route::get('home/twitter/login', [twitterController::class, 'redirectTotwitter'])->name('twitterlogin');
    
});
