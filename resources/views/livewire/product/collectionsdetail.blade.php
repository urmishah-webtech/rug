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
                    <div class="product-des-customize" wire:ignore>
                        <label>Description (optional)</label>
                        <div class="product-des-customize-inner">
                          <!--   <div class="product-dec-textbox">
                                 <textarea wire:model.lazy="collection.description"></textarea>
                            </div> -->
                            <div class="col-md-9">
                                <textarea wire:model="collection.description" class="form-control required" name="description" id="description"></textarea>
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
                                        <span class="tag blue">@if($row['collection_product']->status == 'active') Active @else Draft @endif</span>
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
                                <span>https://rug.webtech-evolution.com/</span>
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
                <!-- <div class="card collection-availability-card">
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
                </div> -->
                <div class="card pd-20 tag-card card-grey-bg collection-upload-image">
                    <div class="header-title">
                        <h3 class="fs-16  fw-6 mb-0">Collection image</h3>
                    </div>
                    <div class="single-upload-img" wire:ignore>
                        <input type='file' id="readUrl" wire:model="collectionimage" accept=".png, .jpg, .jpeg">
                        <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label custome-file-upload">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"></path></svg>
                            <p class="secondary">Add images</p>
                            <span class="fs-12">or drop an image to upload</span>
                        </label>

                         @if($collection->image != "")
                        <img id="uploadedImage" src="{{ asset('storage/'.$collection->image) }}" alt="Uploaded Image" accept="image/png, image/jpeg">
                        @else
                        <img id="uploadedImage" src="{{ asset('storage/'.$collection->image) }}" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
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
    <section class="full-width flex-wrap admin-body-width">
        <div class="page-bottom-btn">
            @if(user_permission('collections','delete'))
            <button class="button warning">Delete collection</button>
            @endif
            <div wire:key="alert" class='success-alert'>
    
                @if (session()->has('message'))
                 <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </div>
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
    @livewireScripts
    <script>
        // CKEDITOR.replace('desc');
        const editor = CKEDITOR.replace('description');
        editor.on('change', function (event) {
            // console.log(event.editor.getData())
            @this.set('collection.description', event.editor.getData());
            
    });
    </script>
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