<div>
    <x-admin-layout>
        <style>
            .one-bg.border-every-row th, .one-bg.border-every-row td{
                padding: 15px 16px;
            }
        </style>
    <section class="full-width flex-wrap admin-full-width inventory-heading">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center">
                    <h4 class="mb-0 fw-5">Slider</h4>
                </div>
               
                    <a class="button green-btn" href="{{ route('slider-creates') }}">Create Slider</a>
               
            </div>
        </article>
    </section> 
    <section class="full-width flex-wrap admin-full-width list-customers bd_none">
        <div class="columns product_listing_columns has-sections card ml-0">
           <!--  <div class="inventory-tab">
                <ul class="tabs">
                    <li class="active tab all" data-toggle="tab"><a href="#">All</a></li>
                </ul>
            </div> -->
            <div class="card-section tab_content  active" id="all_customers">
                <div class="order-form">
                    <article class="full-width">
                        <div class="columns" wire:ignore="">
                            <div class="input-group">
                                <!-- Search Field -->
                                <div class="search-product-field">
                                    <input class="fs-13 placeholder_gray fw-4" wire:model="filter_slider" type="search" name="search_products" wire:model="filter_customers" id="search_products" placeholder="Filter Slider">
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
                    <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing collections-sec">
                        <tbody>
                            <tr>
                                 <th>
                                    <div class="row all-select-checkbox"><label><input type="checkbox" wire:model="selectall" class="checked_all" name="customer_all"></label></div>
                                </th>
                                <th>S No.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Page Name</th>
                                <th class="fw-6">Action</th>
                                <th class="ta-right">
                                	Created Date
                                </th>
                            </tr>

                           
                            @if($slider)
                          	@foreach($slider as $reskey => $result)
                            <tr>
                                 <td>
                                    <div class="row"><label><input type="checkbox" class="checkbox" name="selectedslider"  wire:model="selecteslider" value="{{$result->id}}"></label></div>
                                </td>
                                <td>{{$reskey+1}}</td>
                                <td class="product-table-item">
                                	<img src="{{ asset('storage/'.$result['slider_image']) }}" />
                                </td>
                                <td class="product-table-item">
                                   <a class="tc-black fw-6" href="{{ route('slider-detail', $result->id) }}">
                                   	<p>{{$result->title}}</p>
                                   </a>
                                </td>
                                <td>
                                    <p>{{$result->buttne_text}}</p>
                                </td>
                                <td class="type-table-item"><a class="print-btn btn btn-success custom-addmorebtn" href="{{ route('slider-detail', $result->id) }}"><i class="fas fa-edit"></i> </a></td>
                                <td class="ta-right">
                                	<p>{{ $result->created_at->format('d-m-Y'); }}</p>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="pagination">

                     {!! $slider->links() !!}
                   
                    </div>
                </div>
            </div>
        </div>
    </section>     
</x-admin-layout>
</div>
