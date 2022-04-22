<div>

<x-admin-layout>
    
    <section class="full-width flex-wrap admin-body-width add-customer-head-sec product-details-header">

        <article class="full-width">

            <div class="columns customers-details-heading">

                <div class="page_header d-flex  align-item-center mb-3">

                    <a href="{{ route('products') }}">

                        <button class="secondary icon-arrow-left mr-2">

                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>

                        </button>

                    </a>

                    <h4 class="mb-0 fw-5">{{$product->title}}</h4>

                </div>

                <div class="product-header-btn">

                    <button class="button link" onclick="document.getElementById('duplicate-product-modal').style.display='block'">Duplicate</button>

                    <button class="button link">Preview</button>

                    <div class="pagination">

                    <span class="button-group">

                        <button class="secondary icon-prev"></button>

                        <button class="secondary icon-next"></button>

                    </span>

                </div>

                </div>

            </div>

        </article>

   

<form wire:submit.prevent="updatedetail" enctype="multipart/form-data">

    <section wire:ignore.self class="full-width flex-wrap admin-body-width customers-details-sec product-details-sec">

         <article class="full-width">

            <div class="columns two-thirds">

                <div class="card">

                     <label>Title</label>

                    <input type="text" name="title" wire:model="product.title">

                    <div class="product-des-customize">

                        <label>Description</label>

                        <div class="product-des-customize-inner">

                            <div class="product-dec-textbox">

                                  <textarea class="form-control tinymce-editor" name="descripation" id="descripation" wire:model="product.descripation"></textarea>

                            </div>

                        </div>

                    </div>

                </div>



                

                <div class="card product-media-card">

                    <div class="card-header upload-media-header">

                        <h3 class="fs-16 fw-6 m-0">Media</h3>

                        <button class="link add-media-url-btn">Add media from URL <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></button>

                        <ul class="add-media-dropdown">

                            <li><button class="link">Edit options</button></li>

                            <li><button class="link">Reorder variants</button></li>

                        </ul>

                    </div>

                    <div class="media-delete-option">

                        <label class="all-select-media"><input type="checkbox" name="option2a" id="select-all"><span class="count-image"></span> Media </label>

                        <a href="javascript:;" class="link warning delete-media">Delete media</a>

                    </div>

                    <div class="card-middle">

                        <div class="uplod-main-demo">

                            <input type="file" id="images" name="image" multiple="multiple"/>

                            <div class="import-file">

                                <div id="multiple-file-preview">

                                    <ul id="sortable" class="import-file-big">

                                        @if(count($Productmedia) > 0)

                                        @foreach($Productmedia as $row)

                                        <li class="ui-state-default image-avalible remove-image" data-order=0 data-id="'+file.lastModified+'"><div class="file-upload-overlay"><input type="checkbox" name="image[]" class="image-checkbox"></div><img src="{{ asset('storage/'.$row->image) }}" style="width:100%;" /> <div class="order-number">0</div></li>

                                         @endforeach

                                         @endif

                                        <label class="custome-file-upload" for="images">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"></path></svg>

                                            <p class="secondary">Add files</p>

                                            <span class="fs-14">or drop files to upload</span>

                                        </label>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                

                <div class="card card-pd-0 pd-variants-card main-variant-card">



                    <div class="card-header">



                        <div class="header-title">



                            <h4 class="fs-16 mb-0 fw-6">Attribute</h4>



                        </div>



                        <label><input type="checkbox" name="option2a" wire:ignore.self class="click-varients-type">This product has multiple options, like different sizes or colors</label>

 

                    </div>



                    <div class="card-middle card-middle-varient" wire:ignore.self style="display: none;"> 



                            <div class="row">



                                <label class="form-label fs-14 fw-6">Attribute Type</label>



                                <input type="text" value="" class="varition_type_tag" id="varition_tye_tag"  wire:model="varition_name" placeholder="Variant Type" wire:ignore.self>



                            </div>



                        <div class="row pd-variants-card-btn">



                            <button class="fw-6 button secondary" wire:click.prevent="UpdateVarient('add-varient-type')">Save</button>



                        </div>



                    </div>

                    

                    

                </div>



                <div class="columns product_listing_columns pdpage-checkbox has-sections card ml-0 product-tab-table">

                    <div class="product-table-title">

                        <h3>Variants</h3>

                        <span>

                            <a href="{{ route('variant-new', $product->uuid) }}" class="link">Add variant</a>

                            <button class="link variants-option-btn">More options <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></button>

                            <ul class="variants-option-dropdown">

                                <li><button class="link" onclick="document.getElementById('edit-options-modal').style.display='block'">Edit options</button></li>

                                <li><button class="link" onclick="document.getElementById('reorder-variants-modal').style.display='block'">Reorder variants</button></li>

                            </ul>

                        </span>

                    </div>

                    <div class="product-tab-details">

                        <span>Select:</span>

                        <ul class="tabs">

                            <li class="tab all" data-toggle="tab"><a href="#">All</a></li>

                            <li class="tab titled" data-toggle="tab"><a href="#">None</a></li>

                            <li class="tab titled" data-toggle="tab"><a href="#">Blue</a></li>

                            <li class="tab titled" data-toggle="tab"><a href="#">Red</a></li>

                            <li class="tab titled active" data-toggle="tab"><a href="#">white</a></li>

                        </ul>

                    </div>

                    <div class="product-all-location">

                        <label>Available inventory</label>

                        <button class="link"><svg class="location-icon" viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10 10c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-8C6.69 2 4 4.87 4 8.4c0 6 5.4 9.35 5.63 9.49.11.07.24.11.37.11s.26-.04.37-.11C10.6 17.75 16 14.4 16 8.4 16 4.87 13.31 2 10 2z"></path></svg> All locations <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></button>

                        <ul class="all-location-dropdown">

                            <li class="active">All locations</li>

                            <li>Armada</li>

                            <li>H-28, Sector 63</li>

                        </ul>

                    </div>

                    <div class="card-section tab_content  active" id="all_customers">

                        <div class="table-loader">

                            <div class="loading-overlay" wire:loading.flex="">

                                <div class="page-loading"></div>

                            </div>

                            <div class="product-table-details">

                            <div class="product-table-checkbox">

                                <div class="product-all-check">

                                    <input type="checkbox" name="option6a">

                                    <label>Showing 3 variants</label>

                                </div>

                                <div class="product-edite-variants">

                                    <a class="fw-6 button secondary">Edit Variants <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></a>

                                    <ul class="edite-variants-dropdown">

                                       <!--  <li><a class="link">Open bulk editor</a></li> -->

                                        <li><a class="link" onclick="document.getElementById('variants-edit-prices-modal').style.display='block'">Edit prices</a></li>

                                        <li><a class="link" wire:click="openModel('edit-quantities-modal')">Edit quantities</a></li>

                                        <!-- <li><a class="link" onclick="document.getElementById('edit-option-values-modal').style.display='block'">Edit option values</a></li> -->

                                        <li><a class="link" onclick="document.getElementById('variants-edit-skus-modal').style.display='block'">Edit SKUs</a></li>

                                        <li><a class="link" onclick="document.getElementById('variants-edit-barcodes-modal').style.display='block'">Edit barcodes</a></li>

                                        <li><a class="link" onclick="document.getElementById('edit-hs-codes-modal').style.display='block'">Edit HS codes</a></li>

                                        <li><a class="link" onclick="document.getElementById('edit-country-codes-modal').style.display='block'">Edit country/region of origin</a></li>

                                    </ul>

                                </div>

                            </div>

                            <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing">

                                <tbody>

                                    @foreach($Productvariant as $key => $row)

                                    <tr>

                                        <td>

                                            <div class="row"><label><input type="checkbox" name="option6a"></label></div>

                                        </td>

                                        <td class="product-img">

                                            <div class="product-variants-ulpload-img">

                                                <input type="file" accept="image/*" id="{{$row->id}}" class="loadFile">

                                                <div class="pd-blank-img">

                                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M19 2.5A1.5 1.5 0 0 0 17.5 1h-15A1.5 1.5 0 0 0 1 2.5v15A1.5 1.5 0 0 0 2.5 19H10v-2H3.497c-.41 0-.64-.46-.4-.79l3.553-4.051c.19-.21.52-.21.72-.01L9 14l3.06-4.781a.5.5 0 0 1 .84.02l.72 1.251A5.98 5.98 0 0 1 16 10h3V2.5zm-11.5 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm12.207 10.793A1 1 0 0 0 19 15h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 0 0 .707-1.707z"></path></svg>

                                                </div>

                                                <img id="output-{{$row->id}}"/>

                                            </div>

                                        </td>

                                        <td class="product-table-item">

                                            <a href="{{ route('variant-detail', $row->id) }}" class="tc-black fw-6">

                                                @if($row->attribute1 != ""){{$row->attribute1}} @endif

                                                @if($row->attribute2 != "")/{{$row->attribute2}} @endif

                                                @if($row->attribute3 != "")/{{$row->attribute3}} @endif

                                                @if($row->attribute4 != "")/{{$row->attribute4}} @endif 

                                                @if($row->attribute5 != "")/{{$row->attribute5}} @endif 

                                                @if($row->attribute6 != "")/{{$row->attribute6}} @endif 

                                                @if($row->attribute7 != "")/{{$row->attribute7}} @endif 

                                                @if($row->attribute8 != "")/{{$row->attribute8}} @endif 

                                                @if($row->attribute9 != "")/{{$row->attribute9}} @endif 

                                                @if($row->attribute10 != "")/{{$row->attribute10}} @endif

                                            </a>

                                            

                                        </td>

                                        <td class="vendor-table-item">

                                            <p>US${{$row->price}}.00</p>

                                            <p>6 available at 2 locations</p>

                                        </td>

                                    </tr>

                                    @endforeach

                                </tbody>

                            </table>

                            <hr>

                           <div class="product-table-footer">

                               <p>Total inventory at all locations</p>

                               <p>15 available</p>

                           </div>

                        </div>

                    </div>

                </div>

            </div>

                <div class="card search-engine-listing-card">

                    <div class="card-header">

                        <div class="header-title">

                            <h4 class="fs-16 mb-0 fw-6">Search engine listing preview</h4><a class="link edit-website-seo-btn">Edit website SEO</a>

                        </div>

                        <div class="ccd-search-engine-listing">

                            <h4>MEN'S ADIDAS ORIGINALS SUPERSTAR SHOES</h4>

                            <p>https://delivery-boy-demo.myshopify.com/products/mens-adidas-originals-superstar-shoes</p>

                            <span>hello</span>

                        </div>

                    </div>

                    <div class="card-middle">

                        <div class="row">

                            <label>Page title</label>

                            <input type="text" name="seo_title" wire:model="product.seo_title">

                            <p>0 of 70 characters used</p>

                        </div>

                        <div class="row">

                            <label>Description</label>

                            <textarea name="seo_descripation" wire:model="product.seo_descripation"></textarea>

                            <p>0 of 320 characters used</p>

                        </div>

                        <div class="row">

                            <label>URL and handle</label>

                            <div class="url-input">

                                <span>https://delivery-boy-demo.myshopify.com/products/</span>

                                <input type="text" name="seo_utl" wire:model="product.seo_title">

                            </div>

                        </div>

                    </div>     

                </div>

            </div>

            <div class="columns one-third right-details">

                <div class="card">

                    <div class="card-header">

                        <div class="header-title">

                            <h3 class="fs-16 fw-6 mb-0">Product status</h3>

                        </div>

                        <p class="mb-0">

                            <select>

                                <option>Active</option>

                                <option>Draft</option>

                            </select>                     

                        </p>

                    </div>

                    <div class="card-middle sales-channels-apps">

                        <div class="header-title">

                            <h4 class="fs-12  fw-6 mb-0">SALES CHANNELS AND APPS</h4><button class="link" onclick="document.getElementById('sales-channels-apps-modal').style.display='block'">Manage</button>

                        </div>

                        <p class="store-online mb-0"><span class="light-btn"></span>Online Store and Point of Sale</p>

                        <div class="sales-channels-dropdown">

                            <p>

                                <span>Online Store <a href="#">Schedule availability</a></span>

                                <span class="light-btn"></span></p>

                            <p>Point of Sale<span class="light-btn"></span></p>

                        </div>

                    </div>

                    <div class="card-footer">

                        <button class="link sales-channel-btn">Show more <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path></svg></button>

                    </div>

                </div>

                <div class="card pd-20 tag-card card-grey-bg pdd-insights-card">

                    <div class="header-title">

                        <h3 class="fs-16  fw-6 mb-0">Insights</h3>

                    </div>

                    <p class="mb-0">Insights will display when the product has had recent sales</p>

                </div>

                <div class="card tag-card card-grey-bg organization-card">

                    <div class="card-header">

                        <div class="header-title">

                            <h3 class="fs-16  fw-6 mb-0">Organization</h3>

                        </div>

                        <div class="row">

                            <label>Product type</label>

                            <div class="d-flex">

                                <input type="text" name="product_type" wire:model="product.product_type" placeholder="e.g. Shirts">

                                <button class="secondary"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m10 16-4-4h8l-4 4zm0-12 4 4H6l4-4z"></path></svg></button>

                            </div>

                        </div>

                        <div class="row">

                            <label>Vendor</label>

                            <div class="d-flex">

                                <input type="text" name="vender" wire:model="product.vender" placeholder="e.g. Nike">

                                <button class="secondary"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m10 16-4-4h8l-4 4zm0-12 4 4H6l4-4z"></path></svg></button>

                            </div>

                        </div>

                    </div>

                    <div class="card-middle">

                        <div class="row">

                            <label class="fs-12  fw-6 mb-0">COLLECTIONS</label>

                            <input type="search" placeholder="Search for collections">

                            <p class="pdd-collections-link mb-0"><a href="#" onclick="document.getElementById('unsaved-changes-modal').style.display='block'">Abc</a><span>Auto</span></p>

                        </div>

                    </div>

                    <div class="card-footer">

                        <label class="fs-12  fw-6 mb-0">TAGS</label>

                       <input list="tagss" onkeyup="enableTagSaveBtn(this.value)" type="text" placeholder="VIP, sale, shopper, etc.">



                  

                     <datalist id="tagss">



                        @foreach($tags as $tag)



                             <option class="tag_added" value="{{$tag->label}}">



                         @endforeach



                        </datalist>



                        <button class="button green-btn" id="tag-creation-btn" data-dismiss="modal" value="" style="display:none;" wire:click.prevent="tags('tag-change', $event.target.value)">Save</button><br><br>



                         @if(!empty($product['tags']))



                         <?php $customerTags = explode(',', $product['tags']); ?>



                            <div class="customer-detail-select-tags">







                            @foreach($customerTags as $detail_tag)







                            <span class="tag grey fs-13">



                               {{$detail_tag}}



                               <button type="button"  wire:click="tags('remove-tag', '{{$detail_tag}}')">



                                  <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path>



                                  </svg>



                               </button> 



                            </span>



                        @endforeach



                        </div>



                     @endif

                    </div>

                </div>

                <div class="card tag-card card-grey-bg pd-20 pd-online-store-card">

                    <h3 class="fs-16  fw-6">Online store</h3>

                    <label>Theme template</label>

                        <select>

                            <option>Default product</option>

                        </select>

                    <p>Assign a template from your current theme to define how the product is displayed.</p>

                    <label class="mt-2">Gift card template suffix</label>

                        <select>

                            <option>gift_card</option>

                        </select>

                    <p>Customers receive an email with a URL to the gift card after purchase.</p>

                </div>

            </div>

        </article>

    </section>

    <section class="full-width flex-wrap admin-body-width">

        <div class="page-bottom-btn">

            <p class="mb-0">

                <button class="secondary secondary-brd-btn">Archive product</button>

                <button class="warning">Delete product</button>

            </p>

            <input type="submit" class="button" value="Save">

        </div>

    </section>

