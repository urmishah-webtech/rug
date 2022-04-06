<div>
<x-admin-layout>
<div wire:key="alert">

@if (session()->has('message'))

<div class="alert alert-success">

{{ session('message') }}

</div>

@endif

</div>
@php $symbol = CurrencySymbol(); @endphp
    <section class="full-width admin-body-width flex-wrap admin-full-width inventory-heading">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center">
                    <a href="{{ route('order-list') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Orders #{{$order->id}} <span class="tag grey"><span class="round-circle"></span>Paid</span> <!-- <span class="tag yellow"><span class="border-circle"></span>Unfulfilled</span> --><p class="header-leble">25 May 2021 at 7:30 from Draft Orders</p></h4>
                </div>
               <!--  <div class="product-header-btn">
                    <a href="{{route('order-refund')}}" class="button link">Refund</a>
                    <button class="button link" onclick="document.getElementById('unable-to-edit-order-modal').style.display='block'">Edit</button>
                    <div class="more-actions-dp">
                        <button class="button link head-arrow-btn">More actions <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></button>
                        <ul class="filter-dropdown" wire:ignore>
                            <li> 
                                <button class="link">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M7.5 2A1.5 1.5 0 0 0 6 3.5V13a1 1 0 0 0 1 1h9.5a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 16.5 2h-9zm-4 4H4v10h10v.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 16.5v-9A1.5 1.5 0 0 1 3.5 6z"></path></svg>
                                    Duplicate
                                </button>
                                <button class="link">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M7.5 2A1.5 1.5 0 0 0 6 3.5V13a1 1 0 0 0 1 1h9.5a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 16.5 2h-9zm-4 4H4v10h10v.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 16.5v-9A1.5 1.5 0 0 1 3.5 6z"></path></svg>
                                    Cancel order
                                </button>
                                <button class="link">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M4.5 3A1.5 1.5 0 0 0 3 4.5V6h14V4.5A1.5 1.5 0 0 0 15.5 3h-11zM4 15.5A1.5 1.5 0 0 0 5.5 17h9a1.5 1.5 0 0 0 1.5-1.5V8H4v7.5zM7 11h6v2H7v-2z"></path></svg>
                                    Archive
                                </button>
                                <button class="link">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M14 11h2V9h-2v2zM7 7h6V4H7v3zm0 9h6v-2H7v2zm8-9V3.5A1.5 1.5 0 0 0 13.5 2h-7A1.5 1.5 0 0 0 5 3.5V7H3.5A1.5 1.5 0 0 0 2 8.5v6A1.5 1.5 0 0 0 3.5 16H5v.5A1.5 1.5 0 0 0 6.5 18h7a1.5 1.5 0 0 0 1.5-1.5V16h1.5a1.5 1.5 0 0 0 1.5-1.5v-6A1.5 1.5 0 0 0 16.5 7H15z"></path></svg>
                                    Print packing slips
                                </button>
                                <button class="link">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17.928 9.628C17.837 9.399 15.611 4 10 4S2.162 9.399 2.07 9.628a1.017 1.017 0 0 0 0 .744C2.163 10.601 4.389 16 10 16s7.837-5.399 7.928-5.628a1.017 1.017 0 0 0 0-.744zM10 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-6a2 2 0 1 0 .002 4.001A2 2 0 0 0 9.999 8z"></path></svg>
                                    View order status page
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="pagination">
                        <span class="button-group">
                            <button class="secondary icon-prev"></button>
                            <button class="secondary icon-next"></button>
                        </span>
                    </div>
                </div> -->
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width bd_none order-details-sec">
        <article class="full-width">
            <div class="columns two-thirds">
                <div class="card unfulfilled-product-card">
                    <div class="card-header">
                        <div class="header-title">
                           <!--  <h3 class="fs-16 fw-6 mb-0"><span><svg viewBox="0 0 17 17" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><circle cx="8.5" cy="8.59" r="7.2" fill="currentColor"></circle><path d="M10.09 16.41a.8.8 0 01-.18-1.58 6.46 6.46 0 002-.81L12 14a.79.79 0 011.07.35.8.8 0 01-.3 1.05 7.89 7.89 0 01-2.46 1 .55.55 0 01-.22.01zm-3.2 0h-.18a7.89 7.89 0 01-2.47-1A.8.8 0 015.09 14a6.49 6.49 0 002 .82.8.8 0 01.6 1 .81.81 0 01-.78.62zm7.7-3.18a.8.8 0 01-.8-.8.79.79 0 01.12-.42 6.27 6.27 0 00.83-2 .8.8 0 011.56.36 7.89 7.89 0 01-1 2.47.77.77 0 01-.71.39zm-12.19 0a.78.78 0 01-.67-.37 8.14 8.14 0 01-1-2.46.8.8 0 011.53-.4 6.19 6.19 0 00.82 2 .8.8 0 01-.68 1.23zm13.12-5.4a.81.81 0 01-.78-.63 6.46 6.46 0 00-.81-2 .81.81 0 01.24-1.11.79.79 0 011.1.24 8 8 0 011 2.47.8.8 0 01-.6 1h-.18zm-14 0a.58.58 0 01-.19 0 .79.79 0 01-.6-1 8.22 8.22 0 011-2.47.82.82 0 011.11-.26.8.8 0 01.25 1.11 6.49 6.49 0 00-.82 2 .78.78 0 01-.77.62zM12.33 3.3a.83.83 0 01-.43-.13 6.49 6.49 0 00-2-.82.79.79 0 01-.63-.93.8.8 0 01.94-.64 8.15 8.15 0 012.48 1A.8.8 0 0113 2.92a.78.78 0 01-.68.37zm-7.65 0A.82.82 0 014 2.93a.8.8 0 01.22-1.1l.1-.06a7.93 7.93 0 012.39-1 .8.8 0 011 .61.79.79 0 01-.6 1 6.43 6.43 0 00-2 .82.82.82 0 01-.43.12z"></path></svg></span>Unfulfilled (1)</h3> -->
                           <!--  <button class="link three-dots-btn"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M6 10a2 2 0 1 1-4.001-.001A2 2 0 0 1 6 10zm6 0a2 2 0 1 1-4.001-.001A2 2 0 0 1 12 10zm6 0a2 2 0 1 1-4.001-.001A2 2 0 0 1 18 10z"></path></svg></button>
                            <ul class="filter-dropdown unfulfilled-dropdown">
                                <li><button class="link" onclick="document.getElementById('change-location-modal').style.display='block'">Change location</button></li>
                                <li><button class="link" onclick="document.getElementById('hold-fulfillment-modal').style.display='block'">Hold fulfillment</button></li>
                            </ul> -->
                        </div>
                        <!-- <span>Location</span>
                        <p>H-28, Sector 63</p> -->
                        @if($OrderItem)
                        @foreach($OrderItem as $item)
                        <div class="unfulfilled-product-sec">
                            <div class="unful-pd-img">
                                <p class="unful-img"><sapn class="inful-count">{{$item['stock']}}</sapn><img src="@if(!empty($item['media_product'][0])){{ url('storage/'.$item['media_product'][0]['image']) }}@endif"></p>
                                <a href="#">{{$item['order_product'][0]['title']}}</a>
                            </div>
                            <p class="unful-pd-price">
                                <span>{{$symbol['currency']}}{{number_format($item['price'],2,".",",")}} × {{$item['stock']}}</span>
                                <span>{{$symbol['currency']}}{{number_format($item['total'],2,".",",")}}</span>
                            </p>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="card-middle ta-right">
                        <button class="button green-btn ta-right">Fulfill item</button>
                    </div>
                </div>
                <div class="card od-paid-card">

                    <div class="header-title">
                        <h3 class="fs-16 fw-6 mb-0"><span><svg viewBox="0 0 17 17" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><circle cx="8.5" cy="8.59" r="7.52" fill="currentColor"></circle><path d="M8.5 17a8.36 8.36 0 118.35-8.36A8.35 8.35 0 018.5 17zm0-15a6.69 6.69 0 106.68 6.68A6.68 6.68 0 008.5 1.91z"></path><path class="halo-success_svg__cls-2" d="M7.66 11.09a.82.82 0 01-.59-.24L5.4 9.18A.84.84 0 015.45 8a.82.82 0 011.13 0l1.08 1.08 2.75-2.75a.83.83 0 011.18 1.18l-3.34 3.34a.82.82 0 01-.59.24z"></path></svg></span>{{$order->paymentstatus}}</h3>
                    </div>
                    <ul>
                        <?php $Stock_sum = 0; ?>
                        @foreach($OrderItem as $item)
                        <?php $Stock_sum  += $item['stock']; ?>
                        @endforeach
                        <?php 
                         $gst = $Taxes->rate;
                         $netamount = $order->netamout;
                         $GetGst = ($gst/100)+1;
                         $withoutgstaount = $netamount / $GetGst;

                         $gst_include =  ($withoutgstaount*$gst) / 100;
                         //$gst_amount = ($netamount + $gst_include);

                         $shipping_cost = $order->shipping_cost;

                         $total = $netamount + $shipping_cost;
                        ?>
                        <li>
                            <span>Subtotal(excluding GST)</span>
                            <span>{{$Stock_sum}} item</span>
                            <span>{{$symbol['currency']}}{{number_format($withoutgstaount,2,'.',',')}}</span>
                        </li>
                        <li>
                            <span>Tax</span>
                            <span>IGST {{$gst}}%</span>
                            <span>{{$symbol['currency']}}{{number_format($gst_include,2,'.',',')}}</span>
                        </li>

                        <li>
                            <span>Subtotal(including GST)</span>
                            <span>{{$Stock_sum}} item</span>
                            <span>{{$symbol['currency']}}{{number_format($netamount,2,'.',',')}}</span>
                        </li>

                        <li>
                            <span>Shipping</span>
                            <span>{{$symbol['currency']}}{{number_format($shipping_cost,2,'.',',')}}</span>
                        </li>
                        
                        <li>
                            <span class="fw-6">Total</span>
                            <span class="fw-6"></span>
                            <span class="fw-6">{{$symbol['currency']}}{{number_format($total,2,'.',',')}}</span>
                        </li>
                        <li>
                            <span>Paid by customer</span>
                            <span></span>
                            <span>{{$symbol['currency']}}{{number_format($total,2,'.',',')}}</span>
                        </li>
                    </ul>
                </div>
                <!-- <div class="timeline-sec">
                    <h3 class="fs-16 fw-6 mb-0">Timeline</h3>
                    <label><input type="checkbox" name="option2a" checked="checked">Show comments</label>
                </div> -->
                <div class="order-tracking" wire:ignore>
                    <div class="row add-note-textarea comment-box mb-0">
                        <textarea wire:model='messagetext' placeholder="Leave a comment..."></textarea>
                        @error('messagetext') <span class="error">{{ $message }}</span> @enderror
                        <div class="comment-button">
                            <!-- <button class="secondary">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                    <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0m0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8M7 9a1 1 0 100-2 1 1 0 000 2m6-2a1 1 0 100 2 1 1 0 000-2m-.696 4.281c-.03.03-.786.72-2.304.72-1.497 0-2.252-.67-2.303-.718a1 1 0 00-1.404 1.424C6.425 12.84 7.653 14 10 14c2.346 0 3.575-1.16 3.707-1.293a.993.993 0 00.005-1.397 1.006 1.006 0 00-1.408-.029"></path>
                                </svg>
                            </button>
                            <button class="secondary">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                    <path d="M10 13c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3zm0-13C4.486 0 0 4.486 0 10s4.486 10 10 10a1 1 0 0 0 0-2c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8v1c0 .827-.673 1.5-1.5 1.5S15 11.827 15 11v-1c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5c1.531 0 2.887-.707 3.805-1.795A3.477 3.477 0 0 0 16.5 14.5c1.93 0 3.5-1.57 3.5-3.5v-1c0-5.514-4.486-10-10-10z"></path>
                                </svg>
                            </button>
                            <button class="secondary">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.992 2.124a1 1 0 1 0-1.984-.248L5.618 5H2a1 1 0 0 0 0 2h3.367l-.75 6H2a1 1 0 1 0 0 2h2.367l-.36 2.876a1 1 0 1 0 1.985.248L6.382 15h5.985l-.36 2.876a1 1 0 0 0 1.985.248l.39-3.124H18a1 1 0 1 0 0-2h-3.367l.75-6H18a1 1 0 1 0 0-2h-2.367l.36-2.876a1 1 0 1 0-1.985-.248L13.618 5H7.632l.36-2.876zM12.617 13l.75-6H7.383l-.75 6h5.984z"></path>
                                </svg>
                            </button>
                            <button class="secondary">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                    <path d="M5.243 20a5.228 5.228 0 0 1-3.707-1.533A5.213 5.213 0 0 1 0 14.759c0-1.402.546-2.719 1.536-3.708l9.515-9.519a5.25 5.25 0 0 1 8.553 1.7A5.21 5.21 0 0 1 20 5.24a5.208 5.208 0 0 1-1.535 3.708l-4.258 4.26a3.124 3.124 0 0 1-5.092-1.012A3.098 3.098 0 0 1 8.879 11c0-.835.324-1.619.914-2.208l4.5-4.501a1 1 0 1 1 1.414 1.414l-4.5 4.501a1.112 1.112 0 0 0-.328.794A1.114 1.114 0 0 0 12 12.12c.297 0 .582-.118.793-.327l4.258-4.26A3.223 3.223 0 0 0 18 5.24c0-.866-.337-1.681-.949-2.293a3.248 3.248 0 0 0-4.586 0L2.95 12.465A3.224 3.224 0 0 0 2 14.76c0 .866.338 1.68.95 2.293a3.248 3.248 0 0 0 4.586 0l1.757-1.758a1 1 0 1 1 1.414 1.414L8.95 18.467A5.236 5.236 0 0 1 5.243 20z"></path>
                                </svg>
                            </button> -->
                            <button class="secondary post-btn" wire:click.prevent="ordercommentpost">Post</button>
                        </div>
                    </div>
                    <p class="ta-right pt-8 pb-8">Only you and other staff can see comments</p>
                    <div class="order-tracking-details">
                        <div class="order-tracking-list">
                            <div class="order-msg-date">
                               25 MAY
                            </div>
                            @if($commentget)
                             @foreach($commentget as $key => $value)
                             
                              <?php $dateshow = date("dS M Y", strtotime($key)); ?>

                               <div class="order-msg-date">
                                  <?php echo $dateshow; ?>
                               </div>
                              @foreach($value as  $row)  
                               <div class="order-tracking-msg">

                                  <span>{{$row['message']}}</span>

                                  <span class="order-msg-time"><?php echo date("h:i", strtotime($row['updated_at'])); ?></span>

                               </div>
                              @endforeach
                             @endforeach
                           @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns one-third right-details">
               <!--  <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="fs-16  fw-6 mb-0">Notes</h4><button class="link" onclick="document.getElementById('add-note-modal').style.display='block'">Edit</button>
                        </div>
                        <p class="mb-0">No notes from customer</p>
                    </div>
                </div> -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <label>Reason</label>
                            <select wire:model="order.paymentstatus">
                                <option value="" disabled="">Select Option</option>
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="fulfilled">Fulfilled</option>
                            </select>
                        </div>
                        <div class="ta-right">
                            <button class="button green-btn ta-right" wire:click="OrderUpdate()">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card od-customer-card">
                    @if(!empty($order['user'][0]))
                    <div class="card-header">
                        <div class="header-title">
                            <h3 class="fs-16 fw-6 mb-0">Customer</h3>
                        </div>
                        <div class="custom-flex">
                        <p>@if($order['user']){{$order['user'][0]['first_name']}}@endif</p>
                        <p>9 orders</p>
                    </div>
                    </div>
                    @endif
                    <div class="card-middle">
                        <!-- <div class="header-title">
                            <h4 class="fs-12  fw-6 mb-0">CONTACT INFORMATION </h4>
                            <button class="link" onclick="document.getElementById('edit-contact-informatio-modal').style.display='block'">Edit</button>
                        </div> -->
                        
                        @if(!empty($order['user'][0]))
                        <p><a href="#" onclick="document.getElementById('contact-customer-modal').style.display='block'">@if($order['user']){{$order['user'][0]['email']}}@endif</a> <a href="#"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M15 2a1 1 0 0 1 1 1v13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 4 16.5V3a1 1 0 1 1 2 0v1a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V3a1 1 0 0 1 1-1zm-4 2H9a1 1 0 1 1 0-2h2a1 1 0 1 1 0 2z"></path></svg></a></p>
                        @if($order['user'][0]['mobile_number'])
                        <p class="text-grey">{{$order['user'][0]['mobile_number']}}</p>
                        @else
                        <p class="text-grey">No phone number</p>
                        @endif
                        @endif
                    </div>
                    
                    <div class="card-middle">
                        <!-- <div class="header-title">
                            <h4 class="fs-12  fw-6 mb-0">SHIPPING ADDRESS</h4>
                            <button class="link" onclick="document.getElementById('add-address-modal').style.display='block'">Edit</button>
                        </div> -->
                        @if(!empty($order))

                        <p><span>{{$order->first_name}} <br> {{$order->company}} <br> {{$order->address}} <br> {{$order->city}}<br> {{$order->country}}<br> {{$order->pincode}}<br> {{$order->mobile}}</span> <a href="#"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M15 2a1 1 0 0 1 1 1v13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 4 16.5V3a1 1 0 1 1 2 0v1a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V3a1 1 0 0 1 1-1zm-4 2H9a1 1 0 1 1 0-2h2a1 1 0 1 1 0 2z"></path></svg></a></p>
                        @endif
                    </div>
                    
                   <!--  <div class="card-footer">
                        <div class="header-title">
                            <h4 class="fs-12  fw-6 mb-0">BILLING ADDRESS</h4>
                        </div>
                        <p><span>{{$order->b_first_name}} <br> {{$order->b_company}} <br> {{$order->b_address}} <br> {{$order->b_city}}<br> {{$order->b_country}}<br> {{$order->b_pincode}}<br> {{$order->b_mobile}}</span> <a href="#"></a></p>
                    </div> -->
                </div>
               <!--  <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="fs-16  fw-6 mb-0">Conversion summary</h4>
                        </div>
                        <span class="mb-0">There aren‘t any conversion details available for this order. <a href="#" class="link-whit-arrow"> Learn more <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></span>
                    </div>
                </div>
                <div class="card tag-card fraud-analysis-card">
                    <div class="card-header">
                        <div class="header-title">
                            <h3 class="fs-16  fw-6 mb-0">Fraud analysis</h3>
                        </div>
                        <ul>
                            <li>The payment method used isn't available</li>
                            <li>There was 1 payment attempt</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <button class="link sales-channel-btn" onclick="document.getElementById('fraud-analysis-modal').style.display='block'">View full analysis <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10 14a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 1 1 1.414-1.414L10 11.586l4.293-4.293a.999.999 0 1 1 1.414 1.414l-5 5A.997.997 0 0 1 10 14z"></path></svg></button>
                    </div>
                </div>
                <div class="card pd-20 tag-card card-grey-bg">
                    <div class="header-title">
                        <h3 class="fs-16  fw-6 mb-0">Tags</h3>
                        <button class="link" data-toggle="modal" data-target="#view-all-tags" id="update-all-tags">View all tags</button>
                    </div>
                    <input list="tagss" type="text" placeholder="VIP, sale, shopper, etc.">
                    <datalist id="tagss">
                        <option class="tag_added" value="News">
                        </option>
                    </datalist>
                </div> -->
            </div>
        </article>
    </section>
