<div>
    <x-admin-layout>
        <style type="text/css">
            .bootstrap-tagsinput .tag {
                margin-right: 2px;
                color: #d64949;
            }
            
            .custom-addmorebtn {
        background: transparent !important;
        box-shadow: none;
        border: 1px solid #007ace !important;
        color: #007ace !important;
        padding: 7px 15px;
        border-radius: 3px;
        display: inline-block; 
        font-weight: 600;
        margin: 0;
        line-height: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        float: right;
        outline: none !important;
        box-shadow: none !important;
    }
    .custom-deleteebtn {
        background: transparent !important;
        box-shadow: none;
        border: 1px solid #d82c0d !important;
        color: #d82c0d !important;
        padding: 7px 15px;
        border-radius: 3px;
        display: inline-block;
        font-weight: 600;
        margin: 0;
        line-height: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        float: right;
    }
    #tab_logic{
        padding-top:30px;
    }

    .variant_fixed_price{
        display: none !important;
    }

    .CustomVariant_active .variant_fixed_price{
        display: block !important;
    }

    .custom_variant_hw{ display: none !important; }
    .CustomVariant_active .custom_variant_hw{ display: block !important; }

    .success-alert {
    margin-left: auto;
    margin-right: 16px;
    }
    .success-alert .alert {
        margin: -3px 0;
        background-color: #e3f1df;
        padding: 11px 12px 11px 50px;
        box-shadow: none;
        color: #5eb14e;
    }
    .success-alert .alert:before {
        background: #a4df99;
        top: 7px;
        width: 28px;
        height: 28px;
    }
    .success-alert .alert:after {
         background-size: 14px 14px;
         top: 6px;
    }
        </style>
    
        @php $symbol = CurrencySymbol(); @endphp
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
    
                        <!-- <button class="button link" onclick="document.getElementById('duplicate-product-modal').style.display='block'">Duplicate</button> -->
    
                        <!-- <button class="button link">Preview</button> -->
    
                        <!-- <div class="pagination">
    
                            <span class="button-group">
    
                                <button class="secondary icon-prev"></button>
    
                                <button class="secondary icon-next"></button>
    
                            </span>
    
                        </div> -->
    
                    </div>
    
                </div>
    
            </article>
    
       
    
    
    
        <section  class="full-width flex-wrap admin-body-width customers-details-sec product-details-sec">
    
             <article class="full-width">
    
                <div class="columns two-thirds">
    
                    <div class="card">
                        <div class="row">
                            <label>Title</label>
                            <input type="text" name="title" wire:model="product.title" wire:ignore>
                        </div>
                        <div wire:ignore class="form-group row">
                            <label>Description</label>
                            <div class="col-md-9">
                                <textarea wire:model="product.descripation" class="form-control required" name="descripation" id="descripation"></textarea>
                              
                            </div>
                        </div>
    
                    </div>
    
                 
                    
                
    
                   
    
    
                    <div class="card product-media-card"  wire:ignore>
    
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
    
                            <a wire:click.prevent="deleteimage()" class="link warning delete-media">Delete media</a>
    
                        </div>
    
                        <div class="card-middle">
    
                            <div class="uplod-main-demo">
    
                                <input type="file" id="images" wire:model.debounce.lazy="image" multiple name="image" multiple="multiple"/>

    
                                <div class="import-file">
    
                                    <div id="multiple-file-preview">
                                        @if(count($Productmedia) > 0)
                                        <ul id="sortable" class="import-file-big">
                                        @else
                                        <ul id="sortable">
                                        @endif
    
                                            @if(count($Productmedia) > 0)
    
                                            @foreach($Productmedia as $row)
    
                                            <li class="ui-state-default image-avalible remove-image" data-order=0 data-id="'+file.lastModified+'"><div class="file-upload-overlay"><input type="checkbox" name="removeimage" wire:model="removeimage" value="{{$row->id}}" class="image-checkbox"></div><img src="{{ asset('storage/'.$row->image) }}" style="width:100%;" /> <div class="order-number">0</div></li>
    
                                             @endforeach
    
                                             @endif
    
                                            <label class="custome-file-upload" for="images">
    
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"></path></svg>
    
                                                <p class="secondary">Add files</p>
    
                                                <span class="fs-14">or drop files to upload</span>
    
                                            </label>

                                            <div class="photo-upload-b__btn photo-upload-b__btn_preload customloader" wire:loading wire:target="image">
                                                <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                  viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                                    <path fill="#fff" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                                      <animateTransform 
                                                         attributeName="transform" 
                                                         attributeType="XML" 
                                                         type="rotate"
                                                         dur="1s" 
                                                         from="0 50 50"
                                                         to="360 50 50" 
                                                         repeatCount="indefinite" />
                                                  </path>
                                                </svg>
                                            </div>
    
                                        </ul>
    
                                    </div>
    
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
    
                                      <!-- detail -->
                   <!--  <div class="card">
    
                        <div class="card-header">
    
                            <div class="header-title">
                                <h4 class="fs-16 mb-0 fw-6">Detail</h4>
                            </div>
    
                        </div>
                       
                        <div class="card-footer">
                            <button wire:click.prevent="addProductDetailSection">Add New</button>
                        </div>
    
                    </div> -->
                    <!-- end detail -->
          
                @if(count($Productvariant) != 0)
                <!-- <div class="card card-pd-0 pd-variants-card main-variant-card" wire:ignore>



                    <div class="card-header">



                        <div class="header-title">



                            <h4 class="fs-16 mb-0 fw-6">Attribute</h4>



                        </div>



                        <label><input type="checkbox" name="option2a" wire:ignore class="click-varients-type">This product has multiple options, like different sizes or colors</label>

 

                    </div>



                    <div class="card-middle card-middle-varient" wire:ignore style="display: none;"> 



                            <div class="row">



                                <label class="form-label fs-14 fw-6">Attribute Type</label>



                                <input type="text" value="" class="varition_type_tag" id="varition_tye_tag"  wire:model="varition_name" placeholder="Variant Type" wire:ignore>



                            </div>



                        <div class="row pd-variants-card-btn">



                            <button class="fw-6 button secondary" wire:ignore wire:click.prevent="UpdateVarient('add-varient-type')">Save</button>



                        </div>



                    </div>
        

                </div> -->
                <div class="columns product_listing_columns pdpage-checkbox has-sections card ml-0 product-tab-table">

                    <div class="product-table-title">

                        <h3>Variants</h3>

                        <span>

                            <a href="{{ route('variant-new', $product->uuid) }}" class="link">Add variant</a>

                           <!--  <button class="link variants-option-btn">More options <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></button> -->

                            <ul class="variants-option-dropdown">

                                <li><button class="link" onclick="document.getElementById('edit-options-modal').style.display='block'">Edit options</button></li>

                                <li><button class="link" onclick="document.getElementById('reorder-variants-modal').style.display='block'">Reorder variants</button></li>

                            </ul>

                        </span>

                    </div>

                    <!-- <div class="product-tab-details">

                        <span>Select:</span>

                        <ul class="tabs">

                            <li class="tab all" data-toggle="tab"><a href="#">All</a></li>

                            <li class="tab titled" data-toggle="tab"><a href="#">None</a></li>

                            <li class="tab titled" data-toggle="tab"><a href="#">Blue</a></li>

                            <li class="tab titled" data-toggle="tab"><a href="#">Red</a></li>

                            <li class="tab titled active" data-toggle="tab"><a href="#">white</a></li>

                        </ul>

                    </div>
 -->
                    <!-- <div class="product-all-location">

                        <label>Available inventory</label>

                        <button class="link"><svg class="location-icon" viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10 10c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-8C6.69 2 4 4.87 4 8.4c0 6 5.4 9.35 5.63 9.49.11.07.24.11.37.11s.26-.04.37-.11C10.6 17.75 16 14.4 16 8.4 16 4.87 13.31 2 10 2z"></path></svg> All locations <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></button>

                        <ul class="all-location-dropdown">
                            <li class="active">All locations</li>
                            @foreach($location as $row)
                            <li>{{$row->name}}</li>
                            @endforeach

                        </ul>

                    </div> -->

                    <div class="card-section tab_content  active" id="all_customers">

                        <div class="table-loader">

                            <div class="loading-overlay" wire:loading.flex wire:target="UpdateVarient,EditAddress,tags,variantimgsubmit, updateDetail, deleteproduct, openModel, closeModel, filesvariant,mount">

                                <div class="page-loading"></div>

                            </div>

                            <div class="product-table-details">

                            <div class="product-table-checkbox">

                                <div class="product-all-check">

                                    <!-- <input type="checkbox" name="option6a"> -->
                                
                                        <?php $variation_count = count($Productvariant); ?>
                                  
                                    <label>Showing {{$variation_count}} variants</label>

                                </div>

                                <div class="product-edite-variants">

                                    <a class="fw-6 button secondary">Edit Variants <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></a>

                                    <ul class="edite-variants-dropdown">

                                       <!--  <li><a class="link">Open bulk editor</a></li> -->

                                        <li><a class="link" onclick="document.getElementById('variants-edit-prices-modal').style.display='block'">Edit prices</a></li>

                                        <li><a class="link" onclick="document.getElementById('variants-edit-selling-prices-modal').style.display='block'">Edit Selling prices</a></li>

                                        <li><a class="link" onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='block'">Edit Stock</a></li>

                                        <!-- <li><a class="link"  onclick="document.getElementById('edit-quantities-modal').style.display='block'">Edit quantities</a></li> -->

                                        <!-- <li><a class="link" onclick="document.getElementById('edit-option-values-modal').style.display='block'">Edit option values</a></li> -->

                                        <!-- <li><a class="link" onclick="document.getElementById('variants-edit-skus-modal').style.display='block'">Edit SKUs</a></li>

                                        <li><a class="link" onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='block'">Edit barcodes</a></li>

                                        <li><a class="link" onclick="document.getElementById('edit-hs-codes-modal').style.display='block'">Edit HS codes</a></li>

                                        <li><a class="link" onclick="document.getElementById('edit-country-codes-modal').style.display='block'">Edit country/region of origin</a></li> -->

                                    </ul>

                                </div>

                            </div>

                            <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing custom-table-height">

                                <tbody>
                                    <?php $stocksum = 0;  ?>
                                    @foreach($Productvariant as $key => $row)

                                    <tr>

                                        <td>

                                            <div class="row"><label><input type="checkbox" name="option6a"></label></div>

                                        </td>

                                        <td class="product-img">

                                            <div class="product-variants-ulpload-img" data-toggle="modal">

                                                <!--<input type="file" accept="image/*" id="{{$row->id}}" class="loadFile">-->

                                                <div class="pd-blank-img">
                                                    @if(empty($row['variantmedia'][0]['image']))
                                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M19 2.5A1.5 1.5 0 0 0 17.5 1h-15A1.5 1.5 0 0 0 1 2.5v15A1.5 1.5 0 0 0 2.5 19H10v-2H3.497c-.41 0-.64-.46-.4-.79l3.553-4.051c.19-.21.52-.21.72-.01L9 14l3.06-4.781a.5.5 0 0 1 .84.02l.72 1.251A5.98 5.98 0 0 1 16 10h3V2.5zm-11.5 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm12.207 10.793A1 1 0 0 0 19 15h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 0 0 .707-1.707z"></path></svg>
                                                    @else

                                                     <img src="{{ asset('storage/'.$row['variantmedia'][0]['image']) }}" />

                                                     @endif

                                                </div>

                                                <img id="output-{{$row->id}}" />

                                            </div>


                                            <!--Update variant image modal css-->

                                            <div id="update-variant-image-modal-{{$row->id}}" class="customer-modal-main" wire:ignore>

                                               
                                                <div class="customer-modal-inner">
                                                    <div class="customer-modal">
                                                        <div class="modal-header">
                                                            <h2>Select variant image</h2>
                                                            <span data-dismiss="modal" class="modal-close-btn">
                                                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                                                    <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="modal-body ta-left">
                                                            <div class="card product-media-card">
                                                                <div class="card-header upload-media-header">
                                                                    <h3 class="fs-16 fw-6 m-0">Media</h3>
                                                                    <button class="link add-media-url-btn">Add media from URL <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></button>
                                                                    <ul class="add-media-dropdown">
                                                                        <li><button class="link">Edit options</button></li>
                                                                        <li><button class="link">Reorder variants</button></li>
                                                                    </ul>
                                                                </div>
                                                                <p class="mb-0 grey-color">You can only choose images as variant media</p>
                                                                <div class="card-middle">
                                                                    <div class="upload-img-modal">
                                                                        <form id="myForm" method="post">
                                                                            <ul id="selectedFiles">
                                                                                <!-- <li class="img-upload-btn">
                                                                                    <p class="secondary">Add files</p>
                                                                                    <span class="fs-14">or drop files to upload</span>
                                                                                    <input type="file" id="files" wire:model.debounce.lazy="filesvariant" multiple>
                                                                                </li> -->
                                                                                @foreach($Productmedia as $rowimg)
                                                                                <li>
                                                                                   <input value="{{$rowimg->id}}"  wire:model.debounce.lazy="imgvariant" name="product"  type="radio">

                                                                                    <img src="{{ asset('storage/'.$rowimg->image) }}">
                                                                                </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- <div class="pagination">
                                                                <span class="button-group">
                                                                    <button class="secondary icon-prev"></button>
                                                                    <button class="secondary icon-next"></button>
                                                                </span>
                                                            </div> -->
                                                            <div class="footer-btn-group">
                                                                <!-- <button class="button secondary" data-dismiss="modal">calcel</button>
                                                                <button class="button secondary">Add image</button> -->
                                                                <button class="button green-btn" data-dismiss="modal" wire:click.prevent="variantimgsubmit({{$row->id}})">Done</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

                                            <p>@if($row->price){{$symbol['currency']}}{{number_format($row->price,2,".",",")}}
                                            @endif</p>
                                            <?php $location_count = count($location); ?>
                                            <?php 
                                             $stocksum += $row->stock; ?>
                                             @if($row->stock)
                                            <!-- <p>Available at {{$row->stock}} Stock</p> -->
                                            <p>@if($row->selling_price){{$symbol['currency']}}{{number_format($row->selling_price,2,".",",")}}
                                            @endif</p>
                                            @endif

                                        </td>

                                    </tr>

                                    @endforeach

                                </tbody>

                            </table>

                            <hr>

                         
                           <!-- <div class="product-table-footer">

                               <p>Total inventory at all stock</p>

                               <p> {{$stocksum}} available</p>

                           </div> -->

                        </div>

                    </div>

                    </div>
                </div>
    
                @else
    
                <div class="card card-pd-0 pd-variants-card main-variant-attribute" wire:ignore>
    
                        <div class="card-header">
    
                            <div class="header-title">
    
                                <h4 class="fs-16 mb-0 fw-6">Variants</h4>
    
                            </div>
    
                            <label><input type="checkbox" name="option2a" class="edit-website-Attribute">This product has multiple options, like different sizes or colors</label>
        
                            

                        </div>
                    <form action="{{ route('products-varient-store') }}" method="POST" enctype="multipart/form-data" autocomplete="" lete="off">
                        @csrf
                    <div class="card-middle-arrtibute CustomVariant_wrap" style="display: none;">
                        
                     <form action="{{ route('products-varient-store') }}" method="POST" enctype="multipart/form-data" autocomplete="" lete="off">
                        @csrf


                        <input type="hidden" name="product_id_request" value="{{$product->id}}">
                        <div class="card-middle">
                          <!--   <label><input type="checkbox" name="custom_variant" id="custom_variant" value="" class="CustomVariant_checkox">Custom Variant</label> -->
                            <div class="varition-append">
    
                                <label class="form-label fs-14 fw-6">Option 1</label>
    
                                <div class="row">
    
                                    <select name="size[]" class="varition-type-value" id="varition_type_1">
                                        <option value="">-- Select Option --</option>
                                        @foreach($variantag as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
    
                                    <input type="text" value="" name="option" class="varition_tags variant-tags-error" id="varition_tags_1" data-role="tagsinput"  placeholder="Separate options with a comma">
                                       

                                </div>
                                
                                <div class="row variant_fixed_price">
                                    <input type="number" value="" name="variant_custom_price[]" class="variant-tags-error" id="custom_price_tags_1" placeholder="Variant Price">    
                                </div>
                            </div>
    
                            <div class="row pd-variants-card-btn">
    
                                <a class="fw-6 button secondary addBtn">Add another option</a>
    
                            </div>
                            
                            <!-- <div class="custom_variant_hw mt-3 mb-3">
                                <div class="div">
                                    <label class="mb-0 pb-0" style="padding:0 !important">Height & Width Price (Per Unit)</label>
                                    <input type="number" value="" name="heightwidthprice" class="variant-tags-error" id="custom_price_tags_1" placeholder="Price">    
                                </div>
                            </div> -->

                            <div class="custom_variant_hw"></div>

                        </div>
                        
                        <div class="card-footer add-product-footer">
                            <div class=" ml-0 product-tab-table">
                                <div class="product-table-title">
                                    <h3>Variants</h3>
                                </div>
                                <!-- <div class="product-all-location">
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
                                                    <label class="fw-6">Showing 3 variants</label>
                                                </div>
                                                <div class="product-edite-variants">
                                                   <a class="fw-6 button secondary">Edit Variants <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></a>
                                                    <ul class="edite-variants-dropdown">
                                                        <li><a class="link" onclick="document.getElementById('variants-edit-prices-modal').style.display='block'">Edit prices</a></li>
                                                        <li><a class="link" onclick="document.getElementById('variants-edit-selling-prices-modal').style.display='block'">Edit Selling prices</a></li>
                                                        <li><a class="link" onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='block'">Edit stock</a></li>
                                                        <!-- <li><a class="link" onclick="document.getElementById('edit-quantities-modal').style.display='block'">Edit quantities</a></li>
                                                        <li><a class="link" onclick="document.getElementById('variants-edit-skus-modal').style.display='block'">Edit SKUs</a></li>
                                                        <li><a class="link" onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='block'">Edit barcodes</a></li>
                                                        <li><a class="link" onclick="document.getElementById('edit-hs-codes-modal').style.display='block'">Edit HS codes</a></li>
                                                        <li><a class="link" onclick="document.getElementById('edit-country-codes-modal').style.display='block'">Edit country/region of origin</a></li> -->
                                                    </ul>
                                                </div>
                                            </div>
    
                                             
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
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
                                                                <a class="button green-btn child-price-submit" onclick="document.getElementById('variants-edit-prices-modal').style.display='none'"  data-recordid="">Done</a>
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
                                                            <div class="modal-body attribute-barcode-value">
                                                                
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
                                                <div id="edit-country-codes-modal" class="customer-modal-main variants-edit-option-modal" wire:ignore>
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
                                                                <button class="button secondary" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="row pl-3 pt-3">
                                                    <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing">
                                                    <input type="submit" class="button" name="submit" id="master-save" value="save">
                                                    <tbody class="variants-option">
                                                    </tbody>
                                                </table>
                                                </div>
                                              
                                
                                            <!-- <hr>
                                            <div class="product-table-footer">
                                                <a href="javascript:;" data-toggle="modal" data-target="#variants-preview-list-modal">Total inventory at all stock</a>
                                                <p>15 available</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                    
                @endif

                <div class="card card-pd-0 pd-variants-card main-variant-attribute overflow-visible">
                        <div class="row-items question">
                            <div class="header-title">
                                <h4 class="fs-16 mb-0 fw-6">Customise Product Price</h4>
                            </div>
                            <label><input type="checkbox" name="custom_variant_check" id="custom_variant" value="" class="edit-update-Attribute custom_variant_checked" wire:model.lazy="product.custom_variant">Custome Price</label>

                            <div class="card-cutome-arrtibute one-half-row-card" style="display: none;" wire:ignore>
                             
                                @foreach($variantag as $key2 => $row)
                                   @if($this->varientsarray)
                                        @foreach ($this->varientsarray as $key => $value) 
                                            @if(!empty($value->lable) && $value->lable == $row->id) 
                                    <div class="row showvarient">        
                                        <div class="form-field-list">
                                             <input class="price-change-input" type="text" value="{{ $row->name }}"  name="variantname"   readonly>
                                             <input class="price-change-input" type="hidden" wire:model="varientsarray.{{ $key }}.lable"   readonly>
                                           
                                        </div>
                                        <div class="form-field-list">

                                            <input class="price-change-input" placeholder="Price" type="number"  wire:model="varientsarray.{{ $key }}.price">
                                               
                                        </div>
                                   </div>
                                   <br>
                                        @endif
                                      @endforeach      
                                    @endif
                                @endforeach
                                
                                <!-- <div class="div">
                                    <label class="mb-0 pb-0" style="padding:0 !important">Height & Width Price (Per Unit)</label>
                                    <input type="number" wire:model="product.cv_width_height_price" name="heightwidthprice" class="variant-tags-error">    
                                </div> -->
                            </div>
                        </div>
                    </div>
                    

                    <div class="card variant-pricing-card" wire:ignore>
    
                        <div class="row-items">
    
                            <div class="header-title">
    
                                <h3 class="fs-16 fw-6 mb-0">Pricing</h3>
    
                            </div>
    
                            <div class="row">
    
                                <div class="form-field-list">
    
                                    <label>Price</label>
    
                                    <input type="text" name="price_main" id="price-change-input" class="price-change-input" wire:model="product.price" wire:ignore placeholder="0,00">
    
                                    <label for="input">{{$symbol['currency']}}</label>
    
                                    @error('price') <span class="text-danger">{{ $message }}</span>@enderror
    
                                </div>
    
                               <!--  <div class="form-field-list">
    
                                    <label>Compare at price</label>
    
                                    <input type="text" name="compare_price" wire:model="product.compare_price" wire:ignore placeholder="0,00">
    
                                    <label for="input">US{{$symbol['currency']}}</label>
    
                                     @error('compare_price') <span class="text-danger">{{ $message }}</span>@enderror
    
                                </div> -->
    
                                <div class="form-field-list">
    
                                    <label>Selling price</label>
    
                                    <input type="text" name="compare_selling_price" wire:model="product.compare_selling_price" wire:ignore placeholder="0,00">
    
                                    <label for="input">{{$symbol['currency']}}</label>
    
                                     @error('compare_selling_price') <span class="text-danger">{{ $message }}</span>@enderror
    
                                </div>
    
                            </div>
    
                            <div class="row">
    
                                <div class="form-field-list">
    
                                    <label>Stock</label>
    
                                    <input type="text" name="compare_selling_price" wire:model="product.stock" wire:ignore>
    
    
                                     @error('Stock') <span class="text-danger">{{ $message }}</span>@enderror
    
                                </div>
    
                            </div>
    
                        </div>
    
                        <div class="row-items bd_none">
    
                            <!-- <div class="row variant-price-option">
    
                                <div class="form-field-list">
    
                                    <label>Cost per item</label>
    
                                    <input type="text" name="cost" id="cost-change-input" class="cost-change-input" placeholder="0,00" wire:model="product.cost" wire:ignore>
    
                                    <label for="input">{{$symbol['currency']}}</label>
    
                                     @error('cost') <span class="text-danger">{{ $message }}</span>@enderror
    
                                    <p>Customers won’t see this</p>
    
                                </div>
    
                                <div class="form-field-list">
    
                                    <span>Margin</span>
    
                                    <span class="margin-value-main" wire:ignore>{{$product->margin}}</span>
                                    <input type="hidden" name="main-margin" id="margin-input-mian-value" wire:model.lazy="product.margin" value="" wire:ignore>
    
                                </div>
    
                                <div class="form-field-list">
    
                                    <span>Profit</span>
    
                                    <span class="profit-value-main" wire:ignore>{{$product->margin}}</span>
                                    <input type="hidden" name="main-profit" id="profit-input-mian-value" wire:model.lazy="product.profit" value="" wire:ignore>
    
                                </div>
    
                            </div> -->
    
                       <!--  <label class="variant-pricing-checkbox"><input type="checkbox" name="tax" checked="checked" wire:model="product.tax">Charge tax on this product</label> -->
    
                        </div>
    
                    </div>


                    <div class="card variant-pricing-card" wire:ignore>
                        <div class="row-items">
                            <div class="header-title">
                                <h3 class="fs-16 fw-6 mb-0">Shipping Parcel</h3>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="form-field-list">
                                    <label>Shipping Weight (kg)</label>
                                    <input type="text" name="shipping_weight" wire:model="product.shipping_weight" wire:ignore >
                                     @error('shipping_weight') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-field-list">
                                    <label>Width (cm)</label>
                                    <input type="text" name="width" wire:model="product.width" wire:ignore >
                                     @error('width') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-field-list">
                                    <label>Height (cm)</label>
                                    <input type="text" name="height" wire:model="product.height" wire:ignore >
                                     @error('height') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-field-list">
                                    <label>Depth (cm)</label>
                                    <input type="text" name="depth" wire:model="product.depth" wire:ignore>
                                     @error('depth') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

    
                
                   <!--  @if(count($Productvariant) == 0)
                    <div class="card variant-inventory-card" wire:ignore>
    
                        <div class="row-items">
    
                            <div class="header-title">
    
                                <h3 class="fs-16 fw-6 mb-0">Inventory</h3>
    
                            </div>
    
                            <div class="row bd_none">
    
                                <div class="form-field-list">
    
                                    <label>SKU (Stock Keeping Unit)</label>
    
                                    <input type="text" name="sku" wire:model.lazy="product.sku">
    
                                </div>
    
                                <div class="form-field-list">
    
                                    <label>Barcode (ISBN, UPC, GTIN, etc.)</label>
    
                                    <input type="text" name="barcode" wire:model.lazy="product.barcode">
    
                                </div>
    
                            </div>
    
                            <label class="variant-pricing-checkbox"><input type="checkbox" wire:model.lazy="product.trackqtn">Track quantity</label>
    
                            <label class="variant-pricing-checkbox"><input type="checkbox" wire:model.lazy="product.outofstock">Continue selling when out of stock</label>
    
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
                                     @foreach($locationarray as $key => $productloc)
                                     @foreach($location as $result)
                                         @if($result->id == $key)
                                        <tr>
                                           
                                            <td>{{$result->name}}</td>
                                            
                                            <td><input wire:model.lazy="locationarray.{{$key}}"  type="text"  wire:ignore></td>
    
                                        </tr>
                                        @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
    
                            </table>
    
    
    
                        </div>
    
                    </div>
                    @endif -->
                   <!--  <div class="card variant-shipping-card">
    
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
    
                                <input type="text" name="weight" value=""  wire:ignore wire:model="product.weight">
    
                                <select name="weight_lable"  wire:ignore wire:model="product.weight_lable">
    
                                    <option value="lb">lb</option>
    
                                    <option value="oz">oz</option>
    
                                    <option value="kg">kg</option>
    
                                    <option value="g">g</option>
    
                                </select>
    
                            </div>
    
                        </div>
    
                        <div class="row-items variant-shipping-info">
    
                            <h3 class="fs-12 fw-6 mb-8">CUSTOMS INFORMATION</h3>
    
                            <p>Customs authorities use this information to calculate duties when shipping internationally. Shown on printed customs forms.</p>
    
                            <div class="row mb-0">
    
                                <label>Country/Region of origin</label>
    
                                <select name="country" wire:ignore wire:model="product.country">
                                    <option value="">Select country/region</option>
                                    @foreach($Country as $result)
                                    <option value="{{$result->id}}">{{$result->name}}</option>
                                    @endforeach
    
                                </select>
    
                                <p>In most cases, where the product is manufactured.</p>
    
                                <label>HS (Harmonized System) code</label>
    
                                <input type="search" wire:model="product.hscode" name="hscode" placeholder="Search or enter a HS code"  wire:ignore>
    
                                <p class="mb-0">Manually enter codes that are longer than 6 numbers.</p>
    
                            </div>
    
                        </div>
    
                    </div> -->
    
                    
    
                    <div class="card search-engine-listing-card" wire:ignore>
    
                        <div class="card-header">
    
                            <div class="header-title">
    
                                <h4 class="fs-16 mb-0 fw-6">Search engine listing preview</h4><a class="link edit-website-seo-btn">Edit website SEO</a>
    
                            </div>
    
                            <div class="ccd-search-engine-listing">
    
                                <h4>{{$product->title}}</h4>
                                @if($product->seo_utl)
                                <p><a href="{{ url('/product').'/'.$product->seo_utl }}">{{ url('/product').'/'.$product->seo_utl }}</a></p>
                                @endif
    
                                <span>{{$product->seo_descripation}}</span>
    
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
    
                                    <span>https://rug.webtech-evolution.com/</span>
                                    <input type="hidden" name="urlpath" value="https://rug.webtech-evolution.com/">
                                    <input type="text" name="seo_utl" wire:model="product.seo_utl">
    
                                </div>
    
                            </div>
    
                        </div>     
    
                    </div>
   
                    <div class="card">                
                        <div id="tab_logic" class="after-add-more">
                           <div class="col-md-2">
                            <h3>Product Tab descripation</h3>
                               <button class="btn text-white btn-info btn-sm custom-addmorebtn" wire:click.prevent="add()">Add</button>
                           </div>
                       </div>

                       <div>
                       @foreach($product_array as $key => $row)

                           <div class="row mt-40">
                               <label>Title</label>
                               <input type="text" wire:model="product_array.{{ $key }}.question" >
                           </div>
                           <div class="form-group row">
                               <label>Description</label>
                               <div class="col-md-9">
                                   <textarea wire:model="product_array.{{ $key }}.answer" class="form-control required"  ></textarea>
                               </div>
                           </div>
        
                           <div class="col-md-2">
                               <button class="btn btn-danger btn-sm custom-deleteebtn" wire:click.prevent="remove({{$key}})"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Remove</button>
                           </div>
                       @endforeach
                   </div>
                       <div class="more-feilds"></div>
                   </div>
    
    
                   
    
    
    
                </div>
    
                <div class="columns one-third right-details">
    
                    <div class="card">
    
                        <div class="card-header">
    
                            <div class="header-title">
    
                                <h3 class="fs-16 fw-6 mb-0">Product status</h3>
    
                            </div>
    
                            <p class="mb-0">
    
                                <select  name="status" wire:model="product.status">
    
                                    <option value="active" @if($product->status == 'active') selected @endif>Active</option>
    
                                    <option value="invited" @if($product->status == 'invited') selected @endif>Draft</option>
    
                                </select>                     
    
                            </p>
    
                        </div>
    
    
                        <div class="card-header">
    
                            <div class="header-title">
    
                                <h3 class="fs-16 fw-6 mb-0">Product New</h3>
    
                            </div>
        
                            <p class="mb-0">
                                <select  name="status" wire:model="product.product_new" multiple>
    
                                    <option value="">-- Select Option --</option>
                                    @foreach($tagsale as $res)
                                        <option value="{{$res->id}}" >{{$res->title}}</option>
                                    @endforeach
                                </select>                     
    
                            </p>
    
                        </div>
    
                        <!-- <div class="card-middle sales-channels-apps">
    
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
    
                        </div> -->
    
                        <!-- <div class="card-footer">
    
                            <button class="link sales-channel-btn">Show more <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path></svg></button>
    
                        </div> -->
    
                    </div>
    
                    <!-- <div class="card pd-20 tag-card card-grey-bg pdd-insights-card">
    
                        <div class="header-title">
    
                            <h3 class="fs-16  fw-6 mb-0">Insights</h3>
    
                        </div>
    
                        <p class="mb-0">Insights will display when the product has had recent sales</p>
    
                    </div> -->
    
                    <div class="card tag-card card-grey-bg organization-card">
    
                        <!-- <div class="card-header">
    
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
    
                        </div> -->
    
                        <div class="card-middle">
    
                            <div class="row sidebar-collection-checkbox" wire:ignore>
    
                                <label class="fs-12  fw-6 mb-0">COLLECTIONS</label>
    
                                <input type="search" placeholder="Search for collections" class="buttoncustom" onclick="openOption('email_subscription_status')" >
    
                                <div class="search-collections-checkbox filter_email_subscription_status dropdowncustomhide" style="list-style-type: none">
                          
                                @foreach($Collection as $row)
                                    <label><input type="checkbox" name="option2a" wire:model.lazy="productCollection" value="{{$row->id}}">{{$row->title}}</label>  
                                @endforeach   
                                </div>

                                 @foreach($Collection as $row)
                                    @foreach($collectionarray as $checking)
                                    @if($row->id == $checking) 
                                <label> {{$row->title}} </label>
                                 @endif  
                                 @endforeach    
                                @endforeach 
    
                            </div>
    
                        </div>
    
                        <!-- <div class="card-footer">
    
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
    
                        </div> -->
    
                    </div>
    
                    <div class="card card-pd-0 pd-variants-card main-variant-card" wire:ignore>
    
                        <div class="card-header">
    
                            <div class="header-title">
    
                                <h4 class="fs-16 mb-0 fw-6">Featured</h4>
    
                            </div>
    
                            <label><input type="checkbox" name="featured" wire:model="product.featured" wire:ignore class="click-varients-type">Assign this product as Featured</label>
    
                        </div>
                    </div>
    
                </div>
    
            </article>
    
        </section>
        </form>
    
        <section class="full-width flex-wrap admin-body-width">
    
            <div class="page-bottom-btn">
    
                <p class="mb-0 d-flex">
    
                  <!--   <button class="secondary secondary-brd-btn">Archive product</button> -->
                    @if(user_permission('allproduct','delete'))
                    <a class="warning" data-toggle="modal" data-target="#delete-variant-product">Delete product</a>
                    @endif
                </p>
                <div wire:key="alert" class='success-alert'>
    
                    @if (session()->has('message'))
                     <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                </div>
                <input type="button" class="button save-button" wire:click="updateDetail" value="Save">
                <div class="loading-overlay" wire:loading.flex wire:target="UpdateVarient,EditAddress,tags,variantimgsubmit, updateDetail, deleteproduct, openModel, closeModel, filesvariant,mount">
                    <div class="page-loading"></div>
                </div>
    
            </div>
    
        </section>
    
    
    
    
        
    <!--Models---------------------------------------------------------------------------------------------------------------------------------------------------->
         <!-- Modal -->
    
              <div wire:ignore id="delete-variant-product"  class="customer-modal-main" style="z-index: 999999;">
    
                <div class="customer-modal-inner">
    
                   <div class="customer-modal">
    
                      <div class="modal-header">
    
                         <h2>Delete</h2>
    
                         <span data-dismiss="modal" class="modal-close-btn">
    
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
    
                               <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
    
                            </svg>
    
                         </span>
    
                      </div>
    
                      <div class="modal-body">
    
                         <div class="row">
    
                            <div class="form-field-list">
    
                                  <label>Are you sure to want to delete?</label>
    
                            </div>
    
                         </div>
    
                      </div>
    
                      <div class="modal-footer">
    
    
    
                         <div class="button-col">
    
                            <button class="button secondary" data-dismiss="modal" data-dismiss="modal">Cancel</button>
    
                            <button class="button" data-dismiss="modal"  wire:click.prevent="deleteproduct({{$product->id}})">Yes, Delete</button>
    
                         </div>
    
                      </div>
    
                   </div>
    
                </div>
    
             </div>
        
    
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
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
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
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
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
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
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
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
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
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
                        <button class="button warning">Leave page</button>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>    
    
        
    
        <!--Edit location modal-->
    
    <div id="variant-edit-locations-modal" class="customer-modal-main" wire:ignore>
    
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
                    <label><input type="checkbox" wire:model.lazy="selectedlocation" value="{{$row->id}}">{{$row->name}}</label>
                    @endforeach
    
                </div>
    
                <div class="modal-footer">
    
                    <a class="button secondary" data-dismiss="modal">Cancel</a>
    
                    <a class="button green-btn" wire:click.prevent="UpdateVarient('update-location')">Done</a>
    
                </div>
    
            </div>
    
        </div>
    
    </div>
    
        <!--Edit prices modal-->
    @if(count($Productvariant) != 0)
        <div id="variants-edit-prices-modal" class="customer-modal-main variants-edit-option-modal" wire:ignore>
    
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
    
                                    <input type="text" id="apply-price" class="apply-price" name="price" placeholder="0,00">
    
                                </span>
    
                            </div>
    
                            <button class="button fw-6" id="apply-price-submit">Apply to all</button>
    
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
    
                                <input class="att_price_class" type="text" wire:model.debounce.lazy="Productvariant.{{ $key }}.price" wire:ignore>
    
       
    
                            </span>
    
                        </div>
    
                    @endforeach
    
                    </div>
    
                    <div class="modal-footer">
    
                        <a onclick="document.getElementById('variants-edit-prices-modal').style.display='none'" class="button secondary">Cancel</a>
    
                        <a class="button green-btn" onclick="document.getElementById('variants-edit-prices-modal').style.display='none'">Done</a>
    
                    </div>
    
                </div>
    
            </div>
    
        </div> 
    
        <!-- Edit Selling Price -->
    
        <div id="variants-edit-selling-prices-modal" class="customer-modal-main variants-edit-option-modal" wire:ignore>
    
            <div class="customer-modal-inner">
    
                <div class="customer-modal">
    
                    <div class="modal-header">
    
                        <h2>Edit Selling prices</h2>
    
                        <span onclick="document.getElementById('variants-edit-selling-prices-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
    
                    </div>
    
                    <div class="modal-body">
    
                        <div class="row side-elements align-item-bt">
    
                            <div class="form-field-list">
    
                                <label>Apply a selling price to all variants</label>
    
                                <span class="dollar-input">
    
                                    <input type="text" name="selling_price" placeholder="0,00">
    
                                </span>
    
                            </div>
    
                            <button class="button fw-6">Apply to all</button>
    
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
    
                                <input type="text" wire:model.debounce.lazy="Productvariant.{{ $key }}.selling_price" wire:ignore>
    
       
    
                            </span>
    
                        </div>
    
                    @endforeach
    
                    </div>
    
                    <div class="modal-footer">
    
                        <a class="button secondary" onclick="document.getElementById('variants-edit-selling-prices-modal').style.display='none'">Cancel</a>
    
                        <a class="button green-btn" onclick="document.getElementById('variants-edit-selling-prices-modal').style.display='none'">Done</a>
    
                    </div>
    
                </div>
    
            </div>
    
        </div> 
    
        <!--Edit quantities modal-->
    
        
      <div>
     
        <div  wire:ignore wire:key="edit-quantities-modal" id="edit-quantities-modal" wire:key="edit-quantities-modal" class="customer-modal-main">
    
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
    
                                <a class="link" wire:key="{{$local_row['id']}}"   id="{{$local_row->id}}" wire:click="EditAddress({{ $local_row['id'] }})" >{{$local_row->name}} <span><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M8 16a.999.999 0 0 1-.707-1.707L11.586 10 7.293 5.707a.999.999 0 1 1 1.414-1.414l5 5a.999.999 0 0 1 0 1.414l-5 5A.997.997 0 0 1 8 16z"></path></svg></span></a>
    
                                @endforeach
    
                            </div>
    
                        </div>
    
                        <div class="second-modal">
    
                            <p>Inventory can’t be edited because no variants are stocked at <span class="fw-6">Armada.</span></p>
    
                            <p>Inventory can’t be edited at <span class="fw-6">H-28, Sector 63 </span>because no variants have quantity tracking turned on.</p>
    
                        </div>
    
                    </div>
    
                    <div class="modal-footer">
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
                    </div>
    
                </div>
    
            </div>
    
        </div> 
       
    
     </div>
    
    <div>
        <!--Edit quantities modal-->
          @if($editQuantitiesDetailsModal)
        <div   wire:ignore wire:key="{{$LocationId->id}}"  id="edit-quantities-details-modal"  style="display: block !important;"  class="customer-modal-main ">
    
            <div class="customer-modal-inner">
    
                <div class="customer-modal">
    
                    <div class="modal-header">
    
                        <h2>Edit quantities</h2>
    
                        <span wire:ignore wire:key="close_{{$LocationId->id}}" wire:click="closeModel('edit-quantities-details-modal')" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
    
                    </div>
    
                    <div class="modal-body">
    
                        <p class="mb-0">Editing quantities at <span class="fw-6">@if(!empty($LocationId)) {{$LocationId->name}} @endif</span></p>
    
    
                            @if($variantStock)
                                @foreach($variantStock as $key => $variantrow)
                                @if($variantrow->location_id == $LocationId->id)
                                
                                <div class="vep-list bd_none">
    
                                    <label> @if($variantrow->product_variant->attribute1 != ""){{$variantrow->product_variant->attribute1}} @endif
    
                                            @if($variantrow->product_variant->attribute2 != "")/{{$variantrow->product_variant->attribute2}} @endif
    
                                            @if($variantrow->product_variant->attribute3 != "")/{{$variantrow->product_variant->attribute3}} @endif
    
                                            @if($variantrow->product_variant->attribute4 != "")/{{$variantrow->product_variant->attribute4}} @endif 
    
                                            @if($variantrow->product_variant->attribute5 != "")/{{$variantrow->product_variant->attribute5}} @endif 
    
                                            @if($variantrow->product_variant->attribute6 != "")/{{$variantrow->product_variant->attribute6}} @endif 
    
                                            @if($variantrow->product_variant->attribute7 != "")/{{$variantrow->product_variant->attribute7}} @endif 
    
                                            @if($variantrow->product_variant->attribute8 != "")/{{$variantrow->product_variant->attribute8}} @endif 
    
                                            @if($variantrow->product_variant->attribute9 != "")/{{$variantrow->product_variant->attribute9}} @endif 
    
                                            @if($variantrow->product_variant->attribute10 != "")/{{$variantrow->product_variant->attribute10}} @endif</label>
                              
                                    
                                    <input type="number" wire:key="{{ $key }}" wire:model.lazy="variantStock.{{ $key }}.stock" class="att_stock_class" wire:ignore>
                                         
                                </div>
                                @endif
                                @endforeach 
                                @endif
    
                        </div>
    
                    
    
                    <div class="modal-footer">
    
                        <button class="button secondary"  wire:click="closeModel('edit-quantities-details-modal')" data-dismiss="modal">Cancel</button>
    
                        <button class="button secondary green-btn"  wire:click="closeModel('edit-quantities-details-modal')" >Done</button>
    
                    </div>
    
                </div>
    
            </div>
    
        </div> 
       @endif
       </div>
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
    
                            <label class="fs-12 fw-6">{{$symbol['currency']}}10.00</label>
    
                            <label>Denominations</label>
    
                            <input type="text" value="{{$symbol['currency']}}10.00">
    
                        </div>
    
                        <div class="row p-3">
    
                            <label class="fs-12 fw-6">{{$symbol['currency']}}25.00</label>
    
                            <label>Denominations</label>
    
                            <input type="text" value="{{$symbol['currency']}}25.00">
    
                        </div>
    
                        <div class="row p-3">
    
                            <label class="fs-12 fw-6">{{$symbol['currency']}}50.00</label>
    
                            <label>Denominations</label>
    
                            <input type="text" value="{{$symbol['currency']}}50.00">
    
                        </div>
    
                        <div class="row p-3">
    
                            <label class="fs-12 fw-6">{{$symbol['currency']}}100.00</label>
    
                            <label>Denominations</label>
    
                            <input type="text" value="{{$symbol['currency']}}100.00">
    
                        </div>
    
                    </div>
    
                    <div class="modal-footer">
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
                        <button class="button green-btn">Done</button>
    
                    </div>
    
                </div>
    
            </div>
    
        </div> 
    
        
    
        <!--Edit SKUs modal-->
    
        <div id="variants-edit-skus-modal" class="customer-modal-main skus-barcodes-modal" wire:ignore>
    
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
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
                        <button class="button green-btn" onclick="document.getElementById('variants-edit-skus-modal').style.display='none'">Done</button>
    
                    </div>
    
                </div>
    
            </div>
    
        </div> 
    
        
    
        <!--Edit barcodes modal-->
    
        <div id="variants-edit-stock-qtn-modal" class="customer-modal-main skus-barcodes-modal" wire:ignore>
    
            <div class="customer-modal-inner">
    
                <div class="customer-modal">
    
                    <div class="modal-header">
    
                        <h2>Edit Stock</h2>
    
                        <span onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
    
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
    
                            <input type="text"  wire:model.debounce.lazy="Productvariant.{{ $key }}.stock">         
    
                        </div>
    
                        @endforeach
    
                    </div>
    
                    <div class="modal-footer">
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
                        <button class="button green-btn" onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='none'">Done</button>
    
                    </div>
    
                </div>
    
            </div>
    
        </div> 
    
        <!--Edit HS codes modal-->
    
        <div id="edit-hs-codes-modal" class="customer-modal-main variants-edit-option-modal" wire:ignore>
    
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
    
                            <button class="button fw-6">Apply to all</button>
    
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
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
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
    
                        <button class="button secondary" data-dismiss="modal">Cancel</button>
    
                        <button class="button green-btn">Done</button>
    
                    </div>
    
                </div>
    
            </div>
    
        </div> 
    
    @else
       
        
        
    
    @endif

    
    </section>
    
    <!-- END -->
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

        $(document).ready(function(){
              //  var answer = $('#showvarient');
                if($('.custom_variant_checked').is(':checked')){
                    $('.card-cutome-arrtibute').slideToggle(500);
                } if($('.custom_variant_checked').not(':checked')) {
                    $('.card-cutome-arrtibute').slideToggle(500);
                }

            });

    
        $(document).ready(function(){
            
            if ($(".CustomVariant_checkox" ).is(':checked')) {
                $('.CustomVariant_wrap').addClass("CustomVariant_active");
            }else{
                $('.CustomVariant_wrap').removeClass("CustomVariant_active");
            }

            $( ".click-varients-type" ).click(function() {     
                window.livewire.emit('UpdateVarient', 'add-varient-type');
                $('.main-variant-card .card-middle-varient').toggle("slide");
    
            });
    
            $( ".edit-website-Attribute" ).click(function() {     
                 
                $('.main-variant-attribute .card-middle-arrtibute').toggle("slide");
    
            });
            
            $( ".CustomVariant_checkox" ).click(function() {     
                 
                if ($(".CustomVariant_checkox" ).is(':checked')) {
                    $('.CustomVariant_wrap').addClass("CustomVariant_active");
                }else{
                    $('.CustomVariant_wrap').removeClass("CustomVariant_active");
                }
    
            });
    
    
        });

         $(document).on("click", '#apply-price-selling-submit', function() {
            var val = $('.apply-selling-price').val();

            $('.att_price_selling_class').attr("value", val);

        });
    
       //  $('#description').ckeditor();
    
    </script>
    <script type="text/javascript">
    
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
                                            <select name="size[]" class="varition-type-value" id="varition_type_${rowIdx}">
                                            <option value="">-- Select Option --</option>
                                            <?php foreach($variantag as $row) { ?>
                                                 ` +  ($.inArray(`<?php echo $row->id; ?>`, arr_list_items) == -1 ? '<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>': '') +`
                                            <?php  } ?>
    
                                          
                                            </select>
    
                                            <input type="text" class="varition_tags variant-tags-error" id="varition_tags_${rowIdx}" value="" name="option" data-role="tagsinput" placeholder="Separate options with a comma">
    
                                        </div>
                                        <div class="row variant_fixed_price">
                                            <input type="number" value="" name="variant_custom_price[]" class="variant-tags-error" id="custom_price_tags_${rowIdx}" placeholder="Variant Price">    
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
    
                                    get_html += '<input type="hidden" name="varition_name[first][]" class="varition_name" value="'+arr_name1+'"><input type="hidden" name="varition_name[two][]" class="varition_name_two" value="'+arr_name2+'"><input type="hidden" name="varition_name[three][]" class="varition_name" value="'+arr_name3+'"><input type="hidden" name="varition_name[four][]" class="varition_name" value="'+arr_name4+'"><input type="hidden" name="varition_name[five][]" class="varition_name" value="'+arr_name5+'"><input type="hidden" name="varition_name[six][]" class="varition_name" value="'+arr_name6+'"><input type="hidden" name="varition_name[seven][]" class="varition_name" value="'+arr_name7+'"><input type="hidden" name="varition_name[eight][]" class="varition_name" value="'+arr_name8+'"><input type="hidden" name="varition_name[nine][]" class="varition_name" value="'+arr_name9+'"><input type="hidden" name="varition_name[ten][]" class="varition_name" value="'+arr_name10+'"><input type="hidden" name="varition_arrray[]" class="varition_tags" value="' + id_type1 + '/' + arr_name1 + '/' + id_type2 + '/' + arr_name2 + '/' + id_type3 + '/' + arr_name3 + '/' + arr_name4 + '/' + id_type4 + '/' + arr_name5 + '/' + id_type5 + '/' + arr_name6 + '/' + id_type6 + '/' + arr_name7 + '/' + id_type7 + '/' + arr_name8 + '/' + id_type8 + '/' + arr_name9 + '/' + id_type9 +'/' + arr_name10 + '/' + id_type10 +'"><tr id=' + uniq_id + ' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input ' + uniq_id + '" data-toggle="modal" id=' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +' data-id=' + uniq_id + '  data-input="">' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-' + uniq_id + '" value="" data-input=""></td><td class="vendor-table-item ta-right"><p class="price-view-class" id="price-view-' + uniq_id + '"></p></td></tr><br>';
    
                                    get_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';
    
                                    get_selling_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';
    
                                    get_sku_html += '<div class="vep-list"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><input type="text" id="child-popup-sku-' + uniq_id + '" class="att_sku_class" name="att_sku[]"></div><br>';
    
                                    get_stock_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><input type="text" id="child-popup-stock-' + uniq_id + '" class="att_stock_class" name=""></div><br>';
    
                                    get_barcode_html += '<div class="vep-list"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><input type="text" id="child-popup-stock-qtn-' + uniq_id + '" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';
    
                                    get_hscode_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><input type="text" id="child-popup-hscode-' + uniq_id + '" class="att_hscode_class" name="att_hscode[]"></div><br>';
    
                                    get_country_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '/' + arr_name10 +'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-' + uniq_id + '" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';
    
                                });
                            } 
                            else {
    
                                    get_html += '<input type="hidden" name="varition_name[first][]" class="varition_name" value="'+arr_name1+'"><input type="hidden" name="varition_name[two][]" class="varition_name_two" value="'+arr_name2+'"><input type="hidden" name="varition_name[three][]" class="varition_name" value="'+arr_name3+'"><input type="hidden" name="varition_name[four][]" class="varition_name" value="'+arr_name4+'"><input type="hidden" name="varition_name[five][]" class="varition_name" value="'+arr_name5+'"><input type="hidden" name="varition_name[six][]" class="varition_name" value="'+arr_name6+'"><input type="hidden" name="varition_name[seven][]" class="varition_name" value="'+arr_name7+'"><input type="hidden" name="varition_name[eight][]" class="varition_name" value="'+arr_name8+'"><input type="hidden" name="varition_name[nine][]" class="varition_name" value="'+arr_name9+'"><input type="hidden" name="varition_arrray[]" class="varition_tags" value="' + id_type1 + '/' + arr_name1 + '/' + id_type2 + '/' + arr_name2 + '/' + id_type3 + '/' + arr_name3 + '/' + arr_name4 + '/' + id_type4 + '/' + arr_name5 + '/' + id_type5 + '/' + arr_name6 + '/' + id_type6 + '/' + arr_name7 + '/' + id_type7 + '/' + arr_name8 + '/' + id_type8 + '/' + arr_name9 + '/' + id_type9 +'"><tr id=' + uniq_id + ' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input ' + uniq_id + '" data-toggle="modal" id=' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 +' data-id=' + uniq_id + '  data-input="">' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-' + uniq_id + '" value="" data-input=""></td><td class="vendor-table-item ta-right"><p class="price-view-class" id="price-view-' + uniq_id + '"></p></td></tr><br>';
    
                                    get_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';
    
                                    get_selling_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';
    
                                    get_sku_html += '<div class="vep-list"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><input type="text" id="child-popup-sku-' + uniq_id + '" class="att_sku_class" name="att_sku[]"></div><br>';
    
                                    get_stock_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><input type="text" id="child-popup-stock-' + uniq_id + '" class="att_stock_class" name=""></div><br>';
    
                                    get_barcode_html += '<div class="vep-list"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><input type="text" id="child-popup-stock-qtn-' + uniq_id + '" class="att_stock_qtn_class" name="att_stock_qtn[]"></div><br>';
    
                                    get_hscode_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 + '</label><input type="text" id="child-popup-hscode-' + uniq_id + '" class="att_hscode_class" name="att_hscode[]"></div><br>';
    
                                    get_country_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '/' + arr_name9 +'</label><div><label>Country/Region of origin</label><select id="att_country_class child-popup-country-' + uniq_id + '" class="att_country_class" name="att_country[]"><option value="1">Select country/region</option><option value="2">Afghanistan</option><option value="3"><option>Greenland</option></select></div></div><br>';
                                }
    
                               });
                            } 
                            else {
    
                                    get_html += '<input type="hidden" name="varition_name[first][]" class="varition_name" value="'+arr_name1+'"><input type="hidden" name="varition_name[two][]" class="varition_name_two" value="'+arr_name2+'"><input type="hidden" name="varition_name[three][]" class="varition_name" value="'+arr_name3+'"><input type="hidden" name="varition_name[four][]" class="varition_name" value="'+arr_name4+'"><input type="hidden" name="varition_name[five][]" class="varition_name" value="'+arr_name5+'"><input type="hidden" name="varition_name[six][]" class="varition_name" value="'+arr_name6+'"><input type="hidden" name="varition_name[seven][]" class="varition_name" value="'+arr_name7+'"><input type="hidden" name="varition_name[eight][]" class="varition_name" value="'+arr_name8+'"><input type="hidden" name="varition_arrray[]" class="varition_tags" value="' + id_type1 + '/' + arr_name1 + '/' + id_type2 + '/' + arr_name2 + '/' + id_type3 + '/' + arr_name3 + '/' + arr_name4 + '/' + id_type4 + '/' + arr_name5 + '/' + id_type5 + '/' + arr_name6 + '/' + id_type6 + '/' + arr_name7 + '/' + id_type7 + '/' + arr_name8 + '/' + id_type8 + '"><tr id=' + uniq_id + ' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input ' + uniq_id + '" data-toggle="modal" id=' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + ' data-id=' + uniq_id + '  data-input="">' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-' + uniq_id + '" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-' + uniq_id + '" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-' + uniq_id + '" value="" data-input=""></td><td class="vendor-table-item ta-right"><p class="price-view-class" id="price-view-' + uniq_id + '"></p></td></tr><br>';
    
                                    get_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';
    
                                    get_selling_price_html += '<div class="vep-list bd_none"><label>' + arr_name1 + '/' + arr_name2 + '/' + arr_name3 + '/' + arr_name4 + '/' + arr_name5 + '/' + arr_name6 + '/' + arr_name7 + '/' + arr_name8 + '</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-' + uniq_id + '" data-id="' + uniq_id + '" value=""></span></div><br>';
    
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
                                
                                    get_html += '<input type="hidden" name="varition_name[first][]" class="varition_name" value="'+arr_name1+'"><input type="hidden" name="varition_name[two][]" class="varition_name_two" value="'+arr_name2+'"><input type="hidden" name="varition_name[three][]" class="varition_name" value="'+arr_name3+'"><input type="hidden" name="varition_name[four][]" class="varition_name" value="'+arr_name4+'"><input type="hidden" name="varition_name[five][]" class="varition_name" value="'+arr_name5+'"><input type="hidden" name="varition_name[six][]" class="varition_name" value="'+arr_name6+'"><input type="hidden" name="varition_name[seven][]" class="varition_name" value="'+arr_name7+'"><input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'/'+id_type3+'/'+arr_name3+'/'+arr_name4+'/'+id_type4+'/'+arr_name5+'/'+id_type5+'/'+arr_name6+'/'+id_type6+'/'+arr_name7+'/'+id_type7+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p class="price-view-class" id="price-view-'+uniq_id+'"></p></td></tr><br>';
    
                                    get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
                                    get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'/'+arr_name7+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
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
    
                                     get_html += '<input type="hidden" name="varition_name[first][]" class="varition_name" value="'+arr_name1+'"><input type="hidden" name="varition_name[two][]" class="varition_name_two" value="'+arr_name2+'"><input type="hidden" name="varition_name[three][]" class="varition_name" value="'+arr_name3+'"><input type="hidden" name="varition_name[four][]" class="varition_name" value="'+arr_name4+'"><input type="hidden" name="varition_name[five][]" class="varition_name" value="'+arr_name5+'"><input type="hidden" name="varition_name[six][]" class="varition_name" value="'+arr_name6+'"><input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'/'+id_type3+'/'+arr_name3+'/'+arr_name4+'/'+id_type4+'/'+arr_name5+'/'+id_type5+'/'+arr_name6+'/'+id_type6+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p class="price-view-class" id="price-view-'+uniq_id+'"></p></td></tr><br>';
    
                                    get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
                                    get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'/'+arr_name6+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
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
                                    get_html += '<input type="hidden" name="varition_name[first][]" class="varition_name" value="'+arr_name1+'"><input type="hidden" name="varition_name[two][]" class="varition_name_two" value="'+arr_name2+'"><input type="hidden" name="varition_name[three][]" class="varition_name" value="'+arr_name3+'"><input type="hidden" name="varition_name[four][]" class="varition_name" value="'+arr_name4+'"><input type="hidden" name="varition_name[five][]" class="varition_name" value="'+arr_name5+'"><input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'/'+id_type3+'/'+arr_name3+'/'+arr_name4+'/'+id_type4+'/'+arr_name5+'/'+id_type5+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p class="price-view-class" id="price-view-'+uniq_id+'"></p></td></tr><br>';
    
                                    get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
                                    get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'/'+arr_name5+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
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
                                    get_html += '<input type="hidden" name="varition_name[first][]" class="varition_name" value="'+arr_name1+'"><input type="hidden" name="varition_name[two][]" class="varition_name_two" value="'+arr_name2+'"><input type="hidden" name="varition_name[three][]" class="varition_name" value="'+arr_name3+'"><input type="hidden" name="varition_name[four][]" class="varition_name" value="'+arr_name4+'"><input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'/'+id_type3+'/'+arr_name3+'/'+arr_name4+'/'+id_type4+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p class="price-view-class" id="price-view-'+uniq_id+'"></p></td></tr><br>';
    
                                    get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
                                    get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'/'+arr_name4+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
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
                                    get_html += '<input type="hidden" name="varition_name[0][]" class="varition_name" value="'+arr_name1+'"><input type="hidden" name="varition_name[1][]" class="varition_name_two" value="'+arr_name2+'"><input type="hidden" name="varition_name[3][]" class="varition_name" value="'+arr_name3+'"><input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'/'+id_type3+'/'+arr_name3+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+'/'+arr_name3+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p class="price-view-class" id="price-view-'+uniq_id+'"></p></td></tr><br>';
    
                                    get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
                                    get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'/'+arr_name3+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
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
                                 get_html += '<input type="hidden" name="varition_name[0][]" class="varition_name" value="'+arr_name1+'"><input type="hidden" name="varition_name[1][]" class="varition_name_two" value="'+arr_name2+'"><input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'/'+id_type2+'/'+arr_name2+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+'/'+arr_name2+' data-id='+uniq_id+'  data-input="">'+arr_name1+'/'+arr_name2+'</a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p class="price-view-class" id="price-view-'+uniq_id+'"></p></td></tr><br>'; 
    
                                 get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>'; 
    
                                 get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'/'+arr_name2+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';
    
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
                         get_html += '<input type="hidden" name="varition_name[0][]" class="varition_tags" value="'+arr_name1+'"><input type="hidden" name="varition_arrray[]" class="varition_tags" value="'+id_type1+'/'+arr_name1+'"><tr id='+uniq_id+' class="recorditem"><td><div class="row"><label><input type="checkbox" name="option6a"></label></div></td><td class="product-table-item"><a class="tc-black fw-6 varition_popup_main price-main-popup-input '+uniq_id+'" data-toggle="modal" id='+arr_name1+' data-id='+uniq_id+'  data-input="">'+arr_name1+'</a><a class="tc-black fw-6 sku-data-input" id="sku-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 barcode-data-input" id="barcode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><a class="tc-black fw-6 hscode-data-input" id="hscode-data-input-'+uniq_id+'" data-input="" style="display: none;"></a><input type="hidden" name="profit_arry[]" class="profit-data-input" id="profit-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="margin_arry[]" class="margin-data-input" id="margin-data-input-'+uniq_id+'" value="" data-input=""><input type="hidden" name="att_cost[]" class="cost-data-input cost-data-input cost-data-input-new" id="cost-data-input-'+uniq_id+'" value="" data-input=""></td><td class="vendor-table-item ta-right"><p><span>{{$symbol["currency"]}}</span><span class="price-view-class" id="price-view-'+uniq_id+'"></span><span>.00</span></p></td></tr><br>';
    
                         get_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'</label><span class="dollar-input"><input type="text" class="att_price_class" name="att_price[]" id="child-popup-price-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';
    
                          get_selling_price_html += '<div class="vep-list bd_none"><label>'+arr_name1+'</label><span class="dollar-input"><input type="text" class="att_price_selling_class" name="att_price_selling[]" id="child-popup-price-selling-'+uniq_id+'" data-id="'+uniq_id+'" value=""></span></div><br>';
    
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
    
               $('.attribute-sku-value').html(`        
                           `+get_sku_html+`
                    
                `);
    
                $('.attribute-barcode-value').html(`        
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
               $(".profit-data-input").attr("data-input", $('#profit-input-mian-value').val());
               $(".margin-data-input").attr("data-input", $('#margin-input-mian-value').val());
               $(".price-view-class").html($('.price-change-input').val());
               $(".att_price_class").attr("value", $('.price-change-input').val());
               $(".cost-data-input-new").attr("value", $('.change-value-main-cost').val());
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
    
    
            $(document).on("change", '.att_price_class', function() {
    
                 var id_value = $(this).attr('id');
                 var dataid = $(this).data('id');
                 
                var id1 = $('#'+id_value).val();
                 
                $("#"+id_value).attr("value", id1);
    
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
               $(".product-table-item ."+thisid).attr("data-input", $(this).parent().parent().find(".variant-pricing-card .form-field-list input").val());
               $("#cost-data-input-"+thisid).attr("data-input", $(this).parent().parent().find(".variant-pricing-card .cost-input input").val());
               $("#sku-data-input-"+thisid).attr("data-input", $('#sku-input').val());
               $("#barcode-data-input-"+thisid).attr("data-input", $('#barcode-input').val());
               $("#hscode-data-input-"+thisid).attr("data-input", $('#hscode-input').val());
               $("#profit-data-input-"+thisid).attr("data-input", $('.Profit-get-value').val());
               $("#margin-data-input-"+thisid).attr("data-input", $('.margin-get-value').val());
               $("#price-view-"+thisid).html($(this).parent().parent().find(".variant-pricing-card .form-field-list input").val());
               $("#child-popup-price-"+thisid).attr("value", $(this).parent().parent().find(".variant-pricing-card .form-field-list input").val());
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
                        <div class="variants-preview-list p-3 bd_none">
                            <label>
                                <input type="checkbox" name="option2a" checked="checked">Charge tax on this variant
                            </label>
                        </div>
                        <div class="variants-preview-list p-3">
                            <div class="variant-pricing-card">
                                <div class="row">
                                    <div class="form-field-list">
                                        <label>Price</label>
                                        <input type="text" value="`+inputvalue+`" id="main-popup-price`+id_value+`" class="change-value-main-price" placeholder="0.00">
                                        <label for="input">{{$symbol['currency']}}</label>
                                    </div>
                                </div>
                                <div class="row variant-price-option">
                                    <div class="form-field-list cost-input">
                                        <label>Cost per item</label>
                                        <input type="text" name="cost" value="`+costinput+`" id="main-popup-cost-`+id_value+`" class="change-value-main-cost" placeholder="0,00">
                                        <label for="input">{{$symbol['currency']}}</label>
                                        <p>Customers won’t see this</p>
                                    </div>
                                    <div class="form-field-list">
                                        <span>Margin</span>
                                        <span class="margin-value`+id_value+`">`+margininput+`</span>
                                        <input type="hidden" name="margin[]" value="`+margininput+`" class="margin-get-value" id="margin-value-input`+id_value+`">
                                    </div>
                                    <div class="form-field-list">
                                        <span>Profit</span>
                                        <span class="Profit-value`+id_value+`">`+profitinput+`</span>
                                        <input type="hidden" name="Profit[]" value="`+profitinput+`" class="Profit-get-value" id="Profit-value-input`+id_value+`">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="variants-preview-list p-3">
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
    
            var price = $('#main-popup-price'+id_value).val();
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
               $(".att_price_class").attr("value", price);
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
               $(".att_price_class").attr("value", price);
               $(".cost-data-input-new").attr("value", cost);
               $(".margin-data-input").attr("value", grossMargin.toFixed(2));
               $(".profit-data-input").attr("value", profit.toFixed(2));  
            }
    
        });
    
    
             
    </script>
    
        <script>
    
            $(document).on("keyup", ".price-change-input", function () {
    
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
               $(".att_price_class").attr("value", price);
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
               $(".att_price_class").attr("value", price);
               $(".cost-data-input-new").attr("value", cost);
               $(".margin-data-input").attr("value", grossMargin.toFixed(2));
               $(".profit-data-input").attr("value", profit.toFixed(2));  
            }
    
        });
    
    
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
    $(function() {
        $('#images').change(function(e) {
            var files = e.target.files;
            for(var i = 0; i <= files.length; i++) {
                // when i == files.length reorder and break
                if(i == files.length) {
                    // need timeout to reorder beacuse prepend is not done
                    setTimeout(function() {
                        reorderImages();
                    }, 100);
                    break;
                }
                var file = files[i];
                var reader = new FileReader();
                reader.onload = (function(file) {
                    return function(event) {
                        $('#sortable').prepend('<li class="ui-state-default remove-image" data-id="' + file.lastModified + '"><img src="' + event.target.result + '" style="width:100%;" /> <div class="order-number">0</div></li>');
                        $('#sortable').find('li').eq(0).insertAfter('#sortable>li:last');
                    };
                })(file);
                reader.readAsDataURL(file);
            } // end for;
        });
        //$('#sortable').sortable();
        // $('#sortable').disableSelection();
        //sortable events
        $('#sortable').on('sortbeforestop', function(event) {
            reorderImages();
        });
    
        function reorderImages() {
            // get the items
            var images = $('#sortable li');
            var i = 0,
                nrOrder = 0;
            for(i; i < images.length; i++) {
                var image = $(images[i]);
                if(image.hasClass('ui-state-default') && !image.hasClass('ui-sortable-placeholder')) {
                    image.attr('data-order', nrOrder);
                    var orderNumberBox = image.find('.order-number');
                    orderNumberBox.html(nrOrder + 1);
                    nrOrder++;
                } // end if;
            } // end for;
        }
    });
    
        $(document).on("click", '.delete-media', function() {
    
             $('.remove-image').has('input:checkbox:checked').remove();
    
              var countCheckedCheckboxes = $('.image-checkbox').filter(':checked').length;
    
            $('.count-image').text('');
    
    
        });
    
    
        $(document).on("click", '#select-all', function() {
    
          
    
            $('.image-checkbox').prop('checked', this.checked);
    
        })
    
        $(document).on("change", '.image-checkbox', function() {
    
            var countCheckedCheckboxes = $('.image-checkbox').filter(':checked').length;
    
            if(countCheckedCheckboxes > 0)
    
            {
    
              $('#select-all').prop("checked", true);
    
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
    
    
    
    
    
    <script>
    
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
    
    
    $(document).ready(function() {
        console.log('adasdas' + $('.ui-state-default').length);
    });
    $(document).on('DOMNodeRemoved', function(e) {
        if($(e.target).hasClass('ui-state-default')) {
            if($('.ui-state-default').length <= 1) {
                $(e.target).parent().removeClass('import-file-big');
            }
        }
    });
    $(document).on('DOMNodeInserted', function(e) {
        if($(e.target).hasClass('ui-state-default')) {
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
        

    $(document).ready(function(){

        $( ".edit-update-Attribute" ).click(function() {     

            $('.card-cutome-arrtibute').slideToggle(500);
        });

    });
                
    
    </script>
    @livewireScripts
    <script>
        // CKEDITOR.replace('desc');
        const editor = CKEDITOR.replace('descripation');
        editor.on('change', function (event) {
            // console.log(event.editor.getData())
            @this.set('product.descripation', event.editor.getData());
            
    });

        // hide dropdown 
    $(".buttoncustom").click(function(e){
    
    
     e.stopPropagation();
});



$(".dropdowncustomhide").click(function(e){
    e.stopPropagation();
});

$(document).click(function(){
    $(".dropdowncustomhide").hide();
});

    </script>
    </x-admin-layout>
    
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
