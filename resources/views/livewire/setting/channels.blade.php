<div>
<x-admin-layout>
<section class="full-width flex-wrap admin-full-width list-customers" wire:ignore.self>
    <div class="page_header d-flex align-item-center justify-content-space-between full-width mb-2">
        <h4 class="mb-0 fw-5">Tags sale</h4>
        <div class="header-btn-group">
            <a class="link" data-toggle="modal" data-target="#export" >Export</a>
            <a class="link" data-toggle="modal" data-target="#import">Import</a>
            <a class="button green-btn" href="{{ route('tagsale-create') }}">Add Tags Sale</a>
        </div>
    </div>

    <div class="columns product_listing_columns pdpage-checkbox has-sections card ml-0" wire:ignore.self>

        
        <div class="card-section tab_content  active" id="all_customers" wire:ignore.self>
            <div class="order-form">
                <article class="full-width">
                    <div class="columns" wire:ignore.self>
                        <div class="input-group">
                            <!-- Search Field -->
                            <div class="search-product-field">
                                <input class="fs-13 placeholder_gray fw-4" type="search" name="search_tags" id="search_products" wire:model="filter_tags" placeholder="Filter Tags">
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
                                <button class="secondary fw-6" id="sort" onclick="sort_table(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M5.293 2.293a.997.997 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414L7 5.414V13a1 1 0 1 1-2 0V5.414L3.707 6.707a1 1 0 0 1-1.414-1.414l3-3zM13 7a1 1 0 0 1 2 0v7.585l1.293-1.292a.999.999 0 1 1 1.414 1.414l-3 3a.997.997 0 0 1-1.414 0l-3-3a.997.997 0 0 1 0-1.414.999.999 0 0 1 1.414 0L13 14.585V7z"></path></svg>
                                    Sort
                                </button>
                                <ul class="filter_main_email_subscription_status filter-dropdown model">
                                    <label class="sort-dropdown">Sort options</label>
                                    <li>
                                        <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                        <label for="subscribed">Product title A–Z</label>
                                    </li>
                                    <li>
                                        <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                        <label for="subscribed-pending">Product title Z–A</label>
                                    </li>
                                    <li>
                                        <input value="Not subscribed" id="not-subscribed" type="radio" class="change-filter">
                                        <label for="not-subscribed">Created (oldest first)</label>
                                    </li>
                                    <li>
                                        <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                        <label for="subscribed">Created (newest first)</label>
                                    </li>
                                    <li>
                                        <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                        <label for="subscribed-pending">Updated (oldest first)</label>
                                    </li>
                                    <li>
                                        <input value="Not subscribed" id="not-subscribed" type="radio" class="change-filter">
                                        <label for="not-subscribed">Updated (newest first)</label>
                                    </li>
                                    <li>
                                        <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                        <label for="subscribed">Low inventory</label>
                                    </li>
                                    <li>
                                        <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                        <label for="subscribed-pending">High inventory</label>
                                    </li>
                                    <li>
                                        <input value="Not subscribed" id="not-subscribed" type="radio" class="change-filter">
                                        <label for="not-subscribed">Product type A–Z</label>
                                    </li>
                                    <li>
                                        <input value="Subscribed" id="subscribed" type="radio" class="change-filter">
                                        <label for="subscribed">Product type Z–A</label>
                                    </li>
                                    <li>
                                        <input value="Subscription Pending Confirmation" id="subscribed-pending" type="radio" class="change-filter">
                                        <label for="subscribed-pending">Vendor A–Z</label>
                                    </li>
                                    <li>
                                        <input value="Not subscribed" id="not-subscribed" type="radio" class="change-filter">
                                        <label for="not-subscribed">Vendor Z–A</label>
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
                <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing" id="myTable" wire:ignore.self>
                    <tbody id="product-name">
                        <tr>
                            <th>
                                <div class="row all-select-checkbox"><label><input type="checkbox" class="checked_all" name="customer_all"></label></div>
                            </th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Create At</th>
                        </tr>
                        <span>@foreach($tagsale as $row)
                        <tr>
                            <td>
                                <div class="row"><label><input type="checkbox" class="checkbox" name="selectedproducts" value="{{$row->id}}" wire:model.lazy="selectedproducts"></label></div>
                            </td>
                             <td class="product-img">
                                <div class="pd-blank-img">
                                    <a class="tc-black fw-6" href="{{ route('product-front-detail', $row->seo_utl) }}">
                                    <img src="{{ asset('storage/'.$row->icon) }}" />

                                    </a>
                                </div>
                            </td>
                            <td class="product-table-item">
                                <a class="tc-black fw-6" href="{{ route('tagsale-detail', $row->id) }}">{{$row->title}}</a>
                            </td>
                            <td class="type-table-item">{{$row->created_at}}</td>
                        </tr>
                        @endforeach</span>
                    </tbody>
                </table>
              
                <div class="pagination">

                
                </div>
            </div>
        </div>
    </div>
</section>

</x-admin-layout>
</div>