</form>

    

    

    <!--Sales channels and apps-->

    <div id="sales-channels-apps-modal" class="customer-modal-main">

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Sales channels and apps</h2>

                    <span onclick="document.getElementById('sales-channels-apps-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <p><button class="link">Select all</button> 0 of 2 selected</p>

                    <label><input type="checkbox" name="online_store" @if($product->online_store == true) checked @endif>Online Store</label>

                    <label><input type="checkbox" name="point_of_sale" @if($product->point_of_sale == true) checked @endif>Point of Sale</label>

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button green-btn">Done</button>

                </div>

            </div>

        </div>

    </div>

    <!--/Sales channels and apps-->

    

    <!--Edit options-->

    <div id="edit-options-modal" class="customer-modal-main">

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Edit options</h2>

                    <span onclick="document.getElementById('edit-options-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <p>

                        <input type="text" value="Color">

                        <span class="tag grey">Blue <button class="link"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path></svg></button></span>

                        <span class="tag grey">Red <button class="link"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path></svg></button></span>

                        <span class="tag grey">white <button class="link"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path></svg></button></span>

                    </p>

                    <div class="row">

                        <p>

                            <input type="text" value="Size">

                            <input type="text" placeholder="Default Size">

                        </p>

                        <p><button class="secondary"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M8 3.994C8 2.893 8.895 2 10 2s2 .893 2 1.994h4c.552 0 1 .446 1 .997a1 1 0 0 1-1 .997H4c-.552 0-1-.447-1-.997s.448-.997 1-.997h4zM5 14.508V8h2v6.508a.5.5 0 0 0 .5.498H9V8h2v7.006h1.5a.5.5 0 0 0 .5-.498V8h2v6.508A2.496 2.496 0 0 1 12.5 17h-5C6.12 17 5 15.884 5 14.508z"></path></svg></button></p>

                    </div>

                    <p>

                        <button class="button secondary another-option-btn">Add another option</button>

                    </p>

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button green-btn">Done</button>

                </div>

            </div>

        </div>

    </div>    

    <!--/Edit options-->

    <!--/Reorder variants-->

    <div id="reorder-variants-modal" class="customer-modal-main">

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Reorder variants and options</h2>

                    <span onclick="document.getElementById('reorder-variants-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <p>Reorder variants or options to change how they appear on your store</p>

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button green-btn">Save</button>

                </div>

            </div>

        </div>

    </div>    

    <!--/Reorder variants-->

    <!--/duplicate-product-modal-->

    <div id="duplicate-product-modal" class="customer-modal-main">

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Duplicate product</h2>

                    <span onclick="document.getElementById('duplicate-product-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <div class="manage-address-list">

                        <div class="row">

                            <div class="form-field-list">

                                <label>Title</label>

                                <input type="text" value="Copy of MEN'S ADIDAS ORIGINALS SUPERSTAR SHOES">

                            </div>

                        </div>

                    </div>

                    <div class="manage-address-list duplicate-product-checkbox">

                        <p>Select details to copy. All other details except 3D models and videos will be copied from the original product and any variants.</p>

                        <div class="row">

                            <label><input type="checkbox" name="option2a" checked="checked">Images</label>

                            <label><input type="checkbox" name="option2a">SKUs</label>

                            <label><input type="checkbox" name="option2a" disabled="disabled">Barcodes</label>

                            <label><input type="checkbox" name="option2a">Inventory quantities</label>

                        </div>

                    </div>

                    <div class="manage-address-list">

                        <label>Product status</label>

                        <div class="row">

                            <label><input type="radio" name="option1a" checked="checked">Set as draft</label>

                            <label><input type="radio" name="option1a">Set as active</label>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button green-btn">Duplicate product</button>

                </div>

            </div>

        </div>

    </div>    

    <!--Unsaved changes modal-->

     <div id="unsaved-changes-modal" class="customer-modal-main">

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Unsaved changes</h2>

                    <span onclick="document.getElementById('unsaved-changes-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <p class="mb-0">If you leave this page, any unsaved changes will be lost.</p>

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button warning">Leave page</button>

                </div>

            </div>

        </div>

    </div>    

    

    <!--Edit prices modal-->

    <div id="variants-edit-prices-modal" class="customer-modal-main variants-edit-option-modal" wire:ignore.self>

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Edit prices</h2>

                    <span onclick="document.getElementById('variants-edit-prices-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <div class="row side-elements align-item-bt">

                        <div class="form-field-list">

                            <label>Apply a price to all variants</label>

                            <span class="dollar-input">

                                <input type="text" name="price" placeholder="0,00">

                            </span>

                        </div>

                        <button class="button fw-6" disabled="disabled">Apply to all</button>

                    </div>

                @foreach ($Productvariant as $key => $variantrow)

                    <div class="vep-list bd_none">

                        <label> @if($variantrow->attribute1 != ""){{$variantrow->attribute1}} @endif

                                @if($variantrow->attribute2 != "")/{{$variantrow->attribute2}} @endif

                                @if($variantrow->attribute3 != "")/{{$variantrow->attribute3}} @endif

                                @if($variantrow->attribute4 != "")/{{$variantrow->attribute4}} @endif 

                                @if($variantrow->attribute5 != "")/{{$variantrow->attribute5}} @endif 

                                @if($variantrow->attribute6 != "")/{{$variantrow->attribute6}} @endif 

                                @if($variantrow->attribute7 != "")/{{$variantrow->attribute7}} @endif 

                                @if($variantrow->attribute8 != "")/{{$variantrow->attribute8}} @endif 

                                @if($variantrow->attribute9 != "")/{{$variantrow->attribute9}} @endif 

                                @if($variantrow->attribute10 != "")/{{$variantrow->attribute10}} @endif</label>

                        <span class="dollar-input">

                            <input type="text" wire:model.debounce.lazy="Productvariant.{{ $key }}.price" wire:ignore.self>

   

                        </span>

                    </div>

                @endforeach

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button green-btn" onclick="document.getElementById('variants-edit-prices-modal').style.display='none'">Done</button>

                </div>

            </div>

        </div>

    </div> 

    

    <!--Edit quantities modal-->
    
  
  @if($editQuantitiesModel)
    <div  wire:ignore.self wire:key="edit-quantities-modal" id="edit-quantities-modal" style="display: block !important;"  wire:key="edit-quantities-modal" class="customer-modal-main">

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Edit quantities</h2>

                    <span wire:click="closeModel('edit-quantities-modal')"  class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <div class="first-modal">

                        <p class="mb-0">Choose a location where you want to edit quantities.</p>

                        <div>

                            @foreach($location as $local_row)

                            <a class="link" wire:key="{{$local_row['id']}}"  onclick="document.getElementById('edit-quantities-modal').style.display='none'" id="{{$local_row->id}}" wire:click="EditAddress({{ $local_row['id'] }})" >{{$local_row->name}} <span><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M8 16a.999.999 0 0 1-.707-1.707L11.586 10 7.293 5.707a.999.999 0 1 1 1.414-1.414l5 5a.999.999 0 0 1 0 1.414l-5 5A.997.997 0 0 1 8 16z"></path></svg></span></a>

                            @endforeach

                        </div>

                    </div>

                    <div class="second-modal">

                        <p>Inventory can’t be edited because no variants are stocked at <span class="fw-6">Armada.</span></p>

                        <p>Inventory can’t be edited at <span class="fw-6">H-28, Sector 63 </span>because no variants have quantity tracking turned on.</p>

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                </div>

            </div>

        </div>

    </div> 
   
 @endif

    <!--Edit quantities modal-->
      @if($editQuantitiesDetailsModal)
    <div   wire:ignore.self wire:key="{{$LocationId->id}}"  id="edit-quantities-details-modal"  style="display: block !important;"  class="customer-modal-main ">

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Edit quantities</h2>

                    <span wire:ignore.self wire:key="close_{{$LocationId->id}}" wire:click="closeModel('edit-quantities-details-modal')" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <p class="mb-0">Editing quantities at <span class="fw-6">@if(!empty($LocationId)) {{$LocationId->name}} @endif</span></p>


                        @if($variantStock)
                            @foreach($variantStock as $key => $variantrow)
                            <div class="vep-list bd_none">

                                <label> @if($variantrow->attribute1 != ""){{$variantrow->attribute1}} @endif

                                        @if($variantrow->attribute2 != "")/{{$variantrow->attribute2}} @endif

                                        @if($variantrow->attribute3 != "")/{{$variantrow->attribute3}} @endif

                                        @if($variantrow->attribute4 != "")/{{$variantrow->attribute4}} @endif 

                                        @if($variantrow->attribute5 != "")/{{$variantrow->attribute5}} @endif 

                                        @if($variantrow->attribute6 != "")/{{$variantrow->attribute6}} @endif 

                                        @if($variantrow->attribute7 != "")/{{$variantrow->attribute7}} @endif 

                                        @if($variantrow->attribute8 != "")/{{$variantrow->attribute8}} @endif 

                                        @if($variantrow->attribute9 != "")/{{$variantrow->attribute9}} @endif 

                                        @if($variantrow->attribute10 != "")/{{$variantrow->attribute10}} @endif</label>
                          
                                <input type="hidden" wire:model="location_edit">
                                <input type="text" wire:key="{{ $key }}" wire:model.debounce.lazy="variantStock.{{ $key }}.stock" class="att_stock_class" wire:ignore.self>
                                     
                            </div>

                            @endforeach 
                        @endif

                    </div>

                

                <div class="modal-footer">

                    <button class="button secondary"  data-dismiss="modal">Cancel</button>

                    <button class="button secondary green-btn"  data-dismiss="modal">Done</button>

                </div>

            </div>

        </div>

    </div> 
   @endif
    <!--Edit option values modal-->

     <div id="edit-option-values-modal" class="customer-modal-main">

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Edit option values</h2>

                    <span onclick="document.getElementById('edit-option-values-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <div class="row p-3">

                        <label class="fs-12 fw-6">US$10.00</label>

                        <label>Denominations</label>

                        <input type="text" value="US$10.00">

                    </div>

                    <div class="row p-3">

                        <label class="fs-12 fw-6">US$25.00</label>

                        <label>Denominations</label>

                        <input type="text" value="US$25.00">

                    </div>

                    <div class="row p-3">

                        <label class="fs-12 fw-6">US$50.00</label>

                        <label>Denominations</label>

                        <input type="text" value="US$50.00">

                    </div>

                    <div class="row p-3">

                        <label class="fs-12 fw-6">US$100.00</label>

                        <label>Denominations</label>

                        <input type="text" value="US$100.00">

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button green-btn">Done</button>

                </div>

            </div>

        </div>

    </div> 

    

    <!--Edit SKUs modal-->

    <div id="variants-edit-skus-modal" class="customer-modal-main skus-barcodes-modal" wire:ignore.self>

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Edit SKUs</h2>

                    <span onclick="document.getElementById('variants-edit-skus-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    @foreach ($Productvariant as $key => $variantrow)

                    <div class="vep-list">

                        <label> @if($variantrow->attribute1 != ""){{$variantrow->attribute1}} @endif

                                @if($variantrow->attribute2 != "")/{{$variantrow->attribute2}} @endif

                                @if($variantrow->attribute3 != "")/{{$variantrow->attribute3}} @endif

                                @if($variantrow->attribute4 != "")/{{$variantrow->attribute4}} @endif 

                                @if($variantrow->attribute5 != "")/{{$variantrow->attribute5}} @endif 

                                @if($variantrow->attribute6 != "")/{{$variantrow->attribute6}} @endif 

                                @if($variantrow->attribute7 != "")/{{$variantrow->attribute7}} @endif 

                                @if($variantrow->attribute8 != "")/{{$variantrow->attribute8}} @endif 

                                @if($variantrow->attribute9 != "")/{{$variantrow->attribute9}} @endif 

                                @if($variantrow->attribute10 != "")/{{$variantrow->attribute10}} @endif </label>

                        <input type="text"  wire:model.debounce.lazy="Productvariant.{{ $key }}.sku">         

                    </div>

                    @endforeach

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button green-btn" onclick="document.getElementById('variants-edit-skus-modal').style.display='none'">Done</button>

                </div>

            </div>

        </div>

    </div> 

    

    <!--Edit barcodes modal-->

    <div id="variants-edit-barcodes-modal" class="customer-modal-main skus-barcodes-modal" wire:ignore.self>

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Edit barcodes</h2>

                    <span onclick="document.getElementById('variants-edit-barcodes-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    @foreach ($Productvariant as $key => $variantrow)

                    <div class="vep-list">

                        <label> @if($variantrow->attribute1 != ""){{$variantrow->attribute1}} @endif

                                @if($variantrow->attribute2 != "")/{{$variantrow->attribute2}} @endif

                                @if($variantrow->attribute3 != "")/{{$variantrow->attribute3}} @endif

                                @if($variantrow->attribute4 != "")/{{$variantrow->attribute4}} @endif 

                                @if($variantrow->attribute5 != "")/{{$variantrow->attribute5}} @endif 

                                @if($variantrow->attribute6 != "")/{{$variantrow->attribute6}} @endif 

                                @if($variantrow->attribute7 != "")/{{$variantrow->attribute7}} @endif 

                                @if($variantrow->attribute8 != "")/{{$variantrow->attribute8}} @endif 

                                @if($variantrow->attribute9 != "")/{{$variantrow->attribute9}} @endif 

                                @if($variantrow->attribute10 != "")/{{$variantrow->attribute10}} @endif </label>

                        <input type="text"  wire:model.debounce.lazy="Productvariant.{{ $key }}.barcode">         

                    </div>

                    @endforeach

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button green-btn" onclick="document.getElementById('variants-edit-skus-modal').style.display='none'">Done</button>

                </div>

            </div>

        </div>

    </div> 

    

    

    <!--Edit HS codes modal-->

    <div id="edit-hs-codes-modal" class="customer-modal-main variants-edit-option-modal"  wire:ignore.self>

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Edit HS codes</h2>

                    <span onclick="document.getElementById('edit-hs-codes-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <div class="row side-elements align-item-bt">

                        <div class="form-field-list">

                            <label>HS (Harmonized System) code</label>

                            <input type="search" placeholder="Search or enter a HS code">

                        </div>

                        <button class="button fw-6" disabled="disabled">Apply to all</button>

                    </div>

                    <p class="ta-left mb-0">Manually enter codes that are longer than 6 numbers.</p>

                     @foreach ($Productvariant as $key => $variantrow)

                    <div class="vep-list">

                        <label> @if($variantrow->attribute1 != ""){{$variantrow->attribute1}} @endif

                                @if($variantrow->attribute2 != "")/{{$variantrow->attribute2}} @endif

                                @if($variantrow->attribute3 != "")/{{$variantrow->attribute3}} @endif

                                @if($variantrow->attribute4 != "")/{{$variantrow->attribute4}} @endif 

                                @if($variantrow->attribute5 != "")/{{$variantrow->attribute5}} @endif 

                                @if($variantrow->attribute6 != "")/{{$variantrow->attribute6}} @endif 

                                @if($variantrow->attribute7 != "")/{{$variantrow->attribute7}} @endif 

                                @if($variantrow->attribute8 != "")/{{$variantrow->attribute8}} @endif 

                                @if($variantrow->attribute9 != "")/{{$variantrow->attribute9}} @endif 

                                @if($variantrow->attribute10 != "")/{{$variantrow->attribute10}} @endif </label>

                        <input type="text"  wire:model.debounce.lazy="Productvariant.{{ $key }}.hscode">         

                    </div>

                    @endforeach

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button green-btn" onclick="document.getElementById('edit-hs-codes-modal').style.display='none'">Done</button>

                </div>

            </div>

        </div>

    </div> 

    

    <!--Edit country codes of origin modal-->

    <div id="edit-country-codes-modal" class="customer-modal-main variants-edit-option-modal">

        <div class="customer-modal-inner">

            <div class="customer-modal">

                <div class="modal-header">

                    <h2>Edit country codes of origin</h2>

                    <span onclick="document.getElementById('edit-country-codes-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>

                </div>

                <div class="modal-body">

                    <div class="row side-elements align-item-bt">

                        <div class="form-field-list">

                            <label>Country/Region of origin</label>

                            <select id="apply-country">

                                <option value="">Select country/region</option>

                                <option value="1">Afghanistan</option>

                                <option value="2">india</option>

                                <option value="3">Greenland</option>

                            </select>

                        </div>

                        <a class="button fw-6" id="apply-country-submit">Apply to all</a>

                    </div>

                    <p class="ta-left mb-0">In most cases, where the product is manufactured.</p>

                    <div class="attribute-country-value">

                        

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="button secondary">Cancel</button>

                    <button class="button green-btn">Done</button>

                </div>

            </div>

        </div>

    </div> 

 </section>



