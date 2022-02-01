<?php

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

Route::get('products', 'App\Http\Controllers\Api\ProductlistController@getAllProducts');
Route::get('products/{id}', 'App\Http\Controllers\Api\ProductlistController@getIndividualProduct');

Route::get('blogs', 'App\Http\Controllers\Api\BlogPostController@getAllBlogPost');
Route::get('blogs/{slug}', 'App\Http\Controllers\Api\BlogPostController@getBlogPost');