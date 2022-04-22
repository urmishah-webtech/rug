<div>
<x-admin-layout>
    <section class="full-width flex-wrap admin-body-width without-border-head">
        <article class="full-width">
            <div class="columns seven">
                <div class="page_header d-flex align-item-cente">
                    <a href="{{ route('settings') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                            </svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">General</h4>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width setting-general-sec" wire:ignore>
        <article class="full-width">
            <div class="columns ten">
                <article class="full-width add-customer-part bd_none">
                    <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Store details</h4>
                        <p>Shopify and your customers will use this information to contact you.</p>
                    </div>                
                    <div class="columns eight">
                        <div class="card">
                            <div class="row">
                                <label>Store name</label>
                                <input type="text" wire:model="getgeneral.store_name" value="delivery-boy-demo">
                            </div>
                            <article class="full-width">
                                <div class="columns six row field_style1 mb-2">
                                    <label>Store contact email</label>
                                    <input type="text" value="shopifydev@webkul.com">
                                    <p class="text-grey mb-0">We'll use this address if we need to contact you about your store.</p>
                                </div>
                                <div class="columns six row field_style1 mb-2">
                                    <label>Sender email</label>
                                    <input type="text" wire:model="getgeneral.contact_email" value="shopifydev@webkul.com">
                                    <p class="text-grey mb-0">Your customers will see this address if you email them.</p>
                                    <div class="general-alrt-msg">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zM9 9a1 1 0 0 0 2 0V7a1 1 0 1 0-2 0v2zm0 4a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"></path></svg>
                                        <p class="mb-0">Your email may not appear this way in customers' inboxes. <a class="blue-color td-underline" href="{{ route('sender-email') }}">Manage</a></p>
                                    </div>
                                </div>
                            </article>
                            <div class="row mb-0">
                                <div class="columns six row field_style1 mb-2">
                                    <label>Add logo for admin panel</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="logoUpload" accept=".png, .jpg, .jpeg" />
                                            <img src="{{ asset('assets/images/upload-icon.svg') }}">
                                            <button class="secondary">Add logo</button>
                                            <label for="logoUpload">or drop files to upload</label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="logoPreview" style="background-image: url();">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="columns six row field_style1 mb-2">
                                    <label>add favicon for admin panel</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="favUpload" accept=".png, .jpg, .jpeg" />
                                            <img src="{{ asset('assets/images/upload-icon.svg') }}">
                                            <button class="secondary">Add favicon</button>
                                            <label for="favUpload">or drop files to upload</label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="favPreview" style="background-image: url();">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row mb-0">
                                <label>Store industry</label>
                                <select>
                                    <option value="beauty">Beauty</option>
                                    <option value="clothing">Clothing</option>
                                    <option value="electronics">Electronics</option>
                                    <option value="furniture">Furniture</option>
                                    <option value="handcrafts">Handcrafts</option>
                                    <option value="jewelry">Jewelry</option>
                                    <option value="painting">Painting</option>
                                    <option value="photography">Photography</option>
                                    <option value="restaurants">Restaurants</option>
                                    <option value="groceries">Groceries</option>
                                    <option value="other_food_drink">Other food &amp; drink</option>
                                    <option value="sports">Sports</option>
                                    <option value="toys">Toys</option>
                                    <option value="services">Services</option>
                                    <option value="virtual_services">Virtual services</option>
                                    <option value="other">Other</option>
                                    <option value="do_not_know">I haven’t decided yet</option>
                                </select>
                            </div> -->
                        </div>
                    </div>
                </article>
                <article class="full-width add-customer-part">
                    <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Store address</h4>
                        <p>This address will appear on your invoices. You can edit the address used to calculate shipping rates in your <a class="blue-color td-underline" href="#">shipping settings.</a></p>
                        <p>Your primary business location could affect which apps can be used on your store. <a href="#" class="link-whit-arrow">Learn more about app compatibility <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                    </div>                
                    <div class="columns eight">
                        <div class="card">
                            <div class="row">
                                <label>Legal name of company</label>
                                <input type="text" value="Webkul">
                            </div>
                            <div class="row">
                                <label>Phone</label>
                                <input type="text" value="09999999999">
                            </div>
                            <div class="row">
                                <label>Address</label>
                                <input type="text" value="A-67">
                            </div>
                            <div class="row">
                                <label>Apartment, suite, etc.</label>
                                <input type="text" value="91-C">
                            </div>
                            <div class="row">
                                <label>City</label>
                                <input type="text" value="Noida">
                            </div>
                            <article class="full-width three-col-row">
                                <div class="columns six row field_style1 mb-2">
                                    <label>Country/region</label>
                                    <select>
                                        <option>india</option>
                                        <option>usa</option>
                                        <option>aus</option>
                                    </select>
                                </div>
                                <div class="columns six row field_style1 mb-2">
                                    <label>State</label>
                                    <select>
                                        <option>gujarat</option>
                                        <option>bihar</option>
                                        <option>asham</option>
                                    </select>
                                </div>
                                <div class="columns six row field_style1 mb-2">
                                    <label>PIN code</label>
                                    <input type="text" value="201301">
                                </div>
                            </article>
                        </div>
                    </div>
                </article>
                <article class="full-width add-customer-part">
                    <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Standards and formatss</h4>
                        <p>Standards and formats are used to calculate product prices, shipping weights, and order times.</p>
                    </div>                
                    <div class="columns eight">
                        <div class="card setting-standards-formats-card">
                            <div class="card-header">
                                <div class="row">
                                    <label>Time zone</label>
                                    <select>
                                        <option>(GMT-12:00) International Date Line West</option>
                                        <option>(GMT-12:00) International Date Line West</option>
                                    </select>
                                </div>
                                <div class="full-width">
                                    <div class="columns six row field_style1">
                                        <label>Unit system</label>
                                        <select>
                                            <option value="METRIC_SYSTEM">Metric system</option>
                                            <option value="IMPERIAL_SYSTEM">Imperial system</option>
                                        </select>
                                    </div>
                                    <div class="columns six row field_style1">
                                        <label>Default weight unit</label>
                                        <select>
                                            <option value="KILOGRAMS">Kilogram (kg)</option>
                                            <option value="GRAMS">Gram (g)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-middle">
                                <h3 class="fs-12 fw-6 mb-8">EDIT ORDER ID FORMAT (OPTIONAL)</h3>
                                <p class="text-grey">Order numbers start at #1001 by default. While you can’t change the order number itself, you can add a prefix or suffix to create IDs like "EN1001" or "1001-A."</p>
                                <div class="full-width">
                                    <div class="columns six row field_style1">
                                        <label>Prefix</label>
                                        <input type="text" value="#">
                                    </div>
                                    <div class="columns six row field_style1">
                                        <label>Suffix</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <p class="text-grey mt-8 mb-0">Your order ID will appear as #1001, #1002, #1003 ...</p>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="full-width add-customer-part">
                    <div class="columns four pt-3 pr-3">
                        <h4 class="fs-15 fw-5 mb-16">Store currency</h4>
                        <p>This is the currency your products are sold in. After your first sale, currency is locked in and can’t be changed. To change your payout currency, go to <a class="blue-color td-underline" href="#">payments settings.</a></p>
                    </div>                
                    <div class="columns eight">
                        <div class="card sg-store-currency-card">
                            <div class="card-header">
                                <div class="row">
                                    <label class="d-flex justify-content-space-between align-item-center">Store currency <a class="blue-color" href="#">Change formatting</a></label>
                                    <input type="text" value="delivery-boy-demo">
                                    <p class="text-grey mb-0">You’ve made your first sale, so you need to <a class="blue-color td-underline" href="#">contact support</a> if you want to change your currency.</p>
                                </div>
                            </div>
                            <div class="card-middle bd_none">
                                <h3 class="fw-6 fs-12 mb-8">CURRENCY FORMATTING</h3>
                                <p class="text-grey">Change how currencies are displayed on your store. amount and amount_no_decimals will be replaced with the price of your product.</p>
                                <div class="row">
                                    <label>HTML with currency</label>
                                    <input type="text" value="$ amount USD">
                                </div>
                                <div class="row">
                                    <label>HTML without currency</label>
                                    <input type="text" value="$ amount">
                                </div>
                                <div class="row">
                                    <label>Email with currency</label>
                                    <input type="text" value="$ amount USD">
                                </div>
                                <div class="row mb-0">
                                    <label>Email without currency</label>
                                    <input type="text" value="$ amount">
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width">
        <div class="page-bottom-btn flex-end">
            <button disabled="disabled" class="button">Save</button>
        </div>
    </section>
</x-admin-layout>
</div>