</x-admin-layout>
</div>
<!--Change location modal-->
<div id="change-location-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <input type="hidden">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Change location</h2>
                <span onclick="document.getElementById('change-location-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body ta-left">
                <div class="row">
                    <input type="search" placeholder="Search location">
                </div>
                <div class="row">
                    <label class="pt-8 pb-8 row-m-0"><input type="radio" name="option3a">Armada</label>
                </div>
                <div class="row">
                    <label class="pt-8 pb-8 row-m-0"><input type="radio" name="option3a" disabled="disabled">H-28, Sector 63</label> 
                    <span class="tag grey">Current location</span>
                </div>
                <div class="row">
                    <label>Reason for change (Optional)</label>
                    <input type="text">
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button secondary" disabled="disabled">Save</button>
            </div>
        </div>
    </div>
</div>

<!--Hold fulfillment modal-->
<div id="hold-fulfillment-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <input type="hidden">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Hold fulfillment</h2>
                <span onclick="document.getElementById('hold-fulfillment-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body ta-left">
                <p>Select the reason for holding this fulfillment so you can see what needs to change before it's ready to fulfill.</p>
                <div class="row">
                    <label>Reason</label>
                    <select>
                        <option value="" disabled="">Select a reason</option>
                        <option value="INVENTORY_OUT_OF_STOCK">Inventory out of stock</option>
                        <option value="INCORRECT_ADDRESS">Address incorrect</option>
                        <option value="HIGH_RISK_OF_FRAUD">High risk of fraud</option>
                        <option value="AWAITING_PAYMENT">Awaiting payment</option>
                        <option value="OTHER">Other</option>
                    </select>
                    <p>Only you and your staff can see this reason.</p>
                </div>
            </div>
            <div class="modal-footer">
                <div class="button-col">
                    <p>Learn more about <a href="#">holding fulfillments <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                </div>
                <div class="button-col">
                    <button class="button secondary">Cancel</button>
                    <button class="button secondary" disabled="disabled">Hold fulfillment</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Hold fulfillment modal-->
