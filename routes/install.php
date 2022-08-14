<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    Cache::flush();
    dd('cache cleared');
});

Route::get('/install', function () {
    Illuminate\Support\Facades\Artisan::call('migrate:fresh', [
        '--seed' => true
    ]);
});


Route::get('/config_cache_clear', function () {
    $e = Artisan::call('config:cache');
});


Route::get('/set_app_key', function () {
    $e = Artisan::call('key:generate');
});





Route::get('/clear_cache', function () {
    $e = Artisan::call('cache:clear');
    $e = Artisan::call('view:clear');
});
