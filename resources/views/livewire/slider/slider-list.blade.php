<div>
    <x-admin-layout>
    <section class="full-width flex-wrap admin-full-width inventory-heading">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center">
                    <h4 class="mb-0 fw-5">Slider</h4>
                </div>
                @if(user_permission('slider','create'))
                    <a class="button green-btn" href="{{ route('discount-creates') }}">Create Slider</a>
                @endif
            </div>
        </article>
    </section> 
    <section class="full-width flex-wrap admin-full-width list-customers bd_none">
        <div class="columns product_listing_columns has-sections card ml-0">
            <div class="inventory-tab">
                <ul class="tabs">
                    <li class="active tab all" data-toggle="tab"><a href="#">All</a></li>
                </ul>
            </div>
            <div class="card-section tab_content  active" id="all_customers">
                <div class="order-form">
                    <article class="full-width">
                        <div class="columns" wire:ignore="">
                            <div class="input-group">
                                <div class="dropdown-field sort-btn ml-0 mr-04">
                                    <label id="main_tagged_with" class="dropdown-label" onclick="openOption('main_tagged_with')">
                                        Filter
                                        <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                            <path d="m5 8 5 5 5-5H5z"></path>
                                        </svg>
                                    </label>
                                </div>
                                <!-- Search Field -->
                                <div class="search-product-field">
                                    <input class="fs-13 placeholder_gray fw-4" type="search" name="search_products" wire:model="filter_customers" id="search_products" placeholder="Filter Slider">
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="table-loader">
                    <div class="loading-overlay" wire:loading.flex="">
                        <div class="page-loading"></div>
                    </div>
                    <span>
                    </span>
                    <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing collections-sec">
                        <tbody>
                            <tr>
                                <th>
                                    <div class="row all-select-checkbox"><label><input type="checkbox" class="checked_all" name="customer_all"></label></div>
                                </th>
                                <th class="fw-6">
                                    <span class="all-customer-list pl-3">
                                        Showing 1 Slider code
                                    </span>
                                    <div class="select-customers" style="display: none;">
                                        <span class="button-group product-more-action">
                                            <button class="secondary all-customer-select">
                                                 <input type="checkbox" class="checked_all_clone" name="customer_all">
                                                <span><span class="selected_count">0</span> selected</span>
                                            </button>
                                            <button class="secondary select-customer-more-actions" onclick="openOption('email_subscription_status')">
                                                Actions
                                                <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg>
                                            </button>
                                            <ul class="filter_email_subscription_status filter-dropdown more-action-dropdown" style="list-style-type: none" wire:ignore.self="">
                                                <li>
                                                    <button class="link">Enable Slider codes</button>
                                                </li>
                                                <li>
                                                    <button class="link">Disable Slider codes</button>
                                                </li>
                                                <li>
                                                    <button class="link">Delete Slider codes</button>
                                                </li>
                                                <li>
                                                    <button class="link">Delete products</button>
                                                </li>
                                            </ul>
                                        </span>
                                    </div>
                                </th>
                                <th></th>
                                <th></th>
                                <th class="ta-right">
                                    <div class="inventory-shortby one-bg border-every-row d-inline-block mr-3">
                                        <div class="sort-by-field">
                                            <label>Sort by</label>
                                            <select class="resizeselect" style="width: 180px;">
                                                    <option value="id desc">Last created</option>
                                                    <option value="title asc">Slider code (A-Z)</option>
                                                    <option value="title desc">Slider code (Z-A)</option>
                                                    <option value="starts_at asc">Start date (ascending)</option>
                                                    <option value="starts_at desc">Start date (descending)</option>
                                                    <option value="ends_at asc">End date (ascending)</option>
                                                    <option value="ends_at desc">End date (descending)</option>
                                            </select>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                          
                            <tr>
                                <td>
                                    <div class="row"><label><input type="checkbox" class="checkbox" name="selectedproducts" value="117" wire:model.lazy="selectedproducts"></label></div>
                                </td>
                                <td class="product-table-item">
                                   
                                </td>
                                <td >
                                    <p class="tag green order-filed"> Active </p> 
                                </td>
                                <td class="ta-right">0/10 used</td>
                                <td class="ta-right">
                                    <span class="text-grey  pr-3">From </span>
                                </td>
                            </tr>
                           

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>     
</x-admin-layout>
</div>