<div id="add-note-modal" class="customer-modal-main" wire:ignore>
    <div class="customer-modal-inner">
        <input type="hidden">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Add note</h2>
                <span onclick="document.getElementById('add-note-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body ta-left">
                <div class="row row-m-0 ">
                    <label>Notes</label>
                    <input type="text">
                </div>
                <div class="modal-footer-link">
                    <p>To comment on an order or mention a staff member, use <a href="#">Timeline <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a> instead.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button secondary" disabled="disabled">Save</button>
            </div>
        </div>
    </div>
</div>

<!--Edit contact information modal-->
<div id="edit-contact-informatio-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <input type="hidden">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Edit contact information</h2>
                <span onclick="document.getElementById('edit-contact-informatio-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body ta-left">
                <div class="row">
                    <label>Email</label>
                    <input type="email" value="johndoe@webkul.com">
                </div>
                <div class="row">
                    <label>Phone number</label>
                    <input type="tel">
                </div>
                <div class="row">
                    <label class="row-m-0"><input type="checkbox" name="option2a" checked="checked">Update customer profile</label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button secondary" disabled="disabled">Save</button>
            </div>
        </div>
    </div>
</div>

<!--Customer overview Modal-->
<div id="contact-customer-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Contact customer</h2>
                <span onclick="document.getElementById('contact-customer-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-field-list">
                            <label>To</label>
                            <input type="text" value="johndoe@webkul.com">
                        </div>
                        <div class="form-field-list">
                            <label>From</label>
                            <select>
                                <option>"delivery-boy-demo" <shopifydev@webkul.com></option>
                                <option>""Demetrio Rodriguez" <drodriguez@humanetcorp.com></option>
                                <option>""Demo EStore" <test@webkul.com></option>
                                <option>"Jameelll Ahmaddd" <jameel.ahmad479@webkul.com></option>
                                <option>"khushbu sharma" <khushbusharma.tester719@webkul.com></option>
                                <option>"Prashant mishra" <prashantmishra.tester139@webkul.com></option>
                                <option>"Rishabh Sharma" <rishabh.sharma987@webkul.com></option>
                                <option>"sunil-shop3 Admin" <sunilpandey.tester820@webkul.com></option>
                            </select>
                        </div>
                    </div>
                    <div class="row contact-customer-checkbox">
                        <div class="form-field-list">
                            <label>Send bcc to:</label>
                            <label><input type="checkbox" name="option2a">test@webkul.com</label>
                            <label><input type="checkbox" name="option2a">shopifydev@webkul.com</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list">
                            <label>Subject</label>
                            <input type="text" value="Message from shop.name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list">
                            <label>Custom message (optional)</label>
                            <textarea></textarea>
                        </div>
                    </div>
                    <p>
                        This template can be edited in 
                        <a href="#">
                            notifications 
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path>
                            </svg>
                        </a>
                    </p>
                </form>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button green-btn">Review Email</button>
            </div>
        </div>
    </div>
