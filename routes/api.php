<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(CategoryController::class)->group(function() {
    Route::post('/add_category' , 'add_category');
    Route::get('/show_category/{id}' , 'show_category');
    Route::put('/update_category/{id}' , 'update_category');
    Route::delete('/delete_category/{id}' , 'delete_category');
});

Route::controller(AdController::class)->group(function() {
    Route::post('/add_ad' , 'add_ad');
    Route::get('/advertiser_ads/{id}' , 'show_advertiser_ads');
    Route::get('/search_by_category/{name?}' , 'searchByCategory');
});

Route::controller(TagController::class)->group(function() {
    Route::post('/add_tag' , 'add_tag');
    Route::get('/show_tag/{id}' , 'show_tag');
    Route::put('/update_tag/{id}' , 'update_tag');
    Route::delete('/delete_tag/{id}' , 'delete_tag');
});