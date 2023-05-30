<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
//     return $request->user();
// });

// Route::get('/news', [NewsController::class, 'index'])->middleware('jwt.auth'); // или auth:api

Route::get('/news', [NewsController::class, 'index']);
Route::post('/store', [NewsController::class, 'store'])->middleware('auth:api');
Route::delete('/destroy/{id}', [NewsController::class, 'destroy'])->middleware('auth:api');
Route::put('/update/{id}', [NewsController::class, 'update'])->middleware('auth:api');
Route::post('/checkauth', [AuthController::class, 'checkauth'])->middleware('auth:api');
Route::group([

    // 'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');

});