<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

 <script>

    $('.tinymce-editor').each(function () {

        CKEDITOR.replace($(this).prop('id'));

    });

 </script>

    

    

<! <!--script start-->

    <script>

         $(document).on("click", '#apply-country-submit', function() {



            var val = $('#apply-country').val();



           $('.att_country_class').each(function(){

            $(this).val(val);

           });

           

        });





        $('.sales-channel-btn').on('click', function() {

            $('.sales-channels-apps').toggleClass('channels-dropdown-open');

        });

        

        $( ".edit-website-seo-btn" ).click(function() {     

            $('.search-engine-listing-card .card-middle').toggle();

        });



        $(document).ready(function() {

            $('.product-edite-variants a').click(function() {

                $('.edite-variants-dropdown').slideToggle();

                $('.all-location-dropdown').hide();

                $('.variants-option-dropdown').hide();

                $('.add-media-dropdown').hide();

            });

            $('.product-all-location button').click(function() {

                $('.all-location-dropdown').slideToggle();

                $('.edite-variants-dropdown').hide();

                $('.variants-option-dropdown').hide();

                $('.add-media-dropdown').hide();

            });

            $('.variants-option-btn').click(function() {

                $('.variants-option-dropdown').slideToggle();

                $('.edite-variants-dropdown').hide();

                $('.all-location-dropdown').hide();

                $('.add-media-dropdown').hide();

            });

            $('.add-media-url-btn').click(function() {

                $('.add-media-dropdown').slideToggle();

                $('.edite-variants-dropdown').hide();

                $('.all-location-dropdown').hide();

                $('.variants-option-dropdown').hide();

            });

        });



    </script>

    

    

