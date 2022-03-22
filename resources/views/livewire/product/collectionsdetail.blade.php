<div>
<x-admin-layout>
    <section class="full-width admin-body-width flex-wrap admin-full-width inventory-heading">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center">
                    <a href="{{ route('collections') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">{{$collection->title}}</h4>
                </div>
                <a class="button green-btn" href="http://185.160.67.108/estore/public/admin/customers/new">Save</a>
            </div>
        </article>
    </section>

    <section wire:ignore.self class="full-width admin-body-width paination-link flex-wrap admin-full-width bd_none add-transfers-sec">
        <article class="full-width">
            <div class="columns two-thirds">
                <div class="card">
                    <label>Title</label>
                    <input type="text" name="title" wire:model.lazy="collection.title" placeholder="e.g. Summer collection, Under $100, Staff picks">
                    <div class="product-des-customize">
                        <label>Description (optional)</label>
                        <div class="product-des-customize-inner">
                            <div class="product-customize-header">
                                <div class="customize-left-icon">
                                    <span class="button-group">
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M15.9 14.2c-.1 0-.3 0-.5-.1-.2 0-.3-.1-.4-.2-.2-.1-.3-.2-.4-.3s-.2-.3-.2-.4l-3.9-9.1V4h-.8v.1c-.6 1.3-1.2 2.8-1.9 4.4-.7 1.7-1.4 3.2-1.9 4.5l-.3.6c-.1.1-.3.3-.5.4-.1 0-.3.1-.5.1s-.4.1-.5.1H4v.8h4.6v-.8h-.1c-.4 0-.8-.1-1.1-.2s-.4-.2-.4-.3v-.3c0-.1.1-.3.1-.5l.3-.7c.1-.2.3-.8.5-1.2h3.498l1 2.6v.2s0 .1-.3.1c-.3.1-.6.1-1 .1h-.1v1h5v-.8h-.1zm-5-4.2H8.2l1.3-3.2 1.4 3.2z"></path></svg>
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu down-arrow" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg>
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M15.582 11.42c-.327-.546-.436-.656-.764-.874-.327-.327-.764-.436-1.2-.655-.436-.108-.873-.217-1.2-.217v-.218l1.09-.327c.328-.218.656-.327.874-.545a1.7 1.7 0 00.655-.873c.218-.327.218-.655.218-1.09 0-.874-.327-1.528-.982-1.965S12.528 4 11 4H5v.764c.218.11.436.11.545.218.218.11.436.218.436.327.11.108.11.326.11.544v8.4c0 .218 0 .436-.11.545s-.217.217-.435.326c-.11.11-.218.11-.436.11H5v.763h5.782c.764 0 1.527 0 2.182-.11.545-.11 1.09-.327 1.527-.655.437-.218.874-.545 1.092-.982.218-.327.327-.873.327-1.527 0-.436 0-.764-.328-1.31v.002zM8.818 4.763h1.418c.655 0 1.2.218 1.527.545.327.435.545.872.545 1.526 0 .764-.218 1.31-.655 1.745s-.982.656-1.855.656h-.982V4.764zm3.382 9.818c-.327.436-.873.655-1.527.655-.327 0-1.09-.11-1.418-.218-.218-.11-.327-.328-.436-.546V10.11h.763c.873 0 2.073.218 2.51.655.544.436.763 1.09.763 1.855 0 .873-.218 1.527-.655 1.964z"></path></svg>
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M13.728 4L13.4 5.09c-.108 0-.435 0-.654.11-.327 0-.545.11-.655.11-.326.108-.544.217-.654.326l-.218.545-1.855 7.637v.218c0 .11 0 .218.11.327s.217.218.326.218c.108 0 .326.11.544.11.327.217.545.217.655.217l-.22 1.09H5l.217-1.09h.764s.546-.11.656-.11c.218-.108.436-.217.545-.326s.22-.326.22-.544l1.96-7.638v-.327c0-.11 0-.218-.11-.327 0-.11-.108-.11-.326-.218-.11-.11-.327-.11-.655-.218-.218 0-.436-.11-.545-.11L7.945 4h5.78z"></path></svg>
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M5.31 5.055l-1.01-.18V4h5.044v.875l-1.312.186v4.693c0 .993.208 1.726.625 2.2s1.042.71 1.874.71c.425 0 .79-.068 1.1-.205.296-.128.558-.328.76-.58.2-.25.345-.552.438-.906s.14-.75.14-1.19v-4.73l-1.334-.18V4H15.7v.875l-1.048.18v4.624c0 .695-.114 1.288-.342 1.778s-.54.89-.938 1.198c-.398.308-.87.534-1.416.676s-1.14.213-1.78.213c-.824 0-1.54-.074-2.15-.223s-1.117-.384-1.518-.704a2.92 2.92 0 01-.9-1.235c-.2-.502-.3-1.105-.3-1.808v-4.52zM14.455 16H15.7v-1.412H4.3V16h10.156z"></path></svg>
                                        </button>
                                    </span>
                                    <span class="button-group">
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M8 9h7a1 1 0 010 2H8a1 1 0 010-2zm0-4h7a1 1 0 010 2H8a1 1 0 010-2zm0 8h7a1 1 0 010 2H8a1 1 0 010-2zM6 6a1 1 0 11-2 0 1 1 0 012 0zm0 4a1 1 0 11-2 0 1 1 0 012 0zm0 4a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M8.002 8.993h7a1 1 0 010 2h-7a1 1 0 010-2zm-4-2.521H4.7V4.53l-.65.15v-.53L4.705 4h.602v2.472h.697v.52h-2v-.52zm4-1.479h7a1 1 0 010 2h-7a1 1 0 010-2zm-3.315 5.481h1.35v.512H4.002v-.496l.343-.335.743-.734c.107-.112.185-.212.232-.3a.517.517 0 00.07-.258.362.362 0 00-.13-.304c-.086-.072-.208-.107-.367-.107-.113 0-.24.022-.38.063a2.53 2.53 0 00-.442.18v-.54c.154-.052.304-.09.45-.118.14-.026.28-.04.423-.04.34 0 .606.073.8.218.19.137.3.36.29.594a.828.828 0 01-.062.325 1.348 1.348 0 01-.217.337c-.076.088-.284.29-.625.602l-.44.406v-.004zm3.315 2.519h7a1 1 0 010 2h-7a1 1 0 010-2zm-3.12.647h-.328v-.503h.328c.152 0 .27-.028.354-.084.08-.05.13-.14.126-.237a.289.289 0 00-.126-.25.606.606 0 00-.354-.09c-.126 0-.25.015-.374.04-.14.03-.278.07-.413.12v-.52c.138-.038.28-.07.42-.09.14-.022.272-.033.4-.033.327 0 .58.066.764.2.178.124.28.33.273.548a.57.57 0 01-.158.42.777.777 0 01-.45.215c.22.036.39.118.506.246.12.14.183.322.175.506 0 .28-.096.493-.29.64-.19.147-.47.22-.838.22-.305 0-.608-.048-.897-.143v-.53c.13.062.27.108.42.14s.31.046.476.046c.14.007.278-.03.394-.108a.342.342 0 00.145-.29.42.42 0 00-.145-.342c-.097-.08-.234-.12-.41-.12h.002z"></path></svg>
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M5 4h10a1 1 0 010 2H5a1 1 0 010-2zm5 4c0-.552.44-1 .996-1h3.996a1 1 0 11.016 2H10.99A.99.99 0 0110 8zm1 2h4a1 1 0 010 2h-4a1 1 0 010-2zm-6 3h10a1 1 0 010 2H5a1 1 0 010-2zM4 9.48L8 7v5z"></path></svg>    
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M5 4h10a1 1 0 010 2H5a1 1 0 010-2zm5 4c0-.552.44-1 .996-1h3.996a1 1 0 11.016 2H10.99A.99.99 0 0110 8zm1 2h4a1 1 0 010 2h-4a1 1 0 010-2zm-6 3h10a1 1 0 010 2H5a1 1 0 010-2zm3-3.52L4 7v5z"></path></svg>
                                        </button>
                                    </span>
                                    <span class="button-group">
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M5 4h4.003a1 1 0 010 2H5a1 1 0 010-2zM4 8c0-.552.454-1 1.01-1H13a1 1 0 11.009 2H4.995A.993.993 0 014 8zm1 2h6.006a1 1 0 010 2H5a1 1 0 010-2zm0 3h10.006a1 1 0 010 2H5a1 1 0 010-2z"></path></svg>
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu down-arrow" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg>
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14.875 11.627c-.125 0-.25 0-.375-.118l-.75-.237-.125-.355L10.5 3h-.875v.236c-.5 1.064-1 2.245-1.5 3.664C7.5 8.318 7 9.5 6.5 10.682c0 .236-.125.355-.25.473 0 .118-.125.236-.375.355l-.75.236H5v.71h3.875v-.828H8.75c-.375 0-.625-.118-.875-.118-.25-.118-.375-.118-.375-.236v-.236c0-.118 0-.236.125-.473 0-.236.125-.355.25-.59.125-.12.375-.828.375-1.065H11l.875 2.364v.236s-.125 0-.25.118c-.25 0-.5.118-.875.118h-.125v.71H15v-.828h-.125zm-4.25-3.545h-2l1-2.482 1 2.482zm3.125 5.554h-7.5c-.75 0-1.25.473-1.25 1.182C5 15.408 5.5 16 6.25 16h7.5c.75 0 1.25-.473 1.25-1.182 0-.59-.5-1.182-1.25-1.182z"></path></svg>    
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu down-arrow" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg>
                                        </button>
                                    </span>
                                    <span class="button-group">
                                        <button class="secondary" disabled="disabled">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14.588 12.824a.675.675 0 00-.206-.5l-1.53-1.53a.675.675 0 00-.5-.206.704.704 0 00-.528.236c.014.014.06.06.14.136.1.09.19.19.268.298a.59.59 0 01.12.39.675.675 0 01-.205.5.675.675 0 01-.5.205.6.6 0 01-.39-.12 2.51 2.51 0 01-.14-.11 5.895 5.895 0 01-.157-.16l-.136-.14a.711.711 0 00-.036 1.037l1.513 1.522a.686.686 0 00.5.2.713.713 0 00.5-.192l1.08-1.074a.667.667 0 00.207-.492zM9.42 7.64a.675.675 0 00-.206-.5L7.7 5.618a.675.675 0 00-.5-.206.715.715 0 00-.5.198L5.618 6.684a.674.674 0 00-.206.492c-.003.188.07.37.206.5l1.53 1.53a.677.677 0 00.5.198c.2.002.392-.08.528-.228l-.14-.136a3.344 3.344 0 01-.157-.158 1.437 1.437 0 01-.11-.14.583.583 0 01-.123-.39.675.675 0 01.206-.5.675.675 0 01.5-.205.6.6 0 01.39.12c.063.048.11.085.14.11.03.03.08.08.157.16l.136.14a.711.711 0 00.243-.537zM16 12.824c0 .588-.208 1.085-.625 1.492l-1.08 1.074c-.393.4-.934.622-1.495.61a2.018 2.018 0 01-1.5-.625l-1.513-1.522a2.03 2.03 0 01-.61-1.493c0-.603.215-1.115.647-1.536l-.648-.648c-.396.42-.95.656-1.53.648a2.046 2.046 0 01-1.5-.618l-1.53-1.53A2.045 2.045 0 014 7.176c0-.588.208-1.085.625-1.492l1.08-1.074c.393-.4.934-.622 1.495-.61.593 0 1.093.208 1.5.625l1.514 1.522c.407.407.61.904.61 1.493 0 .603-.215 1.115-.647 1.536l.648.648c.396-.42.95-.656 1.53-.648.587 0 1.087.206 1.5.618l1.53 1.53c.41.41.616.91.616 1.5z"></path></svg>
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M5 4h10a1 1 0 010 2H5a1 1 0 010-2zm11 10c0 .552-.456 1-1.002 1H5.003c-.266 0-.52-.104-.71-.292S4 14.265 4.002 14h12z"></path><path d="M16 5.002v8.995c0 .266-.104.52-.292.71s-.443.293-.708.292V4c.552 0 1 .455 1 1v.002zm-12 0v8.995c0 .266.104.52.292.71s.443.293.708.292V4c-.552 0-1 .455-1 1v.002zM14.5 9h.5V8H5v1h9.5zm0 3h.5v-1H5v1h9.5z"></path><path d="M8 13.5v.5h1V6H8v7.5zm3 0v.5h1V6h-1v7.5z"></path></svg>
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu down-arrow" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg>
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M16 14c0 .553-.456 1-1.002 1H5.003c-.266.002-.52-.103-.71-.29S4 14.265 4.002 14h12zm0-9c0-.55-.456-1-1.002-1H5.003c-.266 0-.52.105-.71.293S4 4.736 4.002 5h12z"></path><path d="M16 5.003v8.995c0 .266-.104.52-.292.71S15.265 15 15 15V4c.552 0 1 .456 1 1.002zm-12 0v8.995c0 .266.104.52.292.71S4.735 15 5 15V4c-.552 0-1 .456-1 1.002zM9 7.5a1.5 1.5 0 11-2.999.001A1.5 1.5 0 019 7.5z"></path><path d="M9.463 11.952L8 10.002l-3 4h10V9.8L13 7z"></path></svg>
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M5 6h7a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1V7a1 1 0 011-1z"></path><path d="M16 7v6l-5-3z"></path></svg>    
                                        </button>
                                        <button class="secondary">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M12.293 13.707l.707.707L14.414 13 7 5.586 5.586 7l.707.707z"></path><path d="M16 10a6 6 0 10-12 0 6 6 0 0012 0zM6 10c0-2.21 1.79-4 4-4s4 1.79 4 4-1.79 4-4 4-4-1.79-4-4z"></path></svg>
                                        </button>
                                    </span>
                                </div>
                                <div class="customize-right-icon">
                                    <button class="secondary">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M9 8.406L5.24 10.01 9 11.6V13l-5-2.334V9.34L9 7v1.406zm2 0V7l5 2.34v1.326L11 13v-1.4l3.76-1.59L11 8.405z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="product-dec-textbox">
                                 <textarea wire:model.lazy="collection.description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
               <!--  <div class="card collection-type-card ccd-conditions-card">
                    <div class="card-middle">
                        <h3 class="fs-16 fw-6">Conditions</h3>
                        <div class="row">
                            <label>Products must match:</label>
                            <label><input type="radio" name="condition_match" wire:model.lazy="collection.condition_match">all conditions</label>
                            <label><input type="radio" name="condition_match" wire:model.lazy="collection.condition_match">any condition</label>
                        </div>
                        <div class="row conditions-select-group">
                            <div>
                                <select>
                                    <option value="TITLE">Product title</option>
                                    <option value="TYPE">Product type</option>
                                    <option value="VENDOR">Product vendor</option>
                                    <option value="VARIANT_PRICE">Product price</option>
                                    <option value="TAG">Product tag</option>
                                    <option value="VARIANT_COMPARE_AT_PRICE">Compare at price</option>
                                    <option value="VARIANT_WEIGHT">Weight</option>
                                    <option value="VARIANT_INVENTORY">Inventory stock</option>
                                    <option value="VARIANT_TITLE">Variant’s title</option>
                                </select>
                            </div>
                            <div>
                                <select>
                                    <option value="EQUALS">is equal to</option>
                                    <option value="NOT_EQUALS">is not equal to</option>
                                    <option value="GREATER_THAN" disabled="">is greater than</option>
                                    <option value="LESS_THAN" disabled="">is less than</option>
                                    <option value="STARTS_WITH">starts with</option>
                                    <option value="ENDS_WITH">ends with</option>
                                    <option value="CONTAINS">contains</option>
                                    <option value="NOT_CONTAINS">does not contain</option>
                                    <option value="IS_SET" disabled="">is not empty</option>
                                    <option value="IS_NOT_SET" disabled="">is empty</option>
                                </select>
                            </div>
                            <div>
                                <input type="text">
                            </div>
                            <div class="conditions-select-group-btn">
                                <button class="secondary">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m10 16-4-4h8l-4 4zm0-12 4 4H6l4-4z"></path></svg>
                                </button>
                            </div>
                        </div>
                        <button class="buttton secondary add-another-con-btn">Add another condition</button>
                    </div>
                </div> -->
                <div class="columns product_listing_columns pdpage-checkbox has-sections card ml-0 product-tab-table ccd-product-tbl" wire:ignore.self>
                    <div class="product-table-title">
                        <h3>Products</h3>
                    </div>
                    <div class="row pd-collections-product-head">
                        <div class="browse-products-search">
                            <input type="search" id="search-product" placeholder="Search products">
                            <button class="secondary browse-products-btn" onclick="document.getElementById('collection-edit-product-modal').style.display='block'">Browse</button>
                        </div>
                        <select>
                            <option value="BEST_SELLING">Best selling</option>
                            <option value="ALPHA_ASC">Product title A-Z</option>
                            <option value="ALPHA_DESC">Product title Z-A</option>
                            <option value="PRICE_DESC">Highest price</option>
                            <option value="PRICE_ASC">Lowest price</option>
                            <option value="CREATED_DESC">Newest</option>
                            <option value="CREATED">Oldest</option>
                            <option value="MANUAL">Manually</option>
                        </select>
                    </div>
                    <div class="product-table-details">
                        <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing">
                            <tbody>
                                @php $i = 1; @endphp
                                    @if(!empty($selected_product) && $selected_product->count())
                                    @foreach($selected_product as $row)
                                <tr>
                                    <td>
                                       {{$i}}.
                                    </td>
                                    <td class="product-img">
                                        <img src="https://cdn.shopify.com/s/files/1/0275/7722/1235/products/7c5198d2a0751fa76c8433dba4a1a12a_350x350.jpg">
                                    </td>
                                    <td class="product-table-item">
                                        <a class="tc-black fw-6">{{$row['collection_product']->title}}</a>
                                    </td>
                                    <td class="vendor-table-item">
                                        <span class="tag blue">Draft</span>
                                    </td>
                                    <td><button wire:click="destroy({{$row->id}})" class="btn link cd-pd-delete-btn btn-xs btn-danger"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path></svg></button></td>
                                </tr>
                                @php $i++; @endphp
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="10">There are no data.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="pagination" wire:ignore.self>

                         {{$product->links() }}

                        </div>
                    </div>
                </div>

                <div class="card card-pd-0 pd-variants-card main-variant-card" wire:ignore>

                    <div class="card-header">

                        <div class="header-title">

                            <h4 class="fs-16 mb-0 fw-6">Featured</h4>

                        </div>

                        <label><input type="checkbox" name="featured" wire:model="collection.featured" wire:ignore class="click-varients-type">Assign this collection as Featured</label>

                    </div>
                </div>

 
                <div class="card search-engine-listing-card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="fs-16 mb-0 fw-6">Search engine listing preview</h4><a class="link edit-website-seo-btn">Edit website SEO</a>
                        </div>
                        <div class="ccd-search-engine-listing">
                            <h4>{{$collection->seo_title}}</h4>
                          
                             @if($collection->seo_url)
                            <p><a href="{{ url('/collection').'/'.$collection->seo_url }}">{{ url('/collection').'/'.$collection->seo_url }}</a></p>
                            @endif
                            <span>{{$collection->Description}}</span>
                        </div>
                    </div>
                    <div class="card-middle">
                        <div class="row">
                            <label>Page title</label>
                            <input type="text" wire:model.lazy="collection.seo_title">
                            <p>0 of 70 characters used</p>
                        </div>
                        <div class="row">
                            <label>Description</label>
                            <textarea wire:model.lazy="collection.seo_description"></textarea>
                            <p>0 of 320 characters used</p>
                        </div>
                        <div class="row">
                            <label>URL and handle</label>
                            <div class="url-input">
                                <span>{{ url('/collection') }}/</span>
                                <input type="text" wire:model.lazy="collection.seo_url">
                            </div>
                        </div>
                    </div>     
                </div>
            </div>

            <!--Edit products modal-->
    <form>
    <div id="collection-edit-product-modal" class="customer-modal-main" wire:ignore.self>
        <div class="customer-modal-inner">

            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Edit products</h2>
                    <span onclick="document.getElementById('collection-edit-product-modal').style.display='none'" class="modal-close-btn">
                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                            <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                        </svg>
                    </span>
                </div>
                <div class="modal-body ta-left card-pd-0">
                    <div class="p-16 modal-search">
                        <input type="search"  id="search"  placeholder="Search products">
                    </div>

                    @php $i = 1; @endphp
                        @if(!empty($productpaginator) && $productpaginator->count())
                        @foreach($productpaginator as $key => $row)
                    <div class="manage-carriers-list">
                        <label class="collection-edit-pd-list"><input type="checkbox" value="{{ $row->id }}" wire:model.lazy="selectedproducts" wire:ignore.self>
                        <img src="https://cdn.shopify.com/s/files/1/0275/7722/1235/products/night_3daf8a9e-9370-45a8-a7af-be759cea1504_200x200.jpg?v=1630051535">
                        <div class="manage-carriers-title">
                            <p class="mb-0 black-color product-title">{{$row->title}}</p>
                            <p class="mb-0"><span class="tag blue">Draft</span></p>
                        </div>
                        </label>
                    </div>
                     @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="10">There are no data.</td>
                    </tr>
                    @endif
                  
                </div>

                <div class="modal-footer">
                    <button class="button secondary" onclick="document.getElementById('collection-edit-product-modal').style.display='none'">Cancel</button>
                    <button class="button green-btn" onclick="document.getElementById('collection-edit-product-modal').style.display='none'" wire:click.prevent="store()" wire:ignore.self>Done</button>
                </div>
            </div>
        </div>
    </div>
    </form>

            <div class="columns one-third right-details">
                <div class="card collection-availability-card">
                    <div class="card-middle sales-channels-apps">
                        <div class="header-title">
                            <h4 class="fs-16  fw-6 mb-0">Collection availability</h4><a class="link" onclick="document.getElementById('sales-channels-apps-modal').style.display='block'">Manage</a>
                        </div>
                        <p class="store-online mb-0"><span class="light-btn"></span>Online Store and Point of Sale</p>
                        <div class="sales-channels-dropdown">
                            <p><span>Online Store <a href="#">Schedule availability</a></span><span class="light-btn"></span></p>
                            <p>Point of Sale<span class="light-btn"></span></p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="link sales-channel-btn">Show more <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path></svg></a>
                    </div>
                </div>
                <div class="card pd-20 tag-card card-grey-bg collection-upload-image">
                    <div class="header-title">
                        <h3 class="fs-16  fw-6 mb-0">Collection image</h3>
                    </div>
                    <div class="single-upload-img">
                        <input type='file' id="readUrl">
                        <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label custome-file-upload">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"></path></svg>
                            <p class="secondary">Add images</p>
                            <span class="fs-12">or drop an image to upload</span>
                        </label>

                         @if($collection->image != "")
                        <img id="uploadedImage" src="{{ url('storage/'.$collection->image) }}" alt="Uploaded Image" accept="image/png, image/jpeg">
                        @else
                        <img id="uploadedImage" src="{{ url('storage/'.$collection->image) }}" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
                        @endif
                        
                    </div>
                    <!-- <div class="import-file" onclick="document.getElementById('update-variant-image-modal').style.display='block'"> -->
                            <!--<input type="file" name="file" class="form-control" id="import_customers" onchange="importCustomers()">-->
                        <!-- <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label custome-file-upload">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"></path></svg>
                            <p class="secondary">Add images</p>
                            <span class="fs-12">or drop images to upload</span>
                        </label>
                        <input type="file" name="file" id="et_pb_contact_brand_file_request_0" class="file-upload" onchange="importCustomers()">
                    </div> -->
                </div>
                <div class="card tag-card card-grey-bg pd-20 pd-online-store-card">
                    <h3 class="fs-16  fw-6">Online store</h3>
                    <label>Theme template</label>
                        <select>
                            <option>Default product</option>
                        </select>
                    <p>Assign a template from your current theme to define how the product is displayed.</p>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width">
        <div class="page-bottom-btn">
            @if(user_permission('collections','delete'))
            <button class="button warning">Delete collection</button>
            @endif
            <button wire:click.prevent="update('main-change', event.target.value)" class="button">Save</button>
        </div>
    </section>

    <!--select channel apps modal-->
    <div  wire:ignore wire:key="sales-channels-apps-modal" id="sales-channels-apps-modal" class="customer-modal-main">
        <div class="customer-modal-inner">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Sales channels and apps</h2>
                    <span onclick="document.getElementById('sales-channels-apps-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
                </div>
                <div class="modal-body">
                    <p><button class="link">Select all</button> 0 of 2 selected</p>
                    <label><input type="checkbox" wire:model.lazy="collection.online_store" name="online_store">Online Store</label>
                    <label><input type="checkbox" wire:model.lazy="collection.point_of_sale" name="point_of_sale">Point of Sale</label>
                </div>
                <div class="modal-footer">
                    <button class="button secondary">Cancel</button>
                    <button wire:click.prevent="update('online-store-change', event.target.value)" class="button green-btn">Done</button>
                </div>
            </div>
        </div>
    </div>
    
</x-admin-layout>
</div>

<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    console.log(value);
    console.log('hello');
    $(".manage-carriers-list").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
$(document).ready(function(){
  $("#search-product").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
    $('.sales-channel-btn').on('click', function() {
        $('.sales-channels-apps').toggleClass('channels-dropdown-open');
    });
    
    $( ".edit-website-seo-btn" ).click(function() {     
        $('.search-engine-listing-card .card-middle').toggle();
    });
</script>


<script type="text/javascript">
    document.getElementById('readUrl').addEventListener('change', function(){
      if (this.files[0] ) {
        var picture = new FileReader();
        picture.readAsDataURL(this.files[0]);
        picture.addEventListener('load', function(event) {
          document.getElementById('uploadedImage').setAttribute('src', event.target.result);
          document.getElementById('uploadedImage').style.display = 'block';
        });
      }
    });
</script>