<div>
<x-admin-layout>
    <div wire:key="alert">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
@php $symbol = CurrencySymbol(); @endphp
<section class="full-width flex-wrap admin-full-width list-customers">

    <div class="page_header d-flex align-item-center justify-content-space-between full-width mb-2">

        <h4 class="mb-0 fw-5">Customers</h4>
        <div class="header-btn-group">
         <!--    <a class="link" data-toggle="modal" data-target="#export" >Export</a>
            <a class="link" data-toggle="modal" data-target="#import">Import customers</a> -->
            @if(user_permission('customers','create'))
            <a class="button green-btn" href="{{ route('customer.create') }}">Add customer</a>
            @endif
        </div>
    </div>



    <div class="columns product_listing_columns has-sections card ml-0">

        <ul class="tabs">

            <li class="active tab all" data-toggle="tab" wire:click="removeAllFilters()" wire:ignore.self><a href="#">All</a>

            </li>

           <!--  @foreach($filter_tabs as $tab)

                <li class="tab titled" wire:click="activeTab({{$tab}})" data-toggle="tab" wire:ignore.self><a

                            href="#">{{$tab->name}}</a></li>

            @endforeach -->

            <li id="untitled" class="tab" data-toggle="tab" wire:ignore.self><a href="#">Untitled</a></li>





        </ul>

        <div class="card-section tab_content  active" id="all_customers">

            <!-- Form -->

            <div class="order-form">

                <article class="full-width">

                    <div class="columns" wire:ignore>

                        <div class="input-group">

                            <!-- Search Field -->

                            <div class="search-product-field">

                                <input class="fs-13 placeholder_gray fw-4" type="search" name="search_products"

                                       wire:model="filter_customers"

                                       id="search_products" placeholder="Filter Customers">

                            </div>

                           <?php /* <div class="form-field">



                                <!-- Status -->

                                <!-- <div class="fs-14 fw-6 status-dropdown dropdown-field">

                                    <label id="main_email_subscription_status" class="dropdown-label"

                                           onclick="openOption('main_email_subscription_status')">Email subscription

                                        status

                                        <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false"

                                             aria-hidden="true">

                                            <path d="m5 8 5 5 5-5H5z"></path>

                                        </svg>

                                    </label>

                                    <ul class="filter_main_email_subscription_status filter-dropdown model">

                                        <li><input wire:model="email_status" value="Subscribed" id="subscribed"

                                                   type="radio" class="change-filter"> <label for="subscribed">Subscribed</label>

                                        </li>

                                        <li><input wire:model="email_status" value="Subscription Pending Confirmation"

                                                   id="subscribed-pending" type="radio" class="change-filter"> <label

                                                    for="subscribed-pending">Pending

                                                confirmation</label></li>

                                        <li><input wire:model="email_status" value="Not subscribed" id="not-subscribed"

                                                   type="radio" class="change-filter">

                                            <label for="not-subscribed">Not Subscribed</label></li>

                                        <li><a class="clear-btn" type="button" wire:click="removeFilter(0)">Clear</a>

                                        </li>

                                    </ul>

                                </div> -->

                                <!-- Payment Status -->

                                <!-- <div class="payment-dropdown dropdown-field">

                                    <label id="main_tagged_with" class="dropdown-label"

                                           onclick="openOption('main_tagged_with')">Tagged With

                                        <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false"

                                             aria-hidden="true">

                                            <path d="m5 8 5 5 5-5H5z"></path>

                                        </svg>

                                    </label>

                                    <ul class="filter_main_tagged_with filter-dropdown model">

                                        <li><input type="text" wire:model="tagged_with"

                                                   class="change-tagged-with-filter"></li>

                                        <li><a class="clear-btn" type="button" wire:click="removeFilter(1)">Clear</a>

                                        </li>

                                    </ul>

                                </div> -->

                                <!-- Fullfillment Status -->

                                <div class="fs-14 fw-6 fullfillment-dropdown dropdown-field">

                                    <label id="main_customer_account_status" class="dropdown-label"

                                           onclick="openOption('main_customer_account_status')">Customer account status

                                        <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false"

                                             aria-hidden="true">

                                            <path d="m5 8 5 5 5-5H5z"></path>

                                        </svg>

                                    </label>

                                    <ul class="filter_main_customer_account_status filter-dropdown model">

                                        <li><input wire:model="account_status" value="Active account"

                                                   id="active-account" type="radio" class="change-filter">

                                            <label for="active-account">Verified account</label></li>

                                        <li><input wire:model="account_status" value="Disabled account"

                                                   id="disabled-account" type="radio" class="change-filter"> <label

                                                    for="disabled-account">Unverified account</label></li>

                                       <!--  <li><input wire:model="account_status" value="Invited to create account"

                                                   id="invited-create account" type="radio" class="change-filter">

                                            <label for="invited-create account">Invited

                                                to create account</label></li>

                                        <li><input wire:model="account_status" value="Declined account invitation"

                                                   id="declined-account-invitation" type="radio" class="change-filter">

                                            <label for="declined-account-invitation">Declined account invitation</label>

                                        </li> -->

                                        <li><a class="clear-btn" type="button" wire:click="removeFilter(2)">Clear</a>

                                        </li>

                                    </ul>

                                </div>

                                <button onclick="openOption('more_filters')" id="more_filters"

                                        class="secondary fw-6 more-filters-btn">

                                    More Filters

                                </button>

                            </div>

                            <div class="saved-btn" wire:ignore>

                                <button class="secondary fw-6 disabled" id="save" onclick="openOption('save')">

                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false"

                                         aria-hidden="true">

                                        <path d="M5.2 18a.8.8 0 0 1-.792-.914l.743-5.203-2.917-2.917a.8.8 0 0 1 .434-1.355l4.398-.733 2.218-4.435a.8.8 0 0 1 1.435.008l2.123 4.361 4.498.801a.8.8 0 0 1 .425 1.353l-2.917 2.917.744 5.203a.8.8 0 0 1-1.154.828l-4.382-2.22-4.502 2.223A.792.792 0 0 1 5.2 18z"></path>

                                    </svg>

                                    Saved

                                </button>

                            </div>

                            <div class="save-filters-btn" wire:ignore>

                                <button class="secondary fw-6" id="save_filter_btn"

                                        onclick="openOption('save_filters_btn')" wire:click="cancelFilter()">

                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false"

                                         aria-hidden="true">

                                        <path d="m6.71 15.116 3.357-1.658.892.452 2.327 1.178-.56-3.912.708-.707 1.29-1.29-3.235-.576-.445-.915-1.059-2.176L8.4 8.683l-1.005.168-2.098.35 1.975 1.975-.141.99-.422 2.95zM5.2 18a.8.8 0 0 1-.792-.914l.743-5.203-2.917-2.917a.8.8 0 0 1 .434-1.355l4.398-.733 2.218-4.435a.8.8 0 0 1 1.435.008l2.123 4.361 4.498.801a.8.8 0 0 1 .425 1.353l-2.917 2.917.744 5.203a.8.8 0 0 1-1.154.828l-4.382-2.22-4.502 2.223A.792.792 0 0 1 5.2 18z"></path>

                                    </svg>

                                    Save filters

                                </button>

                            </div>  */ ?>

                        </div>

                    </div>

                </article>

                @foreach($filter as $key=>$value)

                    <span class="tag grey mt-1 mb-1 tags select-value-tag" wire:ignore.self>{{$value}} <a

                                wire:click="removeFilter({{$key}})"

                                class="close"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false"

                                                   aria-hidden="true"><path

                                        d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path></svg></a></span>

                @endforeach

            </div>

            <!-- Order Table -->

            <div class="table-loader">

            <div class="loading-overlay" wire:loading.flex>

                <div class="page-loading"></div>

            </div>

            <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th">

                <tr>

                    <th>

                        <div class="row all-select-checkbox"><label><input type="checkbox" class="checked_all" name="customer_all"></label></div>

                    </th>

                    <th class="fw-6">
                        <span class="all-customer-list">
                            Showing {{($users->currentPage()-1) * $users->perPage()+(count($users) ? 1:0)}} - {{($users->currentPage()-1)*$users->perPage()+count($users)}} of {{count($customers)}} customers
                        </span>
                        <div class="select-customers" style="display:none">
                            <span class="button-group">
                                <button class="secondary all-customer-select">
                                     <input type="checkbox" class="checked_all_clone" name="customer_all">
                                    <span><span class="selected_count"></span> selected</span>
                                </button>
                                <button class="secondary select-customer-edit">
                                    Edit customers
                                </button>
                                <button class="secondary select-customer-more-actions">
                                    More actions
                                    <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg>
                                </button>
                            </span>
                        </div>
                    </th>

                    <th class="order-filed"></th>

                    <th class="order-filed"></th>

                    <th class="order-filed"></th>

                    <!-- <th class="sort-by-field">

                        <label>Sort by</label>

                        <select class="resizeselect" wire:ignore wire:model="sort_by">

                            <option value="UPDATED_AT+desc">Last update (newest first)</option>

                            <option value="UPDATED_AT+asc">Last update (oldest first)</option>

                            <option value="TOTAL_SPENT+desc">Amount spent (high to low)</option>

                            <option value="TOTAL_SPENT+asc">Amount spent (low to high)</option>

                            <option value="ORDERS_COUNT+desc">Total orders (high to low)</option>

                            <option value="ORDERS_COUNT+asc">Total orders (low to high)</option>

                            <option value="LAST_ORDER_DATE+desc">Last order date (newest first)</option>

                            <option value="LAST_ORDER_DATE+asc">Last order date (oldest first)</option>

                            <option value="CREATED_AT+desc">Date added as a customer (newest first)</option>

                            <option value="CREATED_AT+asc">Date added as a customer (oldest first)</option>

                        </select>

                    </th> -->

                </tr>
                <tr>
                    <th></th>
                    <th class="fw-6">
                        Customers
                    </th>
                  <!--   <th class="fw-6">Status</th> -->
                    <th class="fw-6">Date</th>
                    <th class="fw-6">Order</th>
                    <th class="fw-6 pr-3 ta-right">Amount</th>
                </tr>
                <span>@foreach($users as $customer)


                    @if(
                    (!empty($more_than_orders) && $customer->orders->count() > $more_than_orders) || 
                    (!empty($less_than_orders) && $customer->orders->count() < $less_than_orders) || 
                    (!empty($exact_orders) && $customer->orders->count() == $exact_orders) || 
                    (empty($more_than_orders) && empty($less_than_orders) && empty($exact_orders) && $customer->orders->count() != -1) 
                    
                    )

                    @if(
                        (!empty($more_than_amount) && $customer->orders->sum('netamout') > $more_than_amount) || 
                    (!empty($less_than_amount) && $customer->orders->sum('netamout') < $less_than_amount) || 
                    (!empty($exact_amount) && $customer->orders->sum('netamout') == $exact_amount) || 
                    (empty($more_than_amount) && empty($less_than_amount) && empty($exact_amount) && $customer->orders->sum('netamout') != -1)
                    )

                        <tr>

                            <td>

                                <div class="row"><label><input type="checkbox" class="checkbox" name="customer" value="{{$customer->id}}"></label></div>


                            </td>

                             <td>

                                @if(user_permission('customers','update'))
                                <a href="{{route('customer.details', $customer->uuid)}}"
                                   class="tc-black fw-6">
                                   {{$customer->first_name}} {{$customer->last_name}}
                                </a>
                                @else
                                    <p>{{$customer->first_name}} {{$customer->last_name}}</p>
                                @endif

                                   <br>{{$customer->uuid}}
                                <br>@if(!empty($customer->address) && count($customer->address) > 0){{$customer->address[0]->city}}, {{$customer->address[0]->country}}@endif
                                <br>@if(!empty($customer->detail->note))<span class="table-note"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M11.379 0a1.5 1.5 0 0 1 1.06.44l4.122 4.12A1.5 1.5 0 0 1 17 5.622V18.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 3 18.5v-17A1.5 1.5 0 0 1 4.5 0h6.879zM6 5h4v2H6V5zm8 4v2H6V9h8zm-8 6v-2h7v2H6z"></path></svg>{{$customer->detail->note}}</span>@endif
                            </td>
                            <td>{{ $customer->created_at->format('d-m-Y'); }}</td>

                        <!--     <td class="subscribed-label">
                                @if(!empty($customer->email_verified_at))
                                    <p class="tag green order-filed"> Verified </p>
                                @else
                                     <p class="tag green order-filed"> Unverified </p>
                                @endif</td> -->

                            <?php $itemcount = 0; $i = 1; ?>

                            @foreach($order_item as $item)
                                @if($item->user_id == $customer->id)
                                    <?php $itemcount = $i++;  ?>
                                @endif
                            @endforeach
                            <td><p class="order-filed">{{$itemcount}} orders</p></td>

                            <?php $amount_spent = 0; ?>
                            @foreach($orderget as $res)
                                @if($res->user_id == $customer->id)
                                    <?php $amount_spent += $res['netamout'];  ?>
                                @endif
                            @endforeach
                            <td><p class="spent-filed">{{$symbol['currency']}}{{number_format($amount_spent,2,'.',',')}} spent</p></td>

                        </tr>
                    @endif
                    @endif
                    @endforeach</span>

            </table>
            @if((empty($more_than_orders) && empty($less_than_orders) && empty($exact_orders)))

            <div class="pd-pagination-sec">
                <select wire:model="perPage">
                    <option value="9999999">All</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
                <div class="pagination">

                 {{$users->links() }}

                </div>
            </div>
            @endif
            </div>

        </div>

    </div>

    <div class="filter_more_filters filter-sidebar" id="filter_more_filters" style="text-align: left;display: none;" wire:ignore.self>

        <div class="filter-inner">

            <div class="sidebar-header">

                <h2>More filters</h2>

                <button class="sidebar-close">

                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">

                        <path d="M11.414 10l4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path>

                    </svg>

                </button>

            </div>

            <div class="sidebar-body">

                <div class="filters-item">

                    <label id="email_subscription_status" onclick="openOption('email_subscription_status')">Email

                        subscription status

                        <svg viewBox="0 0 20 20" class="close Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path>

                        </svg>

                        <svg viewBox="0 0 20 20" class="open Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M15 13a.997.997 0 0 1-.707-.293L10 8.414l-4.293 4.293a.999.999 0 1 1-1.414-1.414l5-5a.999.999 0 0 1 1.414 0l5 5A.999.999 0 0 1 15 13z"></path>

                        </svg>

                        <span class="select-label">

                        @if(!empty($filter) && isset($filter[0]))

                                <span class="tag grey fs-13 mt-1 mb-1 open" wire:ignore.self>{{$filter[0]}}</span>

                            @endif

                        </span>

                    </label>

                    <ul class="filter_email_subscription_status" style="list-style-type: none" wire:ignore.self>



                        <li><input wire:model="email_status" value="Subscribed" id="subscribed" type="radio"

                                   class="change-filter"/> <label

                                    for="subscribed">Subscribed</label></li>

                        <li><input wire:model="email_status" value="Subscription Pending Confirmation"

                                   id="subscribed-pending" type="radio" class="change-filter"/> <label

                                    for="subscribed-pending">Pending

                                confirmation</label></li>

                        <li><input wire:model="email_status" value="Not subscribed" id="not-subscribed" type="radio"

                                   class="change-filter"/>

                            <label for="not-subscribed">Not Subscribed</label></li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(0)">Clear</a></li>

                    </ul>

                </div>



                <div class="filters-item">

                    <label id="tagged_with" onclick="openOption('tagged_with')">Tagged With

                        <svg viewBox="0 0 20 20" class="close Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path>

                        </svg>

                        <svg viewBox="0 0 20 20" class="open Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M15 13a.997.997 0 0 1-.707-.293L10 8.414l-4.293 4.293a.999.999 0 1 1-1.414-1.414l5-5a.999.999 0 0 1 1.414 0l5 5A.999.999 0 0 1 15 13z"></path>

                        </svg>

                        <span class="select-label">

                        @if(!empty($filter) && isset($filter[1]))

                            <span class="tag grey fs-13 mt-1 mb-1 open"

                                  wire:ignore.self>{{$filter[1]}}</span>

                        @endif

                        </span>

                    </label>



                  

                    <ul class="filter_tagged_with" wire:ignore.self>

                        <li><input type="text" wire:model="tagged_with" class="change-tagged-with-filter"/></li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(1)">Clear</a></li>

                    </ul>



                </div>



                <div class="filters-item">

                    <label id="customer_account_status" onclick="openOption('customer_account_status')">Customer account

                        status

                        <svg viewBox="0 0 20 20" class="close Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path>

                        </svg>

                        <svg viewBox="0 0 20 20" class="open Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M15 13a.997.997 0 0 1-.707-.293L10 8.414l-4.293 4.293a.999.999 0 1 1-1.414-1.414l5-5a.999.999 0 0 1 1.414 0l5 5A.999.999 0 0 1 15 13z"></path>

                        </svg>

                        <span class="select-label">

                        @if(!empty($filter) && isset($filter[2]))

                            <span class="tag grey fs-13 mt-1 mb-1 open"

                                  wire:ignore.self>{{$filter[2]}}</span>

                        @endif

                        </span>

                    </label>

                    

                    <ul class="filter_customer_account_status" style="list-style-type: none" wire:ignore.self>



                        <li><input wire:model="account_status" value="Active account" id="active-account" type="radio"

                                   class="change-filter"/>

                            <label for="active-account">Active account</label></li>

                        <li><input wire:model="account_status" value="Disabled account" id="disabled-account"

                                   type="radio"/> <label for="disabled-account" class="change-filter">Disabled

                                account</label></li>

                        <li><input wire:model="account_status" value="Invited to create account"

                                   id="invited-create account" type="radio"/> <label for="invited-create account">Invited

                                to create account</label></li>

                        <li><input wire:model="account_status" value="Declined account invitation"

                                   id="declined-account-invitation" type="radio" class="change-filter"/> <label

                                    for="declined-account-invitation">Declined account invitation</label></li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(2)">Clear</a></li>

                    </ul>

                </div>



                <div class="filters-item">

                    <label id="customer_language" onclick="openOption('customer_language')">Customer language

                        <svg viewBox="0 0 20 20" class="close Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path>

                        </svg>

                        <svg viewBox="0 0 20 20" class="open Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M15 13a.997.997 0 0 1-.707-.293L10 8.414l-4.293 4.293a.999.999 0 1 1-1.414-1.414l5-5a.999.999 0 0 1 1.414 0l5 5A.999.999 0 0 1 15 13z"></path>

                        </svg>

                        <span class="select-label">

                        @if(!empty($filter) && isset($filter[3]))

                            <span class="tag grey fs-13 mt-1 mb-1 open"

                                  wire:ignore.self>{{$filter[3]}}</span>

                        @endif

                        </span>

                    </label>

                    

                    <ul class="filter_customer_language" style="list-style-type: none" wire:ignore.self>

                        <li>

                            <select class="fs-14 fw-6 fullfillment-dropdown change-filter"

                                    wire:model="customer_language"

                                    wire:ignore.self>

                                <option value="">Select a language...</option>

                            </select>

                        </li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(3)">Clear</a></li>

                    </ul>



                </div>



                <div class="filters-item">

                    <label id="amount_spent" onclick="openOption('amount_spent')">Amount spent

                        <svg viewBox="0 0 20 20" class="close Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path>

                        </svg>

                        <svg viewBox="0 0 20 20" class="open Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M15 13a.997.997 0 0 1-.707-.293L10 8.414l-4.293 4.293a.999.999 0 1 1-1.414-1.414l5-5a.999.999 0 0 1 1.414 0l5 5A.999.999 0 0 1 15 13z"></path>

                        </svg>

                        <span class="select-label">

                        @if(!empty($filter) && isset($filter[4]))

                            <span class="tag grey fs-13 mt-1 mb-1 open"

                                  wire:ignore.self>{{$filter[4]}}</span>

                        @endif

                        </span>

                    </label>

                    
                    
                    <ul class="filter_amount_spent" style="list-style-type: none" wire:ignore.self>



                        <li><input  id="more_than_this_amount" type="checkbox" class="change-filter"/> <label

                                    for="more_than_this_number">More than this number</label>
                                <input id="more_than_this_amount_input" type="number" wire:model="more_than_amount" value="{{$amount_spent}}" style="display:none;" wire:ignore.self/>
                                </li>

                        <li><input id="less_than_this_amount" type="checkbox" class="change-filter"/> <label

                                    for="less_than_this_number">Less than this

                                number</label>
                                <input id="less_than_this_amount_input" type="number" wire:model="less_than_amount" value="{{$amount_spent}}" style="display:none;" wire:ignore.self/>
                                </li>

                        <li><input id="this_exact_amount" type="checkbox" class="change-filter"/> <label

                                    for="this_exact_number">This

                                exact number</label>
                                <input type="number" id="this_exact_amount_input" wire:model="exact_amount" value="{{$amount_spent}}" style="display:none;" wire:ignore.self/>
                                </li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(4)">Clear</a></li>

                    </ul>
                   <!-- <ul class="filter_amount_spent" style="list-style-type: none" wire:ignore.self>



                        <li><input wire:model="amount_spent" value="Spent more than US${{$amount_spent}}"

                                   id="active-account" type="checkbox" class="change-filter"/> <label

                                    for="active-account">More than this

                                amount</label></li>

                        <li><input wire:model="amount_spent" value="Spent less than US${{$amount_spent}}"

                                   id="disabled-account" type="checkbox" class="change-filter"/> <label

                                    for="disabled-account">Less than this

                                amount</label></li>

                        <li><input wire:model="amount_spent" value="Spent US${{$amount_spent}}"

                                   id="invited-create account" type="checkbox" class="change-filter"/> <label

                                    for="invited-create account">This

                                exact amount</label></li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(4)">Clear</a></li>

                    </ul>-->

                </div>



                <div class="filters-item">

                    <label id="number_of_orders" onclick="openOption('number_of_orders')">Number of orders

                        <svg viewBox="0 0 20 20" class="close Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path>

                        </svg>

                        <svg viewBox="0 0 20 20" class="open Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M15 13a.997.997 0 0 1-.707-.293L10 8.414l-4.293 4.293a.999.999 0 1 1-1.414-1.414l5-5a.999.999 0 0 1 1.414 0l5 5A.999.999 0 0 1 15 13z"></path>

                        </svg>

                        <span class="select-label">

                        @if(!empty($filter) && isset($filter[5]))

                            <span class="tag grey fs-13 mt-1 mb-1 open"

                                  wire:ignore.self>{{$filter[5]}}</span>

                        @endif

                        </span>

                    </label>

                    

                    <ul class="filter_number_of_orders" style="list-style-type: none" wire:ignore.self>



                        <li><input  id="more_than_this_number" type="checkbox" class="change-filter"/> <label

                                    for="more_than_this_number">More than this number</label>
                                <input id="more_than_this_number_input" type="number" wire:model="more_than_orders" value="{{$number_of_orders}}" style="display:none;" wire:ignore.self/>
                                </li>

                        <li><input id="less_than_this_number" type="checkbox" class="change-filter"/> <label

                                    for="less_than_this_number">Less than this

                                number</label>
                                <input id="less_than_this_number_input" type="number" wire:model="less_than_orders" value="{{$number_of_orders}}" style="display:none;" wire:ignore.self/>
                                </li>

                        <li><input id="this_exact_number" type="checkbox" class="change-filter"/> <label

                                    for="this_exact_number">This

                                exact number</label>
                                <input type="number" id="this_exact_number_input" wire:model="exact_orders" value="{{$number_of_orders}}" style="display:none;" wire:ignore.self/>
                                </li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(5)">Clear</a></li>

                    </ul>

                </div>



                <div class="filters-item">

                    <label id="date_of_order" onclick="openOption('date_of_order')">Date of order

                        <svg viewBox="0 0 20 20" class="close Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path>

                        </svg>

                        <svg viewBox="0 0 20 20" class="open Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M15 13a.997.997 0 0 1-.707-.293L10 8.414l-4.293 4.293a.999.999 0 1 1-1.414-1.414l5-5a.999.999 0 0 1 1.414 0l5 5A.999.999 0 0 1 15 13z"></path>

                        </svg>

                        <span class="select-label">

                        @if(!empty($filter) && isset($filter[6]))

                            <span class="tag grey fs-13 mt-1 mb-1 open"

                                  wire:ignore.self>{{$filter[6]}}</span>

                        @endif

                        </span>

                    </label>

                    

                    <ul class="filter_date_of_order" style="list-style-type: none" wire:ignore.self>



                        <li><input wire:model="date_of_order" value="7 days" id="subscribed" type="radio"

                                   class="change-filter"/> <label

                                    for="subscribed">Last 7 days</label></li>

                        <li><input wire:model="date_of_order" value="30 days" id="subscribed-pending" type="radio"

                                   class="change-filter"/>

                            <label for="subscribed-pending">Last 30 days</label></li>

                        <li><input wire:model="date_of_order" value="90 days" id="not-subscribed" type="radio"

                                   class="change-filter"/> <label

                                    for="not-subscribed">Last 90 days</label></li>

                        <li><input wire:model="date_of_order" value="12 months" id="not-subscribed" type="radio"

                                   class="change-filter"/>

                            <label for="not-subscribed">Last 12 months</label></li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(6)">Clear</a></li>

                    </ul>

                </div>



                <div class="filters-item">

                    <label id="date_added_as_customer" onclick="openOption('date_added_as_customer')">Date added as

                        customer

                        <svg viewBox="0 0 20 20" class="close Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path>

                        </svg>

                        <svg viewBox="0 0 20 20" class="open Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M15 13a.997.997 0 0 1-.707-.293L10 8.414l-4.293 4.293a.999.999 0 1 1-1.414-1.414l5-5a.999.999 0 0 1 1.414 0l5 5A.999.999 0 0 1 15 13z"></path>

                        </svg>

                        <span class="select-label">

                        @if(!empty($filter) && isset($filter[7]))

                            <span class="tag grey fs-13 mt-1 mb-1 open"

                                  wire:ignore.self>{{$filter[7]}}</span>

                        @endif

                        </span>

                    </label>

                    

                    <ul class="filter_date_added_as_customer" style="list-style-type: none" wire:ignore.self>



                        <li><input wire:model="date_added_as_customer" value="7 days" id="subscribed" type="radio"

                                   class="change-filter"/>

                            <label for="subscribed">Last 7 days</label></li>

                        <li><input wire:model="date_added_as_customer" value="30 days" id="subscribed-pending"

                                   type="radio" class="change-filter"/> <label for="subscribed-pending">Last 30

                                days</label></li>

                        <li><input wire:model="date_added_as_customer" value="90 days" id="not-subscribed"

                                   type="radio" class="change-filter"/> <label for="not-subscribed">Last 90 days</label>

                        </li>

                        <li><input wire:model="date_added_as_customer" value="12 months" id="not-subscribed"

                                   type="radio" class="change-filter"/> <label for="not-subscribed">Last 12

                                months</label></li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(7)">Clear</a></li>

                    </ul>

                </div>



                <div class="filters-item">

                    <label id="abandoned_checkout" onclick="openOption('abandoned_checkout')">Abandoned checkout

                        <svg viewBox="0 0 20 20" class="close Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path>

                        </svg>

                        <svg viewBox="0 0 20 20" class="open Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M15 13a.997.997 0 0 1-.707-.293L10 8.414l-4.293 4.293a.999.999 0 1 1-1.414-1.414l5-5a.999.999 0 0 1 1.414 0l5 5A.999.999 0 0 1 15 13z"></path>

                        </svg>

                        <span class="select-label">

                        @if(!empty($filter) && isset($filter[8]))

                            <span class="tag grey fs-13 mt-1 mb-1 open"

                                  wire:ignore.self>{{$filter[8]}}</span>

                        @endif

                        </span>

                    </label>

                    

                    <ul class="filter_abandoned_checkout" style="list-style-type: none" wire:ignore.self>



                        <li><input wire:model="abandoned_checkout" value="7 days" id="subscribed"

                                   type="radio" class="change-filter"/> <label for="subscribed">Last 7 days</label></li>

                        <li><input wire:model="abandoned_checkout" value="30 days"

                                   id="subscribed-pending" type="radio" class="change-filter"/> <label

                                    for="subscribed-pending">Last 30

                                days</label></li>

                        <li><input wire:model="abandoned_checkout" value="90 days"

                                   id="not-subscribed" type="radio" class="change-filter"/> <label for="not-subscribed">Last

                                90 days</label>

                        </li>

                        <li><input wire:model="abandoned_checkout" value="12 months"

                                   id="not-subscribed" type="radio" class="change-filter"/> <label for="not-subscribed">Last

                                12 months</label>

                        </li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(8)">Clear</a></li>

                    </ul>

                </div>



                <div class="filters-item">

                    <label id="location" onclick="openOption('location')">Location

                        <svg viewBox="0 0 20 20" class="close Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path>

                        </svg>

                        <svg viewBox="0 0 20 20" class="open Polaris-Icon__Svg_375hu" focusable="false"

                             aria-hidden="true">

                            <path d="M15 13a.997.997 0 0 1-.707-.293L10 8.414l-4.293 4.293a.999.999 0 1 1-1.414-1.414l5-5a.999.999 0 0 1 1.414 0l5 5A.999.999 0 0 1 15 13z"></path>

                        </svg>

                        <span class="select-label">

                        @if(!empty($filter) && isset($filter[9]))

                            <span class="tag grey fs-13 mt-1 mb-1 open"

                                  wire:ignore.self>{{$filter[9]}}</span>

                        @endif

                        </span>

                    </label>

                    

                    <ul class="filter_location" style="list-style-type: none" wire:ignore.self>

                        <li>

                            <select class="fs-14 fw-6 fullfillment-dropdown change-filter" wire:model="location"

                                    wire:ignore.self>

                                <option value="">Select a country...</option>

                                @foreach($countries as $country)

                                    <option value="{{$country->name}}">{{$country->name}}</option>

                                @endforeach

                            </select>

                        </li>

                        <li><a class="clear-btn" type="button" wire:click="removeFilter(9)">Clear</a></li>

                    </ul>



                </div>



            </div>

            <div class="sidebar-footer">

                <ul>

                    <li>

                        <button class="secondary all-filters-clear-btn" wire:click="removeAllFilters()">Clear all filters</button>

                    </li>

                    <li>

                        <button class="button green-btn" id="close_filter">Done</button>

                    </li>

                </ul>

            </div>

        </div>

    </div>

    <div class="filter_save filter-save email-sub-model  model" wire:ignore.self>

        <div class="email-sub-details">

            @foreach($filter as $key=>$value)

                <span class="tag grey fs-13 mt-1 mb-1">{{$value}} <a wire:click="removeFilter({{$key}})"

                                                                     class="close"> &times;</a></span>

            @endforeach

            <label>Edit tab name</label>

            <div class="input-box">

                <input class="block mt-1 w-full" type="text" autocomplete="save_filter" onkeypress="enableSaveFilterBtn()"

                       wire:model="save_filter" wire:ignore.self/>

                <button disabled="disabled" class="save-filter button secondary ml-4" wire:click="saveFilter('update')" disabled

                            wire:ignore.self>

                        {{ __('Save filters') }}

                </button>

            </div>

        </div>

        <div class="model-btn-group">

            <button class="link remove_tab ml-4" wire:click="removeTab()"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M8 3.994C8 2.893 8.895 2 10 2s2 .893 2 1.994h4c.552 0 1 .446 1 .997a1 1 0 0 1-1 .997H4c-.552 0-1-.447-1-.997s.448-.997 1-.997h4zM5 14.508V8h2v6.508a.5.5 0 0 0 .5.498H9V8h2v7.006h1.5a.5.5 0 0 0 .5-.498V8h2v6.508A2.496 2.496 0 0 1 12.5 17h-5C6.12 17 5 15.884 5 14.508z"></path></svg><u>Remove tab</u></button>

        </div>



    </div>



    <div class="filter_save_filters_btn filter-save  model" wire:ignore.self>

        @foreach($filter as $key=>$value)

            <span class="tag grey fs-13 mt-1 mb-1">{{$value}} <a wire:click="removeFilter({{$key}})"

                                                                 class="close"> &times;</a></span>

        @endforeach

        <label>Save as</label>

        <input class="block mt-1 w-full" type="text" name="" autocomplete="save_filter" placeholder="Ready to ship, International"

               onkeypress="enableSaveFilterBtn()" wire:model="save_filter" wire:ignore.self/>



        <p>Filters are saved as a new tab at top of this list.</p>



            <div class="model-btn-group">

                <button class="secondary ml-4" wire:click="cancelFilter()">

                    {{ __('Cancel') }}

                </button>

                <button class="save-filter button secondary ml-4" wire:click="saveFilter('create')" disabled wire:ignore.self>

                {{ __('Save filters') }}

                </button>

            </div>



    </div>
    
    <div id="export" class="customer-modal-main" wire:ignore.self>
        <div class="customer-modal-inner">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Export Customers</h2>
                    <button type="button" class="close modal-close-btn" data-dismiss="modal"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></button>
                </div>
                 <form wire:submit.prevent="exportCustomers">
                        @csrf
                    <div class="modal-body">
                   
                        <label>Export</label>
                        <ul style="list-style-type: none" wire:ignore.self>
                            <li>
                                <input value="Current Page" name="export" id="current_page" type="radio" wire:model="export"/>
                                <label for="current_page">Current Page</label></li>
                            <li>
                                <input value="All Customers" name="export" id="all-customers" type="radio" wire:model="export"/>
                                <label for="all-customers">All Customers</label>
                            </li>
                            <li  wire:ignore>
                                <input value="Selected Customers" name="export" id="selected_customers" type="radio" wire:model="export" disabled/>
                                <label for="selected_customers">Selected: <span class="selected_count">0</span> customers</label>
                            </li>
                            <li>
                                <input value="Searched Customers" name="export" id="searched_customers" type="radio" wire:model="export"  @if(count($filter) == 0 && empty($filter_customers)) disabled @endif />
                                <label for="searched_customers">@if(count($filter) == 0 && empty($filter_customers)) 0 @else {{count($customers)}} @endif customers matching your search</label>

                            </li>
                        </ul>

                        <label>Export as</label>
                        <ul style="list-style-type: none" wire:ignore.self>
                            <li><input value="Csv" name="export_as" id="csv" type="radio" wire:model="export_as"/>
                                <label for="csv">CSV for Excel, Numbers, or other spreadsheet programs</label></li>

                            <li><input value="Plain Csv" name="export_as" id="plain_csv" type="radio"
                                       wire:model="export_as"/> <label for="plain_csv">Plain CSV file</label></li>
                        </ul>
                    
                </div>
                    <div class="modal-footer">
                    <button data-dismiss="modal" class="button secondary">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="button green-btn">
                        {{ __('Export customers') }}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="import" class="customer-modal-main" wire:ignore.self>
        <div class="customer-modal-inner">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Import customers by CSV</h2>
                    <button type="button" class="close modal-close-btn" data-dismiss="modal"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></button>
                </div>
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    
                    <div class="import-file-details">
                        <p><a target="_blank" href="{{ url('/assets/customers_import.csv') }}">Download a Sample CSV</a> to see an example of the required format </p>
                        <p class="text-grey">Make sure that customers set to Accepts marketing have given you permission.</p>
                    </div>
                    
                        
                        <div class="import-file">
                            <!--<input type="file" name="file" class="form-control" id="import_customers" onchange="importCustomers()">-->
                            <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label custome-file-upload">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"/></svg>
                                <p class="secondary">Add file</p>
                                <span>or drop file to upload</span>
                            </label>
                            <input type="file" name="file" id="et_pb_contact_brand_file_request_0" class="file-upload"  onchange="importCustomers()">
                        </div>
                        <label class="import-checkbox"><input type="checkbox" name="overwrite_customers"  >Overwrite existing customers that have the same email or phone</label>
                   
                </div>
                <div class="modal-footer">
                    <div class="button-col">
                        <button class="link">Need help importing customers?</button>
                    </div>
                    <div class="button-col">
                        <button data-dismiss="modal" class="button secondary">
                                {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="button secondary import_customers" disabled >
                            {{ __('Import customers') }}
                        </button>
                    </div>
                </div>
                 </form>
            </div>
        </div>
    </div>
    

</section>



<script>

    $(document).mouseup(function (e) {

        var container = $(".model");

        console.log(container);

        if (!container.is(e.target) && container.has(e.target).length === 0) {

            console.log($('.filter_' + e.target.id));



            if (e.target.id == "save-filter-btn" || e.target.id == "save") {

                var select_element = $('div.filter_' + e.target.id);

            } else {

                var select_element = $('.filter_' + e.target.id);

            }

            console.log(select_element);

            var container_new = container.not(select_element);



            console.log(container_new);

            container_new.hide();

        }





    });



    function enableSaveFilterBtn() {

        $('.save-filter').prop('disabled', false);
        $('.save-filter').addClass('green-btn');
    }

    function importCustomers() {
        var file = $('#et_pb_contact_brand_file_request_0').val();
        if (file){
            $('.import_customers').prop('disabled', false);
            $('.import_customers').addClass('green-btn');
        } else {
            $('.import_customers').prop('disabled', true);
            $('.import_customers').removeClass('green-btn');
            $('.custome-file-upload').show();
            $('.file_names').hide();
        }
    }

    function openOption(id) {



        $(".filter_" + id).toggle();



        if (id != 'save' && id != 'more_filters') {

            $('#' + id + ' .close').toggle();

            $('#' + id + ' .open').toggle();

        }

        if (id == 'more_filters') {

            $('.filter_more_filters .tag').removeClass('open');

        }
    }



    $(document).on('DOMNodeRemoved', function (e) {



        if ($(e.target).hasClass('tags')) {
             if ($('.tags').length <= 1) {

                $('li.active').removeClass('active');

                $('.all').addClass('active');
                $('.save-filters-btn').hide();
                $('.saved-btn').show();
                $('#save').prop('disabled', true);
                $('#save').addClass('disabled');

                $('#untitled').hide();
            }
        }

    });

    $(document).on('DOMNodeInserted', function (e) {

        if ($(e.target).hasClass('tags')) {
            $('#save').prop('disabled', false);
            $('#save').removeClass('disabled');

        }

        if ($(e.target).hasClass('titled')) {

            $('li.active').removeClass('active');

            $('.titled').last().addClass('active');

            console.log('node insert');

        }

    });

    $(document).ready(function () {
        $('#save').prop('disabled', true);
        $('#save').addClass('disabled');



        $('.sidebar-close').click(function () {

            $(".filter_more_filters").toggle();

        });

        $('.tab').click(function () {

            console.log('tab');

            $('#untitled').hide();

            $('.saved-btn').show();
            
            $('#save').prop('disabled', false);
            $('#save').removeClass('disabled');

            $('.save-filters-btn').hide();

            $('.checked_all').prop('checked',false);
            $('.checkbox').prop('checked',false);
            $(".order-form *").prop("disabled", false).css("pointer-events","auto").on('select');
        });

        $('.change-tagged-with-filter').keydown(function () {

            $('#untitled').show();

            $('.saved-btn').hide();

            $('.save-filters-btn').show();

            $('li.active').removeClass('active');

            $('#untitled').addClass('active');

        });



        $('.change-filter').change(function () {

            $('#untitled').show();

            $('.saved-btn').hide();

            $('.save-filters-btn').show();

            $('li.active').removeClass('active');

            $('#untitled').addClass('active');



        });

        $('.save-filter').click(function () {

            $('.model').hide();

            $('#untitled').hide();

            $('.saved-btn').show();
            $('#save').prop('disabled', false);
            $('#save').removeClass('disabled');

            $('.save-filters-btn').hide();



        });

        $('.remove_tab').click(function () {

            $('.model').hide();

            $('li.active').removeClass('active');

            $('.all').addClass('active');



        });
        $('.checked_all').on('change', function() {

            $(".order-form *").attr("disabled", "disabled").css("pointer-events","none").off('select');

                $('.checked_all_clone').prop('checked',true);

                $('.select-customers').show();
                $('#selected_customers').prop('disabled', false);

            $('.checkbox').prop('checked', true);

            $('.selected_count').text($('.checkbox:checked').length);
        });
        $('.checked_all_clone').on('change', function() {

                 $(".order-form *").prop("disabled", false).css("pointer-events","auto").on('select');


                $('.checked_all').prop('checked',false);

                $('.select-customers').hide();
                $('#selected_customers').prop('disabled', true);
            
            $('.checkbox').prop('checked',false);

            $('.selected_count').text($('.checkbox:checked').length);
        });

        $('.checkbox').change(function(){

            if($('.checkbox:checked').length == $('.checkbox').length){
                $('.checked_all').prop('checked',true);
            }else{
                $('.checked_all').prop('checked',false);

            }
            if ($('.checkbox:checked').length == 0) {
               $('.select-customers').hide();
                $('#selected_customers').prop('disabled', true);
                $(".order-form *").prop("disabled", false).css("pointer-events","auto").on('select');

            } else {
                 $('.select-customers').show();
                $('#selected_customers').prop('disabled', false);
                $(".order-form *").attr("disabled", "disabled").css("pointer-events","none").off('select');
            }

            $('.selected_count').text($('.checkbox:checked').length);

        });

        $("#selected_customers").click(function(){
            var arr = [];
            $.each($("input[name='customer']:checked"), function(){
                arr.push($(this).val());
            });
            $('#selected_customers').prop('value', arr);
        });

    });





    (function ($, window) {

        $(function () {

            let arrowWidth = 30;



            $.fn.resizeselect = function (settings) {

                return this.each(function () {



                    $(this).change(function () {

                        let $this = $(this);



                        // get font-weight, font-size, and font-family

                        let style = window.getComputedStyle(this)

                        let {fontWeight, fontSize, fontFamily} = style



                        // create test element

                        let text = $this.find("option:selected").text();

                        let $test = $("<span>").html(text).css({

                            "font-size": fontSize,

                            "font-weight": fontWeight,

                            "font-family": fontFamily,

                            "visibility": "hidden" // prevents FOUC

                        });



                        // add to body, get width, and get out

                        $test.appendTo($this.parent());

                        let width = $test.width();

                        $test.remove();



                        // set select width

                        $this.width(width + arrowWidth);



                        // run on start

                    }).change();


                });

            };



            // run by default

            $("select.resizeselect").resizeselect();

        })

    })(jQuery, window);


// custome upload file js
$(document).ready(function() {
    $('#close_filter').click(function() {
    
        var x = document.getElementById("filter_more_filters");

          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
           x.style.display = "none";
            
          }
    });

    $('#less_than_this_number').change(function() {
        var x = document.getElementById("less_than_this_number_input");

          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
    });
    $('#more_than_this_number').change(function() {
       var x = document.getElementById("more_than_this_number_input");

          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
    });
    $('#this_exact_number').change(function() {
        var x = document.getElementById("this_exact_number_input");

          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
    });
    
    $('#less_than_this_amount').change(function() {
        var x = document.getElementById("less_than_this_amount_input");

          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
    });
    $('#more_than_this_amount').change(function() {
       var x = document.getElementById("more_than_this_amount_input");

          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
    }); 
    $('#this_exact_amount').change(function() {
        var x = document.getElementById("this_exact_amount_input");

          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
    });
    $('input[type="file"]').on('click', function() {
        $(".file_names").html("");
      })
    if ($('input[type="file"]')[0]) {
        var fileInput = document.querySelector('label[for="et_pb_contact_brand_file_request_0"]');
        fileInput.ondragover = function() {
            this.className = "et_pb_contact_form_label changed";
            return false;
        }
        fileInput.ondragleave = function() {
            this.className = "et_pb_contact_form_label";
            return false;
        }
        fileInput.ondrop = function(e) {
            e.preventDefault();
            var fileNames = e.dataTransfer.files;
            for (var x = 0; x < fileNames.length; x++) {
                console.log(fileNames[x].name);
                $=jQuery.noConflict();
                $('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames[x].name +"</div>");
            }
        }
        $('#et_pb_contact_brand_file_request_0').change(function() {
            var fileNames = $('#et_pb_contact_brand_file_request_0')[0].files[0].name;
            $('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames +"</div>");
            $('label[for="et_pb_contact_brand_file_request_0"]').css('background-color', '##eee9ff');
        });
    }
});
    


</script>

</x-admin-layout>
</div>