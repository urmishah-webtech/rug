<?php



use Illuminate\Support\Facades\Route;

use App\Http\Livewire;



/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/

$route_prefix = env('ROUTE_PREFIX');

Route::group(['prefix' => $route_prefix], function () {


Route::middleware(['checkRole'])->group(function () {
// 
 Route::get('/', Livewire\Admin\Dashboard::class)->name('home');
    // Route::get('/signin', [Livewire\Admin\Dashboard::class, 'checkLogin'])->name('admin.login');

    // Route::get('/login', function (){

    //     return view('livewire.admin.login');

    // })->name('admin.login');
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        
        Route::get('/dashboard', Livewire\Dashboard::class)->name('dashboard');


        Route::middleware(['guest'])->group(function () {
             Route::get('/', Livewire\Admin\Dashboard::class)->name('admin-dashboard');


            //users

            Route::get('/users', Livewire\User\Users::class)->name('users');

            //customer

            Route::get('/customers', Livewire\Customer\ListCustomers::class)->name('customers');

            Route::get('/customers/new', Livewire\Customer\Create::class)->name('customer.create');

            Route::post('/customers/store', [Livewire\Customer\Create::class, 'storeCustomer'])->name('customer.store');

            Route::get('/customers/{id?}', Livewire\Customer\Details::class)->name('customer.details');





            Route::POST('/Edit-Customer/{id}', 'App\Http\Livewire\Customer\Customers@CustomerEdit')->name('customers-update');



            Route::get('/customers-detail/{id}', 'App\Http\Livewire\Customer\Customers@CustomerDetail')->name('menu-list-detail');

            

            Route::POST('/Add-Address', 'App\Http\Livewire\Customer\Customers@CustomerAddressAdd')->name('customers-add');

            

           

            //products

            Route::get('/products', Livewire\Product\Products::class)->name('products');

            

            

            Route::get('/products/new', Livewire\Product\ProductCreate::class)->name('products.create');

            Route::post('/products/store', [Livewire\Product\ProductCreate::class, 'storeProduct'])->name('products-store');
            
            Route::post('/products/update', [Livewire\Product\Detail::class, 'storeProductvarient'])->name('products-varient-store');

           

            Route::post('/variant/store', [Livewire\Product\Variant::class, 'Addvariant'])->name('variant-store');

            Route::get('/products/{id?}', Livewire\Product\Detail::class)->name('product-detail');

            Route::get('/variant', Livewire\Product\Variant::class)->name('variant');

            Route::get('/products/{id?}/variant/new', Livewire\Product\Variant::class)->name('variant-new');

            Route::get('/products/variant/{id?}', Livewire\Product\VariantDetail::class)->name('variant-detail');

            Route::get('/inventory', Livewire\Product\Inventory::class)->name('inventory');

            Route::resource('/updatestock', Livewire\Product\Inventory::class);



            Route::get('/transfers/new', Livewire\Product\TransfersCreate::class)->name('transfers-create');

            Route::get('/transfers', Livewire\Product\Transfers::class)->name('transfers');

            Route::get('/transfers/detail', Livewire\Product\Transfersdetail::class)->name('transfers-detail');

            Route::get('/collections', Livewire\Product\Collections::class)->name('collections');

            Route::get('/collections/new', Livewire\Product\Collectionscreate::class)->name('collections-create');

            Route::post('/collections/store', [Livewire\Product\Collectionscreate::class, 'collectionCreate'])->name('collections-store-create');

            

            Route::get('/submitUrl', Livewire\Product\Collectionsdetail::class, 'store')->name('search-product');



            Route::get('/collections/{id?}', Livewire\Product\Collectionsdetail::class)->name('collections-detail');

            Route::get('/gift-cards', Livewire\Product\GiftCards::class)->name('gift-cards');

            Route::get('/gift-cards/new', Livewire\Product\GiftCardscreate::class)->name('gift-cards-create');

            Route::get('/gift-cards/new-issue-gift-card', Livewire\Product\IssuegiftCardscreate::class)->name('gift-cards-issue-gift-card-create');

            //menu

             Route::get('/menu-list', Livewire\Menu\MenuList::class)->name('menu-list');

            Route::get('/menu', Livewire\Menu\Menus::class)->name('menu');

            Route::get('/menu?menu={id}', Livewire\Menu\Menus::class)->name('menu-item');

            Route::post('/addCustomMenu','App\Http\Livewire\Menu\Menus@addCustomMenu')->name('addCustomMenu');

            Route::get('/add-main-menu', [Livewire\Menu\Menus::class, 'addMainmenu'])->name('add-main-menu');

            Route::get('/add-product-menu', [Livewire\Menu\Menus::class, 'addProductmenu'])->name('add-product-menu');

            Route::get('/add-collection-menu', [Livewire\Menu\Menus::class, 'addCollectionmenu'])->name('add-collection-menu');



            //Online-Store

            Route::get('/pages', Livewire\OnlineStore\Pages::class)->name('pages-list');

            Route::get('/pages/new', Livewire\OnlineStore\PagesCreate::class)->name('pages-create');

            Route::post('/pages/store', [Livewire\OnlineStore\PagesCreate::class, 'storePages'])->name('pages-store');

            Route::get('/pages/{id?}', Livewire\OnlineStore\PagesDetail::class)->name('pages-detail');

            Route::get('/articles', Livewire\OnlineStore\Articles::class)->name('articles');

            Route::get('/themes', Livewire\OnlineStore\Themes::class)->name('themes');

            Route::get('/menus', Livewire\OnlineStore\Menus::class)->name('menus');

            Route::get('/menus?menu={id}', Livewire\OnlineStore\MenuDetail::class)->name('menus-detail');

            Route::get('/online_store/preferences', Livewire\OnlineStore\Preferences::class)->name('preferences');

            Route::get('/settings/domains', Livewire\OnlineStore\Domains::class)->name('domains');

            Route::get('/blogs', Livewire\OnlineStore\BlogPost::class)->name('blogs');

            Route::get('/blogs/new', Livewire\OnlineStore\BlogPostCreate::class)->name('blogs-new');

            Route::get('/blogs/detail', Livewire\OnlineStore\BlogPostDetail::class)->name('blogs-detail');

            Route::post('/blogs/blogs-create', [Livewire\OnlineStore\BlogPostCreate::class, 'store_BlogPost'])->name('create_blog_post');
             
            Route::get('/blogs/{id?}', [Livewire\OnlineStore\BlogPostDetail::class,'get_BlogPost_detail'])->name('blog-detail');

            Route::post('/blogs/update-blog', [Livewire\OnlineStore\BlogPostDetail::class, 'update_BlogPost_detail'])->name('update_blogpost_detail');

            Route::get('/blogs/delete-post/{id?}',[Livewire\OnlineStore\BlogPostDetail::class, 'delete_blog_post'])->name('delete_blogpost');
             
            Route::get('/faq', Livewire\OnlineStore\Faqpost::class)->name('faq');

            Route::get('/faq/new', Livewire\OnlineStore\FaqCreate::class)->name('faq-new');

            Route::post('/faq/create', [Livewire\OnlineStore\FaqCreate::class, 'store_FaqPost'])->name('store_Faq_create');

            Route::get('/faq/{id?}', [Livewire\OnlineStore\FaqDetail::class,'get_FAQ_detail'])->name('Faq_Detail');

            Route::post('/faq/update-faq', [Livewire\OnlineStore\FaqDetail::class, 'update_FAQ_detail'])->name('update_Faq_detail');

            Route::get('/faq/delete-faq/{id?}',[Livewire\OnlineStore\FaqDetail::class, 'delete_FAQ_post'])->name('delete_Faq');

            Route::get('/faq-category', Livewire\OnlineStore\FaqCategoryPost::class)->name('faq-category');

            Route::get('/faq-category/new', Livewire\OnlineStore\FaqCategoryCreate::class)->name('category-new');

            Route::post('/faq-category/create', [Livewire\OnlineStore\FaqCategoryCreate::class, 'store_FaqCategory'])->name('faq_category_create');

            Route::get('/faq-category/{id?}', [Livewire\OnlineStore\FaqCategoryDetail::class,'get_FaqCategory_Detail'])->name('FaqCategory_Detail');

            Route::post('/faq-category/update-category', [Livewire\OnlineStore\FaqCategoryDetail::class, 'update_FaqCategory_Detail'])->name('update_FaqCategory_detail');

            Route::get('/faq-category/delete-category/{id?}',[Livewire\OnlineStore\FaqCategoryDetail::class, 'delete_FaqCategory'])->name('delete_FaqCategory');

            //Order

            Route::get('/order', Livewire\Order\Order::class)->name('order-list');

            Route::get('/order/{id?}', Livewire\Order\OrderDetail::class)->name('order-detail');

            Route::get('/draft-orders', Livewire\Order\DraftOrder::class)->name('draft-orders');

            Route::get('/draft-orders/new', Livewire\Order\DraftOrderCreate::class)->name('draft-orders-create');

            Route::get('/draft-orders/detail', Livewire\Order\DraftOrdersDetail::class)->name('draft-orders-detail');

            Route::get('/checkouts', Livewire\Order\Checkout::class)->name('checkout-list');

            Route::get('/checkouts/detail', Livewire\Order\CheckoutDetail::class)->name('checkout-detail');

            

            Route::get('/detail/refund', Livewire\Order\Refund::class)->name('order-refund');



            //Discount

            Route::get('/discounts/new', Livewire\Discount\DiscountCreate::class)->name('discount-creates');

            Route::get('/discounts', Livewire\Discount\DiscountList::class)->name('discount-list');

            Route::get('/discounts/{id?}', Livewire\Discount\DiscountDetail::class)->name('discount-detail');

            //Slider 
            Route::get('/slider/new', Livewire\Slider\SliderCreate::class)->name('slider-creates');

            Route::get('/slider', Livewire\Slider\SliderList::class)->name('slider-list');

            Route::get('/slider/{id?}', Livewire\Slider\SliderDetail::class)->name('slider-detail');

            //AdminUsers 

            Route::get('/user/new', Livewire\AdminUser\UserCreate::class)->name('user-creates');

            Route::get('/User', Livewire\AdminUser\UserList::class)->name('user-list');

            Route::get('/user/{id?}', Livewire\AdminUser\UserDetail::class)->name('user-detail');



            //settings

            Route::get('/settings', Livewire\Admin\Settings::class)->name('settings');

            Route::get('/setting/generalss', Livewire\Setting\General::class)->name('general');

             Route::get('/setting/general', Livewire\Setting\GeneralSetting::class)->name('setting-general');

            Route::get('/setting/sender-email', Livewire\Setting\SenderEmail::class)->name('sender-email');

            Route::get('/email_templates/order_confirmation/edit', Livewire\Setting\OrderConfirmation::class)->name('order-confirmation');

            Route::post('/setting/update', [Livewire\Setting\GeneralSetting::class, 'updatestore'])->name('setting.update');

            Route::get('/setting/notifications', Livewire\Setting\Notifications::class)->name('notifications');
          
            Route::get('/setting/notifications/{id?}', Livewire\Setting\NotificationDetail::class)->name('notifications-detail');

            Route::get('/setting/languages', Livewire\Setting\Languages::class)->name('languages');

            Route::get('/setting/languages-transalate', Livewire\Setting\LanguagesTransalate::class)->name('languages-transalate');

            Route::get('/setting/payments', Livewire\Setting\Payments::class)->name('payments');

            Route::get('/setting/payment/payments-detail', Livewire\Setting\PaymentsDetail::class)->name('payments-detail');

            Route::get('/setting/payment/third-party-providers/detail', Livewire\Setting\ThirdPartyProvider::class)->name('third-party-providers');

            Route::get('/setting/gift-cards', Livewire\Setting\GiftCards::class)->name('gift-cardes-');

            Route::get('/setting/billing', Livewire\Setting\Billing::class)->name('billing');

            Route::get('/setting/checkout', Livewire\Setting\Checkout::class)->name('checkout');

            Route::get('/setting/files', Livewire\Setting\Files::class)->name('files');

            Route::get('/setting/legal', Livewire\Setting\Legal::class)->name('legal');

            Route::get('/settingold/shipping', Livewire\Setting\Shipping::class)->name('shipping');

            Route::get('/setting/profiles/profile-detail', Livewire\Setting\ProfileDetail::class)->name('profile-detail');

            Route::get('/setting/profile/profile-create', Livewire\Setting\ProfileCreate::class)->name('profile-create');

            Route::get('/setting/local-delivery-detail', Livewire\Setting\LocalDeliveryDetail::class)->name('local-delivery-detail');

            Route::get('/setting/tagsale', Livewire\Setting\Channels::class)->name('Channels');

            Route::get('/setting/tagsale/new', Livewire\Setting\TagsaleCreate::class)->name('tagsale-create');

            Route::get('/setting/tagsale/{id?}', Livewire\Setting\TagsaleDetail::class)->name('tagsale-detail');

            Route::post('/setting/tagsale/store', [Livewire\Setting\TagsaleCreate::class, 'storeTagsale'])->name('tagsale-store');

            Route::get('/setting/metafields', Livewire\Setting\Metafields::class)->name('metafields'); 

            Route::get('/setting/taxes', Livewire\Setting\Taxes::class)->name('taxes');

            Route::post('/setting/addtax', [Livewire\Setting\Plan::class, 'taxStore'])->name('addtax');

            Route::get('/setting/plan', Livewire\Setting\Plan::class)->name('plan');

            Route::get('/setting/locations', Livewire\Setting\Locations::class)->name('locations');

            Route::get('/setting/locations/add', Livewire\Setting\LocationCreate::class)->name('locations-create');

            Route::get('/setting/locations/{id?}', Livewire\Setting\LocationsDetail::class)->name('locations-detail');

            Route::get('/setting/account', Livewire\Setting\Account::class)->name('account');

           

            Route::get('/setting/payments/alternative-providers', Livewire\Setting\AlternativeProviders::class)->name('alternative-providers');

            Route::get('/setting/payments/alternative-providers/detail', Livewire\Setting\AlternativeProvidersDetail::class)->name('alternative-providers-detail');

            

            //Role Permission 

            Route::get('/role', Livewire\Role\ManageRole::class)->name('role');

            Route::get('/create-role', Livewire\Role\CreateRole::class)->name('create-role');

            Route::get('/update-role/detail', Livewire\Role\UpdateRole::class)->name('update-role');

            Route::get('/role-permission', Livewire\RolePermission\ManageRolePermission::class)->name('role-permission');

            Route::get('/create-role-permission', Livewire\RolePermission\CreateRolePermission::class)->name('create-role-permission');

            Route::get('/update-role-permission/{id?}', Livewire\RolePermission\UpdateRolePermission::class)->name('updaterolepermission');

            Route::post('/role_save', [Livewire\RolePermission\CreateRolePermission::class, 'save'])->name('role_save');

            

            //settings

            Route::get('/detail', function (){

                return view('livewire.admin.detail');

            });


            //customer import

            Route::post('import', [Livewire\Customer\ListCustomers::class, 'importCustomers'])->name('import');



            //Front Side

           

            Route::get('/add-to-cart', [Livewire\Front\ProductFrontDetail::class, 'addCart'])->name('add-to-cart');

            Route::get('/delete-cart-product', [Livewire\Header::class, 'DeleteCartProduct'])->name('delete-cart-product');

            Route::post('/add-order', [Livewire\Front\CheckoutInsertOrder::class, 'checkoutInsert'])->name('add-order');

            Route::get('/checkout', Livewire\StripePaymnetController::class)->name('front-checkout');

            Route::post('/checkout', [Livewire\StripePaymnetController::class, 'stripePost'])->name('stripe-post');

            Route::get('/thankyou', [Livewire\StripePaymnetController::class, 'thankYou'])->name('thankyou');

            Route::get('/thankyousuccess', Livewire\Front\Thankyou::class)->name('thankyou-redirect');



            /*Account*/

            Route::get('/account/favorites/detail', Livewire\Front\WishListDetail::class)->name('favorite-detail');

            

            Route::get('/product/review/{id?}', Livewire\Front\ProductReviews::class)->name('product-review');

            Route::post('/product/{slug?}', [Livewire\Front\ProductReviews::class, 'SaveReview'])->name('review-save');

            Route::get('/userdetail', Livewire\Front\Account::class)->name('front-user-detail');




             //Shipping

            Route::get('/shipping', function (){

                return view('livewire.admin.detail');

            });

            Route::get('setting/shipping', Livewire\Shipping\Shipping::class)->name('shipping-admin');

        });

  

    });

    Route::get('/collection/{slug?}', Livewire\Front\ProductCategory::class)->name('product-front-category');

    Route::get('/pages/{slug?}', Livewire\Front\Pages::class)->name('pages-front');



    Route::get('/product/{slug?}', Livewire\Front\ProductFrontDetail::class)->name('product-front-detail');

    Route::get('/varientData', [Livewire\Front\ProductFrontDetail::class, 'fetchPrice'])->name('varientData');



    Route::get('/forgot-password', [Livewire\Front\Auth\Login::class, 'forgotPassword'])->name('password.request.front');

    Route::get('/resend-mail', [Livewire\Front\Auth\Reverification::class, 'Resendmail'])->name('resendemail');

    Route::post('/forgot-password', [Livewire\Front\Auth\Login::class, 'sendPasswordResetLink'])

            ->name('password.email.front');

    Route::get('/reset-password', [Livewire\Front\Auth\Login::class, 'resetPassword'])

            ->name('password.reset.front');

    Route::post('/reset-password', [Livewire\Front\Auth\Login::class, 'storeNewPassword'])

            ->name('password.update.front');



    Route::get('/account/viewcart/detail', Livewire\Front\ViewCart::class)->name('view-cart');
    Route::get('/faqs', Livewire\Front\Faqs::class)->name('faqs');
    

});
});



