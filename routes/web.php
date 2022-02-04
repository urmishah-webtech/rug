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

Route::middleware(['checkRole'])->group(function () {


    // Route::get('/signin', [Livewire\Admin\Dashboard::class, 'checkLogin'])->name('admin.login');

    // Route::get('/login', function (){

    //     return view('livewire.admin.login');

    // })->name('admin.login');


    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::get('/', Livewire\Admin\Dashboard::class)->name('home');
        Route::get('/dashboard', Livewire\Dashboard::class)->name('dashboard');



 

        Route::middleware(['guest'])->group(function () {

            Route::get('/admin', Livewire\Admin\Dashboard::class)->name('admin-dashboard');

            //users

            Route::get('/admin/users', Livewire\User\Users::class)->name('users');

            //customer

            Route::get('/admin/customers', Livewire\Customer\ListCustomers::class)->name('customers');

            Route::get('/admin/customers/new', Livewire\Customer\Create::class)->name('customer.create');

            Route::post('/admin/customers/store', [Livewire\Customer\Create::class, 'storeCustomer'])->name('customer.store');

            Route::get('/admin/customers/{id?}', Livewire\Customer\Details::class)->name('customer.details');





            Route::POST('/admin/Edit-Customer/{id}', 'App\Http\Livewire\Customer\Customers@CustomerEdit')->name('customers-update');



            Route::get('/admin/customers-detail/{id}', 'App\Http\Livewire\Customer\Customers@CustomerDetail')->name('menu-list-detail');

            

            Route::POST('/admin/Add-Address', 'App\Http\Livewire\Customer\Customers@CustomerAddressAdd')->name('customers-add');

            

           

            //products

            Route::get('/admin/products', Livewire\Product\Products::class)->name('products');

            

            

            Route::get('/admin/products/new', Livewire\Product\ProductCreate::class)->name('products.create');

            Route::post('/admin/products/store', [Livewire\Product\ProductCreate::class, 'storeProduct'])->name('products-store');
            
            Route::post('/admin/products/update', [Livewire\Product\Detail::class, 'storeProductvarient'])->name('products-varient-store');

           

            Route::post('/admin/variant/store', [Livewire\Product\Variant::class, 'Addvariant'])->name('variant-store');

            Route::get('/admin/products/{id?}', Livewire\Product\Detail::class)->name('product-detail');

            Route::get('/admin/variant', Livewire\Product\Variant::class)->name('variant');

            Route::get('/admin/products/{id?}/variant/new', Livewire\Product\Variant::class)->name('variant-new');

            Route::get('/admin/products/variant/{id?}', Livewire\Product\VariantDetail::class)->name('variant-detail');

            Route::get('/admin/inventory', Livewire\Product\Inventory::class)->name('inventory');

            Route::resource('/updatestock', Livewire\Product\Inventory::class);



            Route::get('/admin/transfers/new', Livewire\Product\TransfersCreate::class)->name('transfers-create');

            Route::get('/admin/transfers', Livewire\Product\Transfers::class)->name('transfers');

            Route::get('/admin/transfers/detail', Livewire\Product\Transfersdetail::class)->name('transfers-detail');

            Route::get('/admin/collections', Livewire\Product\Collections::class)->name('collections');

            Route::get('/admin/collections/new', Livewire\Product\Collectionscreate::class)->name('collections-create');

            Route::post('/admin/collections/store', [Livewire\Product\Collectionscreate::class, 'collectionCreate'])->name('collections-store-create');

            

            Route::get('/submitUrl', Livewire\Product\Collectionsdetail::class, 'store')->name('search-product');



            Route::get('/admin/collections/{id?}', Livewire\Product\Collectionsdetail::class)->name('collections-detail');

            Route::get('/admin/gift-cards', Livewire\Product\GiftCards::class)->name('gift-cards');

            Route::get('/admin/gift-cards/new', Livewire\Product\GiftCardscreate::class)->name('gift-cards-create');

            Route::get('/admin/gift-cards/new-issue-gift-card', Livewire\Product\IssuegiftCardscreate::class)->name('gift-cards-issue-gift-card-create');

            //menu

             Route::get('/admin/menu-list', Livewire\Menu\MenuList::class)->name('menu-list');

            Route::get('/admin/menu', Livewire\Menu\Menus::class)->name('menu');

            Route::get('/admin/menu?menu={id}', Livewire\Menu\Menus::class)->name('menu-item');

            Route::post('/admin/addCustomMenu','App\Http\Livewire\Menu\Menus@addCustomMenu')->name('addCustomMenu');

            Route::get('/admin/add-main-menu', [Livewire\Menu\Menus::class, 'addMainmenu'])->name('add-main-menu');

            Route::get('/admin/add-product-menu', [Livewire\Menu\Menus::class, 'addProductmenu'])->name('add-product-menu');

            Route::get('/admin/add-collection-menu', [Livewire\Menu\Menus::class, 'addCollectionmenu'])->name('add-collection-menu');



            //Online-Store

            Route::get('/admin/pages', Livewire\OnlineStore\Pages::class)->name('pages-list');

            Route::get('/admin/pages/new', Livewire\OnlineStore\PagesCreate::class)->name('pages-create');

            Route::post('/admin/pages/store', [Livewire\OnlineStore\PagesCreate::class, 'storePages'])->name('pages-store');

            Route::get('/admin/pages/{id?}', Livewire\OnlineStore\PagesDetail::class)->name('pages-detail');

            Route::get('/admin/articles', Livewire\OnlineStore\Articles::class)->name('articles');

            Route::get('/admin/themes', Livewire\OnlineStore\Themes::class)->name('themes');

            Route::get('/admin/menus', Livewire\OnlineStore\Menus::class)->name('menus');

            Route::get('/admin/menus?menu={id}', Livewire\OnlineStore\MenuDetail::class)->name('menus-detail');

            Route::get('/admin/online_store/preferences', Livewire\OnlineStore\Preferences::class)->name('preferences');

            Route::get('/admin/settings/domains', Livewire\OnlineStore\Domains::class)->name('domains');

            Route::get('/admin/blogs', Livewire\OnlineStore\BlogPost::class)->name('blogs');

            Route::get('/admin/blogs/new', Livewire\OnlineStore\BlogPostCreate::class)->name('blogs-new');

            Route::get('/admin/blogs/detail', Livewire\OnlineStore\BlogPostDetail::class)->name('blogs-detail');

            Route::post('/admin/blogs/blogs-create', [Livewire\OnlineStore\BlogPostCreate::class, 'store_BlogPost'])->name('create_blog_post');
             
            Route::get('/admin/blogs/{id?}', [Livewire\OnlineStore\BlogPostDetail::class,'get_BlogPost_detail'])->name('blog-detail');

            Route::post('/admin/blogs/update-blog', [Livewire\OnlineStore\BlogPostDetail::class, 'update_BlogPost_detail'])->name('update_blogpost_detail');

            Route::get('/admin/blogs/delete-post/{id?}',[Livewire\OnlineStore\BlogPostDetail::class, 'delete_blog_post'])->name('delete_blogpost');
             
            //Order

            Route::get('/admin/order', Livewire\Order\Order::class)->name('order-list');

            Route::get('/admin/order/{id?}', Livewire\Order\OrderDetail::class)->name('order-detail');

            Route::get('/admin/draft-orders', Livewire\Order\DraftOrder::class)->name('draft-orders');

            Route::get('/admin/draft-orders/new', Livewire\Order\DraftOrderCreate::class)->name('draft-orders-create');

            Route::get('/admin/draft-orders/detail', Livewire\Order\DraftOrdersDetail::class)->name('draft-orders-detail');

            Route::get('/admin/checkouts', Livewire\Order\Checkout::class)->name('checkout-list');

            Route::get('/admin/checkouts/detail', Livewire\Order\CheckoutDetail::class)->name('checkout-detail');

            

            Route::get('/admin/detail/refund', Livewire\Order\Refund::class)->name('order-refund');



            //Discount

            Route::get('/admin/discounts/new', Livewire\Discount\DiscountCreate::class)->name('discount-creates');

            Route::get('/admin/discounts', Livewire\Discount\DiscountList::class)->name('discount-list');

            Route::get('/admin/discounts/{id?}', Livewire\Discount\DiscountDetail::class)->name('discount-detail');

            //Slider 
            Route::get('/admin/slider/new', Livewire\Slider\SliderCreate::class)->name('slider-creates');

            Route::get('/admin/slider', Livewire\Slider\SliderList::class)->name('slider-list');

            Route::get('/admin/slider/{id?}', Livewire\Slider\SliderDetail::class)->name('slider-detail');

            //AdminUsers 

            Route::get('/admin/user/new', Livewire\AdminUser\UserCreate::class)->name('user-creates');

            Route::get('/admin/User', Livewire\AdminUser\UserList::class)->name('user-list');

            Route::get('/admin/user/{id?}', Livewire\AdminUser\UserDetail::class)->name('user-detail');



            //settings

            Route::get('/admin/settings', Livewire\Admin\Settings::class)->name('settings');

            Route::get('/admin/setting/generalss', Livewire\Setting\General::class)->name('general');

             Route::get('/admin/setting/general', Livewire\Setting\GeneralSetting::class)->name('setting-general');

            Route::get('/admin/setting/sender-email', Livewire\Setting\SenderEmail::class)->name('sender-email');

            Route::get('/admin/email_templates/order_confirmation/edit', Livewire\Setting\OrderConfirmation::class)->name('order-confirmation');

            Route::post('/admin/setting/update', [Livewire\Setting\GeneralSetting::class, 'updatestore'])->name('setting.update');

            Route::get('/admin/setting/notifications', Livewire\Setting\Notifications::class)->name('notifications');
          
            Route::get('/admin/setting/notifications/{id?}', Livewire\Setting\NotificationDetail::class)->name('notifications-detail');

            Route::get('/admin/setting/languages', Livewire\Setting\Languages::class)->name('languages');

            Route::get('/admin/setting/languages-transalate', Livewire\Setting\LanguagesTransalate::class)->name('languages-transalate');

            Route::get('/admin/setting/payments', Livewire\Setting\Payments::class)->name('payments');

            Route::get('/admin/setting/payment/payments-detail', Livewire\Setting\PaymentsDetail::class)->name('payments-detail');

            Route::get('/admin/setting/payment/third-party-providers/detail', Livewire\Setting\ThirdPartyProvider::class)->name('third-party-providers');

            Route::get('/admin/setting/gift-cards', Livewire\Setting\GiftCards::class)->name('gift-cardes-');

            Route::get('/admin/setting/billing', Livewire\Setting\Billing::class)->name('billing');

            Route::get('/admin/setting/checkout', Livewire\Setting\Checkout::class)->name('checkout');

            Route::get('/admin/setting/files', Livewire\Setting\Files::class)->name('files');

            Route::get('/admin/setting/legal', Livewire\Setting\Legal::class)->name('legal');

            Route::get('/admin/setting/shipping', Livewire\Setting\Shipping::class)->name('shipping');

            Route::get('/admin/setting/profiles/profile-detail', Livewire\Setting\ProfileDetail::class)->name('profile-detail');

            Route::get('/admin/setting/profile/profile-create', Livewire\Setting\ProfileCreate::class)->name('profile-create');

            Route::get('/admin/setting/local-delivery-detail', Livewire\Setting\LocalDeliveryDetail::class)->name('local-delivery-detail');

            Route::get('/admin/setting/tagsale', Livewire\Setting\Channels::class)->name('Channels');

            Route::get('/admin/setting/tagsale/new', Livewire\Setting\TagsaleCreate::class)->name('tagsale-create');

            Route::get('/admin/setting/tagsale/{id?}', Livewire\Setting\TagsaleDetail::class)->name('tagsale-detail');

            Route::post('/admin/setting/tagsale/store', [Livewire\Setting\TagsaleCreate::class, 'storeTagsale'])->name('tagsale-store');

            Route::get('/admin/setting/metafields', Livewire\Setting\Metafields::class)->name('metafields'); 

            Route::get('/admin/setting/taxes', Livewire\Setting\Taxes::class)->name('taxes');

            Route::post('/admin/setting/addtax', [Livewire\Setting\Plan::class, 'taxStore'])->name('addtax');

            Route::get('/admin/setting/plan', Livewire\Setting\Plan::class)->name('plan');

            Route::get('/admin/setting/locations', Livewire\Setting\Locations::class)->name('locations');

            Route::get('/admin/setting/locations/add', Livewire\Setting\LocationCreate::class)->name('locations-create');

            Route::get('/admin/setting/locations/{id?}', Livewire\Setting\LocationsDetail::class)->name('locations-detail');

            Route::get('/admin/setting/account', Livewire\Setting\Account::class)->name('account');

           

            Route::get('/admin/setting/payments/alternative-providers', Livewire\Setting\AlternativeProviders::class)->name('alternative-providers');

            Route::get('/admin/setting/payments/alternative-providers/detail', Livewire\Setting\AlternativeProvidersDetail::class)->name('alternative-providers-detail');

            

            //Role Permission 

            Route::get('/admin/role', Livewire\Role\ManageRole::class)->name('role');

            Route::get('/admin/create-role', Livewire\Role\CreateRole::class)->name('create-role');

            Route::get('/admin/update-role/detail', Livewire\Role\UpdateRole::class)->name('update-role');

            Route::get('/admin/role-permission', Livewire\RolePermission\ManageRolePermission::class)->name('role-permission');

            Route::get('/admin/create-role-permission', Livewire\RolePermission\CreateRolePermission::class)->name('create-role-permission');

            Route::get('/admin/update-role-permission/{id?}', Livewire\RolePermission\UpdateRolePermission::class)->name('updaterolepermission');

            Route::post('/admin/role_save', [Livewire\RolePermission\CreateRolePermission::class, 'save'])->name('role_save');

            

            //settings

            Route::get('/admin/detail', function (){

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



