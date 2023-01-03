<?php

use App\Http\Controllers\Api\Version1\AnnouncementController;
use App\Http\Controllers\Api\Version1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api/version1
Route::group(['prefix' => 'version1', 'namespace' => 'App\Http\Controllers\Api\Version1'], function(){
    Route::apiResource('users', UserController::class);
    Route::apiResource('announcements', AnnouncementController::class);
});