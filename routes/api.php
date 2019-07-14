<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('stories', 'App\StoryController');

Route::apiResource('products', 'App\ProductController');

Route::apiResource('slides', 'App\SlideController');

Route::apiResource('visits', 'App\VisitController');

Route::apiResource('performance-data', 'App\PerformanceDataController');

Route::apiResource('users', 'App\UserController');
