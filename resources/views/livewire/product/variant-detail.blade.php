<div>
   <x-admin-layout>
     @php $symbol = CurrencySymbol(); @endphp

     <style>
         #custom-single-upload-img{
            width: 100%;
    height: 100%;
    object-fit: cover;
         }
     </style>
    <section class="full-width flex-wrap admin-body-width add-variant-header">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center mb-3">
                    <a href="{{ route('product-detail', $product->uuid) }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5"> @if($Productvariant_first->attribute1 != ""){{$Productvariant_first->attribute1}} @endif
                            @if($Productvariant_first->attribute2 != "")/{{$Productvariant_first->attribute2}} @endif
                            @if($Productvariant_first->attribute3 != "")/{{$Productvariant_first->attribute3}} @endif
                            @if($Productvariant_first->attribute4 != "")/{{$Productvariant_first->attribute4}} @endif 
                            @if($Productvariant_first->attribute5 != "")/{{$Productvariant_first->attribute5}} @endif 
                            @if($Productvariant_first->attribute6 != "")/{{$Productvariant_first->attribute6}} @endif 
                            @if($Productvariant_first->attribute7 != "")/{{$Productvariant_first->attribute7}} @endif 
                            @if($Productvariant_first->attribute8 != "")/{{$Productvariant_first->attribute8}} @endif 
                            @if($Productvariant_first->attribute9 != "")/{{$Productvariant_first->attribute9}} @endif 
                            @if($Productvariant_first->attribute10 != "")/{{$Productvariant_first->attribute10}} @endif</h4>
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
    <form enctype="multipart/form-data">
        <article class="full-width">
            <div class="columns one-third">
                <div class="card variant-details-card card-grey-bg">
                    <div class="variant-img">
                        <img src="@if($Productvariant_first->photo != '') {{ asset('storage/'.$Productvariant_first->photo) }} @endif @if($Productvariant_first->photo == '') {{ asset('image/defult-image.png') }} @endif">
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
                    <div class="card-middle cutsom-heightscroll">
                        @foreach($Productvariant as $row)
                        <p><span><img src="@if($row->photo != '') {{ asset('storage/'.$row->photo) }} @endif @if($row->photo == '') {{ asset('image/defult-image.png') }} @endif"></span>
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
            <div class="columns two-thirds">
                <div class="card variant-option-card">
                    <div class="header-title">
                        <h3 class="fs-16 fw-6 mb-0">Options</h3>
                    </div>
                    <div class="row">
                        <div class="variant-option-input">
                            @foreach($Varianttype as $row)
                              
                                @if($Productvariant_first->varient1 != "" && $row->id == $Productvariant_first->varient1) 
                               
                                <label> {{$row->name}} </label> 
                                <input type="text" wire:model="Productvariant_first.attribute1" /> 

                                @endif

                                @if($Productvariant_first->varient2 != ""  && $row->id == $Productvariant_first->varient2) 

                                <label> {{$row->name}} </label> 
                                <input type="text" wire:model="Productvariant_first.attribute2"/>

                                 @endif

                                 @if($Productvariant_first->varient3 != ""  && $row->id == $Productvariant_first->varient3) 

                                <label> {{$row->name}} </label> 
                                <input type="text" wire:model="Productvariant_first.attribute3"/>

                                 @endif

                                    @if($Productvariant_first->varient4 != ""  && $row->id == $Productvariant_first->varient4) 

                                <label> {{$row->name}} </label> 
                                <input type="text" wire:model="Productvariant_first.attribute4"/>

                                 @endif

                                  @if($Productvariant_first->varient5 != ""  && $row->id == $Productvariant_first->varient5) 

                                <label> {{$row->name}} </label> 
                                <input type="text" wire:model="Productvariant_first.attribute5"/>

                                 @endif

                                  @if($Productvariant_first->varient6 != ""  && $row->id == $Productvariant_first->varient6) 

                                <label> {{$row->name}} </label> 
                                <input type="text" wire:model="Productvariant_first.attribute6"/>

                                 @endif

                                  @if($Productvariant_first->varient7 != ""  && $row->id == $Productvariant_first->varient7) 

                                <label> {{$row->name}} </label> 
                                <input type="text" wire:model="Productvariant_first.attribute7"/>

                                 @endif

                                  @if($Productvariant_first->varient8 != ""  && $row->id == $Productvariant_first->varient8) 

                                <label> {{$row->name}} </label> 
                                <input type="text" wire:model="Productvariant_first.attribute8"/>

                                 @endif

                                   @if($Productvariant_first->varient9 != ""  && $row->id == $Productvariant_first->varient9) 

                                <label> {{$row->name}} </label> 
                                <input type="text" wire:model="Productvariant_first.attribute9"/>

                                 @endif

                                 @if($Productvariant_first->varient10 != ""  && $row->id == $Productvariant_first->varient10) 

                                <label> {{$row->name}} </label> 
                                <input type="text" wire:model="Productvariant_first.attribute10"/>

                                 @endif
                            @endforeach
                        </div>
                         <div class="card card-pd-0 tag-card collection-upload-image" wire:ignore>
                  
                            <div class="single-upload-img" id="custom-single-upload-img">
                                <input type='file' id="readUrl" wire:model="photo">
                                <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label custome-file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"></path></svg>
                                    <p class="secondary">Add images</p>
                                    <span class="fs-12">or drop an image to upload</span>
                                </label>
                      
                                <img id="uploadedImage" src="@if($Productvariant_first->photo != '') {{ asset('storage/'.$Productvariant_first->photo) }} @endif @if($Productvariant_first->photo == '') {{ asset('image/defult-image.png') }} @endif" alt="Uploaded Image" accept="image/png, image/jpeg">
                       
                                
                            </div>
                            
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
                                <label>Price</label>
                                <input type="text" name="price" class="change-value-main-price" wire:model="Productvariant_first.price">
                                <label for="input">{{$symbol['currency']}}</label>
                            </div>
                            <div class="form-field-list">
                                <label>Selling at price</label>
                                <input type="text" name="compare_price" wire:model="Productvariant_first.selling_price">
                                <label for="input">{{$symbol['currency']}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-field-list">
                                <label>Stock</label>
                                <input type="number" name="stock" id="stock-change-input" wire:model="Productvariant_first.stock" class="change-value-main-stock" >
                                @error('stock') <span class="text-danger">{{ $message }}</span>@enderror
                                
                            </div>
                            <div class="form-field-list">
                            </div>
                        </div>
                    </div>
                    <div class="row-items bd_none">
                        <div class="row variant-price-option">
                            <!-- <div class="form-field-list">
                                <label>Cost per item</label>
                                <input type="text" name="cost" class="change-value-main-cost" wire:model="Productvariant_first.cost">
                                <label for="input">{{$symbol['currency']}}</label>
                                <p>Customers won’t see this</p>
                            </div> -->
                            <!-- <div class="form-field-list">
                                <span>Margin</span> 
                                <input type="hidden" name="margin" id="margin-input-mian-value" wire:model="Productvariant_first.margin">
                                
                                <span class="margin-value-main">{{$Productvariant_first->margin}}%</span>
                            </div>
                            <div class="form-field-list">
                                <span>Profit</span>
                                <input type="hidden" name="profit" id="profit-input-mian-value" wire:model="Productvariant_first.profit">
                                <span class="profit-value-main">${{$Productvariant_first->profit}}</span>
                            </div> -->
                        </div>
                   <!--  <label class="variant-pricing-checkbox"><input type="checkbox" name="option2a" checked="checked">Charge tax on this variant</label> -->
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
                                <input type="text" name="sku" wire:model="Productvariant_first.sku">
                            </div>
                            <div class="form-field-list">
                                <label>Barcode (ISBN, UPC, GTIN, etc.)</label>
                                <input type="text" name="Barcode" wire:model="Productvariant_first.barcode">
                            </div>
                        </div>
            

                        <label class="variant-pricing-checkbox"><input type="checkbox" wire:model="Productvariant_first.trackqtn">Track quantity</label>
                        <label class="variant-pricing-checkbox"><input type="checkbox" wire:model="Productvariant_first.outofstock">Continue selling when out of stock</label>
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
                               @foreach($variantStock as $key => $productloc)
                                 @foreach($location as $result)
                                     @if($result->id == $productloc['location_id'])
                                    <tr>
                                       
                                        <td>{{$result->name}}</td>
                                        
                                        <td><input wire:model.lazy="variantStock.{{$key}}.stock"  type="text"  wire:ignore></td>

                                    </tr>
                                    @endif
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div> -->
                
                <!-- <div class="card variant-shipping-card" wire:ignore>
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
                            <input type="text"  wire:ignore wire:model="Productvariant_first.weight">
                            <select name="weight_lable"  wire:ignore wire:model="Productvariant_first.weight_lable">

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
                                <select name="country" wire:ignore wire:model="Productvariant_first.country">
                                <option value="">Select country/region</option>
                                @foreach($Country as $result)
                                <option value="{{$result->id}}">{{$result->name}}</option>
                                @endforeach

                                </select>
                                <p>In most cases, where the product is manufactured.</p>
                                <label>HS (Harmonized System) code</label>
                                <input type="search" placeholder="Search or enter a HS code" wire:model="Productvariant_first.hscode">
                                <p class="mb-0">Manually enter codes that are longer than 6 numbers.</p>
                            </div>
                    </div>
                </div> -->

                  <!-- detail -->
                {{-- <div class="card " >
                    <div class="row-items">
                        <div class="header-title">
                            <h3 class="fs-16 fw-6 mb-0">Detail</h3>
                        </div>
                    </div>
                    <div class="row-items">
                      @php $x=0; @endphp
                             @foreach ($productDetail as $index => $product_detail)

                            <div class="row accordian">
                                <div class="form-group">
                                  <a  data-toggle="collapse" href="#productDetail{{$index}}" role="button" aria-expanded="false" aria-controls="collapseExample">

                                    <input type="text" class="form-label" readonly="readonly"  style="background-color: #fafbfb;" @if(isset($productDetail[$index]['title'])) value="{{$productDetail[$index]['title']}}"  @endif /> 

                                    
                              
                                    
                                  </a>
                                </div>
                                <div  class=" row card card-body collapse"  id="productDetail{{$index}}" style="padding: 0px;" aria-expanded="false">


                                    <label><input type="text" wire:key="{{ $index }}" name="productDetail[{{$index}}]['title']" wire:model="productDetail.{{$index}}.title" class="form-control"  placeholder="write the heading here..." ></label>

                                    <textarea placeholder="description..." wire:key="desc_{{ $index }}"  class="form-control" name="productDetail[{{$index}}]['description']" wire:model="productDetail.{{$index}}.description">
                                    </textarea>
                                    <a href="#" wire:click.prevent="removeProductDetailSection({{$index}})">delete</a> 
                                </div>

                            </div>
                            @php $x++; @endphp
                            @endforeach
                    </div>
                    <div class="row">
                        <button id="add_new" wire:click.prevent="addProductDetailSection">Add New</button>
                    </div>
                    
                </div> --}}
                <!-- end detail -->
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width" wire:ignore>
        <div class="page-bottom-btn">
            <button class="warning" wire:click.prevent="deletevariant({{$Productvariant_first->id}})">Delete variant</button>
            <button wire:click.prevent="changevariant({{$Productvariant_first->id}}, event.target.value)" class="button">Save variant</button>
        </div>
    </section>
</form>



<!--variant edit locations modal-->
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
                
                <label>
                @foreach($variantStock as $row1)
                @if($row->id == $row1->location_id)
                    <input type="checkbox" wire:model.lazy="selectedlocation" value="{{$row->id}}" wire:ignore checked>
                @endif
                @endforeach
                    {{$row->name}}
                </label>
                
                @endforeach
            </div>
            <div class="modal-footer">
                <button class="button secondary" onclick="document.getElementById('variant-edit-locations-modal').style.display='none'">Cancel</button>
                <button class="button green-btn" onclick="document.getElementById('variant-edit-locations-modal').style.display='none'" wire:click.prevent="UpdateVarient('update-location')" wire:ignore>Done</button>
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
