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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('productStore' , [\App\Http\Controllers\ProductController::class, 'Store']);
Route::get('product/{product:id}/show', [\App\Http\Controllers\ProductController::class, 'Show']);
Route::get('product/list', [\App\Http\Controllers\ProductController::class, 'ShowAll']);
