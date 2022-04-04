<div>
<x-admin-layout>
     <style type="text/css">
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
    </style>
     @php $symbol = CurrencySymbol(); @endphp
    <section class="full-width flex-wrap admin-body-width add-variant-header" wire:ignore.self>
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center mb-3">
                    <a href="{{ route('product-detail', $product->uuid) }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Add variant</h4>
                </div>
                <!--<div class="header-right d-flex  align-item-center">-->
                <!--    <button class="link fw-6">Duplicate</button>-->
                <!--    <div class="pagination">-->
                <!--        <span class="button-group">-->
                <!--            <button class="secondary icon-prev"></button>-->
                <!--            <button class="secondary icon-next"></button>-->
                <!--        </span>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width add-variant-sec" wire:ignore.self>
         
    <form action="{{ route('variant-store') }}" method="POST" enctype="multipart/form-data" wire:ignore.self>
        @csrf
        <?php if($Productvariant_first){ ?>
        <input type="hidden"  name="product_id" value="{{$product->id}}">
        <input type="hidden"  name="varient1" value="{{$Productvariant_first->varient1}}">
        <input type="hidden"  name="varient2" value="{{$Productvariant_first->varient2}}">
        <input type="hidden"  name="varient3" value="{{$Productvariant_first->varient3}}">
        <input type="hidden"  name="varient4" value="{{$Productvariant_first->varient4}}">
        <input type="hidden"  name="varient5" value="{{$Productvariant_first->varient5}}">
        <?php } ?>
        <article class="full-width" wire:ignore.self>
            <div class="columns one-third">
                <div class="card variant-details-card card-grey-bg">
                    <div class="variant-img">
                       <img src="{{ url('image/defult-image.png') }}" />
                    </div>
                    <div class="variant-details">
                        <h2>{{$product->title}}</h2>
                        <span class="tag green">Active</span>
                        <span>{{count($Productvariant)}} variants</span>
                        <a href="{{ route('product-detail', $product->uuid) }}" class="link">Back to product</a>
                    </div>
                </div>
                <div class="card variants-color-card card-grey-bg">
                    <div class="card-header">
                        <h3 class="fs-16 fw-6 mb-0">Variants</h3>
                    </div>
                    <div class="card-middle">
                        @foreach($Productvariant as $row)
                        <p><span><img src="@if($row->photo != '') {{ url('storage/'.$row->photo) }} @endif @if($row->photo == '') {{ url('image/defult-image.png') }} @endif">
                           </span>
                            <a href="{{ route('variant-detail', $row->id) }}">
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
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="columns two-thirds" wire:ignore.self >
                <div class="card card-pd-0 pd-variants-card main-variant-attribute overflow-visible">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="fs-16 mb-0 fw-6">Variants</h4>
                        </div>
                        <label><input type="checkbox" name="option2a" class="edit-website-Attribute" wire:ignore.self>This product has multiple options, like different sizes or colors</label>
                    </div>
                    <div class="card-middle-arrtibute" style="display: none;" wire:ignore.self>
                        <div class="card-middle pd-add-attri-card"> 
                            <div class="add-attri-list">
                                <div class="row side-elements mb-0">
                                    <label class="form-label fs-14 fw-6">Attribute Type</label>
                                    <input type="text" value="" class="varition_type_tag dropbtn" id="varition_tye_tag"  wire:model="varition_name" placeholder="Variant Type" wire:ignore.self onclick="myFunction()" autocomplete="off"> 
                                    <a class="fw-6 button secondary" wire:click.prevent="StoreVarient('add-varient-type')">Save</a>
                                </div>
                                <ul id="myDropdown" class="filter-dropdown dropdown-content">
                                    @if($Varianttype)
                                    @foreach($Varianttype as $row)
                                    <li>{{$row->name}} <button class="secondary" wire:click.prevent="deleteattribute({{$row->id}})"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 3.994C8 2.893 8.895 2 10 2s2 .893 2 1.994h4c.552 0 1 .446 1 .997 0 .55-.448.997-1 .997H4c-.552 0-1-.447-1-.997s.448-.997 1-.997h4zM5 14.508V8h2v6.508a.5.5 0 00.5.498H9V8h2v7.006h1.5a.5.5 0 00.5-.498V8h2v6.508A2.496 2.496 0 0112.5 17h-5C6.12 17 5 15.884 5 14.508z" fill="#5C5F62"/></svg></button></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card variant-option-card">
                    <div class="header-title">
                        <h3 class="fs-16 fw-6 mb-0">Options</h3>
                    </div>
                    <div class="row">
                        <div class="variant-option-input" wire:ignore.self>
                            @foreach($Varianttype as $row)
                              <?php  if($Productvariant_first){ ?>

                                @if($Productvariant_first->varient1 != "" && $row->id == $Productvariant_first->varient1) 
                               
                                <label> {{$row->name}} </label> 
                                <input type="text" name="attribute1"/> 
                                @error('attribute1') <span class="text-danger">{{ $message }}</span>@enderror

                                @endif

                                @if($Productvariant_first->varient2 != ""  && $row->id == $Productvariant_first->varient2) 

                                <label> {{$row->name}} </label> 
                                <input type="text" name="attribute2"/>

                                 @endif

                                 @if($Productvariant_first->varient3 != ""  && $row->id == $Productvariant_first->varient3) 

                                <label> {{$row->name}} </label>
                                <input type="text" name="attribute3"/>

                                 @endif

                                @if($Productvariant_first->varient4 != ""  && $row->id == $Productvariant_first->varient4) 

                                <label> {{$row->name}} </label> 
                                <input type="text" name="attribute4"/>

                                 @endif

                                  @if($Productvariant_first->varient5 != ""  && $row->id == $Productvariant_first->varient5) 

                                <label> {{$row->name}} </label> 
                                <input type="text" name="attribute5"/>

                                 @endif

                                  @if($Productvariant_first->varient6 != ""  && $row->id == $Productvariant_first->varient6) 

                                <label> {{$row->name}} </label> 
                                <input type="text" name="attribute6"/>

                                 @endif

                                  @if($Productvariant_first->varient7 != ""  && $row->id == $Productvariant_first->varient7) 

                                <label> {{$row->name}} </label> 
                                <input type="text" name="attribute7"/>

                                 @endif

                                  @if($Productvariant_first->varient8 != ""  && $row->id == $Productvariant_first->varient8) 

                                <label> {{$row->name}} </label> 
                                <input type="text" name="attribute8"/>

                                 @endif

                                   @if($Productvariant_first->varient9 != ""  && $row->id == $Productvariant_first->varient9) 

                                <label> {{$row->name}} </label> 
                                <input type="text" name="attribute9"/>

                                 @endif

                                 @if($Productvariant_first->varient10 != ""  && $row->id == $Productvariant_first->varient10) 

                                <label> {{$row->name}} </label> 
                                <input type="text" name="attribute10"/>

                                 @endif
                                 <?php } ?>
                            @endforeach
                        </div>
                        <div class="card card-pd-0 tag-card collection-upload-image">
                  
                            <div class="single-upload-img">
                                <input type='file' id="readUrl">
                                <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label custome-file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"></path></svg>
                                    <p class="secondary">Add images</p>
                                    <span class="fs-12">or drop an image to upload</span>
                                </label>

                             
                      
                                <img id="uploadedImage" src="" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
                       
                                
                            </div>
                            
                        </div>
                        <!-- <div class="import-file">
                            <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label custome-file-upload">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"></path></svg>
                                <p class="secondary">Add images</p>
                                <span>or drop images to upload</span>
                                <button class="link">Choose existing</button>
                            </label>
                            <input type="file" name="photo" id="et_pb_contact_brand_file_request_0" >
                        </div> -->
                    </div>
                    @error('photo') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="card variant-pricing-card">
                    <div class="row-items">
                        <div class="header-title">
                            <h3 class="fs-16 fw-6 mb-0">Pricing</h3>
                        </div>
                        <div class="row">
                            <div class="form-field-list">
                                <label>Price</label>
                                <input type="text" name="price" id="price-change-input" value="" class="change-value-main-price" >
                                <label for="input">{{$symbol['currency']}}</label>
                                @error('price') <span class="text-danger">{{ $message }}</span>@enderror
                                
                            </div>
                            <div class="form-field-list">
                                <label>Selling prices</label>
                                <input type="text" name="selling_price" value="" >
                                <label for="input">{{$symbol['currency']}}</label>
                            </div>
                  <!--           <div class="form-field-list">
                                <label>Compare at price</label>
                                <input type="text" name="compare_price" value="" >
                                <label for="input">{{$symbol['currency']}}</label> 
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="form-field-list">
                                <label>Stock</label>
                                <input type="number" name="stock" id="stock-change-input" value="" class="change-value-main-stock" >
                                @error('stock') <span class="text-danger">{{ $message }}</span>@enderror
                                
                            </div>
                            <div class="form-field-list">
                            </div>
                        </div>
                    </div>
                  <!--   <div class="row-items bd_none">
                        <div class="row variant-price-option">
                            <div class="form-field-list">
                                <label>Cost per item</label>
                                <input type="text" name="cost"  id="cost-change-input"  value="" class="change-value-main-cost">
                                <label for="input">{{$symbol['currency']}}</label>
                                <p>Customers won’t see this</p>
                            </div>
                            <div class="form-field-list">
                                <span>Margin</span> 
                                <input type="hidden" name="margin" value="" id="margin-input-mian-value">
                                
                                <span class="margin-value-main"></span>
                            </div>
                            <div class="form-field-list">
                                <span>Profit</span>
                                <input type="hidden" name="profit" id="profit-input-mian-value" value="">
                                <span class="profit-value-main"></span>
                            </div>
                        </div>
                    <label class="variant-pricing-checkbox"><input type="checkbox" name="option2a" checked="checked">Charge tax on this variant</label>
                    </div> -->
                </div>
               <!--  <div class="card variant-inventory-card">
                    <div class="row-items">
                        <div class="header-title">
                            <h3 class="fs-16 fw-6 mb-0">Inventory</h3>
                        </div>
                        <div class="row bd_none">
                            <div class="form-field-list">
                                <label>SKU (Stock Keeping Unit)</label>
                                <input type="text" name="sku" value="">
                            </div>
                            <div class="form-field-list">
                                <label>Barcode (ISBN, UPC, GTIN, etc.)</label>
                                <input type="text" name="barcode" value="">
                            </div>
                        </div>
                        <label class="variant-pricing-checkbox"><input type="checkbox" name="option2a" checked="checked">Track quantity</label>
                        <label class="variant-pricing-checkbox"><input type="checkbox" name="option2a" checked="checked">Continue selling when out of stock</label>
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
                                <input type="search" placeholder="Search or enter a HS code" name="hscode">
                                <p class="mb-0">Manually enter codes that are longer than 6 numbers.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width">
        <div class="page-bottom-btn">
            <button class="warning">Delete variant</button>
            <input type="submit" value="Save variant" name="submit" class="button">
        </div>
    </section>

