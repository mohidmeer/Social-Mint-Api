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