</div>

<!--Edit shipping address modal-->
<div id="add-address-modal" class="customer-modal-main edit-shipping-address">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Edit shipping address</h2>
                <span onclick="document.getElementById('add-address-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row select-addres-dropdown">
                        <div class="form-field-list">
                            <button class="secondary">Select another address <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m5 8 5 5 5-5H5z"></path></svg></button>
                            <ul class="filter-dropdown">
                                <li>John Doe Mystery Rooms 201306 Noida UP India</li>
                                <li>John Doe trs  12345 sdf Åland Islands</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list">
                            <label>First Name</label>
                            <input type="text" value="John">
                        </div>
                        <div class="form-field-list">
                            <label>Last Name</label>
                            <input type="text" value="Doe">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list">
                            <label>Company</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list">
                            <label>Address</label>
                            <input type="text" value="Mystery Rooms">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list">
                            <label>Apartment, suite, etc.</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list">
                            <label>City</label>
                            <input type="text" value="Noida">
                        </div>
                    </div>
                    <div class="row three-column-row">
                        <div class="form-field-list">
                            <label>Country/region</label>
                            <select>
                                <option>india</option>
                                <option>USA</option>
                                <option>AUS</option>
                            </select>
                        </div>
                        <div class="form-field-list">
                            <label>State</label>
                            <select>
                                <option>Gujarat</option>
                                <option>Odisha</option>
                                <option>Ladakh</option>
                            </select>
                        </div>
                        <div class="form-field-list">
                            <label>PIN code</label>
                            <input type="text" value="201306">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-list">
                            <label>Phone</label>
                            <div class="cd-phone-field">
                                <input class="rounded-md shadow-sm block mt-1 w-full" id="customer_mobile_number" type="text" name="customer_mobile_number" autofocus="autofocus" autocomplete="customer.mobile_number" wire:model="customer.mobile_number" value="+91 1234 567 891">
                                <select wire:model="customer_phone_code" name="customer_phone_code" class="country-drop" id="customer_phone_code" :value="old('customer_phone_code')" wire:change="appendMobile('customer_phone_code')">
                                    <option></option>
                                    <option>+91</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button green-btn">Save</button>
            </div>
        </div>
    </div>
