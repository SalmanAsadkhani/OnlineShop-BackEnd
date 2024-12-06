<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\User;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('productStore' , [\App\Http\Controllers\ProductController::class, 'Store']);
Route::get('product/{product:id}/show', [\App\Http\Controllers\ProductController::class, 'Show']);
Route::get('product/list', [\App\Http\Controllers\ProductController::class, 'ShowAll']);

Route::put('product/{product}/update', [\App\Http\Controllers\ProductController::class, 'update']);
Route::delete('product/{product}/destroy', [\App\Http\Controllers\ProductController::class, 'destroy']);

Route::post('auth/check/user/exist' , [UserController::class , 'checkUser']);
Route::post('auth/check/user/otp' , [UserController::class , 'checkOtp']);

Route::post('auth/user/store' , [UserController::class , 'store']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user/{user}/info' , [UserController::class , 'User_info']);

});
