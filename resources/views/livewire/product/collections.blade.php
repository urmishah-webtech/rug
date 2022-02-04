<x-admin-layout>
    <section class="full-width flex-wrap admin-full-width inventory-heading">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center">
                    <h4 class="mb-0 fw-5">Collections</h4>
                </div>
                @if(user_permission('collections','create'))
                <a class="button green-btn" href="{{ route('collections-create') }}">Create collection</a>
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
                                <!-- Search Field -->
                                <div class="search-product-field">
                                    <input class="fs-13 placeholder_gray fw-4" type="search" name="search_products" wire:model="filter_customers" id="search_products" placeholder="Filter Customers">
                                </div>
                                <div class="form-field">
                                    <!-- Status -->
                                    <div class="fs-14 fw-6 status-dropdown dropdown-field">
                                        <label id="main_email_subscription_status" class="dropdown-label">
                                            Availability
                                            <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                                <path d="m5 8 5 5 5-5H5z"></path>
                                            </svg>
                                        </label>
                                        <ul class="filter_main_email_subscription_status filter-dropdown model">
                                            <li><input value="Unavailable on all channels" id="unavailable-all-channels" type="radio" class="change-filter"> <label for="unavailable-all-channels">Unavailable on all channels</label>
                                            </li>
                                            <li><input value="Pending Available on Online Store" id="available-online-store" type="radio" class="change-filter"> <label for="available-online-store">
                                                Available on Online Store</label>
                                            </li>
                                            <li><input value="Unavailable on Online Store" id="unavailable-online-store" type="radio" class="change-filter">
                                                <label for="unavailable-online-store">Unavailable on Online Store</label>
                                            </li>
                                            <li><input value="Available on Point of Sale" id="available-point-of-Sale" type="radio" class="change-filter">
                                                <label for="available-point-of-Sale">Available on Point of Sale</label>
                                            </li>
                                            <li><input value="Unavailable on Point of Sale" id="unavailable-point-of-Sale" type="radio" class="change-filter">
                                                <label for="unavailable-point-of-Sale">Unavailable on Point of Sale</label>
                                            </li>
                                            <li><a class="clear-btn" type="button" wire:click="removeFilter(0)">Clear</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Fullfillment Status -->
                                    <div class="fs-14 fw-6 fullfillment-dropdown dropdown-field">
                                        <label id="main_customer_account_status" class="dropdown-label">
                                            Type
                                            <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                                <path d="m5 8 5 5 5-5H5z"></path>
                                            </svg>
                                        </label>
                                        <ul class="filter_main_customer_account_status filter-dropdown model">
                                            <li><input value="Automated" id="automated" type="radio" class="change-filter">
                                                <label for="automated">Automated</label>
                                            </li>
                                            <li><input value="Manual" id="manual" type="radio" class="change-filter">
                                                <label for="manual">Manual</label>
                                            </li>
                                            <li><a class="clear-btn" type="button" wire:click="removeFilter(2)">Clear</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="saved-btn" wire:ignore="">
                                    <button class="secondary fw-6 disabled" id="save">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                            <path d="M5.2 18a.8.8 0 0 1-.792-.914l.743-5.203-2.917-2.917a.8.8 0 0 1 .434-1.355l4.398-.733 2.218-4.435a.8.8 0 0 1 1.435.008l2.123 4.361 4.498.801a.8.8 0 0 1 .425 1.353l-2.917 2.917.744 5.203a.8.8 0 0 1-1.154.828l-4.382-2.22-4.502 2.223A.792.792 0 0 1 5.2 18z"></path>
                                        </svg>
                                        Saved
                                    </button>
                                </div>
                                <div class="save-filters-btn" wire:ignore="">
                                    <button class="secondary fw-6" id="save_filter_btn">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                            <path d="m6.71 15.116 3.357-1.658.892.452 2.327 1.178-.56-3.912.708-.707 1.29-1.29-3.235-.576-.445-.915-1.059-2.176L8.4 8.683l-1.005.168-2.098.35 1.975 1.975-.141.99-.422 2.95zM5.2 18a.8.8 0 0 1-.792-.914l.743-5.203-2.917-2.917a.8.8 0 0 1 .434-1.355l4.398-.733 2.218-4.435a.8.8 0 0 1 1.435.008l2.123 4.361 4.498.801a.8.8 0 0 1 .425 1.353l-2.917 2.917.744 5.203a.8.8 0 0 1-1.154.828l-4.382-2.22-4.502 2.223A.792.792 0 0 1 5.2 18z"></path>
                                        </svg>
                                        Save filters
                                    </button>
                                </div>
                                <div class="sort-btn">
                                    <button class="secondary fw-6" id="sort">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                            <path d="M5.293 2.293a.997.997 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414L7 5.414V13a1 1 0 1 1-2 0V5.414L3.707 6.707a1 1 0 0 1-1.414-1.414l3-3zM13 7a1 1 0 0 1 2 0v7.585l1.293-1.292a.999.999 0 1 1 1.414 1.414l-3 3a.997.997 0 0 1-1.414 0l-3-3a.997.997 0 0 1 0-1.414.999.999 0 0 1 1.414 0L13 14.585V7z"></path>
                                        </svg>
                                        Sort
                                    </button>
                                    <ul class="filter_main_email_subscription_status filter-dropdown model">
                                        <label class="sort-dropdown">Sort by</label>
                                        <li>
                                            <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                            <label for="subscribed">Collection title A–Z</label>
                                        </li>
                                        <li>
                                            <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                            <label for="subscribed-pending">Collection title Z–A</label>
                                        </li>
                                        <li>
                                            <input value="Not subscribed" id="not-subscribed" type="radio" class="change-filter">
                                            <label for="not-subscribed">Updated (oldest first)</label>
                                        </li>
                                        <li>
                                            <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                            <label for="subscribed">Updated (newest first)</label>
                                        </li>
                                    </ul>
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
                                    <div class="row"><label><input type="checkbox" name="option6a"></label></div>
                                </th>
                                <th class="fw-6">
                                   <!--  <div class="select-customers">
                                        <span class="button-group">
                                            <button class="secondary all-customer-select">
                                                <input type="checkbox" name="option2a" checked="checked">
                                                <span>27 selected</span>
                                            </button>
                                            <button class="secondary select-customer-edit">
                                                Edit customers
                                            </button>
                                            <button class="secondary select-customer-more-actions">
                                                More actions
                                                <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg>
                                            </button>
                                        </span> -->
                                    </div>
                                </th>
                                <th>Title</th>
                                <th>Product conditions</th>
                            </tr>
                            @foreach($collection as $row)
                            <tr>
                                <td>
                                    <div class="row"><label><input type="checkbox" name="option6a"></label></div>
                                </td>
                               <a class="tc-black fw-6" href="{{ route('collections-detail', $row->seo_url) }}"> <td class="product-img">
                                    @if($row->image != "")
                                    <img src="{{ url('storage/'.$row->image) }}">
                                    @else
                                     <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M19 2.5A1.5 1.5 0 0 0 17.5 1h-15A1.5 1.5 0 0 0 1 2.5v15A1.5 1.5 0 0 0 2.5 19H10v-2H3.497c-.41 0-.64-.46-.4-.79l3.553-4.051c.19-.21.52-.21.72-.01L9 14l3.06-4.781a.5.5 0 0 1 .84.02l.72 1.251A5.98 5.98 0 0 1 16 10h3V2.5zm-11.5 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm12.207 10.793A1 1 0 0 0 19 15h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 0 0 .707-1.707z"></path></svg>
                                    @endif
                                </td></a>
                                <td class="product-table-item">
                                    @if(user_permission('collections','update'))
                                        <a class="tc-black fw-6" href="{{ route('collections-detail', $row->uuid) }}">{{$row->title}}</a>
                                    @else
                                        <p>{{$row->title}}</p>
                                    @endif
                                </td>
                                <td class="type-table-item"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>     
</x-admin-layout>