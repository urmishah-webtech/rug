<div>
<x-admin-layout>
    <div wire:key="alert">

         @if (session()->has('message'))

         <div class="alert alert-success">

            {{ session('message') }}

         </div>

         @endif

      </div>
    <section class="full-width flex-wrap admin-body-width create-page-header">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center mb-3">
                    <a href="{{ route('pages-list') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                            </svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Seller Profile</h4>
                </div>
                <div class="product-header-btn">
                    <button class="button link" onclick="document.getElementById('duplicate-page').style.display='block'"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M7.5 2A1.5 1.5 0 0 0 6 3.5V13a1 1 0 0 0 1 1h9.5a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 16.5 2h-9zm-4 4H4v10h10v.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 16.5v-9A1.5 1.5 0 0 1 3.5 6z"></path></svg> Duplicate</button>
                    <button class="button link"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17.928 9.628C17.837 9.399 15.611 4 10 4S2.162 9.399 2.07 9.628a1.017 1.017 0 0 0 0 .744C2.163 10.601 4.389 16 10 16s7.837-5.399 7.928-5.628a1.017 1.017 0 0 0 0-.744zM10 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-6a2 2 0 1 0 .002 4.001A2 2 0 0 0 9.999 8z"></path></svg> View page</button>
                    <div class="pagination">
                        <span class="button-group">
                        <button class="secondary icon-prev"></button>
                        <button class="secondary icon-next"></button>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap bd_none admin-body-width" wire:ignore>
        <article class="full-width">
            <div class="columns two-thirds">
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title" wire:model="page.title">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.content" class="form-control required" name="description" id="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card search-engine-listing-card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="fs-16 mb-0 fw-6">Search engine listing preview</h4>
                            <a class="link edit-website-seo-btn blue-color">Edit website SEO</a>
                        </div>
                        <div class="ccd-search-engine-listing">
                            <span class="mb-0 black-color">Add a description to see how this Page might appear in a search engine listing</span>
                        </div>
                    </div>
                    <div class="card-middle" style="display: none;">
                        <div class="row">
                            <label>Page title</label>
                            <input type="text" name="seo_title" wire:model="page.seo_title">
                            <p>0 of 70 characters used</p>
                        </div>
                        <div class="row">
                            <label>Description</label>
                            <textarea name="seo_descripation" wire:model="page.seo_description"></textarea>
                            <p>0 of 320 characters used</p>
                        </div>
                        <div class="row">
                            <label>URL and handle</label>
                            <div class="url-input">
                                <span>http://185.160.67.108/estore/public/pages/</span>
                                <input type="hidden" name="urlpath" value="http://185.160.67.108/estore/public/pages">
                                <input type="text" name="seo_utl" wire:model="page.seo_url">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns one-third right-details">
                <div class="card">
                    <div class="p-3">
                        <h3 class="fs-16 fw-6 lh-normal">Visibility</h3>
                        <div class="row">
                            <label class="mb-8"><input type="radio" name="option1a" checked="checked">Visible <span>(as of 3/29/2017, 2:47 PM UTC)</span></label>
                            <label class="mb-8"><input type="radio" name="option1a">Hidden <span>(will become visible on 9/22/2021, 6:00 AM UTC)</span></label>
                        </div>
                        <a class="blue-color" href="#">Set visibility date</a>
                        <div class="row date-time-row">
                            <label>Visibility date</label>
                            <input type="date">
                            <input type="time">
                        </div>
                        <a class="blue-color" href="#">Clear date...</a>
                    </div>
                </div>
                <div class="card">
                    <div class="p-3">
                        <h3 class="fs-16 fw-6 lh-normal">Online store</h3>
                        <div class="row">
                            <label class="lbl-mb-4">Theme template</label>
                            <select>
                                <option value="">Default page</option>
                                <option value="auction_cust_bids">auction_cust_bids</option>
                                <option value="auction_products">auction_products</option>
                                <option value="config">config</option>
                                <option value="contact">contact</option>
                                <option value="feeds">feeds</option>
                                <option value="mp_askme_profile">mp_askme_profile</option>
                                <option value="mp_global_product">mp_global_product</option>
                                <option value="mp_seller_profile">mp_seller_profile</option>
                                <option value="private">private</option>
                                <option value="public">public</option>
                            </select>
                        </div>
                        <p class="mb-0">Assign a template from your current theme to define how the page is displayed.</p>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width" wire:ignore.self>
        <div class="page-bottom-btn">
            <button class="warning">Delete page</button>
            <button wire:click="Updatepages()">Save</button>
        </div>
    </section>

    @livewireScripts


<script>
     const editor = CKEDITOR.replace('description');
editor.on('change', function (event) {
        // console.log(event.editor.getData())
        @this.set('page.content', event.editor.getData());
    })
     
</script>

<div id="duplicate-page" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Duplicate this page?</h2>
                <span onclick="document.getElementById('duplicate-page').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body ta-left">
                <div class="row">
                    <div class="form-field-list">
                        <label>Provide a name for your new page</label>
                        <input type="text" name="address" value="Copy of Seller Profile">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button green-btn">Duplicate</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $( ".edit-website-seo-btn" ).click(function() {     
        $('.search-engine-listing-card .card-middle').toggle();
    });
</script>
</x-admin-layout>
</div>