</div>
<!--/Edit address modal-->

<!--Fraud analysis modal-->
<div id="fraud-analysis-modal" class="customer-modal-main edit-shipping-address">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Fraud analysis</h2>
                <span onclick="document.getElementById('fraud-analysis-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body ta-left">
                <div class="modal-body-row"></div>
                <div class="modal-body-row">
                    <h3 class="fs-16 fw-6 mb-0">Indicators</h3>
                    <ul>
                        <li><span class="circle grey-circle"></span>The payment method used isn't available</li>
                        <li><span class="circle green-circle"></span>There was 1 payment attempt</li>
                    </ul>
                </div>
                <div class="modal-body-row">
                    <h3 class="fs-16 fw-6 mb-0">Additional information</h3>
                    <ul>
                        <li><span class="circle green-circle"></span>The IP address used to place this order isn’t available</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <div class="button-col">
                    <p>Learn more about our improved <a href="#">fraud analysis <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a>, or how you can <a href="#">prevent fraud <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Fraud analysis modal-->

<!--View all tags modal-->
<div id="view-all-tags" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Tags</h2>
                <span onclick="document.getElementById('view-all-tags').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <div class="applied-tags tags-section">
                    <h4>APPLIED TAGS</h4>
                    <span class="">Select previously used tags from the list below to add them to this order.</span>
                </div>
                <div class="all-tags tags-section">
                    <div class="all-tags-title">
                        <h4>ALL TAGS</h4>
                        <div class="short-tags">
                            <span>Sort:</span>
                            <span class="button-group">
                            <button class="secondary short-tags-btn">Alphabetical</button>
                            <button class="secondary short-tags-btn">Most recent</button>
                            </span>
                        </div>
                    </div>
                    <!--<div class="select-tag-list">-->
                    <!--    <button class="secondary">new</button>-->
                    <!--    <button class="secondary">newsletter</button>-->
                    <!--</div>-->
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button disabled">Save</button>
            </div>
        </div>
    </div>
</div>
<!--/View all tags modal-->

<!--Unable to edit order modal-->
<div id="unable-to-edit-order-modal" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Unable to edit order</h2>
                <span onclick="document.getElementById('unable-to-edit-order-modal').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <p>Orders can’t be edited after 60 days.<a href="#">Learn more <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></p>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Close</button>
            </div>
        </div>
    </div>
</div>
<!--/Unable to edit order modal-->



<script>
    $(document).ready(function(){
        $(".three-dots-btn").click(function(){
            $(".unfulfilled-dropdown").toggle();
        });
         $(".select-addres-dropdown button").click(function(){
            $(".select-addres-dropdown .filter-dropdown").toggle();
        });
        $('.short-tags-btn').on('click', function(){
            $('.short-tags-btn.tags-short-active').removeClass('tags-short-active');
            $(this).addClass('tags-short-active');
        });
    });
</script>