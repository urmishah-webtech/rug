<div>
<x-admin-layout>
    @php $symbol = CurrencySymbol(); @endphp
    <section class="full-width flex-wrap admin-full-width list-customers" wire:ignore.self>
        <div class="page_header d-flex align-item-center justify-content-space-between full-width mb-2">

            <h4 class="mb-0 fw-5">Products</h4>

            <div class="header-btn-group">

                 @if(user_permission('allproduct','create'))

                <a class="button green-btn" href="{{ route('products.create') }}">Add Product</a>

                @endif

            </div>

        </div> 
        
        <div class="columns product_listing_columns pdpage-checkbox has-sections card ml-0" wire:ignore.self>
            
            <div class="card-section tab_content  active" id="all_customers">
            
                <div class="order-form">
                    <article class="full-width">
                        <div class="columns" wire:ignore="">
                            <div class="input-group">
                                <!-- Search Field -->
                                <div class="search-product-field">
                                    <input class="fs-13 placeholder_gray fw-4" type="search" name="search_products" id="search_products" placeholder="Filter product" wire:model="filter_product">
                                </div>
                                <button class="secondary select-customer-edit" wire:click.prevent="deleteselected" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" >Delete Selected</button>
                            </div> 
                        </div>
                    </article>
                </div>
                <div class="table-loader">
                    <div class="loading-overlay" wire:loading.flex="">
                        <div class="page-loading"></div>
                    </div>
                    <span>
                    </span>
                    <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing" id="myTable" >
                        <tbody id="product-name">
                            <tr>
                                <th>
                                    <div class="row all-select-checkbox"><label><input type="checkbox" class="checked_all" name="customer_all" wire:model.defer="selectall"></label></div>
                                </th>
                                <th class="fw-6" colspan="6">
                                    <span class="all-customer-list">
                                         Showing {{($product->currentPage()-1) * $product->perPage()+(count($product) ? 1:0)}}  - {{($product->currentPage()-1)*$product->perPage()+count($product)}} of {{count($products)}} product
                                    </span>
                                   
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Total Variants</th>
                                <th>Price</th>
                            </tr>

                            <span>@foreach($product as $row)
                            <tr>
                                <td class="sticky-col">
                                    <div class="row"><label><input type="checkbox" wire:model.defer="selectedproducts" value="{{$row->id}}" name="option6a" class="checkbox"></label></div>
                                </td>
                                <td class="product-img">
                                    

                                    
                                    <div class="pd-blank-img">
                                        @if(!empty($row->productmediafirst) && !empty($row->productmediafirst->image))
                                        <a class="tc-black fw-6" href="{{ route('product-detail', $row->uuid) }}">
                                        <img src="{{ asset('storage/'.$row->productmediafirst->image) }}" />

                                        </a>
                                         @endif
                                    </div>
                                    
                                    
                                </td>
                                <td class="product-table-item">
                                    @if(user_permission('allproduct','update'))
                                    <a class="tc-black fw-6" href="{{ route('product-detail', $row->uuid) }}">{{$row->title}}</a>
                                    @else
                                    <p>{{$row->title}}</p>
                                    @endif
                                </td>
                                <td class="subscribed-label status-table-item">
                                    @if($row->status == 'active')
                                    <p class="tag green order-filed Activeclass">Active</p>
                                    @endif
                                    @if($row->status == 'invited')
                                    <p class="tag red order-filed invitedclass">Draft</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $row->updated_at->format('d-m-Y'); }}
                                   
                                </td>
                                <td class="inventory-table-item">
                                    <p>{{$row->variants_count}} variants</p>
                                </td>
                                <td class="type-table-item">
                                    <?php
                                       $min = $row->variants->min('price');
                                       $max = $row->variants->max('price');
                                    ?>
                                    @if(!empty($min))
                                        <span>{{$symbol['currency']}}</span><span>{{$min}}</span>
                                        @if(!empty($max))
                                        <span> - {{$symbol['currency']}}</span><span>{{$max}}</span>
                                        @endif
                                    @else
                                    <span>{{$symbol['currency']}}</span><span>{{$row->price}}</span>
                                    @endif
                                </td>
                                
                            </tr>
                            @endforeach</span>
                        </tbody>
                    </table>
                    <div class="pd-pagination-sec">
                        <select wire:model="perPage">
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                        <div class="pagination">

                         {!! $product->links() !!}
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
   
        $('.checked_all').on('change', function() {

                $('.checkbox').prop('checked', this.checked);
                if(this.checked) {
                    $(".order-form *").attr("disabled", "disabled").css("pointer-events","none").off('select');

                } else {
                    $(".order-form *").prop("disabled", false).css("pointer-events","auto").on('select');
                }
        });

        $('.checkbox').change(function(){

                if($('.checkbox:checked').length == $('.checkbox').length){
                    $('.checked_all').prop('checked',true);
                    $(".order-form *").attr("disabled", "disabled").css("pointer-events","none").off('select');
                }else{
                    $('.checked_all').prop('checked',false);
                    $(".order-form *").prop("disabled", false).css("pointer-events","auto").on('select');

                }
             
        });

    </script>
</x-admin-layout>
</div>

