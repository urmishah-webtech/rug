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
            
            </div>

         </article>
      </section>
   
      <section  class="full-width flex-wrap admin-body-width customers-details-sec product-details-sec">
      
         <article class="full-width">
         
            <div class="columns two-thirds">
            
               <div class="card">
                  <div class="row">
                     <label>Title <span class="text-danger">*</span></label>
                     <input type="text" name="title" wire:model.defer="product.title">
                     @error('product.title') <span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                  <div  class="form-group row" >
                     <label>Description <span class="text-danger">*</span></label>
                     <div class="col-md-9" wire:ignore>
                        <textarea wire:model.defer="product.descripation" class="form-control required" name="descripation" id="descripation"  ></textarea>
                     </div>
                     @error('product.descripation') <span class="text-danger">{{ $message }}</span>@enderror

                  </div>
               </div>
               
               <div class="card product-media-card"  wire:ignore>
                  
                  <div class="media-delete-option">
                     
                     <label class="all-select-media"><input type="checkbox" name="option2a" id="select-all" wire:model="select_all_images"><span class="count-image"></span> Media  <span class="text-danger">*</span> </label>
                     
                     <a wire:click.prevent="deleteimage()" class="link warning delete-media">Delete media</a>
                     
                  </div>
               
                  <div class="card-middle">
                     
                     <div class="uplod-main-demo">
                        
                        <input type="file" id="images" wire:model.debounce.lazy="image" multiple name="image" multiple="multiple"/>
                        
                        <div class="import-file">
                           
                           <div id="multiple-file-preview">
                              
                              <ul id="sortable" @if(!$product->productmediaget->isEmpty()) class="import-file-big" @endif>
                                 @if(!$product->productmediaget->isEmpty())
                                    
                                 @foreach($product->productmediaget as $row)
                                    
                                 <li class="ui-state-default image-avalible remove-image" data-order=0 data-id="'+file.lastModified+'">
                                       <div class="file-upload-overlay">
                                          <input type="checkbox" name="productimage" wire:model="productimage" value="{{$row}}" class="image-checkbox">
                                       </div>
                                       <img src="{{ asset('storage/'.$row->image) }}" style="width:100%;" /> 
                                       <div class="order-number">0</div>
                                 </li>
                                    
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
          
            
               @if(!$product->variants->isEmpty())
               <div class="columns product_listing_columns pdpage-checkbox has-sections card ml-0 product-tab-table">
                  <div class="product-table-title">

                     <h3>Variants <span class="text-danger">*</span></h3>
                     <span>
                        <a href="{{ route('variant-new', $product->uuid) }}" class="link">Add variant</a>
                     </span>
                  </div>
               
                  <div class="card-section tab_content  active" id="all_customers">
                     <div class="table-loader">
                        <div class="loading-overlay" wire:loading.flex wire:target="variantimgsubmit">
                           <div class="page-loading"></div>
                        </div>
                        <div class="product-table-details">
                           <div class="product-table-checkbox">
                              <div class="product-all-check">
                              
                                 <label>Showing {{count($product->variants)}} variants</label>
                              </div>
                              <div class="product-edite-variants">
                                 <a class="fw-6 button secondary">Edit Variants <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></a>
                                 <ul class="edite-variants-dropdown">
                                    <li><a class="link" onclick="document.getElementById('variants-edit-prices-modal').style.display='block'">Edit prices</a></li>
                                    <li><a class="link" onclick="document.getElementById('variants-edit-selling-prices-modal').style.display='block'">Edit Selling prices</a></li>
                                    <li><a class="link" onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='block'">Edit Stock</a></li>
                                   
                                 </ul>
                              </div>
                           </div>
                           <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing custom-table-height">
                              <tbody>
                                 @foreach($product->variants as $key => $row)
                                 <tr>
                                    <td>
                                       <div class="row"><label><input type="checkbox" name="option6a"></label></div>
                                    </td>
                                    <td class="product-img">
                                       <div class="product-variants-ulpload-img" data-toggle="modal">
                                          <div class="pd-blank-img">
                                             @if(empty($row['variantmedia'][0]['image']))
                                             <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true" onclick="document.getElementById('update-variant-image-modal-{{$row->id}}').style.display='block'"><path d="M19 2.5A1.5 1.5 0 0 0 17.5 1h-15A1.5 1.5 0 0 0 1 2.5v15A1.5 1.5 0 0 0 2.5 19H10v-2H3.497c-.41 0-.64-.46-.4-.79l3.553-4.051c.19-.21.52-.21.72-.01L9 14l3.06-4.781a.5.5 0 0 1 .84.02l.72 1.251A5.98 5.98 0 0 1 16 10h3V2.5zm-11.5 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm12.207 10.793A1 1 0 0 0 19 15h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 0 0 .707-1.707z"></path></svg>
                                             @else
                                             <img src="{{ asset('storage/'.$row['variantmedia'][0]['image']) }}" />
                                             @endif
                                          </div>
                                          <img id="output-{{$row->id}}" />
                                       </div>
                                       <div id="update-variant-image-modal-{{$row->id}}" class="customer-modal-main" >
                                          
                                          <div class="customer-modal-inner">
                                             <div class="customer-modal">
                                                <div class="modal-header">
                                                   <h2>Select variant image</h2>
                                                   <span data-dismiss="modal" class="modal-close-btn">
                                                      <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true" onclick="document.getElementById('update-variant-image-modal-{{$row->id}}').style.display='none'">
                                                      <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                                                      </svg>
                                                   </span>
                                                </div>
                                                <div class="modal-body ta-left">
                                                   <div class="card product-media-card">
                                                      <p class="mb-0 grey-color">You can only choose images as variant media</p>
                                                      <div class="card-middle">
                                                         <div class="upload-img-modal">
                                                            <form id="myForm" method="post">
                                                               <ul id="selectedFiles">
                                                                  @if(!$product->productmediaget->isEmpty())
                                                                  @foreach($product->productmediaget as $rowimg)
                                                                  <li>
                                                                     <label>
                                                                     <input value="{{$rowimg}}"  wire:model.defer="imgvariant" name="product"  type="radio">
                                                                     <img src="{{ asset('storage/'.$rowimg->image) }}">
                                                                  </label>
                                                                  </li>
                                                                  @endforeach
                                                                  @endif
                                                               </ul>
                                                            </form>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                   <div class="footer-btn-group">
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

                                       <p>@if($row->selling_price){{$symbol['currency']}}{{number_format($row->selling_price,2,".",",")}}
                                       @endif</p>
                                       
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                           <hr>
                        </div>
                     </div>
                  </div>
               </div>
               @endif

               <div class="card card-pd-0 pd-variants-card main-variant-attribute overflow-visible">
                  <div class="row-items question">
                     <div class="header-title">
                        <h4 class="fs-16 mb-0 fw-6">Customise Product Price</h4>
                     </div>
                     <label>
                        <input type="checkbox" name="custom_variant_check" id="custom_variant" class="edit-update-Attribute custom_variant_checked" wire:model.defer="product.custom_variant">
                        Custome Price
                     </label>

                     
                     <div @if(!$product->custom_variant) style='display:none' @endif class="card-cutome-arrtibute one-half-row-card" wire:ignore.self >
                        
                        @if(!empty($product->cv_option_price))
                        @foreach ($product->cv_option_price as $key => $item)
                        @if(isset($item->lable))
                        <div class="row showvarient">
                           <div class="form-field-list">
                              <input class="price-change-input" type="text" value="{{$variantag[ $item->lable ] }}"  name="variantname" readonly wire:ignore>
                              
                              <input class="price-change-input" type="hidden" wire:model="product.cv_option_price.{{ $key }}.lable" wire:ignore readonly>
                              
                           </div>
                           <div class="form-field-list">
                              <input class="price-change-input" placeholder="Price" type="number"  wire:model.defer="product.cv_option_price.{{ $key }}.price">
                              
                           </div>
                        </div>
                        <br>
                        @endif
                        @endforeach
                        @endif
                 
                     </div>
                    
                  </div>
               </div>

               <div class="card variant-pricing-card" >
                  <div class="row-items">
                     
                     <div class="header-title">
                        
                        <h3 class="fs-16 fw-6 mb-0">Pricing</h3>
                        
                     </div>
                     
                     <div class="row">
                        
                        <div class="form-field-list">
                           
                           <label>Price <span class="text-danger">*</span></label>
                           
                           <input type="text" name="price_main" id="price-change-input" class="price-change-input" wire:model.defer="product.price"  placeholder="0,00">
                           
                           <label for="input">{{$symbol['currency']}}</label>
                           
                           @error('product.price') <span class="text-danger">{{ $message }}</span>@enderror
                           
                        </div>
                        
                        
                        <div class="form-field-list">
                           
                           <label>Selling price</label>
                           
                           <input type="text" name="compare_selling_price" wire:model.defer="product.compare_selling_price" placeholder="0,00">
                           
                           <label for="input">{{$symbol['currency']}}</label>
                           
                        </div>
                        
                     </div>
                     
                     <div class="row">
                        
                        <div class="form-field-list">
                           
                           <label>Stock</label>
                           
                           <input type="text" name="stock" wire:model.defer="product.stock">
                           
                        </div>
                        
                     </div>
                     
                  </div>
             
               </div>
               <div class="card variant-pricing-card">
                  <div class="row-items">
                     <div class="header-title">
                        <h3 class="fs-16 fw-6 mb-0">Shipping Parcel</h3>
                     </div>
                     <div class="row" style="margin-bottom:10px">
                        <div class="form-field-list">
                           <label>Shipping Weight (kg)</label>
                           <input type="text" name="shipping_weight" wire:model.defer="product.shipping_weight">
                        </div>
                        <div class="form-field-list">
                           <label>Width (cm)</label>
                           <input type="text" name="width" wire:model.defer="product.width">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-field-list">
                           <label>Height (cm)</label>
                           <input type="text" name="height" wire:model.defer="product.height">
                        </div>
                        <div class="form-field-list">
                           <label>Depth (cm)</label>
                           <input type="text" name="depth" wire:model.defer="product.depth">
                        </div>
                     </div>
                  </div>
               </div>


               <div class="card search-engine-listing-card" wire:ignore.self>
                  <div class="card-header">
                     
                     <div class="header-title">
                        
                        <h4 class="fs-16 mb-0 fw-6">Search engine listing preview</h4><a class="link edit-website-seo-btn">Edit website SEO</a>
                        
                     </div>
                     
                     <div class="ccd-search-engine-listing">
                        
                        <h4>{{$product->seo_title}}</h4>
                        @if($product->seo_utl)
                        <p><a href="{{ url('/product').'/'.$product->seo_utl }}">{{ $product->seo_utl }}</a></p>
                        @endif
                        
                        <span>{{$product->seo_descripation}}</span>
                        
                     </div>
                     
                  </div>
                  <div class="card-middle" wire:ignore.self>
                     
                     <div class="row">
                        
                        <label>Page title</label>
                        
                        <input type="text" name="seo_title" wire:model.defer="product.seo_title">
                        
                        <p>0 of 70 characters used</p>
                        
                     </div>
                     
                     <div class="row">
                        
                        <label>Description</label>
                        
                        <textarea name="seo_descripation" wire:model.defer="product.seo_descripation"></textarea>
                        
                        <p>0 of 320 characters used</p>
                        
                     </div>
                     
                     <div class="row">
                        
                        <label>URL and handle</label>
                        
                        <div class="url-input">
                           <span>https://rug.webtech-evolution.com/</span>
                           <input type="text" name="seo_utl" wire:model.defer="product.seo_utl">
                           
                        </div>
                        @error('product.seo_utl')  <span class="text-danger">{{ $message }}</span> @enderror
                        
                     </div>
                     
                  </div>
               </div>

               <div class="card">
                  <div id="tab_logic" class="after-add-more">
                     <div class="col-md-2">
                        <h3>Product Tab descripation</h3>
                     </div>

                     
                     @foreach($faq as $key => $row)
                     <div @if($product_last_key == $key) id="hidden_tab" style="display: none;" @endif  >
                        <div class="row">
                           <label>Title</label>
                           <input type="text" wire:model.defer="faq.{{ $key }}.question" >
                        </div>
                        <div class="form-group row">
                           <label>Description</label>
                           <div class="col-md-9">
                              <textarea wire:model.defer="faq.{{ $key }}.answer" class="form-control required"  ></textarea>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-2">
                              <button class="btn btn-danger btn-sm custom-deleteebtn" wire:click.prevent="remove({{$key}})"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Remove</button>
                           </div>
                        </div>
                     </div>
                     @endforeach

                  </div>
                  <div class="more-feilds">
                     <div class="col-md-6">
                        <div class="form-group change">
                           <a class="btn btn-success add-more custom-addmorebtn">+ Add More</a>
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
                        
                        <select  name="status" wire:model.defer="product.status">
                           
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
                        <select  name="status" wire:model.defer="product.product_new" multiple>
                           
                           <option value="">-- Select Option --</option>
                           @foreach($tagsale as $res)
                           <option value="{{$res->id}}" >{{$res->title}}</option>
                           @endforeach
                        </select>
                        
                     </p>
                     
                  </div>
               </div>
               <div class="card tag-card card-grey-bg organization-card">
                  <div class="card-middle">
                     <div class="row sidebar-collection-checkbox">
                        <label class="fs-12  fw-6 mb-0">COLLECTIONS</label>
                        <input type="search" placeholder="Search for collections" class="buttoncustom" onclick="openOption('email_subscription_status')" >
                        <div class="search-collections-checkbox filter_email_subscription_status dropdowncustomhide" style="list-style-type: none">
                           
                           @foreach($Collection as $key=>$row)
                           <label><input type="checkbox" name="option2a" wire:model.defer="product.collection" value="{{$key}}">{{$row[0]['title']}}</label>
                           @endforeach
                        </div>

                        @if(!empty($product->collection) &&  count($product->collection) > 0)
                        @foreach($product->collection as $checking)
                        @if(isset($Collection[$checking]))
                        <label> {{$Collection[$checking][0]['title']}} </label>
                        @endif
                        @endforeach
                        @endif
                     </div>
                  </div>
                
               </div>

               <div class="card card-pd-0 pd-variants-card main-variant-card" >
                  <div class="card-header">
                     <div class="header-title">
                        <h4 class="fs-16 mb-0 fw-6">Featured</h4>
                     </div>
                     <label><input type="checkbox" name="featured" wire:model.defer="product.featured" class="click-varients-type">Assign this product as Featured</label>
                  </div>
               </div>

            </div>

         </article>

      </section>

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
            <div class="loading-overlay" wire:loading.flex wire:target="updateDetail, deleteproduct, remove, deleteimage">
               <div class="page-loading"></div>
            </div>
         </div>
      </section>

      <!--Models------------------------------->

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

       @if(!$product->variants->isEmpty())
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
                           <input type="text" id="apply-price" wire:model.defer="price_all" class="apply-price" name="price" placeholder="0,00">
                        </span>
                     </div>
                     <button class="button fw-6" wire:click='applyAll("update_price")' id="apply-price-submit">Apply to all</button>
                  </div>
                  @foreach ($product->variants as $key => $variantrow)
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
                        <input class="att_price_class" type="text" wire:model.defer="product.variants.{{ $key }}.price" >
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
                           <input type="text" wire:model.defer="selling_price_all" name="selling_price" placeholder="0,00" class="apply-selling-price">
                        </span>
                     </div>
                     <button class="button fw-6" wire:click='applyAll("update_selling_price")' id="apply-selling-price-submit" >Apply to all</button>
                  </div>
                  @foreach ($product->variants as $key => $variantrow)
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
                        <input type="text"  class="att_selling_price_class" wire:model.defer="product.variants.{{ $key }}.selling_price" >
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
      
      <!--Edit stock modal-->
      <div id="variants-edit-stock-qtn-modal" class="customer-modal-main skus-barcodes-modal" wire:ignore>
         <div class="customer-modal-inner">
            <div class="customer-modal">
               <div class="modal-header">
                  <h2>Edit Stocko</h2>
                  <span onclick="document.getElementById('variants-edit-stock-qtn-modal').style.display='none'" class="modal-close-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path></svg></span>
               </div>
               <div class="modal-body">
                  @foreach ($product->variants as $key => $variantrow)
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
                     <input type="text"  wire:model.defer="product.variants.{{ $key }}.stock">
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
   
      @endif


      <!--end Models------------------------------->



    
     
    <!--script------------------------------->


    <script type="text/javascript">

        $(document).on('DOMNodeRemoved', function(e) {
            if ($(e.target).hasClass('ui-state-default')) {
                if ($('.ui-state-default').length <= 1) {
                    $(e.target).parent().removeClass('import-file-big');
                }
            }
        });

        $(document).on('DOMNodeInserted', function(e) {
            if ($(e.target).hasClass('ui-state-default')) {
                // $('#save').prop('disabled', false);
                $(e.target).parent().addClass('import-file-big');
            }
        });

        // product detail
        $('.add-more').on('click', function() {
            $('#hidden_tab').show();
            @this.add();
        });

        // custom
        $(".edit-update-Attribute").click(function() {
            $('.card-cutome-arrtibute').slideToggle(500);
        });

        // seo
        $(".edit-website-seo-btn").click(function() {

            $('.search-engine-listing-card .card-middle').toggle();

        });


        // media
        $(document).on("click", '#select-all', function() {

            $('.image-checkbox').prop('checked', this.checked);

        })

        $(document).on("change", '.image-checkbox', function() {
            var countCheckedCheckboxes = $('.image-checkbox').filter(':checked').length;
           
            if (countCheckedCheckboxes > 0)
            {
                $('#select-all').prop("checked", true);
                $('.count-image').text(countCheckedCheckboxes);

            } else
            {
                $('#select-all').removeAttr('checked');
                $('.count-image').text('');
            }

        });


        $(document).on("click", '.image-checkbox', function() {

            var id_value = $(this).attr('id');
            if ($('#' + id_value).is(":checked")) {
                var inputValue = $('#' + id_value).attr("checked", 'checked');
            } else
            {
                var inputValue = $('#' + id_value).removeAttr('checked');
            }
        });

        $(document).on("click", '.delete-media', function() {

            $('.remove-image').has('input:checkbox:checked').remove();

            var countCheckedCheckboxes = $('.image-checkbox').filter(':checked').length;

            $('.count-image').text('');


        });

        $(function() {
            $('#images').change(function(e) {
                var files = e.target.files;
                for (var i = 0; i <= files.length; i++) {
                    // when i == files.length reorder and break
                    if (i == files.length) {
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
            //sortable events
            $('#sortable').on('sortbeforestop', function(event) {
                reorderImages();
            });

            function reorderImages() {
                // get the items
                var images = $('#sortable li');
                var i = 0,
                    nrOrder = 0;
                for (i; i < images.length; i++) {
                    var image = $(images[i]);
                    if (image.hasClass('ui-state-default') && !image.hasClass('ui-sortable-placeholder')) {
                        image.attr('data-order', nrOrder);
                        var orderNumberBox = image.find('.order-number');
                        orderNumberBox.html(nrOrder + 1);
                        nrOrder++;
                    } // end if;
                } // end for;
            }
        });

        // variants
        $('.product-edite-variants a').click(function() {
            
            $('.edite-variants-dropdown').slideToggle();
        
        });

        $(document).on("click", '#apply-price-submit', function() {
            var val = $('.apply-price').val();

            $('.att_price_class').val(val);
        });
         
        $(document).on("click", '#apply-selling-price-submit', function() {
            var val = $('.apply-selling-price').val();

            $('.att_selling_price_class').val(val);
        });


        $(document).on("click", '.modal-footer .button.green-btn', function() {
            var thisid = $(this).data("recordid");
            $(".product-table-item ." + thisid).attr("data-input", $(this).parent().parent().find(".variant-pricing-card .form-field-list input").val());

        });

        // collection
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

        // description : CKEDITOR.replace('desc');
        const editor = CKEDITOR.replace('descripation');
        editor.on('change', function(event) {
            @this.set('product.descripation', event.editor.getData());

        });
        
    </script>

     <!--end script------------------------------->

      @livewireScripts

   </x-admin-layout>

</div>