<div>
<x-admin-layout>
    <section class="full-width flex-wrap admin-full-width">
        <article class="full-width">
            <div class="columns">
                <div class="page_header d-flex align-item-center justify-content-space-between full-width mb-2">
                    <h4 class="mb-0 fw-5">Pages</h4>
                    <div class="header-btn-group">
                        @if(user_permission('pages','create'))
                        <a class="button green-btn" href="{{ route('pages-create') }}">Add Page</a>
                        @endif
                    </div>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap bd_none admin-full-width pages-list-sec">
        <div class="columns product_listing_columns pdpage-checkbox has-sections card ml-0">
           <!--  <ul class="tabs">
                <li class="active tab all" data-toggle="tab"><a href="#">All</a>
                </li>
            </ul> -->
            <div class="card-section tab_content  active" id="all_customers">
                <div class="order-form">
                    <article class="full-width" disabled="disabled">
                        <div class="columns" wire:ignore.self="" disabled="disabled">
                            <div class="input-group" disabled="disabled">
                                <!-- Search Field -->
                                <div class="search-product-field" disabled="disabled">
                                    <input class="fs-13 placeholder_gray fw-4" type="search" name="search_products" id="search_products" wire:model="filter_pages" placeholder="Filter Page">
                                </div>
                                <button class="secondary select-customer-edit" wire:click.prevent="deleteselected" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" >Delete Selected</button>
                                <!-- <div class="form-field" disabled="disabled">
                                    
                                    <div class="fs-14 fw-6 fullfillment-dropdown dropdown-field" disabled="disabled">
                                        <label id="main_customer_account_status" class="dropdown-label" disabled="disabled">
                                            Visibility
                                            <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true" disabled="disabled">
                                                <path d="m5 8 5 5 5-5H5z" disabled="disabled"></path>
                                            </svg>
                                        </label>
                                        <ul class="filter_main_customer_account_status filter-dropdown model">
                                            <li disabled="disabled"><input value="Active account" id="active-account" type="radio" class="change-filter">
                                                <label for="active-account" disabled="disabled">Visible</label>
                                            </li>
                                            <li disabled="disabled"><input value="Disabled account" id="disabled-account" type="radio" class="change-filter"> 
                                                <label for="disabled-account" disabled="disabled">Hidden</label>
                                            </li>
                                            <li disabled="disabled">
                                                <a class="clear-btn text-grey" type="button" disabled="disabled">Clear</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <!-- <div class="saved-btn" disabled="disabled">
                                    <button class="secondary fw-6 disabled" id="save">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true" disabled="disabled">
                                            <path d="M5.2 18a.8.8 0 0 1-.792-.914l.743-5.203-2.917-2.917a.8.8 0 0 1 .434-1.355l4.398-.733 2.218-4.435a.8.8 0 0 1 1.435.008l2.123 4.361 4.498.801a.8.8 0 0 1 .425 1.353l-2.917 2.917.744 5.203a.8.8 0 0 1-1.154.828l-4.382-2.22-4.502 2.223A.792.792 0 0 1 5.2 18z" disabled="disabled"></path>
                                        </svg>
                                        Saved
                                    </button>
                                </div>
                                <div class="sort-btn" disabled="disabled">
                                    <button class="secondary fw-6" id="sort">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true" disabled="disabled">
                                            <path d="M5.293 2.293a.997.997 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414L7 5.414V13a1 1 0 1 1-2 0V5.414L3.707 6.707a1 1 0 0 1-1.414-1.414l3-3zM13 7a1 1 0 0 1 2 0v7.585l1.293-1.292a.999.999 0 1 1 1.414 1.414l-3 3a.997.997 0 0 1-1.414 0l-3-3a.997.997 0 0 1 0-1.414.999.999 0 0 1 1.414 0L13 14.585V7z" disabled="disabled"></path>
                                        </svg>
                                        Sort
                                    </button>
                                    <ul class="filter_main_email_subscription_status filter-dropdown model" disabled="disabled">
                                        <label class="sort-dropdown" disabled="disabled">Sort by</label>
                                        <li disabled="disabled">
                                            <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                            <label for="subscribed" disabled="disabled">Newest update</label>
                                        </li>
                                        <li disabled="disabled">
                                            <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                            <label for="subscribed-pending" disabled="disabled">Oldest update</label>
                                        </li>
                                        <li disabled="disabled">
                                            <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                            <label for="subscribed-pending" disabled="disabled">Title A–Z</label>
                                        </li>
                                        <li disabled="disabled">
                                            <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                            <label for="subscribed-pending" disabled="disabled">Title Z–A</label>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </article>
                </div>
                <div class="table-loader">
                    <div class="loading-overlay" wire:loading.flex="">
                        <div class="page-loading"></div>
                    </div>
                    <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th" id="myTable" wire:ignore.self="">
                        <tbody id="product-name">
                            <tr>
                                <th>
                                    <div class="row all-select-checkbox"><label><input type="checkbox" wire:model="selectall" class="checked_all" name="customer_all"></label></div>
                                </th>
                                <th>
                                  
                                </th>
                                <th class="fw-6">
                                    <span class="all-customer-list">
                                    Showing {{count($pages)}} Pages
                                    </span>
                                    <div class="select-customers" style="display: none;">
                                        <span class="button-group product-more-action">
                                            <button class="secondary all-customer-select">
                                            <input type="checkbox" class="checked_all_clone" name="customer_all">
                                            <span><span class="selected_count">0</span> selected</span>
                                            </button>
                                            <button class="secondary select-customer-more-actions" onclick="openOption('email_subscription_status')">
                                                More actions
                                                <svg viewBox="0 0 20 20" class=" Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                                    <path d="m5 8 5 5 5-5H5z"></path>
                                                </svg>
                                            </button>
                                            <ul class="filter_email_subscription_status filter-dropdown more-action-dropdown" style="list-style-type: none" wire:ignore.self="">
                                                <li>
                                                    <button class="link" wire:click.prevent="store('active')" wire:ignore.self="">Set as active</button>
                                                </li>
                                                <li>
                                                    <button class="link" wire:click.prevent="store('draft')" wire:ignore.self="">Set as draft</button>
                                                </li>
                                                <li>
                                                    <button class="link" wire:click.prevent="store('archive')" wire:ignore.self="">Archive products</button>
                                                </li>
                                                <li>
                                                    <button class="link" wire:click.prevent="store('delete')" wire:ignore.self="">Delete products</button>
                                                </li>
                                            </ul>
                                        </span>
                                    </div>
                                </th>
                                <th></th>
                            </tr>
                            @if($pages)
                            @php $i=1; @endphp
                            @foreach($pages as $result)
                            <tr>
                                <td>
                                    <div class="row"><label><input type="checkbox" class="checkbox" name="selectepages"  wire:model="selectepages" value="{{$result->id}}"></label></div>
                                </td>
                                <td>
                                    <div class="row"></div>
                                </td>
                                <td>
                                    <p><b>{{$i}}</b></p>
                                </td>
                                <td>
                                    @if(user_permission('pages','update'))
                                    <a href="{{ route('pages-detail', $result->uuid) }}" class="black-color fw-6">{{$result->title}}</a>
                                    @else
                                    <p><b>{{$result->title}}</b></p>
                                    @endif
                                   
                                </td>
                                <td class="ta-right">
                                    <span class="text-grey pr-3">{{ $result->created_at->format('d-m-Y'); }}</span>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="pagination">

                     {!! $pages->links() !!}
                   
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
</div>