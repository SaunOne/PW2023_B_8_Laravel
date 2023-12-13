<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/register',[App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('/login',[App\Http\Controllers\Api\AuthController::class,'login']);

Route::middleware('auth:api')->group(function(){
    Route::get('/users',[App\Http\Controllers\Api\UserController::class,'showAll']);
    Route::put('/users',[App\Http\Controllers\Api\UserController::class,'updateProfile']);
    Route::get('/users/{id}',[App\Http\Controllers\Api\UserController::class,'showById']);
    Route::delete('/users/{id}',[App\Http\Controllers\Api\UserController::class]);
    
}); 

