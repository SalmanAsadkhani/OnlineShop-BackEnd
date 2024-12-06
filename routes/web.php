<?php

use Illuminate\Support\Facades\Route;
use \App\Models\User ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('productStore' , [\App\Http\Controllers\ProductController::class, 'Store']);
Route::get('product/{product:id}/show', [\App\Http\Controllers\ProductController::class, 'Show']);
//Route::get('product/list', [\App\Http\Controllers\ProductController::class, 'ShowAll']);

Route::put('product/{product}/update', [\App\Http\Controllers\ProductController::class, 'Update']);


