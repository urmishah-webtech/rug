<div>
<x-admin-layout>

    <style type="text/css">
   #pt-0{
       padding-top: 0;
   }
    .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #d64949;
        }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content { 
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      overflow: auto;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown a:hover {background-color: #ddd;}

    .show {display: block;}
    .text-danger{color: red;}
    </style>
    <div wire:key="main">
    <section class="full-width flex-wrap admin-body-width add-customer-head-sec product-details-header">

        <article class="full-width">

            <div class="columns customers-details-heading">

                <div class="page_header d-flex  align-item-center mb-3">

                    <a href="{{ route('products') }}">

                        <button class="secondary icon-arrow-left mr-2">

                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>

                        </button>

                    </a>

                    <h4 class="mb-0 fw-5">Add product</h4>

                </div>

            </div>

        </article>

    </section>
 @php $symbol = CurrencySymbol(); @endphp
<form action="{{ route('products-store') }}" method="POST" enctype="multipart/form-data" id="add_people_form" autocomplete="off">
    @csrf
    <section class="full-width flex-wrap admin-body-width customers-details-sec product-details-sec">

         <article class="full-width">
            
            <div class="columns two-thirds">
                 @error('title') <span class="text-danger">{{ $message }}</span>@enderror  
                 @error('price_main') <span class="text-danger">{{ $message }}</span>@enderror
                <div class="card">

                     <label>Title <span class="text-danger">*</span></label>

                    <input wire:ignore.self type="text" name="title" value="{{ old('title') }}" placeholder="Please Enter Title">
                     @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                    <!--  @if (session()->has('messagevarient')) <span class="text-danger">{{ session('messagevarient') }}</span>@enderror -->
                    <div class="product-des-customize">

                        <label>Description</label>

                        <div class="product-des-customize-inner">

                            <div class="product-dec-textbox">

                                 <textarea class="form-control tinymce-editor {{ $errors->has('descripation') ? 'parsley-error' : '' }}" rows="5" placeholder="Please Enter descripation" name="descripation" id="descripation" wire:ignore.self>{{ old('descripation') }}</textarea>

                                 @error('descripation') <span class="text-danger">{{ $message }}</span>@enderror

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
                            <input type="file" name="image[]" id="images" multiple="multiple"/>
                            <div class="import-file">
                                <div id="multiple-file-preview">
                                   <ul id="sortable">
                                       
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

                <div class="card card-pd-0 pd-variants-card main-variant-attribute overflow-visible">
                    <div class="card-header">
                        <div class="header-title">
                             @error('att_price.*') <span class="text-danger">{{ $message }}</span>@enderror
                            <h4 class="fs-16 mb-0 fw-6">Variants</h4>
                        </div>
                        <label><input type="checkbox" name="option2a" class="edit-website-Attribute">This product has multiple options, like different sizes or colors</label>
                    </div>

                    <div class="card-middle-arrtibute" style="display: none;" wire:ignore.self>
                        <!-- <div class="card-middle pd-add-attri-card"> 
                            <div class="add-attri-list">
                                <div class="row side-elements mb-0">
                                    <label class="form-label fs-14 fw-6">Attribute Type</label>
                                    <input type="text" value="" class="varition_type_tag dropbtn" id="varition_tye_tag"  wire:model="varition_name" placeholder="Variant Type" wire:ignore.self onclick="myFunction()" autocomplete="off">
                                    <a class="fw-6 button secondary" wire:click.prevent="StoreVarient('add-varient-type')">Save</a>
                                </div>
                                <ul id="myDropdown" class="filter-dropdown dropdown-content">
                                    @if($variantag)
                                    @foreach($variantag as $row)
                                    <li>{{$row->name}} <button class="secondary" wire:click.prevent="deleteattribute({{$row->id}})"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 3.994C8 2.893 8.895 2 10 2s2 .893 2 1.994h4c.552 0 1 .446 1 .997 0 .55-.448.997-1 .997H4c-.552 0-1-.447-1-.997s.448-.997 1-.997h4zM5 14.508V8h2v6.508a.5.5 0 00.5.498H9V8h2v7.006h1.5a.5.5 0 00.5-.498V8h2v6.508A2.496 2.496 0 0112.5 17h-5C6.12 17 5 15.884 5 14.508z" fill="#5C5F62"/></svg></button></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div> -->
                        <div class="card-middle">
                            <label class="fs-12  fw-6 mb-0">OPTIONS</label>
                            <div class="varition-append">
                                <label class="form-label fs-14 fw-6">Option 1</label>
                                <div class="row">
                                    <select name="size" class="varition-type-value" id="varition_type_1">
                                        <option value="">-- Select Option --</option>
                                        @foreach($variantag as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" value="{{ old('option') }}"  name="option" class="varition_tags variant-tags-error" id="varition_tags_1" data-role="tagsinput"  placeholder="Separate options with a comma">
                                </div>
                            </div>
                            <div class="row pd-variants-card-btn">
                                <a class="fw-6 button secondary addBtn">Add another option</a>
                            </div>
                        </div>
                        <div class="card-footer add-product-footer">
                            <div class=" ml-0 product-tab-table">
                                <div class="product-table-title">
                                    <h3>Variants</h3>
                                </div>
                              <!--   <div class="product-all-location">
                                    <label>Available inventory</label>
                                    <button class="link">
                                        <svg class="location-icon" viewBox="0 0 20 20" focusable="false" aria-hidden="true">
                                            <path d="M10 10c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-8C6.69 2 4 4.87 4 8.4c0 6 5.4 9.35 5.63 9.49.11.07.24.11.37.11s.26-.04.37-.11C10.6 17.75 16 14.4 16 8.4 16 4.87 13.31 2 10 2z"></path>
                                        </svg>
                                        All locations 
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                            <path d="m5 8 5 5 5-5H5z"></path>
                                        </svg>
                                    </button>
                                    <ul class="all-location-dropdown">
                                        <li class="active">All locations</li>
                                        <li>Armada</li>
                                        <li>H-28, Sector 63</li>
                                    </ul>
                                </div> -->

                                <div class="card-section tab_content  active" id="all_customers">
                                    <div class="table-loader">
                                        <div class="loading-overlay" wire:loading.flex="">
                                            <div class="page-loading"></div>
                                        </div>
                                        <div class="product-table-details">
                                            <div class="product-table-checkbox">
                                                <div class="product-all-check">
                                                    <!-- <input type="checkbox" name="option6a"> -->
                                                    <label class="fw-6 variants-count-show">Showing variants</label>
                                                </div>
                                                <div class="product-edite-variants">
                                                   <a class="fw-6 button secondary">Edit Variants <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></a>
                                                    <ul class="edite-variants-dropdown">
                                                        <li><a class="link" onclick="document.getElementById('variants-edit-prices-modal').style.display='block'">Edit prices</a></li>
                                                        <li><a class="link" onclick="document.getElementById('variants-edit-selling-prices-modal').style.display='block'">Edit Selling prices</a></li>
                                                         <li><a class="link" onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='block'">Edit Stock</a></li>
                                                        <!-- <li><a class="link" onclick="document.getElementById('edit-quantities-modal').style.display='block'">Edit quantities</a></li>
                                                        <li><a class="link" onclick="document.getElementById('variants-edit-skus-modal').style.display='block'">Edit SKUs</a></li>
                                                        <li><a class="link" onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='block'">Edit barcodes</a></li>
                                                        <li><a class="link" onclick="document.getElementById('edit-hs-codes-modal').style.display='block'">Edit HS codes</a></li>
                                                        <li><a class="link" onclick="document.getElementById('edit-country-codes-modal').style.display='block'">Edit country/region of origin</a></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing">
                                                <tbody class="variants-option">
                                                </tbody>
                                            </table>
                                            <!-- <hr>
                                            <div class="product-table-footer">
                                                <a href="javascript:;" data-toggle="modal" data-target="#variants-preview-list-modal">Total inventory</a>
                                                <p>0 available</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-pd-0 pd-variants-card main-variant-attribute overflow-visible">
                    <div class="row-items">
                        <div class="header-title">
                            <h4 class="fs-16 mb-0 fw-6">Customise Product Price</h4>
                        </div>
                        <label><input type="checkbox" name="custom_variant_check" id="custom_variant" value="" class="edit-update-Attribute">Custome Price</label>

                        <div class="card-cutome-arrtibute one-half-row-card" style="display: none;" wire:ignore.self>
                            
                            @foreach($variantag as $row)
                            <div class="row">
                                <div class="form-field-list">
                                     <input class="price-change-input" type="text" value="{{ $row->name }}"  name="variantname"   readonly>
                                     <input class="price-change-input" type="hidden" value="{{ $row->id }}"  name="variantid[]"   readonly>
                                   
                                </div>
                                <div class="form-field-list">


                                    <input class="price-change-input" type="text" value=""  placeholder="Price" name="variantprice[]">

                                </div>
                            </div>
                            @endforeach
                            
                            <!-- <div class="custom_variant_hw mt-3 mb-3">
                                <div class="div">
                                    <label class="mb-0 pb-0" style="padding:0 !important">Height & Width Price (Per Unit)</label>
                                    <input type="number" value="" name="heightwidthprice" class="variant-tags-error" id="custom_price_tags_1" placeholder="Price">    
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div> 

                <div class="card variant-pricing-card">

                    <div class="row-items">

                        <div class="header-title">

                            <h3 class="fs-16 fw-6 mb-0">Pricing</h3>

                        </div>

                        <div class="row">

                            <div class="form-field-list">

                                <label>Price <span class="text-danger">*</span></label>

                                <input type="text" name="price_main" value="{{ old('price_main') }}" placeholder="0.00" id="price-change-input" class="price-change-input">

                                <label for="input">{{$symbol['currency']}}</label>

                                @error('price_main') <span class="text-danger">{{ $message }}</span>@enderror

                            </div>

                            <!-- <div class="form-field-list">

                                <label>Compare at price</label>

                                <input type="text" name="compare_price" placeholder="0.00" value="">

                                <label for="input">US{{$symbol['currency']}}</label>

                                 @error('compare_price') <span class="text-danger">{{ $message }}</span>@enderror

                            </div> -->

                            <div class="form-field-list">

                                <label>Selling price</label>

                                <input type="text" name="compare_selling_price" value="{{ old('compare_selling_price') }}" placeholder="0,00">

                                <label for="input">{{$symbol['currency']}}</label>

                                 @error('compare_selling_price') <span class="text-danger">{{ $message }}</span>@enderror

                            </div>

                        </div>

                        <div class="row">

                            <div class="form-field-list">

                                <label>Stock</label>

                                <input type="number" name="stock" value="{{ old('stock') }}" id="price-change-input" class="price-change-input">

                                @error('stock') <span class="text-danger">{{ $message }}</span>@enderror

                            </div>

                        </div>

                    </div>

                    <!-- <div class="row-items bd_none">

                        <div class="row variant-price-option">

                            <div class="form-field-list">

                                <label>Cost per item</label>

                                <input type="text" name="cost_main" placeholder="0.00" id="cost-change-input" class="cost-change-input" placeholder="0,00">

                                <label for="input">US{{$symbol['currency']}}</label>

                                 @error('cost') <span class="text-danger">{{ $message }}</span>@enderror

                                <p>Customers won’t see this</p>

                            </div>

                            <div class="form-field-list">

                                <span>Margin</span>

                                <span class="margin-value-main">-</span>
                                <input type="hidden" name="main-margin" id="margin-input-mian-value" value="">

                            </div>

                            <div class="form-field-list">

                                <span>Profit</span>

                                <span class="profit-value-main">-</span>
                                <input type="hidden" name="main-profit" id="profit-input-mian-value" value="">

                            </div>

                        </div>

                    <label class="variant-pricing-checkbox"><input type="checkbox" name="tax" checked="checked">Charge tax on this product</label>

                    </div> -->

                </div>

                <div class="card variant-pricing-card" wire:ignore>
                        <div class="row-items">
                            <div class="header-title">
                                <h3 class="fs-16 fw-6 mb-0">Shipping Parcel</h3>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="form-field-list">
                                    <label>Shipping Weight (kg)</label>
                                    <input type="text" name="shipping_weight" value="{{ old('shipping_weight') }}">
                                     @error('shipping_weight') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-field-list">
                                    <label>Width (cm)</label>
                                    <input type="text" name="width" value="{{ old('width') }}">
                                     @error('width') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-field-list">
                                    <label>Height (cm)</label>
                                    <input type="text" name="height" value="{{ old('height') }}">
                                     @error('height') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-field-list">
                                    <label>Depth (cm)</label>
                                    <input type="text" name="depth" value="{{ old('depth') }}">
                                     @error('depth') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- <div class="card variant-inventory-card">

                    <div class="row-items">

                        <div class="header-title">

                            <h3 class="fs-16 fw-6 mb-0">Inventory</h3>

                        </div>

                        <div class="row bd_none">

                            <div class="form-field-list">

                                <label>SKU (Stock Keeping Unit)</label>

                                <input type="text" name="sku" placeholder="SKU Enter">

                            </div>

                            <div class="form-field-list">

                                <label>Barcode (ISBN, UPC, GTIN, etc.)</label>

                                <input type="text" name="barcode" placeholder="Barcode Enter">

                            </div>

                        </div>

                        <label class="variant-pricing-checkbox"><input type="checkbox" name="trackqtn">Track quantity</label>

                        <label class="variant-pricing-checkbox"><input type="checkbox" name="outofstock">Continue selling when out of stock</label>

                    </div>

                    <div class="row-items">

                        <div class="header-title">

                            <h3 class="fw-6 mb-0 fs-12 tt-u">QUANTITY</h3>

                            <a class="link" onclick="document.getElementById('variant-edit-locations-modal').style.display='block'">Edit locations</a>

                        </div>

                        <table>

                            <thead>

                                <tr>

                                    <th class="fw-6">Location name</th>

                                    <th class="ta-right fw-6">Available</th>

                                </tr>

                            </thead>

                            <tbody>

                               <div class="location-name">

                               </div>

                            </tbody>

                        </table>



                    </div>

                </div> -->

                <!-- <div class="card variant-shipping-card">

                    <div class="row-items">

                        <div class="header-title">

                            <h3 class="fs-16 fw-6 mb-0">Shipping</h3>

                        </div>

                        <label><input type="checkbox" name="option2a" checked="checked">This is a physical product</label>

                    </div>

                    <div class="row-items variant-shipping-weight">

                        <h3 class="fs-12 fw-6 lh-normal mb-8">WEIGHT</h3>

                        <p class="lh-normal mb-8">Used to calculate shipping rates at checkout and label prices during fulfillment.</p>

                        <label>Weight</label>

                        <div class="row">

                            <input type="text" value="0,0">

                            <select>

                                <option>lb</option>

                                <option>oz</option>

                                <option>kg</option>

                                <option>g</option>

                            </select>

                        </div>

                    </div>

                    <div class="row-items variant-shipping-info">

                        <h3 class="fs-12 fw-6 mb-8">CUSTOMS INFORMATION</h3>

                        <p>Customs authorities use this information to calculate duties when shipping internationally. Shown on printed customs forms.</p>

                        <div class="row mb-0">

                            <label>Country/Region of origin</label>

                            <select>

                                <option>Select country/region</option>

                                <option>Afghanistan</option>

                                <option>Åland Islands</option>

                                <option>Albania</option>

                            </select>

                            <p>In most cases, where the product is manufactured.</p>

                            <label>HS (Harmonized System) code</label>

                            <input type="search" placeholder="Search or enter a HS code">

                            <p class="mb-0">Manually enter codes that are longer than 6 numbers.</p>

                        </div>

                    </div>

                </div> -->
                
                <div class="card search-engine-listing-card">

                    <div class="card-header">

                        <div class="header-title">

                            <h4 class="fs-16 mb-0 fw-6">Search engine listing preview</h4><a class="link edit-website-seo-btn">Edit website SEO</a>

                        </div>

                        <p>Add a title and description to see how this product might appear in a search engine listing</p>

                    </div>

                    <div class="card-middle">

                        <div class="row">

                            <label>Page title</label>

                            <input name="seo_title" type="text" value="{{ old('seo_title') }}">

                            <p>0 of 70 characters used</p>
                            @error('seo_title') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="row">

                            <label>Description</label>

                            <textarea name="seo_descripation">{{ old('seo_descripation') }}</textarea>

                            <p>0 of 320 characters used</p>
                            @error('seo_descripation') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="row">

                            <label>URL and handle</label>

                            <div class="url-input">

                                <span>https://rug.webtech-evolution.com/</span>

                                <input name="seo_url" type="text" value="">
                            </div>
                            @error('seo_url') <span class="text-danger">{{ $message }}</span>@enderror

                        </div>

                    </div>     

                </div>


                <div class="card">
                    <div class="row">
                        <h3>Product Tab descripation</h3>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="form-group change">
                                
                                <a class="btn btn-success add-more custom-addmorebtn">+ Add More</a>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 custom-flex-sign">
                            
                            
                            {{-- plus minus sign --}}

        {{-- <div class="panel-group" id="accordion">
        
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        
                        </a>
                    </h4>
        
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body"></div>
                </div>
            </div>
        </div> --}}
   
                        </div>
                    </div>
                   
                   
                    <div id="tab_logic" class="after-add-more">
                        <div class="row">
                            <label>Title</label>
                            <input type="text" name="product_array[1][question]">
                        </div>
                        <div wire:ignore class="form-group row">
                            <label>Description</label>
                            <div class="col-md-9">
                                <textarea name="product_array[1][answer]" class="form-control"  id="descripation"></textarea>
                              
                            </div>
                        </div>
                    </div>
                    <div class="more-feilds"></div>
                </div>

            </div>

            <div class="columns one-third right-details">

                <div class="card cgcp-prd-status-card">

                    <div class="card-header">

                        <div class="header-title">

                            <h3 class="fs-16 fw-6 mb-0">Product status</h3>

                        </div>

                        <p class="mb-0">

                            <select name="status">
                              <?php /*   @if (Input::old('status') == active)
                                    <option value="active" selected>Active</option>
                                @else
                                    <option value="inactive">InActive</option>
                                @endif -->

                                */ ?>
                                <option value="active">Active</option>

                                <option value="inactive">InActive</option>

                            </select>                     

                        </p>

                        <p class="mb-0">This product will be hidden from all sales channels.</p>

                    </div>

                    <div class="card-header">

                        <div class="header-title">

                            <h3 class="fs-16 fw-6 mb-0">Product New</h3>

                        </div>

                        <p class="mb-0">

                            <select  name="product_new">

                                <option value="">-- Select Option --</option>

                                <option value="1">New</option>

                                <option value="2">Sale</option>

                            </select>                     

                        </p>

                        <p class="mb-0">This product will be hidden from all sales channels.</p>

                    </div>

                    <!-- <div class="card-middle">

                        <div class="header-title">

                            <h4 class="fs-12  fw-6 mb-0">SALES CHANNELS AND APPS</h4>

                        </div>

                        <button class="link">Deselect all</button>     

                        <div class="row mb-0">

                            <label>

                                <input type="checkbox" name="online_store" >Online Store

                                <a href="#">Schedule availability</a>

                            </label>

                            <label><input type="checkbox" name="point_of_sale">Point of Sale</label>

                        </div>

                    </div> -->

                </div>

                <div class="card tag-card card-grey-bg organization-card">

                    <!-- <div class="card-header">

                        <div class="header-title">

                            <h3 class="fs-16  fw-6 mb-0">Organization</h3>

                        </div>

                        <div class="row">

                            <label>Product type</label>

                            <div class="d-flex">

                                <input type="text" name="product_type" placeholder="e.g. Shirts">

                                <a class="secondary"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m10 16-4-4h8l-4 4zm0-12 4 4H6l4-4z"></path></svg></button>

                            </div>

                        </div>

                        <div class="row">

                            <label>Vendor</label>

                            <div class="d-flex">

                                <input type="text" name="vender" placeholder="e.g. Nike">

                                <button class="secondary"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m10 16-4-4h8l-4 4zm0-12 4 4H6l4-4z"></path></svg></button>

                            </div>

                        </div>

                    </div> -->

                    <div class="card-middle">

                        <div class="row sidebar-collection-checkbox">

                            <label class="fs-12  fw-6 mb-0">COLLECTIONS</label>

                            <input type="search" placeholder="Search for collections" onclick="openOption('email_subscription_status')">

                            <div class="search-collections-checkbox filter_email_subscription_status" style="list-style-type: none">
                            @foreach($Collection as $row) 
                            
                                <label><input type="checkbox" name="productCollection" value="{{$row->id}}" >{{$row->title}}</label>
                               
                            @endforeach    
                            </div>

                        </div>

                    </div>

                    <!-- <div class="card-footer">

                        <label name="tags" class="fs-12  fw-6 mb-0">TAGS</label>

                        <div class="tags-input-box">

                            <div class="customer-detail-select-tags">

                                

                               <span class="selected_tags"></span>

                                <input  id="customer_detail_tags" class="block mt-1 w-full" type="text" style="width: fit-content;" autofocus />

                                

                            </div>

                            <input id="customer_tags" class="block mt-1 w-full" type="hidden" style="width: fit-content;" name="customer_detail_tags" autofocus />

                        </div>


                    </div> -->

                    <!-- <p class="fs-13 mt-1 mb-1">Add existing tags:</p>

                    @if(!empty($tags))

                        @foreach($tags as $tag)

                            <span class="tag grey fs-13 tag_added">{{$tag->label}}</span>

                        @endforeach

                    @endif -->

                </div>

                <!-- <div class="card tag-card card-grey-bg pd-20 pd-online-store-card">

                    <h3 class="fs-16  fw-6">Online store</h3>

                    <label>Theme template</label>

                        <select>

                            <option>Default product</option>

                        </select>

                    <p>Assign a template from your current theme to define how the product is displayed.</p>

                </div> -->

            </div>

        </article>

    </section>

    <section class="full-width flex-wrap admin-body-width create-collection-footer">

        <div class="page-bottom-btn">

            <input type="submit" class="button" id="master-save" value="save" disabled="disabled">

        </div>

    </section>

    <!-- Price Modal -->
    <div id="variants-edit-prices-modal" class="customer-modal-main variants-edit-option-modal">
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
                                <input type="text" id="apply-price" class="apply-price" value="" placeholder="0,00">
                            </span>
                        </div>
                        <a class="button fw-6" id="apply-price-submit" class="apply-price-submit">Apply to all</a>
                    </div>
                    <div class="attribute-prices">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <a onclick="document.getElementById('variants-edit-prices-modal').style.display='none'" class="button secondary">Cancel</a>
                    <a onclick="document.getElementById('variants-edit-prices-modal').style.display='none'" class="button green-btn child-price-submit" data-recordid="">Done</a>
                </div>
            </div>
        </div>
    </div> 
    <!-- Price Modal -->
    <div id="variants-edit-selling-prices-modal" class="customer-modal-main variants-edit-option-modal">
        <div class="customer-modal-inner">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Edit Selling prices</h2>
                    <span onclick="document.getElementById('variants-edit-selling-prices-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
                </div>
                <div class="modal-body">
                    <div class="row side-elements align-item-bt">
                        <div class="form-field-list">
                            <label>Apply a Selling price to all variants</label>
                            <span class="dollar-input">
                                <input type="text" id="apply-selling-price" class="apply-selling-price" value="" placeholder="0,00">
                            </span>
                        </div>
                        <a class="button fw-6" id="apply-price-selling-submit" class="apply-price-selling-submit">Apply to all</a>
                    </div>
                    <div class="attribute-selling-prices">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <a onclick="document.getElementById('variants-edit-selling-prices-modal').style.display='none'" class="button secondary">Cancel</a>
                    <a class="button green-btn child-price-submit" onclick="document.getElementById('variants-edit-selling-prices-modal').style.display='none'" data-recordid="">Done</a>
                </div>
            </div>
        </div>
    </div> 

    <!-- Stock Modal -->
    <div id="variants-edit-stock-modal" class="customer-modal-main variants-edit-option-modal">
        <div class="customer-modal-inner">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Edit Stock</h2>
                    <span onclick="document.getElementById('variants-edit-stock-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
                </div>
                <div class="modal-body">
                    <div class="row side-elements align-item-bt">
                        <div class="form-field-list">
                            <label>Apply a Stock to all variants</label>
                            <span class="dollar-input">
                                <input type="text" id="apply-stock" class="apply-stock" value="" placeholder="0,00">
                            </span>
                        </div>
                        <a class="button fw-6" id="apply-stock-submit" class="apply-stock-submit">Apply to all</a>
                    </div>
                    <div class="attribute-selling-prices">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <a onclick="document.getElementById('variants-edit-stock-modal').style.display='none'" class="button secondary">Cancel</a>
                    <a class="button green-btn child-price-submit" onclick="document.getElementById('variants-edit-stock-modal').style.display='none'" data-recordid="">Done</a>
                </div>
            </div>
        </div>
    </div> 
    
    <!--Edit SKUs modal-->
    <div id="variants-edit-skus-modal" class="customer-modal-main skus-barcodes-modal">
        <div class="customer-modal-inner">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Edit SKUs</h2>
                    <span onclick="document.getElementById('variants-edit-skus-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
                </div>
                <div class="modal-body  attribute-sku-value">
                 
                </div>
                <div class="modal-footer">
                    <a onclick="document.getElementById('variants-edit-skus-modal').style.display='none'" class="button secondary">Cancel</a>
                    <a onclick="document.getElementById('variants-edit-skus-modal').style.display='none'" class="button green-btn">Done</a>
                </div>
            </div>
        </div>
    </div> 
    
    <!--Edit barcodes modal-->
    <div id="variants-edit-stock-qtn-modal" class="customer-modal-main skus-barcodes-modal">
        <div class="customer-modal-inner">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Edit Stock</h2>
                    <span onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
                </div>
                <div class="modal-body attribute-stock-qtn-value">
                    
                </div>
                <div class="modal-footer">
                    <a onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='none'" class="button secondary">Cancel</a>
                    <a onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='none'" class="button green-btn">Done</a>
                </div>
            </div>
        </div>
    </div> 
    
    
    <!--Edit HS codes modal-->
    <div id="edit-hs-codes-modal" class="customer-modal-main variants-edit-option-modal">
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
                            <input type="search" id="apply-hscode" value="" placeholder="Search or enter a HS code">
                        </div>
                        <a class="button fw-6" id="apply-hscode-submit">Apply to all</a>
                    </div>
                    <p class="ta-left mb-0">Manually enter codes that are longer than 6 numbers.</p>
                    <div class="attribute-hscode-value">
                        
                    </div> 
                </div>
                <div class="modal-footer">
                    <a class="button secondary">Cancel</a>
                    <a class="button green-btn">Done</a>
                </div>
            </div>
        </div>
    </div> 
    
    <!--Edit country codes of origin modal-->
    <div id="edit-country-codes-modal" class="customer-modal-main variants-edit-option-modal" wire:ignore.self>
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
                    <a onclick="document.getElementById('edit-country-codes-modal').style.display='none'" class="button secondary">Cancel</a>
                    <a onclick="document.getElementById('edit-country-codes-modal').style.display='none'" class="button green-btn">Done</a>
                </div>
            </div>
        </div>
    </div> 


  <!--Edit quantities modal-->
    <div id="edit-quantities-modal" class="customer-modal-main">
        <div class="customer-modal-inner">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Edit quantities</h2>
                    <span onclick="document.getElementById('edit-quantities-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
                </div>
                <div class="modal-body">
                    <div class="first-modal">
                        <p class="mb-0">Choose a location where you want to edit quantities.</p>
                        <div>

                            @foreach($location as $local_row)
                            <a class="link location_name" id="{{$local_row->id}}" data-toggle="modal" data-target="#edit-quantities-details-modal-{{$local_row->id}}" data-dismiss="modal">{{$local_row->name}} <span><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M8 16a.999.999 0 0 1-.707-1.707L11.586 10 7.293 5.707a.999.999 0 1 1 1.414-1.414l5 5a.999.999 0 0 1 0 1.414l-5 5A.997.997 0 0 1 8 16z"></path></svg></span></a>


                             <!--Edit quantities modal-->
                                <div id="edit-quantities-details-modal-{{$local_row->id}}" class="customer-modal-main ">
                                    <div class="customer-modal-inner">
                                        <div class="customer-modal">
                                            <div class="modal-header">
                                                <h2>Edit quantities</h2>
                                                <span  data-dismiss="modal" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
                                            </div>
                                            <div class="modal-body">

                                                    <p class="mb-0">Editing quantities at <span class="fw-6">{{$local_row->name}}</span></p>
                                                    <input type="hidden" name="variantsid[]" value="{{$local_row->id}}"> 
                                                     <div class="attribute-stock-value" id="location_{{$local_row->id}}">


                        
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button class="button secondary"  data-dismiss="modal">Cancel</button>
                                                <button class="button secondary green-btn"  data-dismiss="modal">Done</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
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



    <!--Edit country codes of origin modal-->
    <div class="variant-identity">
        
    </div>

    <!--Edit location modal-->

<div id="variant-edit-locations-modal" class="customer-modal-main">

    <div class="customer-modal-inner">

        <div class="customer-modal">

            <div class="modal-header">

                <h2>Edit locations</h2>

                <span onclick="document.getElementById('variant-edit-locations-modal').style.display='none'" class="modal-close-btn">

                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">

                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>

                    </svg>

                </span>

            </div>

            <div class="modal-body">
                <p>Select locations that stock the selected variants.</p>
                @foreach($location as $row)
                <label><input type="checkbox" name="locationid" value="{{$row->id}}">{{$row->name}}</label>
                @endforeach
            </div>

            <div class="modal-footer">

                <a class="button secondary" onclick="document.getElementById('variant-edit-locations-modal').style.display='none'">Cancel</a>

                <a class="button green-btn" onclick="document.getElementById('variant-edit-locations-modal').style.display='none'">Done</a>

            </div>

        </div>

    </div>

</div>

</form>


<!--script start-->

<script type="text/javascript">
    $(document).ready(function() {
    $(".add-more").click(function(){ 
        x = Math.random().toString(36).substr(2, 9);
        var html = $("#tab_logic").html();
        $(".more-feilds").append(`
    <div class="remove-logic">
    <div class="row">
        <label>Title</label>
        <input type="text" name="product_array[${x}][question]" value="">
    </div>
    <div wire:ignore class="form-group row">
        <label>Description</label>
        <div class="col-md-9">
            <textarea name="product_array[${x}][answer]" class="form-control required" id="descripation"></textarea>
          
        </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-danger btn-sm custom-deleteebtn remove-detail" id="remove-detail"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Remove</a>
    </div>
    </div>`);        
    });

    $("body").on("click",".remove-detail",function(){ 
        $(this).parents(".remove-logic").remove();
    });
});
</script>
<script>

    $('#custom_variant').on('change', function(){
           this.value = this.checked ? 1 : 0;
        });
        $(document).ready(function() {
             // $('.save-button').prop('disabled', true);
             $('form').keyup(function() {
                if($(this).val() != '') {
                   $('.save-button').prop('disabled', false);
                }
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
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script>
$(document).ready(function(){

    $( ".edit-website-Attribute" ).click(function() {     

        $('.main-variant-attribute .card-middle-arrtibute').slideToggle(500);
    });

});

$(document).ready(function(){

    $( ".edit-update-Attribute" ).click(function() {     

        $('.card-cutome-arrtibute').slideToggle(500);
    });

});
</script>

 <script>
$(document).ready(function(){

    $( ".click-varients-type" ).click(function() {     

        $('.main-variant-card .card-middle-varient').toggle("slide");

    });

});
</script>

  

<script type="text/javascript">
   $('.tinymce-editor').each(function () {
        CKEDITOR.replace($(this).prop('id'));
    });


    $("input[name=locationid]").change(function() {
  updateAllChecked();
});

$("input[name=addall]").change(function() {
  if (this.checked) {
    $("input[name=locationid]").prop('checked', true).change();
  } else {
    $("input[name=locationid]").prop('checked', false).change();
  }
});

function updateAllChecked() {
    $('.location-name').html('');
    $("input[name=locationid]").each(function() {
        let getloc = $(this).val();
        if (this.checked) {
            let old_text = $('.location-name').html() ? $('.location-name').html() + ', ' : '';
            <?php foreach($location as $result) { ?>
                 if(getloc == <?php echo $result['id']; ?>) 
                 {   
                    $(".location-name").append(`
                        <tr locationid="`+getloc+`">                        
                        <td><?php echo $result['name']; ?></td>
                        <td><input type="number" name="stock_<?php echo $result['id']; ?>[]" value=""></td>
                        </tr>
                    `);
                }
            <?php }  ?>
            // $('.location-name').text(old_text + $(this).val());
        }else{
            $('tr[locationid="'+getloc+'"]').remove();
        }
    });
} 
</script>

<script type="text/javascript">
//First Name Validation 


$(document).ready(function () {
     var arr_list_items = [];
    var rowIdx = 1;
    var flag = 1;
      $(document.body).on('click','.addBtn', function() {

         var attrinbute = $('.varition-type-value').val();
         var variants_tag = $('.variant-tags-error').val();

            x = Math.random().toString(36).substr(2, 9);
           
        
            console.log(x)
            if(flag < 4) {
                if(attrinbute == "" && variants_tag == "")
                {
                      
                    if(attrinbute == "")
                    {
                        
                        $('.varition-type-value').css('border-color', 'red');

                    }

                    if(variants_tag == "")
                    {
                        $('.variant-tags-error').css('border-color', 'red');
                    }
                }
                else
                {
                     if(attrinbute != "")
                     {

                     $('.varition-type-value').css('border-color', 'green');
                    }

                    $(".varition-append").append(`

                        <div id="R${++rowIdx}">
                            <label class="form-label fs-14 fw-6">Option ${rowIdx}</label>

                                    <div class="row">
                                        <select name="size" class="varition-type-value" id="varition_type_${rowIdx}">
                                        <option value="">-- Select Option --</option>
                                        <?php foreach($variantag as $row) { ?>
                                             ` +  ($.inArray(`<?php echo $row->id; ?>`, arr_list_items) == -1 ? '<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>': '') +`
                                        <?php  } ?>

                                      
                                        </select>

                                        <input type="text" class="varition_tags variant-tags-error" id="varition_tags_${rowIdx}" value="" name="option" data-role="tagsinput" placeholder="Separate options with a comma">

                                    </div>
                            </div>
                        </div>    

                        
                    `);
               
                    //$('#varition_type_'+rowIdx).find('option:selected').remove().end();

                    $('.varition_tags').tagsinput({
                        allowDuplicates: true
                    });

                    flag++;

                     if(flag == 4) {

                        $('.addBtn').css('display', 'none');

                     }
                 }
            }

        });         
    
       $(document).on("change", '.varition-type-value', function() {
            var selecetval = $(this).val();
            arr_list_items.push(selecetval);
       
            console.log(arr_list_items);
        });
        

    });
        

       $(document).on("change", '.varition_tags', function() {

        var mainid = $(this).attr('id');
        
        var id_type1 = $('#varition_type_1').val();
        var id_type2 = $('#varition_type_2').val();
        var id_type3 = $('#varition_type_3').val();
        var id_type4 = $('#varition_type_4').val();
        var id_type5 = $('#varition_type_5').val();
        var id_type6 = $('#varition_type_6').val();
        var id_type7 = $('#varition_type_7').val();
        var id_type8 = $('#varition_type_8').val();
        var id_type9 = $('#varition_type_9').val();
        var id_type10 = $('#varition_type_10').val();

        var id1 = $('#varition_tags_1').val();
        var id2 = $('#varition_tags_2').val();
        var id3 = $('#varition_tags_3').val();
        var id4 = $('#varition_tags_4').val();
        var id5 = $('#varition_tags_5').val();
        var id6 = $('#varition_tags_6').val();
        var id7 = $('#varition_tags_7').val();
        var id8 = $('#varition_tags_8').val();
        var id9 = $('#varition_tags_9').val();
        var id10 = $('#varition_tags_10').val();


   
        if(id1 != null && id1.length > 0) {
            var arr11 = id1.split(',');
            var arrlegth1 =  id1.length;
            var arr1 = arr11;
        }

        if(id2 != null && id2.length > 0) {
            var arr22 = id2.split(',');
            var arrlegth2 =  id2.length;
            var arr2 = arr22;
        }

        if(id3 != null && id3.length > 0) {
            var arr33 = id3.split(',');
            var arrlegth3 =  id3.length;
            var arr3 = arr33;
        }

        if(id4 != null && id4.length > 0) {
            var arr44 = id4.split(',');
            var arrlegth4 =  id4.length;
            var arr4 = arr44;
        }

        if(id5 != null && id5.length > 0) {
            var arr55 = id5.split(',');
            var arrlegth5 =  id5.length;
            var arr5 = arr55;
        }

        if(id6 != null && id6.length > 0) {
            var arr66 = id6.split(',');
            var arrlegth6 =  id6.length;
            var arr6 = arr66;
        }

        if(id7 != null && id7.length > 0) {
            var arr77 = id7.split(',');
            var arrlegth7 =  id7.length;
            var arr7 = arr77;
        }

        if(id8 != null && id8.length > 0) {
            var arr88 = id8.split(',');
            var arrlegth8 =  id8.length;
            var arr8 = arr88;
        }

        if(id9 != null && id9.length > 0) {
            var arr99 = id9.split(',');
            var arrlegth9 =  id9.length;
            var arr9 = arr99;
        }


        if(id10 != null && id10.length > 0) {
            var arr1010 = id10.split(',');
            var arrlegth10 =  id10.length;
            var arr10 = arr1010;
        }

       
        var get_html = '';
        var get_price_html = '';
        var get_selling_price_html = '';
        var get_single_stock_html = '';
        var get_sku_html = '';
        var get_barcode_html = '';
        var get_hscode_html = '';
        var get_country_html = '';
        var get_stock_html = '';
        
       if(id1 != null && id1.length > 0)
       {
            arr1.forEach(function(el) {
                var uniq_id = Math.random().toString(36).substr(2, 9);
                var arr_name1 = el;

                if(id2 != null && id2.length > 0) {

                    arr2.forEach(function(el) {
                        var uniq_id = Math.random().toString(36).substr(2, 9);
                         var arr_name2 = el;

                        if(id3 != null && id3.length > 0) {

                            arr3.forEach(function(el) {
                                var uniq_id = Math.random().toString(36).substr(2, 9);
                                var arr_name3 = el;

                            if(id4 != null && id4.length > 0) {

                            arr4.forEach(function(el) {
                                var uniq_id = Math.random().toString(36).substr(2, 9);
                                var arr_name4 = el;

                            if(id5 != null && id5.length > 0) {

                            arr5.forEach(function(el) {
                                var uniq_id = Math.random().toString(36).substr(2, 9);
                                var arr_name5 = el;

                            if(id6 != null && id6.length > 0) {

                            arr6.forEach(function(el) {
                                var uniq_id = Math.random().toString(36).substr(2, 9);
                                var arr_name6 = el;

                            if(id7 != null && id7.length > 0) {

                            arr7.forEach(function(el) {
                                var uniq_id = Math.random().toString(36).substr(2, 9);
                                var arr_name7 = el;

                            if(id8 != null && id8.length > 0) {

                            arr8.forEach(function(el) {
                                var uniq_id = Math.random().toString(36).substr(2, 9);
                                var arr_name8 = el;

                            if (id9 != null && id9.length > 0) {

                            arr9.forEach(function(el) {
                                var uniq_id = Math.random().toString(36).substr(2, 9);
                                var arr_name9 = el;

                            if (id10 != null && id10.length > 0) {

                            arr10.forEach(function(el) {
                                var uniq_id = Math.random().toString(36).substr(2, 9);
                                var arr_name10 = el;

                                get_html += '<input type="hidden" name="varition_arrray[]" class="varition_tags" value="' + id_type1 + '/' + arr_name1 + '/' + id_type2 + '/' + arr_name2 + '/' + id_type1 + '/' + arr_name3 + '/' + arr_name4 + '/' + id_type4 + '/' + arr_name5 + '/' + id_type5 + '/' + arr_name6 + '/' + id_type6 + '/' + arr_name7 + '/' + id_type7 + '/' + arr_name8 + '/' + id_type8 + '/' + arr_name9 + '/' + id_type9 +'/' + arr_name10 + '/' + id_type10 +'"><tr id=' + uniq_id + ' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input ' + uniq_id + '" data-toggle="modal" id=' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +' data-id=' + uniq_id + '  data-input="">' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</a><a class="tc-black fw-6 stock-data-input" id="child-popup-single-stock'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-' + uniq_id + '" value="" data-input=""></td><td class="vendor-table-item ta-right"><p  id="price-view-' + uniq_id + '"></p><p></p></td></tr><br>';

                                get_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';

                                get_selling_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';

                                get_single_stock_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><span class="dollar-input"><input type="text" class="att_single_stock" name="att_single_stock[]" id="child-popup-single-stock'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                                get_sku_html += '<div class="vep-list"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><input type="text" id="child-popup-sku-' + uniq_id + '" class="att_sku_class" name="att_sku[]"></div><br>';

                                get_stock_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><input type="text" id="child-popup-stock-' + uniq_id + '" class="att_stock_class" name=""></div><br>';

                                get_barcode_html += '<div class="vep-list"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><input type="text" id="child-popup-stock-qtn-' + uniq_id + '" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';

                                get_hscode_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><input type="text" id="child-popup-hscode-' + uniq_id + '" class="att_hscode_class" name="att_hscode[]"></div><br>';

                                get_country_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-' + uniq_id + '" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';

                            });
                        } 
                        else {

                                get_html += '<input type="hidden" name="varition_arrray[]" class="varition_tags" value="' + id_type1 + '/' + arr_name1 + '/' + id_type2 + '/' + arr_name2 + '/' + id_type1 + '/' + arr_name3 + '/' + arr_name4 + '/' + id_type4 + '/' + arr_name5 + '/' + id_type5 + '/' + arr_name6 + '/' + id_type6 + '/' + arr_name7 + '/' + id_type7 + '/' + arr_name8 + '/' + id_type8 + '/' + arr_name9 + '/' + id_type9 +'"><tr id=' + uniq_id + ' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input ' + uniq_id + '" data-toggle="modal" id=' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 +' data-id=' + uniq_id + '  data-input="">' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</a><a class="tc-black fw-6 stock-data-input" id="child-popup-single-stock'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-' + uniq_id + '" value="" data-input=""></td><td class="vendor-table-item ta-right"><p  id="price-view-' + uniq_id + '"></p><p></p></td></tr><br>';

                                get_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';

                                get_selling_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';

                                get_single_stock_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><span class="dollar-input"><input type="text" class="att_single_stock" name="att_single_stock[]" id="child-popup-single-stock'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                                get_sku_html += '<div class="vep-list"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><input type="text" id="child-popup-sku-' + uniq_id + '" class="att_sku_class" name="att_sku[]"></div><br>';

                                get_stock_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><input type="text" id="child-popup-stock-' + uniq_id + '" class="att_stock_class" name=""></div><br>';

                                get_barcode_html += '<div class="vep-list"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><input type="text" id="child-popup-stock-qtn-' + uniq_id + '" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';

                                get_hscode_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><input type="text" id="child-popup-hscode-' + uniq_id + '" class="att_hscode_class" name="att_hscode[]"></div><br>';

                                get_country_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 +'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-' + uniq_id + '" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';
                            }

                           });
                        } 
                        else {

                                get_html += '<input type="hidden" name="varition_arrray[]" class="varition_tags" value="' + id_type1 + '/' + arr_name1 + '/' + id_type2 + '/' + arr_name2 + '/' + id_type1 + '/' + arr_name3 + '/' + arr_name4 + '/' + id_type4 + '/' + arr_name5 + '/' + id_type5 + '/' + arr_name6 + '/' + id_type6 + '/' + arr_name7 + '/' + id_type7 + '/' + arr_name8 + '/' + id_type8 + '"><tr id=' + uniq_id + ' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input ' + uniq_id + '" data-toggle="modal" id=' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + ' data-id=' + uniq_id + '  data-input="">' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</a><a class="tc-black fw-6 stock-data-input" id="child-popup-single-stock'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-' + uniq_id + '" value="" data-input=""></td><td class="vendor-table-item ta-right"><p  id="price-view-' + uniq_id + '"></p><p></p></td></tr><br>';

                                get_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';

                                get_selling_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';

                                get_single_stock_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</label><span class="dollar-input"><input type="text" class="att_single_stock" name="att_single_stock[]" id="child-popup-single-stock'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                                get_sku_html += '<div class="vep-list"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</label><input type="text" id="child-popup-sku-' + uniq_id + '" class="att_sku_class" name="att_sku[]"></div><br>';

                                get_stock_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</label><input type="text" id="child-popup-stock-' + uniq_id + '" class="att_stock_class" name=""></div><br>';

                                get_barcode_html += '<div class="vep-list"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</label><input type="text" id="child-popup-stock-qtn-' + uniq_id + '" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';

                                get_hscode_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</label><input type="text" id="child-popup-hscode-' + uniq_id + '" class="att_hscode_class" name="att_hscode[]"></div><br>';

                                get_country_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-' + uniq_id + '" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';
                            }

                            });
                        }
                        else
                        {
                            
                                get_html += '<input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'/'+id_type1+'/'+arr_name3+'/'+arr_name4+'/'+id_type4+'/'+arr_name5+'/'+id_type5+'/'+arr_name6+'/'+id_type6+'/'+arr_name7+'/'+id_type7+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</a><a class="tc-black fw-6 stock-data-input" id="child-popup-single-stock'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p  id="price-view-'+uniq_id+'"></p><p></p></td></tr><br>';

                                get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                                get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                                get_single_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</label><span class="dollar-input"><input type="text" class="att_single_stock" name="att_single_stock[]" id="child-popup-single-stock'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                                get_sku_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</label><input type="text" id="child-popup-sku-'+uniq_id+'" class="att_sku_class" name="att_sku[]"></div><br>';

                                get_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</label><input type="text" id="child-popup-stock-'+uniq_id+'" class="att_stock_class" name=""></div><br>';

                                get_barcode_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</label><input type="text" id="child-popup-stock-qtn-'+uniq_id+'" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';
                                
                                get_hscode_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</label><input type="text" id="child-popup-hscode-'+uniq_id+'" class="att_hscode_class" name="att_hscode[]"></div><br>';

                                get_country_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-'+uniq_id+'" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';
                                }
                                
                            });
                        }
                        else
                        {

                                 get_html += '<input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'/'+id_type1+'/'+arr_name3+'/'+arr_name4+'/'+id_type4+'/'+arr_name5+'/'+id_type5+'/'+arr_name6+'/'+id_type6+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</a><a class="tc-black fw-6 stock-data-input" id="child-popup-single-stock'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p  id="price-view-'+uniq_id+'"></p><p></p></td></tr><br>';

                                get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                                get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                                get_single_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</label><span class="dollar-input"><input type="text" class="att_single_stock" name="att_single_stock[]" id="child-popup-single-stock'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                                get_sku_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</label><input type="text" id="child-popup-sku-'+uniq_id+'" class="att_sku_class" name="att_sku[]"></div><br>';

                                get_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</label><input type="text" id="child-popup-stock-'+uniq_id+'" class="att_stock_class" name=""></div><br>';

                                get_barcode_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</label><input type="text" id="child-popup-stock-qtn-'+uniq_id+'" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';
                                
                                get_hscode_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</label><input type="text" id="child-popup-hscode-'+uniq_id+'" class="att_hscode_class" name="att_hscode[]"></div><br>';

                                get_country_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-'+uniq_id+'" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';
                                }
                                
                            });
                        }
                        else
                        {
                                get_html += '<input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'/'+id_type3+'/'+arr_name3+'/'+arr_name4+'/'+id_type4+'/'+arr_name5+'/'+id_type5+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</a><a class="tc-black fw-6 stock-data-input" id="child-popup-single-stock'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p  id="price-view-'+uniq_id+'"></p><p></p></td></tr><br>';

                                get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                                get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                                get_single_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</label><span class="dollar-input"><input type="text" class="att_single_stock" name="att_single_stock[]" id="child-popup-single-stock'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                                get_sku_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</label><input type="text" id="child-popup-sku-'+uniq_id+'" class="att_sku_class" name="att_sku[]"></div><br>';

                                get_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</label><input type="text" id="child-popup-stock-'+uniq_id+'" class="att_stock_class" name=""></div><br>';

                                get_barcode_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</label><input type="text" id="child-popup-stock-qtn-'+uniq_id+'" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';
                                
                                get_hscode_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</label><input type="text" id="child-popup-hscode-'+uniq_id+'" class="att_hscode_class" name="att_hscode[]"></div><br>';

                                get_country_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-'+uniq_id+'" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';
                                }
                                
                            });
                        }
                        else
                        {
                                get_html += '<input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'/'+id_type3+'/'+arr_name3+'/'+arr_name4+'/'+id_type4+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</a><a class="tc-black fw-6 stock-data-input" id="child-popup-single-stock'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p  id="price-view-'+uniq_id+'"></p><p></p></td></tr><br>';

                                get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                                get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                                get_single_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</label><span class="dollar-input"><input type="text" class="att_single_stock" name="att_single_stock[]" id="child-popup-single-stock'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                                get_sku_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</label><input type="text" id="child-popup-sku-'+uniq_id+'" class="att_sku_class" name="att_sku[]"></div><br>';

                                get_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</label><input type="text" id="child-popup-stock-'+uniq_id+'" class="att_stock_class" name=""></div><br>';

                                get_barcode_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</label><input type="text" id="child-popup-stock-qtn-'+uniq_id+'" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';
                                
                                get_hscode_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</label><input type="text" id="child-popup-hscode-'+uniq_id+'" class="att_hscode_class" name="att_hscode[]"></div><br>';

                                get_country_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-'+uniq_id+'" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';
                                }
                                
                            });
                        }
                        else
                        {
                                get_html += '<input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'/'+id_type3+'/'+arr_name3+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+'/'+arr_name3+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</a><a class="tc-black fw-6 stock-data-input" id="child-popup-single-stock'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p  id="price-view-'+uniq_id+'"></p><p></p></td></tr><br>';

                                get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                                get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                                get_single_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</label><span class="dollar-input"><input type="text" class="att_single_stock" name="att_single_stock[]" id="child-popup-single-stock'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                                get_sku_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</label><input type="text" id="child-popup-sku-'+uniq_id+'" class="att_sku_class" name="att_sku[]"></div><br>';

                                get_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</label><input type="text" id="child-popup-stock-'+uniq_id+'" class="att_stock_class" name=""></div><br>';

                                get_barcode_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</label><input type="text" id="child-popup-stock-qtn-'+uniq_id+'" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';
                                
                                get_hscode_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</label><input type="text" id="child-popup-hscode-'+uniq_id+'" class="att_hscode_class" name="att_hscode[]"></div><br>';

                                get_country_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-'+uniq_id+'" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';
                            }
                        

                            });
                        }
                        else
                        {
                             get_html += '<input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'</a><a class="tc-black fw-6 stock-data-input" id="child-popup-single-stock'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p  id="price-view-'+uniq_id+'"></p><p></p></td></tr><br>'; 

                             get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 

                             get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                             get_single_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'</label><span class="dollar-input"><input type="text" class="att_single_stock" name="att_single_stock[]" id="child-popup-single-stock'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                             get_sku_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'</label><input type="text" id="child-popup-sku-'+uniq_id+'" class="att_sku_class" name="att_sku[]"></div><br>';

                             get_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'</label><input type="text" id="child-popup-stock-'+uniq_id+'" class="att_stock_class" name=""></div><br>';

                             get_barcode_html += '<div class="vep-list"><label>'+arr_name1+'/'+arr_name2+'</label><input type="text" id="child-popup-stock-qtn-'+uniq_id+'" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>'; 

                             get_hscode_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'</label><input type="text" id="child-popup-hscode-'+uniq_id+'" class="att_hscode_class" name="att_hscode[]"></div><br>';

                             get_country_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-'+uniq_id+'" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';
                        }
                    });
                }
                else
                {
                     get_html += '<input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+' data-id='+uniq_id+'  data-input="">'+arr_name1+'</a><a class="tc-black fw-6 stock-data-input" id="child-popup-single-stock'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p><span>{{$symbol["currency"]}}</span><span  id="price-view-'+uniq_id+'"></span><span>.00</span></p><p></p></td></tr><br>';

                     get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                    get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                    get_single_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'</label><span class="dollar-input"><input type="text" class="att_single_stock" name="att_single_stock[]" id="child-popup-single-stock'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';

                     get_sku_html += '<div class="vep-list"><label>'+arr_name1+'</label><input type="text" id="child-popup-sku-'+uniq_id+'" class="att_sku_class" name="att_sku[]"></div><br>';

                     get_barcode_html += '<div class="vep-list"><label>'+arr_name1+'</label><input type="text" id="child-popup-stock-qtn-'+uniq_id+'" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';

                     get_hscode_html += '<div class="vep-list bd_none"><label>'+arr_name1+'</label><input type="text" id="child-popup-hscode-'+uniq_id+'" class="att_hscode_class" name="att_hscode[]"></div><br>';

                     get_country_html += '<div class="vep-list bd_none"><label>'+arr_name1+'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-'+uniq_id+'" class="att_country_class" name="att_country[]"><option>Select country/region</option><option value="1">Afghanistan</option><option value="2">India<option value="3">Greenland</option></select></div></div><br>';

                     get_stock_html += '<div class="vep-list bd_none"><label>'+arr_name1+'</label><input type="text" id="child-popup-stock-'+uniq_id+'" class="att_stock_class" name=""></div><br>';
                }

            });
        }

           $('.variants-option').html(`   `+get_html+`  `);

           $('.attribute-prices').html(`        
                       `+get_price_html+`
                
            `);

            $('.attribute-selling-prices').html(`        
                       `+get_selling_price_html+`
                
            `);

           $('.attribute-sku-value').html(`        
                       `+get_sku_html+`
                
            `);

            $('.attribute-stock-qtn-value').html(`        
                       `+get_barcode_html+`
                
            `);

            $('.attribute-hscode-value').html(`        
                       `+get_hscode_html+`
                
            `);

            $('.attribute-country-value').html(`        
                       `+get_country_html+`
                
            `);  
            $('.attribute-stock-value').html(`        
                       `+get_stock_html+`
                
            `);

                   /* ALL POPBOX GET PRICE-COST-MARGIN-PROFIT */  
           $(".product-table-item").attr("data-input", $('.price-change-input').val());
           $(".price-main-popup-input").attr("data-input", $('.price-change-input').val());
           $(".cost-data-input-new").attr("data-input", $('.change-value-main-cost').val());
           $(".att_price_selling_class").attr("data-input", $('.change-value-main-stock').val());
           $(".profit-data-input").attr("data-input", $('#profit-input-mian-value').val());
           $(".margin-data-input").attr("data-input", $('#margin-input-mian-value').val());
           $(".price-view-class").html($('.price-change-input').val());
           $(".att_price_class").attr("value", $('.price-change-input').val());
           $(".cost-data-input-new").attr("value", $('.change-value-main-cost').val());
           $(".att_price_selling_class").attr("value", $('.change-value-main-stock').val());
           $(".margin-data-input").attr("value", $('#margin-input-mian-value').val());
           $(".profit-data-input").attr("value", $('#profit-input-mian-value').val());

        });   
        
        $(document).on("change", '.att_stock_qtn_class', function() {

             var id_value = $(this).attr('id');
             
            var id1 = $('#'+id_value).val();
             
            $("#"+id_value).attr("value", id1);
           

            
        });

        $(document).on("click", '#apply-country-submit', function() {

            var val = $('#apply-country').val();

           $('.att_country_class').each(function(){
            $(this).val(val);
           });
           
        });


        $(document).on("click", '#apply-price-submit', function() {
            var val = $('.apply-price').val();

            $('.att_price_class').attr("value", val);
        });

         $(document).on("click", '#apply-price-selling-submit', function() {
            var val = $('.apply-selling-price').val();

            $('.att_price_selling_class').attr("value", val);
        });

         $(document).on("change", '#apply-stock-submit', function() {
            var val = $('.apply-stock').val();

            $('.att_single_stock').attr("value", val);
        });


        $(document).on("change", '.att_price_class', function() {

             var id_value = $(this).attr('id');
             var dataid = $(this).data('id');
             
            var id1 = $('#'+id_value).val();
             console.log($('#main-popup-price-'+dataid));
            $("#"+id_value).attr("value", id1);

            $("#price-view-"+dataid).html(id1);
           
            $("#main-popup-price-"+dataid).attr("value", id1);
        
        });

         $(document).on("change", '.att_single_stock', function() {

             var id_value = $(this).attr('id');
             var dataid = $(this).data('id');
             
            var id1 = $('#'+id_value).val();
             

              $("#main-popup-stock-"+id_value).attr("value", id1);
            //$("#"+id_value).attr("value", id1);

          //  $("#price-view-"+dataid).html(id1);
           
        
        });

        $(document).on("change", '.att_price_selling_class', function() {

             var id_value = $(this).attr('id');
             var dataid = $(this).data('id');
             
            var id1 = $('#'+id_value).val();
             
            $("#"+id_value).attr("value", id1);
            $("#main-popup-cost-"+dataid).attr("value", id1);
            $("#price-view-"+dataid).html(id1);

            
        });

        $(document).on("change", '.att_sku_class', function() {

             var id_value = $(this).attr('id');
             
            var id1 = $('#'+id_value).val();
             
            $('#'+id_value).attr("value", id1);  

        });

        $(document).on("click", '#apply-hscode-submit', function() {
            var val = $('#apply-hscode').val();
            $('.att_hscode_class').attr("value", val);
        });

        $(document).on("change", '.att_hscode_class', function() {

             var id_value = $(this).attr('id');
             
            var id1 = $('#'+id_value).val();
             
            $("#"+id_value).attr("value", id1);

            
        });



       $(document).on("click", '.modal-footer .button.green-btn', function() {
            var thisid = $(this).data("recordid");
           //$(".varition_popup_main."+thisid).data("input", $(this).parent().parent().find(".variant-pricing-card .form-field-list input").val());
           $(".product-table-item"+thisid).attr("data-input", $(this).parent().parent().find(".variant-pricing-card .form-field-list input").val());
           $("#cost-data-input-"+thisid).attr("data-input", $(this).parent().parent().find(".variant-pricing-card .cost-input input").val());
           $("#sku-data-input-"+thisid).attr("data-input", $('#sku-input').val());
           $("#barcode-data-input-"+thisid).attr("data-input", $('#barcode-input').val());
           $("#hscode-data-input-"+thisid).attr("data-input", $('#hscode-input').val());
           $("#profit-data-input-"+thisid).attr("data-input", $('.Profit-get-value').val());
           $("#margin-data-input-"+thisid).attr("data-input", $('.margin-get-value').val());
           $("#price-view-"+thisid).html($(this).parent().parent().find(".variant-pricing-card .form-field-list input").val());
           $("#main-popup-price-"+thisid).html($(this).parent().parent().find(".variant-pricing-card .form-field-list input").val());
           $("#child-popup-price-"+thisid).attr("value", $(this).parent().parent().find(".variant-pricing-card .form-field-list input").val());

           $("#child-popup-price-selling-"+thisid).attr("value", $(this).parent().parent().find(".variant-pricing-card .form-field-list input").val());

           $("#cost-data-input-"+thisid).attr("value", $(this).parent().parent().find(".variant-pricing-card .cost-input input").val());

           $("#child-popup-sku-"+thisid).attr("value", $('#sku-input').val());
           $("#child-popup-stock-qtn-"+thisid).attr("value", $('#barcode-input').val());
           $("#child-popup-hscode-"+thisid).attr("value", $('#hscode-input').val());
           $("#margin-data-input-"+thisid).attr("value", $('.margin-get-value').val());
           $("#profit-data-input-"+thisid).attr("value", $('.Profit-get-value').val());


           //$(".product-table-item ."+thisid).attr("data-input", "Hello");

            $('.openpopup').modal('hide');


       });

        $(document).on("click", '.varition_popup_main', function() {

            
        
            var id_value = $(this).data('id');
             
            var inputvalue = $(this).attr('data-input');

            var costinput = $('#cost-data-input-'+id_value).attr('data-input');
            
            var stockinput = $('#child-popup-single-stock'+id_value).attr('data-input');

            var skuinput = $('#sku-data-input-'+id_value).attr('data-input'); 
           
            var barcodeinput = $('#barcode-data-input-'+id_value).attr('data-input'); 
            
            var hscodeinput = $('#hscode-data-input-'+id_value).attr('data-input');
            
            var margininput = $('#margin-data-input-'+id_value).attr('data-input');
            
            var profitinput = $('#profit-data-input-'+id_value).attr('data-input');


           $('.variant-identity').html(`<div class="modal fade customer-modal-main openpopup" id=`+id_value+` tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="customer-modal-inner">
            <div class="customer-modal">
                
            <div class="modal-header" data-recordid=`+id_value+`>
                    <h2>Edit `+id_value+`</h2>
                    <span  data-dismiss="modal" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
                </div>
                <div class="modal-body ta-left">
                   <?php /* <div class="variants-preview-list p-3 bd_none">
                        <label>
                            <input type="checkbox" name="option2a" checked="checked">Charge tax on this variant
                        </label>
                    </div> */ ?>
                    <div class="variants-preview-list p-3">
                        <div class="variant-pricing-card">
                            <div class="row">
                                <div class="form-field-list">
                                    <label>Price</label>
                                    <input type="text" value="" id="main-popup-price-`+id_value+`" class="change-value-main-price" placeholder="0.00">
                                    <label for="input">{{$symbol['currency']}}</label>
                                </div>
                            </div>
                            <div class="row variant-price-option">
                                <div class="form-field-list cost-input">
                                    <label>Selling price</label>
                                    <input type="text" name="selling" value="`+costinput+`" id="main-popup-cost-`+id_value+`" class="change-value-main-cost" placeholder="0,00">
                                    <label for="input">{{$symbol['currency']}}</label>
                                  
                                </div>
                                <div class="form-field-list cost-input " id="pt-0">
                                    <label>Stock</label>
                                    <input type="text" name="cost" value="`+stockinput+`" id="main-popup-stock-`+id_value+`" class="change-value-main-stock">
           
                                </div>

                                
                                <?php /* <div class="form-field-list">
                                    <span>Margin</span>
                                    <span class="margin-value`+id_value+`">`+margininput+`</span>
                                    <input type="hidden" name="margin[]" value="`+margininput+`" class="margin-get-value" id="margin-value-input`+id_value+`">
                                </div>
                                <div class="form-field-list">
                                    <span>Profit</span>
                                    <span class="Profit-value`+id_value+`">`+profitinput+`</span>
                                    <input type="hidden" name="Profit[]" value="`+profitinput+`" class="Profit-get-value" id="Profit-value-input`+id_value+`">
                                </div> */ ?>
                            </div>
                        </div>
                    </div>
                  <?php /*  <div class="variants-preview-list p-3">
                        <h3 class="fw-6 fs-12 mb-2">INVENTORY</h3>
                        <div class="row">
                            <div class="form-field-list">
                                <label>SKU (Stock Keeping Unit)</label>
                                <input type="text" value="`+skuinput+`" id="sku-input">
                            </div>
                            <div class="form-field-list">
                                <label>Barcode (ISBN, UPC, GTIN, etc.)</label>
                                <input type="text" value="`+barcodeinput+`" id="barcode-input">
                                
                            </div>
                        </div>
                    </div>
                    <div class="variants-preview-list bd_none">
                        <div class="variant-inventory-card">
                            <div class="row-items">
                                <div class="header-title">
                                    <h3 class="fw-6 mb-0 fs-12 tt-u">QUANTITY</h3>
                                    <button class="link" onclick="document.getElementById('variant-edit-locations-modal').style.display='block'">Edit locations</button>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="fw-6 pl-0">Location name</th>
                                            <th class="ta-right pr-0 fw-6">Available</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">Armada</td>
                                            <td class="pr-0"><input type="number" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0">H-28, Sector 63</td>
                                            <td class="pr-0"><input type="number" value="0"></td>
                                        </tr>
                                    </tbody>
                                </table>
        
                            </div>
                        </div>
                    </div>
                    <div class="variants-preview-list bd_none">
                        <div class="row-items variant-shipping-info">
                            <h3 class="fs-12 fw-6 mb-8">CUSTOMS INFORMATION</h3>
                            <div>
                                <label>HS (Harmonized System) code</label>
                                <input type="search" value="`+hscodeinput+`" id="hscode-input" placeholder="Search or enter a HS code">
                                <p class="mb-0">Manually enter codes that are longer than 6 numbers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="variants-preview-list bd_none">
                        <div class="p-3">
                            <p class="mb-0 one-line-text"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M10 20c5.514 0 10-4.486 10-10S15.514 0 10 0 0 4.486 0 10s4.486 10 10 10zm1-6a1 1 0 1 1-2 0v-4a1 1 0 1 1 2 0v4zm-1-9a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path></svg> Once you save the product, you’ll be able to edit more variant details.</p>
                        </div>
                    </div> 
                </div>
               */ ?>
                 <div class="modal-footer">
                    <a class="button secondary"  data-dismiss="modal">Cancel</a>
                    <a class="button green-btn"  data-recordid=`+id_value+`>Done</a>
                </div></div>
        </div>
    </div> `);

      $('.openpopup').modal('show');


      
      $(document).on("keyup", ".change-value-main-price", function () {

        var price = $(this).val();
        var cost = $('#main-popup-cost-'+id_value).val();

        if (price > 0 && cost > 0) {

            var profit      = price - cost;
            var grossProfit = profit / cost * 100;
            var grossMargin = 100 * (price - cost) / price;

            $(".Profit-value"+id_value).text('$'+profit.toFixed(2));
            $("#Profit-value-input"+id_value).val(profit.toFixed(2));
            $(".margin-value"+id_value).text(+grossMargin.toFixed(2)+'%');
            $("#margin-value-input"+id_value).val(grossMargin.toFixed(2));
        }

    });

      $(document).on("keyup", ".change-value-main-cost", function () {

        var price = $('#main-popup-price-'+id_value).val();
        var cost = $(this).val();

        if (price > 0 && cost > 0) {

            var profit      = price - cost;
            var grossProfit = profit / cost * 100;
            var grossMargin = 100 * (price - cost) / price;

            $(".Profit-value"+id_value).text('$'+profit.toFixed(2));
            $("#Profit-value-input"+id_value).val(profit.toFixed(2));
            $(".margin-value"+id_value).text(+grossMargin.toFixed(2)+'%');
            $("#margin-value-input"+id_value).val(grossMargin.toFixed(2));
        }

    });

    });

    



    $(document).on("keyup", ".price-change-input", function () {

        var price = $('#price-change-input').val();
        var price = $('#price-change-input').val();
        var cost = $('#cost-change-input').val();

        if (price > 0 && cost > 0) {

            var profit      = price - cost;
            var grossProfit = profit / cost * 100;
            var grossMargin = 100 * (price - cost) / price;

            $(".profit-value-main").text('$'+profit.toFixed(2));
            $("#profit-input-mian-value").val(profit.toFixed(2));
            $(".margin-value-main").text(+grossMargin.toFixed(2)+'%');
            $("#margin-input-mian-value").val(grossMargin.toFixed(2));

           $(".product-table-item").attr("data-input", price);
           $(".price-main-popup-input").attr("data-input", price);
           $(".cost-data-input-new").attr("data-input", cost);
           $(".profit-data-input").attr("data-input", profit.toFixed(2));
           $(".margin-data-input").attr("data-input", grossMargin.toFixed(2));
           $(".price-view-class").html(price);
           $(".pchange-value-main-price").html(price);
           $(".att_price_class").attr("value", price);
           $(".att_price_selling_class").attr("value", price);
           $(".change-value-main-price").attr("value", price);
           $(".cost-data-input-new").attr("value", cost);
           $(".margin-data-input").attr("value", grossMargin.toFixed(2));
           $(".profit-data-input").attr("value", profit.toFixed(2)); 


        }

    });

      $(document).on("keyup", ".cost-change-input", function () {

        var price = $('#price-change-input').val();
        var cost = $('#cost-change-input').val();

        if (price > 0 && cost > 0) {

            var profit      = price - cost;
            var grossProfit = profit / cost * 100;
            var grossMargin = 100 * (price - cost) / price;


            $(".profit-value-main").text('$'+profit.toFixed(2));
            $("#profit-input-mian-value").val(profit.toFixed(2));
            $(".margin-value-main").text(+grossMargin.toFixed(2)+'%');
            $("#margin-input-mian-value").val(grossMargin.toFixed(2));

           $(".product-table-item").attr("data-input", price);
           $(".price-main-popup-input").attr("data-input", price);
           $(".cost-data-input-new").attr("data-input", cost);
           $(".profit-data-input").attr("data-input", profit.toFixed(2));
           $(".margin-data-input").attr("data-input", grossMargin.toFixed(2));
           $(".price-view-class").html(price);
           $(".change-value-main-price").html(price);
           $(".att_price_class").attr("value", price);
           $(".change-value-main-price").attr("value", price);
           $(".cost-data-input-new").attr("value", cost);
           $(".margin-data-input").attr("value", grossMargin.toFixed(2));
           $(".profit-data-input").attr("value", profit.toFixed(2));  
        }

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
            $('#sortable').prepend('<li class="ui-state-default remove-image" data-id="'+file.lastModified+'"><div class="file-upload-overlay"><input type="checkbox" class="image-checkbox" id="image-check-'+file.lastModified+'" name="media-images"></div><img src="' + event.target.result + '" style="width:100%;" /> <div class="order-number">0</div></li>');
            $('#sortable').find('li').eq(0).insertAfter('#sortable>li:last');
        };
      })(file);
      
      reader.readAsDataURL(file);

    }// end for;
   
    
    
  });
  
  //$('#sortable').sortable();
 // $('#sortable').disableSelection();
  
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

    $(document).ready(function () {

        $('#billing_address').click(function () {

            var inputValue = $(this).attr("id");

            console.log(inputValue);

            $("." + inputValue).toggle();

        });

        $('#customer_phone_code').change(function () {

            var mobile = $('#customer_mobile_number').val();

            mobile = $.trim(mobile);



            if(mobile.indexOf(' ') > -1) {

                var split_arr = mobile.split(' ');

                mobile = split_arr[1];

            }

            $('#customer_mobile_number').val($(this).val()+' '+mobile);

        });
        
        $('.location_name').click(function() {
        //   console.log($(this).first().attr('id'));
            var location_id = $(this).attr('id');
            console.log(location_id);
            $("#location_"+location_id+" .att_stock_class").attr('name', 'att_stock['+location_id+'][]');
  
            // $('.att_stock_class').attr('name', 'att_stock['+location_id+'][]');
            
        });



      $('.tag_added').click(function() {

            var exist =  $('#customer_tags').first().val();

            $('#customer_tags').first().val(exist+' '+this.innerText);

            $('.customer-detail-select-tags .selected_tags').append('<span class="tag grey fs-13">'+this.innerText+' <button type="button" onclick="removeElem(this)"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path></svg></button> </span>')

        });

        $('#customer_detail_tags').keypress(function (e) {

            if (e.key === ' ' || e.key === 'Spacebar') {

                e.preventDefault();

                var exist =  $('#customer_tags').first().val();

                $('#customer_tags').first().val(exist+' '+this.value);

                $('.customer-detail-select-tags .selected_tags').append('<span class="tag grey fs-13">'+this.value+' <button type="button" onclick="removeElem(this)"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path></svg></button> </span>')

                $(this).val('');

            }

        });

    });

    function removeElem(elem) {

        elem.closest('.tag').remove();

        var removedtag = elem.closest('.tag').innerText.trim();

        var exist =  $('#customer_tags').first().val().trim();



        if(exist.indexOf(removedtag) != -1){

           exist =  exist.replace(removedtag,'').replace(/\s\s+/g, ' ').trim();

            $('#customer_tags').first().val(exist);
        }

    }

</script>

<script type="text/javascript">
    $('input').change(function() {
      
        var empty = true;


        if (empty) {
               $('#master-save').removeAttr('disabled'); 
             // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
        } else {
           $('#master-save').attr('disabled', 'disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
        }
    });
</script>

</x-admin-layout>

</div>