<script>

$(function(){

  

  $('#images').change(function(e) {

    var files = e.target.files;

		for (var i = 0; i <= files.length; i++) {

      

      // when i == files.length reorder and break

      if(i==files.length){

        // need timeout to reorder beacuse prepend is not done

        setTimeout(function(){ reorderImages(); }, 100);

        break;

      }

      

      var file = files[i];

      var reader = new FileReader();

      

      reader.onload = (function(file) {

        return function(event){

          $('#sortable').append('<li class="ui-state-default remove-image" data-order=0 data-id="'+file.lastModified+'"><div class="file-upload-overlay"><input type="checkbox" name="tax" class="image-checkbox" checked="checked"></div><img src="' + event.target.result + '" style="width:100%;" /> <div class="order-number">0</div></li>');

        };

      })(file);

      

      reader.readAsDataURL(file);

    }// end for;

    

  });

  

  $('#sortable').sortable();

  $('#sortable').disableSelection();

  

  //sortable events

  $('#sortable').on('sortbeforestop',function(event){

    

    reorderImages();

    

  });

  

  

  function reorderImages(){

    // get the items

    var images = $('#sortable li');

    

    var i=0, nrOrder=0;

    for(i;i<images.length;i++){

      

      var image = $(images[i]);

      

      if( image.hasClass('ui-state-default') && !image.hasClass('ui-sortable-placeholder') ){

        image.attr('data-order', nrOrder);

        var orderNumberBox = image.find('.order-number');

        orderNumberBox.html(nrOrder+1);

        nrOrder++;

      }// end if;

      

    }// end for;

  }

  

 });





    $(document).on("click", '.delete-media', function() {





         $('.remove-image').has('input:checkbox:checked').remove();

          var countCheckedCheckboxes = $('.image-checkbox').filter(':checked').length;

        $('.count-image').text('');

        



    });





    $(document).on("click", '#select-all', function() {

      

        $('.image-checkbox').attr('checked', this.checked);

    })









    $(document).on("change", '.image-checkbox', function() {



        var countCheckedCheckboxes = $('.image-checkbox').filter(':checked').length;

        



        if(countCheckedCheckboxes > 0)

        {

          $('#select-all').attr("checked",'checked');

          $('.count-image').text(countCheckedCheckboxes);

        }

        else

        {

           $('#select-all').removeAttr('checked'); 

            $('.count-image').text('');

        }

    });







