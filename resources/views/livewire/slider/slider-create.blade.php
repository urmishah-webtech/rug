<div>
<x-admin-layout>
    <section class="full-width admin-body-width flex-wrap admin-full-width inventory-heading">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center">
                    <a href="{{ route('slider-list') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Create Slider</h4>
                </div>
            </div>
        </article>
    </section>
<form action="{{ route('collections-store-create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <section class="full-width admin-body-width flex-wrap admin-full-width bd_none add-transfers-sec">
        <article class="full-width">
            <div class="columns two-thirds">
                <div class="card">
                    <label>Title</label>
                    <input type="text" name="title" wire:model="title" placeholder="Enter Title">
                    <label>Button Text</label>
                    <input type="text" name="buttne_text" wire:model="buttne_text" placeholder="Enter Button Text">
                    <label>Button Link</label>
                    <input type="text" name="button_link" wire:model="button_link" placeholder="Enter Button Link">
                    <div class="product-des-customize">
                        <label>Description (optional)</label>
                        <div class="product-des-customize-inner">

                            <div class="product-dec-textbox">

                                 <textarea class="form-control tinymce-editor {{ $errors->has('descripation') ? 'parsley-error' : '' }}" rows="5" placeholder="Please Enter descripation" name="description" id="description" wire:model="description" wire:ignore.self></textarea>

                                 @error('description') <span class="text-danger">{{ $message }}</span>@enderror

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="columns one-third right-details">  
                <div class="card pd-20 tag-card card-grey-bg collection-upload-image">
                    <div class="header-title">
                        <h3 class="fs-16  fw-6 mb-0">Slider image</h3>
                    </div>
                    <div class="import-file" onclick="document.getElementById('update-variant-image-modal').style.display='block'" wire:ignore>
                            <!--<input type="file" name="file" class="form-control" id="import_customers" onchange="importCustomers()">-->
                        <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label custome-file-upload">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"></path></svg>
                            <p class="secondary">Add images</p>
                            <span class="fs-12">or drop images to upload</span>
                        </label>
                        <input type="file" wire:model.debounce.lazy="image" id="et_pb_contact_brand_file_request_0" class="file-upload">
                         @error('image') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width create-collection-footer" wire:ignore>
        <div class="page-bottom-btn">
             <button class="fw-6 button secondary" wire:ignore wire:click.prevent="StoreSlider('add-slider')">Save</button>
        </div>
    </section>
    
    <!--Edit products modal-->
    <div id="collection-edit-product-modal" class="customer-modal-main">
        <div class="customer-modal-inner">
            <input type="hidden" wire:model="customer.id" value="">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Edit products</h2>
                    <span onclick="document.getElementById('collection-edit-product-modal').style.display='none'" class="modal-close-btn">
                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                            <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                        </svg>
                    </span>
                </div>
                <div class="modal-footer">
                    <a class="button secondary" onclick="document.getElementById('collection-edit-product-modal').style.display='none'">Cancel</a>
                    <a class="button green-btn" onclick="document.getElementById('collection-edit-product-modal').style.display='none'">Done</a>
                </div>
            </div>
        </div>
    </div>
    
    
</form>
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
        $(".edit-website-seo-btn").click(function() {     
            $('.search-engine-listing-card .card-middle').toggle();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {

            var rowIdx = 1;
              $(document.body).on('click','.addBtn', function() {

                    x = Math.random().toString(36).substr(2, 9);
                    
                    console.log(x)

                    $(".add-new-condition").append(`


                            
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
                                <a class="secondary">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m10 16-4-4h8l-4 4zm0-12 4 4H6l4-4z"></path></svg>
                                </a>
                            </div>
                        </div>   
                      
                        
                        `);

                });

              
            });
    </script>
</x-admin-layout>
</div>