</form>

<!--variant edit locations modal-->
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
                <button class="button secondary" onclick="document.getElementById('variant-edit-locations-modal').style.display='none'">Cancel</button>
                <button class="button green-btn addbtn" onclick="document.getElementById('variant-edit-locations-modal').style.display='none'">Done</button>
            </div>
        </div>
    </div>
</div>
<!--/variant edit locations modal-->

<!--Update variant image modal-->
<div id="update-variant-image-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Update variant image</h2>
                <span onclick="document.getElementById('update-variant-image-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <p>You can only choose images as variant media</p>
                <div class="row">
                    <div class="update-variant-item">
                        <div class="media-item-img">
                            <div class="import-file">
                                <!--<input type="file" name="file" class="form-control" id="import_customers" onchange="importCustomers()">-->
                                <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label custome-file-upload">
                                    <p class="link">Add file</p>
                                    <span>or drop file to upload</span>
                                </label>
                                <input type="file" name="file" id="et_pb_contact_brand_file_request_0" class="file-upload" onchange="importCustomers()">
                            </div>
                        </div>
                    </div>
                    <div class="update-variant-item">
                        <div class="media-item-img">
                            <img src="https://cdn.shopify.com/s/files/1/0275/7722/1235/products/177511515_2798854263698141_395519753843178475_n_350x350.jpg?v=1619461256">
                        </div>
                    </div>
                    <div class="update-variant-item">
                        <div class="media-item-img">
                            <img src="https://cdn.shopify.com/s/files/1/0275/7722/1235/products/7c5198d2a0751fa76c8433dba4a1a12a_350x350.jpg?v=1610379310">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pagination">
                    <span class="button-group">
                        <button class="secondary icon-prev"></button>
                        <button class="secondary icon-next"></button>
                    </span>
                </div>
                <div class="modal-footer-btn">
                    <button class="button secondary">Cancel</button>
                    <button class="button secondary">Add image</button>
                    <button class="button green-btn">Done</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Update variant image modal-->

