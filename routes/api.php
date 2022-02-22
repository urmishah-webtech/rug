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
Route::middleware('auth:api')->group(function(){
	Route::post('shippingInfo', 'App\Http\Controllers\Api\ShippingController@shippingInfo');
});
Route::get('products', 'App\Http\Controllers\Api\ProductlistController@getAllProducts');
Route::get('products/{id}', 'App\Http\Controllers\Api\ProductlistController@getIndividualProduct');
Route::get('product-variant/{id}', 'App\Http\Controllers\Api\ProductlistController@getIndividualProduct_variant');
Route::get('related-product/{id}', 'App\Http\Controllers\Api\ProductlistController@get_related_Products');

Route::get('slider', 'App\Http\Controllers\Api\SliderController@getSlider');
Route::get('getCountry', 'App\Http\Controllers\Api\CountryController@getCountry');
Route::post('getStates', 'App\Http\Controllers\Api\CountryController@getStates');

Route::post('contactInquiry', 'App\Http\Controllers\Api\ContactInquiryController@contactInquiry');

Route::get('blogs', 'App\Http\Controllers\Api\BlogPostController@getAllBlogPost');
Route::get('blogs/{slug}', 'App\Http\Controllers\Api\BlogPostController@getBlogPost');

Route::get('menu', 'App\Http\Controllers\Api\NavigationController@getAllNavigation');
Route::get('menu-list/{id}', 'App\Http\Controllers\Api\NavigationController@getNavigationList');
Route::get('sub-menu-list/{id}', 'App\Http\Controllers\Api\NavigationController@getNavigationList_Submenu');

Route::get('general-setting', 'App\Http\Controllers\Api\GeneralSettingController@getGeneralSettings');

Route::get('faq-category', 'App\Http\Controllers\Api\FaqlistController@getAllFaqCategory');
Route::get('faq/{id}', 'App\Http\Controllers\Api\FaqlistController@getFaq_Category_Post');

Route::post('login', 'App\Http\Controllers\Api\LoginController@login');
Route::post('signup', 'App\Http\Controllers\Api\LoginController@signup');
Route::post('resetpassword', 'App\Http\Controllers\Api\LoginController@storeNewPassword');
Route::get('logout', 'App\Http\Controllers\Api\LoginController@logout');
Route::get('user', 'App\Http\Controllers\Api\LoginController@user');

Route::get('pages', 'App\Http\Controllers\Api\PagesController@getAllPages');
Route::get('pages/{slug}', 'App\Http\Controllers\Api\PagesController@getPages');

Route::post('cart', 'App\Http\Controllers\Api\CartController@CartSave');
Route::post('getcart', 'App\Http\Controllers\Api\CartController@getCart');
Route::get('cartdelete/{id}', 'App\Http\Controllers\Api\CartController@DeleteCartProduct');



