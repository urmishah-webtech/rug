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
Route::get('product-variant/{id}', 'App\Http\Controllers\Api\ProductlistController@getIndividualProduct_variant');

Route::get('blogs', 'App\Http\Controllers\Api\BlogPostController@getAllBlogPost');
Route::get('blogs/{slug}', 'App\Http\Controllers\Api\BlogPostController@getBlogPost');

Route::get('menu', 'App\Http\Controllers\Api\NavigationController@getAllNavigation');
Route::get('menu-list/{id}', 'App\Http\Controllers\Api\NavigationController@getNavigationList');

Route::get('general-setting', 'App\Http\Controllers\Api\GeneralSettingController@getGeneralSettings');

Route::post('login', 'App\Http\Controllers\Api\LoginController@login');
Route::post('signup', 'App\Http\Controllers\Api\LoginController@signup');
Route::post('resetpassword', 'App\Http\Controllers\Api\LoginController@storeNewPassword');
Route::get('logout', 'App\Http\Controllers\Api\LoginController@logout');
Route::get('user', 'App\Http\Controllers\Api\LoginController@user');

Route::get('pages', 'App\Http\Controllers\Api\PagesController@getAllPages');
Route::get('pages/{id?}', 'App\Http\Controllers\Api\PagesController@getPages');



