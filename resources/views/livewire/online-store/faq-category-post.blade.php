<div>
<x-admin-layout>
    <section class="full-width flex-wrap admin-full-width create-page-header">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center mb-3">
                    <a href="">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                            </svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">FAQ Category</h4>
                </div>
                <div class="product-header-btn">                     
                    <a class="button green-btn" href="{{ url('/admin/faq-category/new') }}">Add Category</a>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap bd_none admin-full-width blog-posts-sec">
        <div class="columns product_listing_columns pdpage-checkbox has-sections card ml-0 overflow-visible">
            
            <div class="card-section tab_content  active" id="all_customers" wire:ignore.self="">
                <div class="order-form">
                    <article class="full-width">
                       <div class="columns" wire:ignore="">
                        <div class="input-group">
                            <!-- Search Field -->
                            <div class="search-product-field">
                                <input class="fs-13 placeholder_gray fw-4" type="search" name="search_faqcat" id="search_faqcat" placeholder="Filter Faqcat" wire:model="filter_faqcat">
                            </div>
                            <button class="secondary select-customer-edit" wire:click.prevent="deleteselected" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" >Delete Selected</button>
                        </div> 
                        </div>
                    </article>
                </div>
                <div class="table-loader">
                    <div class="loading-overlay" wire:loading.flex="">
                        <div class="page-loading"></div>
                    </div>
                     
                    <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing" id="myTable" wire:ignore.self="">
                        <tbody id="product-name">
                            <tr>
                                <th>
                                    <div class="row all-select-checkbox"><label><input type="checkbox" wire:model="selectall" class="checked_all" name="customer_all"></label></div>
                                </th>
                                
                                <th class="fw-6" colspan="2">
                                    <span class="all-customer-list">
                                    Showing {{@$category_count}} Category
                                    </span>
                                </th>
                            </tr>
                            @isset($category)
                            @foreach($category as $val)
                            <tr>
                                <td>
                                    <div class="row"><label><input type="checkbox" class="checkbox" name="selectedfaqcat"  wire:model="selectefaqcat" value="{{$val->id}}"></label></div>
                                </td>
                                <td class="product-table-item">
                                    <a href="{{ route('FaqCategory_Detail', @$val->id) }}" data-id="{{ @$val->id }}" class="fs-14 fw-6 mb-0 black-color">{{@$val->category}}</a>
                                    <p class="mb-0 text-grey">Last edited: {{date('d M Y H:i:s', strtotime(@$val->updated_at))}}</p>
                                </td>
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                    <div class="pagination">

                     {!! $category->links() !!}
                   
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
</div>
<!-- Rename theme modal -->
<div id="rename-theme-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Rename theme</h2>
                <span onclick="document.getElementById('rename-theme-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body ta-left">
                <div class="row">
                    <div class="form-field-list">
                        <label>Provide a new name for this theme</label>
                        <input type="text" name="address" value="Supply">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button secondary" disabled="disabled">Rename</button>
            </div>
        </div>
    </div>
</div>

<!-- Download Supply modal -->
<div id="download-supply-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Download Supply</h2>
                <span onclick="document.getElementById('download-supply-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body ta-left">
                <p class="black-color">Your theme files will be emailed to test@webkul.com.</p>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button green-btn">Send email</button>
            </div>
        </div>
    </div>
</div>