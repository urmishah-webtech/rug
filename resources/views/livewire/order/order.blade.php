<div>
<x-admin-layout>
    @php $symbol = CurrencySymbol(); @endphp
    <section class="full-width flex-wrap admin-full-width list-customers">
        <div class="page_header d-flex align-item-center justify-content-space-between full-width mb-2">
            <h4 class="mb-0 fw-5">Orders</h4>
            <div class="header-btn-group">
             <!--    <a class="link" data-toggle="modal" data-target="#export" >Export</a> -->
               <!--  @if(user_permission('orderlist','create'))
                <a class="button green-btn" href="{{ route('draft-orders-create') }}">Create order</a>
                @endif -->
            </div>
        </div>
    </section>
    
    <section class="full-width flex-wrap admin-full-width list-customers bd_none orders-sec">
        <div class="columns product_listing_columns pdpage-checkbox has-sections card ml-0">
        <!-- <ul class="tabs">
            <li class="active tab all" data-toggle="tab"><a href="#">All</a></li>
            <li class="tab titled" data-toggle="tab"><a href="#">Unfulfilled <span class="tag grey">19</span></a></li>
            <li class="tab titled" data-toggle="tab"><a href="#">Unpaid</a></li>
            <li class="tab titled" data-toggle="tab"><a href="#">Open</a></li>
            <li class="tab titled" data-toggle="tab"><a href="#">Closed</a></li>
        </ul> -->
        
        <div class="card-section tab_content  active" id="all_customers">
        
            <div class="order-form">
                <article class="full-width">
                    <div class="columns" wire:ignore="">
                        <div class="input-group">
                            <!-- Search Field -->
                            <div class="search-product-field">
                                <input class="fs-13 placeholder_gray fw-4" type="search" name="search_products" id="search_products" placeholder="Filter orders" wire:model="filter_order">
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
                <table class="one-bg border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th order-listing">
                    <tbody>
                        <tr>
                            <th class="sticky-col">
                                <div class="row"><label><input type="checkbox" wire:model="selectall" name="option6a"></label></div>
                            </th>
                            <th class="sticky-col">Order</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Items</th>
                            <th>Delivery method</th>
                        </tr>
                        @if($order)
                        @php $i=1001; @endphp
                        @foreach($order as $row)
                      
                        <a class="tc-black fw-6" href="{{ route('order-detail', $row->id) }}">
                            <tr>
                            <td class="sticky-col">
                                <div class="row"><label><input type="checkbox" wire:model="selecteorder" value="{{$row->id}}" name="option6a"></label></div>
                            </td>
                            @if(user_permission('orderlist','update'))
                            <td class="fw-6 sticky-col"><a class="tc-black fw-6" href="{{ route('order-detail', $row->id) }}">#{{$row->id}}</a></td>
                            @else
                            <td class="fw-6 sticky-col">#{{$row->id}}</td>
                            @endif                       
                            <td>
                              {{ $row->updated_at->format('d-m-Y'); }}
                            </td>
                            <td>
                               
                               <a class="tc-black fw-6" href="{{ route('customers') }}"> 
                                    <button class="link">@if($row['user']){{$row['user'][0]['first_name']}}@endif 
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <p>{{$symbol['currency']}}{{$row->netamout}}</p>
                            </td>
                            <td>
                                <span class="tag grey"><span class="grey-circle"></span>{{$row->paymentstatus}}</span>
                            </td>
                           
                            <td>

                                <?php $itemcount = 0; $i = 1; ?>
                               
                                @foreach($OrderItem as $item)
                                    @if($item->order_id == $row->id)
                                        <?php $itemcount = $i++;  ?>
                                    @endif
                                @endforeach
                                <button class="link">{{$itemcount}} item<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></button>
                            </td>
                            <td>
                                Standard
                            </td>
                        </tr></a>
                        @php $i++; @endphp
                        @endforeach
                        @endif
                    </tbody>
                </table>
                 <div class="pd-pagination-sec">
                <select wire:model="perPage">
                    <option value="9999999">All</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
                <div class="pagination">

                 {{$order->links() }}

                </div>
            </div>
            </div>
        </div>
    </div>
    </section>
</x-admin-layout>
</div>
<!--Export modal-->
<div id="export" class="customer-modal-main in export-inventory">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Export products</h2>
                <button type="button" class="close modal-close-btn" data-dismiss="modal">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </button>
            </div>
            <form wire:submit.prevent="exportCustomers">
                <input type="hidden" name="_token" value="VWAiD9EyZqX8gI9MQVQQlfzOATOFOTdo9nvAgLrx">                    
                <div class="modal-body ta-left">
                    <div class="p-2">
                        <label>Export</label>
                        <ul style="list-style-type: none" wire:ignore.self="">
                            <li>
                                <input value="Current Page" name="export" id="current_page" type="radio" wire:model="export">
                                <label for="current_page">Current Page</label>
                            </li>
                            <li>
                                <input value="All Customers" name="export" id="all-customers" type="radio" wire:model="export">
                                <label for="all-customers">All products</label>
                            </li>
                            <li wire:ignore="">
                                <input value="Selected Customers" name="export" id="selected_customers" type="radio" wire:model="export" disabled="">
                                <label for="selected_customers">Selected: <span class="selected_count">0</span> products</label>
                            </li>
                            <li>
                                <input value="Searched Customers" name="export" id="searched_customers" type="radio" wire:model="export" disabled="">
                                <label for="searched_customers">42 orders matching your search</label>
                            </li>
                            <li>
                                <input value="Orders by date" name="export" id="orders_by_date" type="radio" wire:model="export">
                                <label for="orders_by_date">Orders by date</label>
                            </li>
                        </ul>
                        <label>Export as</label>
                        <ul style="margin-bottom: 0; list-style-type: none" wire:ignore.self="">
                            <li><input value="Csv" name="export_as" id="csv" type="radio" wire:model="export_as">
                                <label for="csv">CSV for Excel, Numbers, or other spreadsheet programs</label>
                            </li>
                            <li><input value="Plain Csv" name="export_as" id="plain_csv" type="radio" wire:model="export_as"> <label for="plain_csv">Plain CSV file</label></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="button secondary">Cancel</button>
                    <button data-dismiss="modal" class="button secondary">Export transaction histories</button>
                    <button type="submit" class="button green-btn">Export orders</button>
                </div>
            </form>
        </div>
    </div>
</div>