</section>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
$(document).ready(function(){
    $( ".edit-website-Attribute" ).click(function() {     
        $('.main-variant-attribute .card-middle-arrtibute').slideToggle(500);
    });
}); 

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
<script type="text/javascript">
 

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
    $(document).on("keyup", ".change-value-main-price", function () {

        var price = $(this).val();
        var cost = $('.change-value-main-cost').val();


        if (price > 0 && cost > 0) {

            var profit      = price - cost;
            var grossProfit = profit / cost * 100;
            var grossMargin = 100 * (price - cost) / price;

            $(".profit-value-main").text('$'+profit.toFixed(2));
            $("#profit-input-mian-value").val(profit.toFixed(2));
            $(".margin-value-main").text(+grossMargin.toFixed(2)+'%');
            $("#margin-input-mian-value").val(grossMargin.toFixed(2));
        }

    });

      $(document).on("keyup", ".change-value-main-cost", function () {

        var price = $('.change-value-main-price').val();
        var cost = $(this).val();

        if (price > 0 && cost > 0) {

            var profit      = price - cost;
            var grossProfit = profit / cost * 100;
            var grossMargin = 100 * (price - cost) / price;

            $(".profit-value-main").text('$'+profit.toFixed(2));
            $("#profit-input-mian-value").val(profit.toFixed(2));
            $(".margin-value-main").text(+grossMargin.toFixed(2)+'%');
            $("#margin-input-mian-value").val(grossMargin.toFixed(2));
        }

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
</x-admin-layout>
</div>





