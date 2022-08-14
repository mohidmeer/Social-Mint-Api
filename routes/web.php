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




Route::get('/home/twitter', [TwitterController::class, 'index'])->name('twitter');
Route::get('/home/instagram', [InstagramController::class, 'index'])->name('instagram');
// Route::get('/home/discord', [DiscordController::class, 'index'])->name('discord');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/api', [FrontApiController::class, 'index'])->name('api');
Route::get('/home/post', [FrontPostController::class, 'index'])->name('post');




Route::get('home/facebook', [FacebookController::class, 'index'])->name('facebook');
Route::get('home/facebook/deauth', [FacebookController::class, 'deauthorize'])->name('facebookdeauthorize');
Route::get('home/facebook/deactivate/{id}', [FacebookController::class, 'deactivate'])->name('deactivate');
Route::get('home/facebook/activate/{id}', [FacebookController::class, 'activate'])->name('activate');
Route::get('home/facebook/login', [FacebookController::class, 'redirectToFacebook'])->name('facebooklogin');
Route::get('home/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);


Route::middleware(['auth'])->group(function () {
  
 
});



Route::get('/clear', function () {
    \Cache::flush();
    dd('cache cleared');
});

Route::get('/install', function () {
    Illuminate\Support\Facades\Artisan::call('migrate:fresh', [
        '--seed' => true
    ]);
});


Route::get('/config_cache_clear', function () {
    $exitCode = Artisan::call('config:cache');
});


Route::get('/composer-du', function () { 
    Artisan::call('dump:autoload');
});


Route::get('/clear_cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode .= Artisan::call('view:clear');
});


Route::get('/clear_cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode .= Artisan::call('view:clear');
});









