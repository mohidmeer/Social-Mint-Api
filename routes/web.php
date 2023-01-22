<?php

use App\Http\Controllers\FrontApiController;
use App\Http\Controllers\FrontPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SocialMedia\DiscordController;
use App\Http\Controllers\SocialMedia\FacebookController;
use App\Http\Controllers\SocialMedia\InstagramController;
use App\Http\Controllers\SocialMedia\TwitterController;
use App\Http\Controllers\SocialMedia\RedittController;
use App\Http\Controllers\SocialMedia\TelegramController;
use App\Http\Controllers\SocialMedia\PintrestController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Discord\Discord;
use Illuminate\Http\Request;
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



Route::get('/', function () {return view('welcome');});
Route::get('/docs', function () {return view('docs');})->name('docs');
Route::get('/privacy-policy', function () {return view('privacypolicy');})->name('privacypolicy');
Route::get('/termsofservice', function () {return view('termsofservice');})->name('termsofsevice');
Route::get('/billing-portal', function (Request $request) { return $request->user()->redirectToBillingPortal(); })->name('portal');



Auth::routes();
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('home/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
Route::get('home/instagram/callback', [InstagramController::class, 'handleInstagramCallback']);
Route::get('home/twitter/callback', [TwitterController::class, 'handleTwitterCallback']);
Route::get('home/reddit/callback', [RedittController::class, 'handleRedditCallback']);
Route::get('home/discord/callback', [DiscordController::class, 'handleDiscordCallback']);
Route::get('/home/pintrest/callback', [PintrestController::class, 'handlePintrestCallback']);






Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/plans', [PlanController::class, 'index'])->name('pricing');
    Route::get('/billing-portal', [PlanController::class, 'billingPortal'])->name('portal');
    Route::get('/plans/{id}', [PlanController::class, 'show'])->name('plan.show');
    Route::post('/plans/subscribe', [SubscriptionController::class, 'subscribe'])->name("subscription.create");
    Route::get('/subscriptions/{name}/cancel', [SubscriptionController::class, 'cancel'])->name("subscription.cancel");
    Route::get('/subscriptions/{name}/resume', [SubscriptionController::class, 'resume'])->name("subscription.resume");
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name("subscription");
   ;



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
    Route::get('home/twitter/login', [twitterController::class, 'redirectTotwitter'])->name('twitterlogin');
    

    //Reddit Routes
    Route::get('/home/reddit', [RedittController::class, 'index'])->name('reddit');   
    Route::get('/home/reddit/deauth', [RedittController::class, 'deauthorize'])->name('redditdeatuthorize');   
    Route::get('/home/reddit/login', [RedittController::class, 'redirectToReddit'])->name('redditlogin'); 
    
    

    // Pintrest Routes
    Route::get('/home/pintrest', [PintrestController::class, 'index'])->name('pintrest');   
    Route::get('/home/pintrest/deauth', [PintrestController::class, 'deauthorize'])->name('pintrestdeatuthorize');   
    Route::get('/home/pintrest/login', [PintrestController::class, 'redirectToPintrest'])->name('pintrestlogin'); 
    Route::get('home/pintrest/deactivate/{id}', [PintrestController::class, 'deactivate'])->name('pintrestdeactivate');
    Route::get('home/pintrest/activate/{id}', [PintrestController::class, 'activate'])->name('pintrestactivate');
    Route::get('home/pintrest/unlink/{id}', [PintrestController::class, 'unlink'])->name('unlinkBoard');


    // telegram Routes
    Route::get('/home/telegram', [TelegramController::class, 'index'])->name('telegram'); 
    Route::post('/home/telegram', [TelegramController::class, 'save'])->name('savename');
    Route::get('/home/telegram/deauth', [TelegramController::class, 'deauthorize'])->name('telegramdeatuthorize');


    // Discord Routes
    Route::get('/home/discord', [DiscordController::class, 'index'])->name('discord'); 
    Route::get('/home/discord/login', [DiscordController::class, 'RedirectToDiscord'])->name('discordlogin');
    Route::get('/home/discord/deauth', [DiscordController::class, 'deauthorize'])->name('discorddeauthorize'); 
    Route::get('home/discord/deactivate/{id}', [DiscordController::class, 'deactivate'])->name('discorddeactivate');
    Route::get('home/discord/activate/{id}', [DiscordController::class, 'activate'])->name('discordactivate');
    Route::get('home/discord/unlink/{id}', [DiscordController::class, 'unlink'])->name('unlinkchannel');



   


   

    
});
