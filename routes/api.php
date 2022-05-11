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
Route::get('products/{slug}', 'App\Http\Controllers\Api\ProductlistController@getIndividualProduct');
Route::get('product-variant/{slug}', 'App\Http\Controllers\Api\ProductlistController@getIndividualProduct_variant');
Route::get('related-product/{id}', 'App\Http\Controllers\Api\ProductlistController@get_related_Products');
Route::post('varientData', 'App\Http\Controllers\Api\ProductlistController@fetchPrice');
Route::get('featureproduct', 'App\Http\Controllers\Api\SliderController@FeatureProduct');
Route::get('custom-products/{id}', 'App\Http\Controllers\Api\ProductlistController@Custome_Modual_InProduct');

Route::get('slider', 'App\Http\Controllers\Api\SliderController@getSlider');
Route::get('homepage', 'App\Http\Controllers\Api\SliderController@getHomepage');
Route::get('studiopage', 'App\Http\Controllers\Api\SliderController@getStudiopage');
Route::get('apartmentpage', 'App\Http\Controllers\Api\SliderController@getApartmentpage');
Route::get('proceesspage', 'App\Http\Controllers\Api\SliderController@getProcesspage');
Route::get('ourstorypage', 'App\Http\Controllers\Api\SliderController@getStorypage');
Route::get('swatchespage', 'App\Http\Controllers\Api\SliderController@getSwatchespage');
Route::get('sizeguidepage', 'App\Http\Controllers\Api\SliderController@getSizeGuidepage');
Route::get('footerinformation', 'App\Http\Controllers\Api\SliderController@getfooterpage');
Route::get('footermenu/{id}', 'App\Http\Controllers\Api\SliderController@getFooterNavigationList');


Route::post('contactsave', 'App\Http\Controllers\Api\SliderController@ContactSave');
Route::post('tradesave', 'App\Http\Controllers\Api\SliderController@TradeSave');


Route::get('getCountry', 'App\Http\Controllers\Api\CountryController@getCountry');
Route::post('getStates', 'App\Http\Controllers\Api\CountryController@getStates');

Route::post('contactInquiry', 'App\Http\Controllers\Api\ContactInquiryController@contactInquiry');

Route::get('blogs', 'App\Http\Controllers\Api\BlogPostController@getAllBlogPost');
Route::get('blogs/{slug}', 'App\Http\Controllers\Api\BlogPostController@getBlogPost');

Route::get('menu', 'App\Http\Controllers\Api\NavigationController@getAllNavigation');
Route::get('getmenu', 'App\Http\Controllers\Api\NavigationController@getnavigation');
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
Route::post('customecart', 'App\Http\Controllers\Api\CartController@CustomeCartSave');
Route::get('getcart/{id}', 'App\Http\Controllers\Api\CartController@getCart');
Route::get('cartdelete/{id}', 'App\Http\Controllers\Api\CartController@DeleteCartProduct');
Route::post('cartupdate', 'App\Http\Controllers\Api\CartController@UpdateCartProduct');


Route::get('get-shipping-checkout/{id}', 'App\Http\Controllers\Api\CheckoutController@getshipping');
Route::any('shipping-cost', 'App\Http\Controllers\Api\CartController@getshipping');
Route::post('checkout-shipping-save', 'App\Http\Controllers\Api\CheckoutController@SaveShipping');
Route::post('update-address/{id}', 'App\Http\Controllers\Api\CheckoutController@updateAddress');
Route::get('delete-address/{id}', 'App\Http\Controllers\Api\CheckoutController@deleteShipping');


Route::post('payment', 'App\Http\Controllers\Api\PaymentController@payment');
Route::post('webhook', 'App\Http\Controllers\Api\PaymentController@webhook');  

Route::post('orderplace', 'App\Http\Controllers\Api\PaymentController@orderplace'); 
Route::get('thankyou/{id}', 'App\Http\Controllers\Api\PaymentController@get_thankyou');

Route::post('country-check', 'App\Http\Controllers\Api\PaymentController@countryCheck'); 

/*COLLECTION*/
Route::get('collection', 'App\Http\Controllers\Api\CollectionController@getCollection'); 

/*USER DETAIL*/
Route::get('orderget/{id}', 'App\Http\Controllers\Api\UserProfile@getOrder');
Route::get('profileget/{id}', 'App\Http\Controllers\Api\UserProfile@Profileget');
Route::post('userupdate', 'App\Http\Controllers\Api\UserProfile@ProfileEdit'); 
Route::post('Passwordupdate', 'App\Http\Controllers\Api\UserProfile@PasswordUpdate');
Route::post('password-forgot', 'App\Http\Controllers\Api\UserProfile@sendPasswordResetLink');
Route::post('reset-password', 'App\Http\Controllers\Api\UserProfile@storeNewPassword');

/*FILTER PRODUCT*/
Route::get('filterproduct/{id}', 'App\Http\Controllers\Api\ProductFilterController@getFilter');

Route::post('checkgetproduct', 'App\Http\Controllers\Api\ProductFilterController@getGetFilter');