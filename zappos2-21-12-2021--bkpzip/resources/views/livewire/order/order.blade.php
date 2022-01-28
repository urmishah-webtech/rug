<div>
<x-admin-layout>
    @php $symbol = CurrencySymbol(); @endphp
    <section class="full-width flex-wrap admin-full-width list-customers">
        <div class="page_header d-flex align-item-center justify-content-space-between full-width mb-2">
            <h4 class="mb-0 fw-5">Orders</h4>
            <div class="header-btn-group">
                <a class="link" data-toggle="modal" data-target="#export" >Export</a>
                @if(user_permission('orderlist','create'))
                <a class="button green-btn" href="{{ route('draft-orders-create') }}">Create order</a>
                @endif
            </div>
        </div>
    </section>
    
    <section class="full-width flex-wrap admin-full-width list-customers bd_none orders-sec">
        <div class="columns product_listing_columns pdpage-checkbox has-sections card ml-0">
        <ul class="tabs">
            <li class="active tab all" data-toggle="tab"><a href="#">All</a></li>
            <li class="tab titled" data-toggle="tab"><a href="#">Unfulfilled <span class="tag grey">19</span></a></li>
            <li class="tab titled" data-toggle="tab"><a href="#">Unpaid</a></li>
            <li class="tab titled" data-toggle="tab"><a href="#">Open</a></li>
            <li class="tab titled" data-toggle="tab"><a href="#">Closed</a></li>
        </ul>
        
        <div class="card-section tab_content  active" id="all_customers">
            <div class="order-form">
                <article class="full-width">
                    <div class="columns" wire:ignore="">
                        <div class="input-group">
                            <!-- Search Field -->
                            <div class="search-product-field">
                                <input class="fs-13 placeholder_gray fw-4" type="search" name="search_products" id="search_products" placeholder="Filter orders">
                            </div>
                            <div class="form-field">
                                <!-- Status -->
                                <div class="fs-14 fw-6 status-dropdown dropdown-field">
                                    <label id="main_email_subscription_status" class="dropdown-label">
                                        Status
                                        <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                            <path d="m5 8 5 5 5-5H5z"></path>
                                        </svg>
                                    </label>
                                    <ul class="filter_main_email_subscription_status filter-dropdown model">
                                        <li><input value="Open" id="open" type="radio" class="change-filter"> <label for="subscribed">Open</label></li>
                                        <li><input value="Archived" id="archived" type="radio" class="change-filter"> <label for="subscribed">Archived</label></li>
                                        <li><input value="Canceled" id="canceled" type="radio" class="change-filter"> <label for="subscribed">Canceled</label></li>
                                        <li><a class="clear-btn" type="button">Clear</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Payment Status -->
                                <div class="payment-dropdown dropdown-field">
                                    <label id="main_tagged_with" class="dropdown-label">
                                        Payment status
                                        <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                            <path d="m5 8 5 5 5-5H5z"></path>
                                        </svg>
                                    </label>
                                    <ul class="filter_main_tagged_with filter-dropdown model">
                                        <li><label><input type="checkbox" name="option2a" checked="checked">Authorized</label></li>
                                        <li><label><input type="checkbox" name="option2a" checked="checked">Expired</label></li>
                                        <li><label><input type="checkbox" name="option2a" checked="checked">Paid</label></li>
                                        <li><label><input type="checkbox" name="option2a" checked="checked">Partially paid</label></li>
                                        <li><label><input type="checkbox" name="option2a" checked="checked">Partially refunded</label></li>
                                        <li><label><input type="checkbox" name="option2a" checked="checked">Pending</label></li>
                                        <li><label><input type="checkbox" name="option2a" checked="checked">Refunded</label></li>
                                        <li><label><input type="checkbox" name="option2a" checked="checked">Unpaid</label></li>
                                        <li><label><input type="checkbox" name="option2a" checked="checked">Voided</label></li>
                                        <li><a class="clear-btn" type="button">Clear</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Fullfillment Status -->
                                <div class="fs-14 fw-6 fullfillment-dropdown dropdown-field">
                                    <label id="main_customer_account_status" class="dropdown-label">
                                        Fulfillment status
                                        <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                            <path d="m5 8 5 5 5-5H5z"></path>
                                        </svg>
                                    </label>
                                    <ul class="filter_main_customer_account_status filter-dropdown model">
                                        <li><input value="Active account" id="active-account" type="radio" class="change-filter">
                                            <label for="active-account">Fulfilled</label>
                                        </li>
                                        <li><input value="Invited to create account" id="invited-create account" type="radio" class="change-filter">
                                            <label for="invited-create account">Unfulfilled</label>
                                        </li>
                                        <li><input value="Declined account invitation" id="declined-account-invitation" type="radio" class="change-filter">
                                            <label for="declined-account-invitation">Partially fulfilled</label>
                                        </li>
                                        <li><input value="Invited to create account" id="invited-create account" type="radio" class="change-filter">
                                            <label for="invited-create account">Scheduled</label>
                                        </li>
                                        <li><input value="Invited to create account" id="invited-create account" type="radio" class="change-filter">
                                            <label for="invited-create account">On hold</label>
                                        </li>
                                        <li><a class="clear-btn" type="button">Clear</a>
                                        </li>
                                    </ul>
                                </div>
                                <button id="more_filters" class="secondary fw-6 more-filters-btn">
                                More Filters
                                </button>
                            </div>
                            <div class="saved-btn">
                                <button class="secondary fw-6 disabled" id="save" disabled="">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                        <path d="M5.2 18a.8.8 0 0 1-.792-.914l.743-5.203-2.917-2.917a.8.8 0 0 1 .434-1.355l4.398-.733 2.218-4.435a.8.8 0 0 1 1.435.008l2.123 4.361 4.498.801a.8.8 0 0 1 .425 1.353l-2.917 2.917.744 5.203a.8.8 0 0 1-1.154.828l-4.382-2.22-4.502 2.223A.792.792 0 0 1 5.2 18z"></path>
                                    </svg>
                                    Edit view
                                </button>
                            </div>
                            <div class="save-filters-btn">
                                <button class="secondary fw-6" id="save_filter_btn">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                        <path d="m6.71 15.116 3.357-1.658.892.452 2.327 1.178-.56-3.912.708-.707 1.29-1.29-3.235-.576-.445-.915-1.059-2.176L8.4 8.683l-1.005.168-2.098.35 1.975 1.975-.141.99-.422 2.95zM5.2 18a.8.8 0 0 1-.792-.914l.743-5.203-2.917-2.917a.8.8 0 0 1 .434-1.355l4.398-.733 2.218-4.435a.8.8 0 0 1 1.435.008l2.123 4.361 4.498.801a.8.8 0 0 1 .425 1.353l-2.917 2.917.744 5.203a.8.8 0 0 1-1.154.828l-4.382-2.22-4.502 2.223A.792.792 0 0 1 5.2 18z"></path>
                                    </svg>
                                    Save filters
                                </button>
                            </div>
                            <div class="sort-btn">
                                <button class="secondary fw-6" id="sort">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M5.293 2.293a.997.997 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414L7 5.414V13a1 1 0 1 1-2 0V5.414L3.707 6.707a1 1 0 0 1-1.414-1.414l3-3zM13 7a1 1 0 0 1 2 0v7.585l1.293-1.292a.999.999 0 1 1 1.414 1.414l-3 3a.997.997 0 0 1-1.414 0l-3-3a.997.997 0 0 1 0-1.414.999.999 0 0 1 1.414 0L13 14.585V7z"></path></svg>
                                    Sort
                                </button>
                                <ul class="filter_main_email_subscription_status filter-dropdown model">
                                    <label class="sort-dropdown">Sort by</label>
                                    <li>
                                        <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                        <label for="subscribed">Order number (ascending)</label>
                                    </li>
                                    <li>
                                        <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                        <label for="subscribed-pending">Order number (descending)A</label>
                                    </li>
                                    <li>
                                        <input value="Not subscribed" id="not-subscribed" type="radio" class="change-filter">
                                        <label for="not-subscribed">Date (oldest first)</label>
                                    </li>
                                    <li>
                                        <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                        <label for="subscribed">Date (newest first)</label>
                                    </li>
                                    <li>
                                        <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                        <label for="subscribed-pending">Customer name (A-Z))</label>
                                    </li>
                                    <li>
                                        <input value="Not subscribed" id="not-subscribed" type="radio" class="change-filter">
                                        <label for="not-subscribed">Customer name (Z-A)</label>
                                    </li>
                                    <li>
                                        <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                        <label for="subscribed">Payment status (A-Z)</label>
                                    </li>
                                    <li>
                                        <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                        <label for="subscribed-pending">Payment status (Z-A)</label>
                                    </li>
                                    <li>
                                        <input value="Not subscribed" id="not-subscribed" type="radio" class="change-filter">
                                        <label for="not-subscribed">Fulfillment status (A-Z)</label>
                                    </li>
                                    <li>
                                        <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                        <label for="subscribed">Fulfillment status (Z-A)</label>
                                    </li>
                                    <li>
                                        <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                        <label for="subscribed-pending">Total price (low to high)</label>
                                    </li>
                                    <li>
                                        <input value="Not subscribed" id="not-subscribed" type="radio" class="change-filter">
                                        <label for="not-subscribed">Total price (high to low)</label>
                                    </li>
                                    <li><a class="clear-btn" type="button">Clear</a>
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
                <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th order-listing">
                    <tbody>
                        <tr>
                            <th class="sticky-col">
                                <div class="row"><label><input type="checkbox" name="option6a"></label></div>
                            </th>
                            <th class="sticky-col">Order</th>
                            <th class="fw-6">
                                <div class="select-customers">
                                    <span class="button-group">
                                        <button class="secondary all-customer-select">
                                            <input type="checkbox" name="option2a" checked="checked">
                                            <span>27 selected</span>
                                        </button>
                                        <button class="secondary select-customer-edit">
                                            Mark as fulfilled
                                        </button>
                                        <button class="secondary select-customer-edit">
                                            Capture payments
                                        </button>
                                        <button class="secondary select-customer-more-actions">
                                            More actions
                                            <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg>
                                        </button>
                                    </span>
                                </div>
                            </th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Fulfillment</th>
                            <th>Items</th>
                            <th>Delivery method</th>
                            <th>Tags</th>
                        </tr>
                        @if($order)
                        @foreach($order as $row)
                        <a class="tc-black fw-6" href="{{ route('order-detail', $row->id) }}">
                            <tr>
                            <td class="sticky-col">
                                <div class="row"><label><input type="checkbox" name="option6a"></label></div>
                            </td>
                            @if(user_permission('orderlist','update'))
                            <td class="fw-6 sticky-col"><a class="tc-black fw-6" href="{{ route('order-detail', $row->id) }}">#{{$row->id}}</a></td>
                            @else
                            <td class="fw-6 sticky-col">#{{$row->id}}</td>
                            @endif
                           
                            <td>
                                <div class="order-flags">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M13 10a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm-4 0a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm-4 0a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm5-8c-4.411 0-8 3.589-8 8 0 1.504.425 2.908 1.15 4.111l-1.069 2.495a1 1 0 0 0 1.314 1.313l2.494-1.069A7.939 7.939 0 0 0 10 18c4.411 0 8-3.589 8-8s-3.589-8-8-8z"></path></svg>
                                </div>
                            </td>
                            <td>
                               {{$row->updated_at}}
                            </td>
                            <td>
                               
                               <a class="tc-black fw-6" href="{{ route('customers') }}"> 
                                    <button class="link">@if($row['user']){{$row['first_name']}}@endif 
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <p>{{$symbol['currency']}}{{$row->netamout}}</p>
                            </td>
                            <td>
                                <span class="tag grey"><span class="grey-circle"></span>{{$row->paymentstatus}}</span>
                            </td>
                            <td>
                                <span class="tag yellow"><span class="border-circle"></span>Unfulfilled</span>
                            </td>
                            <td>

                                <?php $itemcount = 0; $i = 1; ?>
                               
                                @foreach($OrderItem as $item)
                                    @if($item->order_id == $row->id)
                                        <?php $itemcount = $i++;  ?>
                                    @endif
                                @endforeach
                                <button class="link">{{$itemcount}} item<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></button>
                            </td>
                            <td>
                                Standard
                            </td>
                        </tr></a>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>