$(document).on("click", '.image-checkbox', function() {

  



     var id_value = $(this).attr('id');



    if ($('#'+id_value).is(":checked")){ 



           var inputValue = $('#'+id_value).attr("checked",'checked');

       

    }

    else

    {

        var inputValue = $('#'+id_value).removeAttr('checked');

    }

  

});

</script>



<script >

     $(document).ready(function () { console.log('adasdas'+$('.ui-state-default').length); });

     $(document).on('DOMNodeRemoved', function (e) {



        if ($(e.target).hasClass('ui-state-default')) {

             if ($('.ui-state-default').length <= 1) {

                $(e.target).parent().removeClass('import-file-big');

            }

        }

    });



    $(document).on('DOMNodeInserted', function (e) {



        if ($(e.target).hasClass('ui-state-default')) {

            // $('#save').prop('disabled', false);

            $(e.target).parent().addClass('import-file-big');

        }

    });

    

</script>



<script type="text/javascript">

    $(document).ready(function () {

    $('#update-all-tags').click(function() {



               document.getElementsByClassName('selected_tags')[0].innerHTML = '';



               var exist_tags = $('#tags').val().split(',');



               var exist = '';



               console.log( exist_tags);







               for (var i = 0; i < exist_tags.length; i++) {



                   if(exist_tags[i] != '') {



                     if(i == 0) {



                       exist = exist_tags[i];







                     } else {



                       exist = exist_tags[i]+','+exist;







                     }



                       $('.selected_tags').append('<span class="tag grey fs-13">'+exist_tags[i]+' <button type="button" onclick="removeElem(this)"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path></svg></button> </span>');



                   }



               }



               $('#customer_tags').first().val(exist);







            });



           $(document).on('click','.tag_added',function(){



                console.log('tag-added');



                var exist =  $('#customer_tags').first().val();







                $('#customer_tags').first().val(exist+','+this.innerText);



            



                $('.selected_tags').append('<span class="tag grey fs-13">'+this.innerText+' <button type="button" onclick="removeElem(this)"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path></svg></button> </span>');



                $(this).hide();          



               });



            });



            



            function removeElem(elem) {



            



            



               var removedtag = elem.closest('.tag').innerText;



               



               var tag_arr = $('#customer_tags').val().split(',');







               tag_arr.splice(tag_arr.indexOf(removedtag), 1);







               var filtered = tag_arr.filter(function ( el) {



                  if(el != '') {



                     return el;



                  }



               });



               $('#customer_tags').val(filtered.join());



               elem.closest('.tag').remove();



               var arr = $('.tag_added').map((i, e) => e.value == removedtag).first();







               $('.select-tag-list').append('<button class="secondary tag_added" value="'+ removedtag +'">'+removedtag+'</button>&nbsp;');



            



            }







            function enableSaveBtn(class_name) {



                $('.'+class_name).addClass('green-btn').prop('disabled', false);



            }



            function enableTagSaveBtn(val) {



               var elem = $('#tag-creation-btn');



               if(val != '') {



                  elem.show();



                  elem.val(val);







               } else {



                  elem.hide();



               }



            }

</script>



<script>

  $(document).on("change", '.loadFile', function() {

      var id = $(this).attr('id');

      console.log(id);

    var output = document.getElementById('output-'+id);

    output.src = URL.createObjectURL(event.target.files[0]);

    output.onload = function() {

      URL.revokeObjectURL(output.src) // free memory

      $(this).parent().addClass('imagedropshadow');

    }

  });

</script>



</x-admin-layout>

</div>



















