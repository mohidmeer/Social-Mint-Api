<?php

use App\Http\Controllers\FrontApiController;
use App\Http\Controllers\FrontPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SocialMedia\DiscordController;
use App\Http\Controllers\SocialMedia\FacebookController;
use App\Http\Controllers\SocialMedia\InstagramController;
use App\Http\Controllers\SocialMedia\TwitterController;
use App\Http\Controllers\SocialMedia\RedittController;
use App\Http\Controllers\SocialMedia\TelegramController;
use App\Models\Discord\Discord;
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
Route::get('home/twitter/callback', [TwitterController::class, 'handleTwitterCallback']);
Route::get('home/reddit/callback', [RedittController::class, 'handleRedditCallback']);
Route::get('home/discord/callback', [DiscordController::class, 'handleDiscordCallback']);







Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/api', [FrontApiController::class, 'index'])->name('api');
    Route::get('/home/post', [FrontPostController::class, 'index'])->name('post');


    // facebook routes
    Route::get('home/facebook', [FacebookController::class, 'index'])->name('facebook');
    Route::get('home/facebook/deauth', [FacebookController::class, 'deauthorize'])->name('facebookdeauthorize');
    Route::get('home/facebook/deactivate/{id}', [FacebookController::class, 'deactivate'])->name('deactivate');
    Route::get('home/facebook/activate/{id}', [FacebookController::class, 'activate'])->name('activate');
    Route::get('home/facebook/unlink/{id}', [FacebookController::class, 'unlinkpage'])->name('unlinkpage');
    Route::get('home/facebook/login', [FacebookController::class, 'redirectToFacebook'])->name('facebooklogin');
    

    // instagram routes
    Route::get('/home/instagram', [InstagramController::class, 'index'])->name('instagram');
    Route::get('home/instagram/deauth', [InstagramController::class, 'deauthorize'])->name('instagramdeauthorize');
    Route::get('home/instagram/deactivate/{id}', [InstagramController::class, 'deactivate'])->name('instagramdeactivate');
    Route::get('home/instagram/activate/{id}', [InstagramController::class, 'activate'])->name('instagramactivate');
    Route::get('home/instagram/unlink/{id}', [InstagramController::class, 'unlinkaccount'])->name('unlinkaccount');
    Route::get('home/instagram/login', [InstagramController::class, 'redirectToInstagram'])->name('instagramlogin');
    

    //  twitter Routes
    Route::get('/home/twitter', [TwitterController::class, 'index'])->name('twitter');
    Route::get('home/twitter/deauth', [twitterController::class, 'deauthorize'])->name('twitterdeatuthorize');
    // Route::get('home/twitter/deactivate/{id}', [twitterController::class, 'deactivate'])->name('twitterdeactivate');
    // Route::get('home/twitter/activate/{id}', [twitterController::class, 'activate'])->name('twitteractivate');
    Route::get('home/twitter/login', [twitterController::class, 'redirectTotwitter'])->name('twitterlogin');
    

    //Reddit Routes
    Route::get('/home/reddit', [RedittController::class, 'index'])->name('reddit');   
    Route::get('/home/reddit/deauth', [RedittController::class, 'deauthorize'])->name('redditdeatuthorize');   
    Route::get('/home/reddit/login', [RedittController::class, 'redirectToReddit'])->name('redditlogin');   


    // telegram Routes
    Route::get('/home/telegram', [TelegramController::class, 'index'])->name('telegram'); 
    Route::post('/home/telegram', [TelegramController::class, 'save'])->name('savename');
    Route::get('/home/telegram/deauth', [TelegramController::class, 'deauthorize'])->name('telegramdeatuthorize');


    // Discord Routes
    Route::get('/home/discord', [DiscordController::class, 'index'])->name('discord'); 
    Route::get('/home/discord/login', [DiscordController::class, 'RedirectToDiscord'])->name('discordlogin');
    Route::get('/home/discord/deauth', [DiscordController::class, 'deauthorize'])->name('discorddeauthorize'); 
    Route::get('home/discord/deactivate/{id}', [DiscordController::class, 'deactivate'])->name('discordeactivate');
    Route::get('home/discord/activate/{id}', [DiscordController::class, 'activate'])->name('discordactivate');
    Route::get('home/discord/unlink/{id}', [DiscordController::class, 'unlink'])->name('unlinkchannel');
   


   

    
});