</x-admin-layout>
</div>
<!--Export modal-->
<div id="export" class="customer-modal-main in export-inventory">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Export products</h2>
                <button type="button" class="close modal-close-btn" data-dismiss="modal">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </button>
            </div>
            <form wire:submit.prevent="exportCustomers">
                <input type="hidden" name="_token" value="VWAiD9EyZqX8gI9MQVQQlfzOATOFOTdo9nvAgLrx">                    
                <div class="modal-body ta-left">
                    <div class="p-2">
                        <label>Export</label>
                        <ul style="list-style-type: none" wire:ignore.self="">
                            <li>
                                <input value="Current Page" name="export" id="current_page" type="radio" wire:model="export">
                                <label for="current_page">Current Page</label>
                            </li>
                            <li>
                                <input value="All Customers" name="export" id="all-customers" type="radio" wire:model="export">
                                <label for="all-customers">All products</label>
                            </li>
                            <li wire:ignore="">
                                <input value="Selected Customers" name="export" id="selected_customers" type="radio" wire:model="export" disabled="">
                                <label for="selected_customers">Selected: <span class="selected_count">0</span> products</label>
                            </li>
                            <li>
                                <input value="Searched Customers" name="export" id="searched_customers" type="radio" wire:model="export" disabled="">
                                <label for="searched_customers">42 orders matching your search</label>
                            </li>
                            <li>
                                <input value="Orders by date" name="export" id="orders_by_date" type="radio" wire:model="export">
                                <label for="orders_by_date">Orders by date</label>
                            </li>
                        </ul>
                        <label>Export as</label>
                        <ul style="margin-bottom: 0; list-style-type: none" wire:ignore.self="">
                            <li><input value="Csv" name="export_as" id="csv" type="radio" wire:model="export_as">
                                <label for="csv">CSV for Excel, Numbers, or other spreadsheet programs</label>
                            </li>
                            <li><input value="Plain Csv" name="export_as" id="plain_csv" type="radio" wire:model="export_as"> <label for="plain_csv">Plain CSV file</label></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="button secondary">Cancel</button>
                    <button data-dismiss="modal" class="button secondary">Export transaction histories</button>
                    <button type="submit" class="button green-btn">Export orders</button>
                </div>
            </form>
        </div>
    </div>
</div>