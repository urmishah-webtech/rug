<div>
   <div class="loading-overlay" wire:loading.flex wire:target="resetInputFields,update,EditAddress,delete, store">

      <div class="page-loading"></div>

   </div>

   {{-- The Master doesn't talk, he acts. --}}



   <x-admin-layout>

@php $symbol = CurrencySymbol(); @endphp


      <div wire:key="alert" :id="1">



         @if (session()->has('message'))



         <div class="alert alert-success">



            {{ session('message') }}



         </div>



         @endif



      </div>



      <div wire:key="main">



          



         <section class="full-width flex-wrap admin-body-width add-customer-head-sec" wire:key="1">



            <article class="full-width">



             



               <div class="columns customers-details-heading">



                  <div class="page_header d-flex  align-item-center mb-3">



                     <a href="{{ route('customers') }}">



                        <button class="secondary icon-arrow-left mr-2">



                           <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                              <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>



                           </svg>



                        </button>



                     </a>



                     <h4 class="mb-0 fw-5">Customer Detail Page</h4>



                  </div>



                  <div class="pagination">



                     <span class="button-group">



                     <button class="secondary icon-prev"></button>



                     <button class="secondary icon-next"></button>



                     </span>



                  </div>



               </div>



            </article>



         </section>



         <section class="full-width flex-wrap admin-body-width customers-details-sec" wire:key="2">



            <article class="full-width">



               <div class="columns two-thirds">



                  <div class="details-first-card">



                     <div class="card">



                        <div class="card-top">



                           <h4 class="fs-16 fw-6 mb-0">{{$customer['first_name'].' '.$customer['last_name']}}</h4>



                           <p class="addres">



                              {{$customer['uuid']}}



                              @if(!empty($customer['address']))



                              <br>



                              {{$customer['address'][0]['city']}}&nbsp;{{$customer['address'][0]['country']}}



                              @endif



                           </p>



                           <div class="row add-note-textarea mb-0">



                                 <label>Customer Note<button style="float:right;" class="link" data-toggle="modal" data-target="#manage-note-modal" >Manage</button></label>



                                 <textarea disabled wire:model="customerData.detail.note" wire:ignore ></textarea>



                                 <!-- <button class="button save-note" disabled wire:click.prevent="update('customer-note')">Submit</button> -->



                           </div>



                        </div>


                         @if($order)
                        <div class="order-details">



                           <div class="columns four">



                             <a href="{{route('order-detail', $order->id)}}"> <button class="link">Last Order</button></a>



                              <?php



                                 function date_duration($date){

                                     $date1 = new DateTime($date);

                                     $date2 = new DateTime();

                                     $interval = $date1->diff($date2);

                                     if($interval->y > 0 and $interval->y < 2){

                                         return $interval->y.' year ago';

                                     }else if($interval->y > 1){

                                         return $interval->y.' years ago';

                                     }else if($interval->m > 0 and $interval->m < 2){

                                         return $interval->m.' month ago';

                                     }else if($interval->m > 1){

                                         return $interval->m.' months ago';

                                     }else if($interval->d > 1){

                                         return $interval->d.' days ago';

                                     }else{

                                         if($interval->h > 0 and $interval->h < 2){

                                             return $interval->h.' hour ago';

                                         }else if($interval->h > 1){

                                             return $interval->h.' hours ago';

                                         }else{

                                             if($interval->i > 0 and $interval->i < 60){

                                                 return $interval->i.' minute ago';

                                             }else if($interval->i > 1){

                                                 return $interval->i.' minutes ago';

                                             }else{

                                                 return 'Just now';

                                             }

                                         }

                                     }

                                 }



                                 

                              ?>
                              <h4 class="fs-16 fw-6 mb-0"><?php echo date_duration($order['updated_at']) ?></h4>



                             <!--  <p>From Draft Orders</p> -->



                           </div>
                            @if($OrderItemstock)
                           <?php $Stock_sum = 1; ?>
                              @foreach($OrderItemstock as $item)
                              @if($item->order_id == $order->id)
                              <?php $TotalStock  = $Stock_sum++; ?>
                              @endif
                              @endforeach
                              <?php 
                               $gst = $Taxes->rate;
                               $netamount = $order->netamout;

                               $avrageTotal = $netamount/$TotalStock;
                           ?>

                           <div class="columns four">



                              <p>Total spent to date</p>



                              <h4 class="fs-16 fw-6 mb-0">{{$symbol['currency']}}{{number_format($netamount,2,'.',',')}}</h4>



                              <p>{{$TotalStock}} orders</p>



                           </div>



                           <div class="columns four">



                              <p>Average order value</p>



                              <h4 class="fs-16 fw-6 mb-0">{{$symbol['currency']}}{{number_format($avrageTotal,2,'.',',')}}</h4>



                           </div>


                        </div>
                      @endif
                     @endif


                     </div>



                  </div>


                  @if($order)
                  <div class="details-first-card last-order-placed">



                     <div class="card">



                        <div class="card-top">



                           <h4 class="fs-16 fw-6 mb-0">Last order placed</h4>



                           <div class="order-placed-details">



                              <p>



                                <a href="{{route('order-detail', $order->id)}}"> <button class="link">Order #<?php echo $order['id']; ?></button> </a>



                                 <span class="tag yellow"><span class="round"></span>Unfulfilled</span>


                              </p>



                              <p class="order-date-time">@if($order){{$order->updated_at}}@endif</p>



                           </div>

                           @php $priceres = allprice($order_item['order_product'][0]['id']) @endphp

                           <p class="mb-0">${{number_format($priceres['price'],2,'.',',')}} from Draft Orders</p>



                           <p class="order-placed-img"><img src="{{ asset('storage/'.$order_item['media_product'][0]['image']) }}">{{$order_item['order_product'][0]['title']}}</p>



                        </div>



                        <div class="order-details">



                           <div class="order-placed-btn">



                              <a href="{{route('order-list')}}"><button class="link">View all orders</button></a>



                             <!--  <button class="button green-btn">Create order</button> -->



                           </div>



                        </div>



                     </div>



                  </div>

                  @endif

                  <div class="timeline-sec">



                     <h3 class="fs-16 fw-6 mb-0">Timeline</h3>



                     <label><input type="checkbox" name="option2a" checked="checked">Show comments</label>



                  </div>



                  <div class="order-tracking">



                     <div class="row add-note-textarea comment-box mb-0" id="customadd-note-textarea" wire:ignore>

                        <textarea class="customcomment-textarea" wire:model='messagetext' onkeyup="if(this.value.length > 0) document.getElementById('start_button').disabled = false; else document.getElementById('start_button').disabled = true;" placeholder="Leave a comment..."></textarea>

                       <!--  @if($errors->has('messagetext'))
                            <span class="text-danger">{{ $errors->first('messagetext') }}</span>
                        @endif -->

                        <div class="comment-button customcomment-button">



                           <button class="secondary">



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

                             <input type='file' wire:model="social_img" onkeyup="if(this.value.length > 0) document.getElementById('start_button').disabled = false; else document.getElementById('start_button').disabled = true;" id="social_img">

                              <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                                 <path d="M5.243 20a5.228 5.228 0 0 1-3.707-1.533A5.213 5.213 0 0 1 0 14.759c0-1.402.546-2.719 1.536-3.708l9.515-9.519a5.25 5.25 0 0 1 8.553 1.7A5.21 5.21 0 0 1 20 5.24a5.208 5.208 0 0 1-1.535 3.708l-4.258 4.26a3.124 3.124 0 0 1-5.092-1.012A3.098 3.098 0 0 1 8.879 11c0-.835.324-1.619.914-2.208l4.5-4.501a1 1 0 1 1 1.414 1.414l-4.5 4.501a1.112 1.112 0 0 0-.328.794A1.114 1.114 0 0 0 12 12.12c.297 0 .582-.118.793-.327l4.258-4.26A3.223 3.223 0 0 0 18 5.24c0-.866-.337-1.681-.949-2.293a3.248 3.248 0 0 0-4.586 0L2.95 12.465A3.224 3.224 0 0 0 2 14.76c0 .866.338 1.68.95 2.293a3.248 3.248 0 0 0 4.586 0l1.757-1.758a1 1 0 1 1 1.414 1.414L8.95 18.467A5.236 5.236 0 0 1 5.243 20z"></path>



                              </svg>



                           </button>

                           <button class="button green-btn postbuttone" id="start_button" disabled wire:click.prevent="customercommentpost">Post</button>



                        </div>



                        <p>Only you and other staff can see comments</p>



                     </div>



                     <div class="order-tracking-details">


                        <div class="order-tracking-list">

                           @if($commentget)
                             @foreach($commentget as $key => $value)
                             
                              <?php $dateshow = date("dS M Y", strtotime($key)); ?>

                               <div class="order-msg-date">
                                  <?php echo $dateshow; ?>
                               </div>
                              @foreach($value as  $row)  
                               <div class="order-tracking-msg">
                                  @if($row['message'])
                                  <span>{{$row['message']}}</span>
                                  @endif
                                  
                                  @if($row['image'])
                                  <img src="{{ asset('storage/'.$row['image']) }}" width="50px" height="50px">
                                  @endif
                                  <span class="order-msg-time"><?php echo date("g:i a", strtotime($row['updated_at'])); ?></span>

                               </div>
                              @endforeach
                             @endforeach
                           @endif

                        </div>



                     </div>



                  </div>



               </div>



               <div class="columns one-third right-details">



                  <div class="card">



                     <div class="card-header">



                        <div class="header-title">



                           <h3 class="fs-16 fw-6 mb-0">Customer overview</h3>



                           <button class="link" data-toggle="modal" data-target="#customer-overview-modal" >Edit</button>



                        </div>



                        <p class="mb-0">



                        <p>{{$customer['first_name'].' '.$customer['last_name']}}</p>



                        <button class="link">{{$customer['email']}}</button>


                       @if($customer['mobile_number'])<p>{{$customer['mobile_number']}}</p> @endif

                        <button class="link">


                           <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                              <path d="M15 2a1 1 0 0 1 1 1v13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 4 16.5V3a1 1 0 1 1 2 0v1a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V3a1 1 0 0 1 1-1zm-4 2H9a1 1 0 1 1 0-2h2a1 1 0 1 1 0 2z"></path>



                           </svg>



                        </button>



                        </p>



                     </div>



                     <div class="card-middle">

                        <div class="header-title">

                           <h4 class="fs-12  fw-6 mb-0">BILLING DEFAULT ADDRESS </h4>

                           <button class="link" data-toggle="modal" data-target="#manage-address-modal">Manage</button>

                        </div>

                        @if(!empty($customerData['address']))

                           @foreach($customerData['address'] as $row)

                           @if($row['address_type'] == 'billing_address' && $row['is_billing_address'] == 'yes')

                           <p>
                             <label>Address:</label>
                             <span>@if(!empty($row['apartment'])) {{$row['apartment']}}, @endif @if(!empty($row['company'])) {{$row['company']}}, @endif {{$row['address']}}, {{$row['postal_code']}}, {{$row['city']}}, {{$row['country']}}. </span>
                           </p>
                           <p>
                             <label>Phone:</label>

                             <span>{{$row['mobile_no']}}</span>
                           </p>
                          

                           @endif

                           @endforeach

                        @endif

                        <button class="link" data-toggle="modal" data-target="#add-address-modal">Add different billing address</button>

                     </div>


                     <div class="card-middle">

                        <div class="header-title">

                           <h4 class="fs-12  fw-6 mb-0">SHIPPING DEFAULT ADDRESS </h4>

                           <button class="link" data-toggle="modal" data-target="#manage-shipping-address-modal">Manage</button>

                        </div>

                        @if(!empty($customerData['address']))

                           @foreach($customerData['address'] as $row)

                           @if($row['address_type'] == 'shipping_address' && $row['is_billing_address'] == 'yes')

                           <p>
                             <label>Address:</label>
                             <span>@if(!empty($row['apartment'])) {{$row['apartment']}}, @endif @if(!empty($row['company'])) {{$row['company']}}, @endif {{$row['address']}}, {{$row['postal_code']}}, {{$row['city']}}, {{$row['country']}}. </span>
                           </p>
                           <p>
                             <label>Phone:</label>

                             <span>{{$row['mobile_no']}}</span>
                           </p>

                           @endif

                           @endforeach

                        @endif

                        <button class="link" data-toggle="modal" data-target="#add-shipping-address-modal">Add different shipping address</button>

                     </div>

                     <!-- <div class="card-footer">



                        <div class="header-title">



                           <h4 class="fs-12  fw-6 mb-0">TAX SETTINGS</h4>



                           <button class="link" data-toggle="modal" data-target="#edit-tax-exemption" >Manage</button>



                        </div>



                        @if(isset($customerData['detail']['collect_tax']))



                        <p>No exemptions</p>



                        @else



                        <p>Taxes are not collected</p>



                        @endif



                     </div> -->



                  </div>



                  <div class="card email-marketing-card pd-20">



                     <div class="header-title">



                        <h4 class="fs-16  fw-6 mb-0">Email Marketing</h4>



                        <button class="link" data-toggle="modal" data-target="#edit-email-marketing-status">Edit status</button>



                     </div>



                     @if(!empty($customerData['detail']) && $customerData['detail']['agreed_to_receive_marketing_mails'] == 'no')



                     <span class="tag grey">subscribed</span>



                     @else



                     <span class="tag grey">Not subscribed</span>



                     @endif



                  </div>



                  <div class="card pd-20 tag-card card-grey-bg">



                     <div class="header-title">



                        <h3 class="fs-16  fw-6 mb-0">Tags</h3>



                        <button class="link"  data-toggle="modal" data-target="#view-all-tags" id="update-all-tags">View all tags</button>



                     </div>



                     <!-- <input type="text" wire:model="customerData.detail.tags" placeholder="VIP, sale, shopper, etc." disabled="disabled"> -->



                     <input list="tagss" onkeyup="enableTagSaveBtn(this.value)" type="text" placeholder="VIP, sale, shopper, etc.">



                  

                     <datalist id="tagss">

                        @if(!empty($tags))



                        @foreach($tags as $tag)



                             <option class="tag_added" value="{{$tag->label}}">



                         @endforeach

                         @endif



                        </datalist>



                     <button class="button green-btn" id="tag-creation-btn" data-dismiss="modal" value="" style="display:none;" wire:click.prevent="update('tag-change', $event.target.value)">Save</button><br><br>
                     @if(!empty($customerData['detail']) && !empty($customerData['detail']['tags']))
                     <?php $customerTags = explode(',', $customerData['detail']['tags']); ?>
                        <div class="customer-detail-select-tags">
                        @foreach($customerTags as $detail_tag)
                        <span class="tag grey fs-13">
                           {{$detail_tag}}
                           <button type="button"  wire:click="update('remove-tag', '{{$detail_tag}}')">



                              <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="m11.414 10 4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z"></path>



                              </svg>



                           </button> 



                        </span>



                        @endforeach



                     </div>



                     @endif



                  </div>


<!-- 
                  <div class="card privacy-card card-grey-bg">



                     <div class="privacy-card-sec pd-20">



                        <h3 class="fs-16  fw-6">Customer privacy</h3>



                        <h4 class="fs-12  fw-6 mb-0">TAX SETTINGS</h4>



                        <p>Get a copy of this customer's data by email so you can forward it to them.<a href="#"> Learn more about requesting customer data.</a></p>



                        <button class="fw-5 secondary">Request customer data</button>



                     </div>



                     <div class="privacy-card-sec pd-20">



                        <h4 class="fs-12  fw-6 mb-0">ERASE PERSONAL DATA</h4>



                        <p>Ask Shopify to remove this customer's personal information from your store.<a href="#">Learn about the process of erasure requests.</a></p>



                        <button class="fw-5 secondary" data-toggle="modal" data-target="#erase-personal-data">Erase personal data</button>



                     </div>



                  </div> -->



               </div>



            </article>



         </section>



         <section class="full-width flex-wrap admin-body-width">



              <div class="page-bottom-btn">



                  <p class="mb-0 d-flex">



                      <a class="warning" data-toggle="modal" data-target="#delete-variant-product">Delete customer</a>

                  </p>



              </div>

              

         </section>





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



                  <div class="modal-footer" >



                     <div class="button-col">



                        <button class="button secondary" data-dismiss="modal">Cancel</button>



                        <button class="button" data-dismiss="modal"  wire:click.prevent="deletecustomer">Yes, Delete</button>



                     </div>



                  </div>



               </div>



            </div>



         </div>



         <div wire:ignore.self id="customer-overview-modal" class="customer-modal-main" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">



            <div class="customer-modal-inner">



               <div class="customer-modal">



                  <div class="modal-header">



                     <h2>Edit customer</h2>



                     <span data-dismiss="modal" class="modal-close-btn">



                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>



                        </svg>



                     </span>



                  </div>



                  <div class="modal-body">



                     <form>



                        @csrf



                        <input type="hidden" name="id" wire:key="customerData.id"/>



                        <div class="row">



                           <div class="form-field-list">



                              <label>First Name</label>



                              <input type="text" name="first_name" wire:model.lazy="customerData.first_name" wire:ignore.self>



                           </div>



                           <div class="form-field-list">



                              <label>Last Name</label>



                              <input type="text" name="last_name" wire:model.lazy="customerData.last_name" wire:ignore.self>



                           </div>



                        </div>



                        <div class="row">



                           <div class="form-field-list">



                              <label>Email</label>



                              <input type="email" name="email" wire:model.lazy="customerData.email">



                           </div>



                        </div>



                       



                        <div class="row">







                           <div class="form-field-list">



                              <label>Phone number</label>



                              <div class="cd-phone-field">


                                 <input class="rounded-md shadow-sm block mt-1 w-full"  id="customer_mobile_number" type="text" name="customer_mobile_number" autofocus="autofocus" autocomplete="customerData.mobile_number" name="mobile_number" wire:model.lazy="customerData.mobile_number">







                                 <select name="customer_phone_code" class="country-drop" id="customer_phone_code">



                                    @foreach($countries as $country)



                                    <option value="{{$country->phone_code}}">{{$country->name}}



                                       ({{$country->phone_code}})



                                    </option>



                                    @endforeach



                                 </select>







                              </div>



                           </div>



                        </div>



                     </form>



                  </div>



                  <div class="modal-footer">



                     <button class="button secondary" data-dismiss="modal" wire:click="resetInputFields()">Cancel</button>



                     <button class="button green-btn email-change-btn" data-dismiss="modal" value=""   wire:click.prevent="update('email-change', $event.target.value)">Save</button>



                  </div>



               </div>



            </div>



         </div>



         <div wire:ignore.self id="manage-address-modal" class="customer-modal-main">



            <div class="customer-modal-inner">



               <div class="customer-modal">



                  <div class="modal-header">



                     <h2>Manage Billing addresses</h2>



                     <span data-dismiss="modal" class="modal-close-btn">



                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>



                        </svg>



                     </span>



                  </div>



                  <div class="modal-body">

                     @foreach($customerData['address'] as $address)



                     <div class="manage-address-list">


                        @if($address['address_type'] == 'billing_address')<h5>DEFAULT BILLING ADDRESS</h5>



                        <p>{{$address['address']}}</p>



                        <p>{{$address['apartment']}}</p>



                        <p>{{$address['postal_code']}}&nbsp;{{$address['city']}}</p>



                        <p>{{$address['country']}}</p>



                        <div class="manage-add-btn">



                           <button class="link" data-toggle="modal" data-dismiss="modal" data-target="#edit-address-modal" wire:click="EditAddress({{ $address['id'] }})">Edit address</button>



                           <!-- <button class="button secondary">Make default</button> -->



                        </div>


                        @else
                        <p>No Record Avilable</p>
                        @endif

                     </div>

                     @endforeach

                  </div>



               </div>



            </div>



         </div>

         <div wire:ignore.self id="manage-shipping-address-modal" class="customer-modal-main">



            <div class="customer-modal-inner">



               <div class="customer-modal">



                  <div class="modal-header">



                     <h2>Manage Shipping addresses</h2>



                     <span data-dismiss="modal" class="modal-close-btn">



                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>



                        </svg>



                     </span>



                  </div>



                  <div class="modal-body">



                  @foreach($customerData['address'] as $address)

                     @if($address['address_type'] == 'shipping_address')
                     <div class="manage-address-list">

                        <h5>DEFAULT SHIPPING ADDRESS</h5>



                        <p>{{$address['address']}}</p>



                        <p>{{$address['apartment']}}</p>



                        <p>{{$address['postal_code']}}&nbsp;{{$address['city']}}</p>



                        <p>{{$address['country']}}</p>



                        <div class="manage-add-btn">



                           <button class="link" data-toggle="modal" data-dismiss="modal" data-target="#edit-address-modal" wire:click="EditShippingAddress({{ $address['id'] }})">Edit address</button>



                           <!-- <button class="button secondary">Make default</button> -->



                        </div>

                     </div>

                     @endif

                     @endforeach



                  </div>



               </div>



            </div>



         </div>



         <div wire:ignore id="manage-note-modal" class="customer-modal-main">



            <div class="customer-modal-inner">



               <div class="customer-modal">



                  <div class="modal-header">



                     <h2>Manage Customer Note</h2>



                     <span data-dismiss="modal" class="modal-close-btn" wire:click="resetInputFields()">



                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>



                        </svg>



                     </span>



                  </div>



                  <div class="modal-body">
                    <input type="hidden" name="id" wire:key="customerData.id"/>
                    <div class="row">
                       <div class="form-field-list">
                          <textarea  wire:model="customerData.detail.note"  placeholder="Add a note" onkeydown="enableSaveBtn('save-note-btn')"></textarea>
                       </div>
                    </div>
                  </div>



                   <div class="modal-footer">



                     <button class="button secondary" wire:click="resetInputFields()" data-dismiss="modal">Cancel</button>



                     <button class="button save-note-btn" disabled wire:click.prevent="update('customer-note')" data-dismiss="modal">Save</button>



                  </div>



               </div>



            </div>



         </div>



         <!-- Modal -->



         <div wire:ignore id="delete-address"  class="customer-modal-main" style="z-index: 999999;">



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



                        <button class="button secondary" data-dismiss="modal">Cancel</button>



                        <button class="button" data-dismiss="modal" data-toggle="modal" onclick="document.getElementById('edit-address-modal').style.display = 'none'"  wire:click.prevent="delete()">Yes, Delete</button>



                     </div>



                  </div>



               </div>



            </div>



         </div>





         <div wire:ignore.self id="edit-address-modal" class="customer-modal-main">

            <div class="customer-modal-inner">

               <div class="customer-modal">

                  <div class="modal-header">

                     <h2>Edit address</h2>

                     <span data-dismiss="modal" class="modal-close-btn">

                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">

                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>

                        </svg>

                     </span>

                  </div>
                  <div class="modal-body">

                     <form>

                        @csrf

                        <input type="hidden" wire:model="address_id">

                        <div class="row">

                           <div class="form-field-list">

                               <label>First Name</label>

                               <input type="text" wire:model="customerAddress.first_name">

                           </div>

                           <div class="form-field-list">

                               <label>Last Name</label>

                               <input type="text" wire:model="customerAddress.last_name">

                           </div>

                        </div>

                        <div class="row">

                           <div class="form-field-list">

                              <label>Company</label>

                              <input type="text" wire:model.lazy="customerAddress.company">

                           </div>

                        </div>

                        <div class="row">

                           <div class="form-field-list">

                              <label>Street Name</label>

                              <input type="text" name="address" wire:model.lazy="customerAddress.address">

                           </div>

                        </div>

                        <div class="row">

                           <div class="form-field-list">

                              <label>Unit Number</label>

                              <input type="text" name="apartment" wire:model.lazy="customerAddress.apartment">

                           </div>

                        </div>

                        <div class="row">

                           <div class="form-field-list">

                              <label>City</label>

                              <input type="text" name="city" wire:model.lazy="customerAddress.city">

                           </div>

                        </div>

                        <div class="row three-column-row">

                           <div class="form-field-list">

                              <label>Country/region</label>

                              <select name="country" wire:model.lazy="customerAddress.country">

                                 @foreach($countries as $country)

                                 <option value="{{$country->name}}">

                                    {{$country->name}}

                                 </option>

                                 @endforeach

                              </select>

                           </div>

                           <div class="form-field-list">

                              <label>Zip</label>

                              <input type="text" name="postal_code" wire:model.lazy="customerAddress.postal_code">

                           </div>

                        </div>

                        <div class="row">

                           <div class="form-field-list">

                               <label>Phone number</label>



                               <div class="cd-phone-field">



                                   <input class="rounded-md shadow-sm block mt-1 w-full displaycode" id="customer_mobile_number" type="" name="phone" wire:model="customerAddress.mobile_no">



                               </div>

                           </div>



                        </div>

                      
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" wire:ignore.self id="defaultAddress" wire:model="edit_billing_address" <?php if($customerAddress && $customerAddress['is_billing_address'] == 'yes') {echo "checked";} ?>>
                            <label class="form-check-label" for="defaultAddress">Make this my primary billing address</label>
                        </div>


                     </form>



                  </div>



                  <div class="modal-footer">



                     @if(!empty($customerAddress)&& !empty($customerAddress['address_type']) )



                     <div class="button-col">



                        <button class="button warning link" data-toggle="modal" data-target="#delete-address" >Delete address</button>



                     </div>



                     @endif



                     <div class="button-col">



                        <button class="button secondary" data-dismiss="modal" wire:click="resetInputFields()">Cancel</button>



                        <button class="button" data-dismiss="modal" data-toggle="modal" wire:click.prevent="update('Address-change-billing')">Save</button>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <div wire:ignore id="add-address-modal" class="customer-modal-main">

            <div class="customer-modal-inner">

               <div class="customer-modal">

                  <div class="modal-header">

                     <h2>Add new address</h2>

                     <span data-dismiss="modal" class="modal-close-btn">

                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">

                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>

                        </svg>

                     </span>

                  </div>

                  <div class="modal-body">

                     <form>

                        @csrf

                        <input type="hidden" wire:model="customer.id">

                        <div class="row">

                           <div class="form-field-list">



                           



                               <label>First Name</label>



                           



                               <input type="text" wire:model="customerBillingAddress.first_name">



                           



                           </div>



                           



                           <div class="form-field-list">



                           



                               <label>Last Name</label>



                           



                               <input type="text" wire:model="customerBillingAddress.last_name">



                           



                           </div>



                        </div>



                        <div class="row">



                           <div class="form-field-list">



                              <label>Company</label>



                              <input type="text" wire:model.lazy="customerBillingAddress.company">



                           </div>



                        </div>



                        <div class="row">



                           <div class="form-field-list">



                              <label>Street Name</label>



                              <input type="text" wire:model.lazy="customerBillingAddress.address">



                           </div>



                        </div>



                        <div class="row">



                           <div class="form-field-list">



                              <label>Unit Number</label>



                              <input type="text" wire:model.lazy="customerBillingAddress.apartment">



                           </div>



                        </div>



                        <div class="row">



                           <div class="form-field-list">



                              <label>City</label>



                              <input type="text" wire:model.lazy="customerBillingAddress.city">



                           </div>



                        </div>



                        <div class="row three-column-row">



                           <div class="form-field-list">



                              <label>Country/region</label>



                              <select wire:model.lazy="customerBillingAddress.country">



                                 @foreach($countries as $country)



                                 <option value="{{$country->name}}">{{$country->name}}</option>



                                 @endforeach



                              </select>



                           </div>



                           <div class="form-field-list">



                              <label>Zip</label>



                              <input type="text" wire:model.lazy="customerBillingAddress.postal_code">



                           </div>



                        </div>



                         <div class="row">



                           <div class="form-field-list">



                               <label>Phone number</label>



                               <div class="cd-phone-field">





                                   <input class="rounded-md shadow-sm block mt-1 w-full displaycode" id="customer_mobile_number" type="" name="phone" wire:model="customerBillingAddress.mobile_no">



                               </div>

                           </div>



                        </div> 

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" wire:ignore.self wire:model="address_type" id="defaultAddress">
                            <label class="form-check-label" for="defaultAddress">Make this my primary shipping address</label>
                        </div>



                     </form>



                  </div>



                  <div class="modal-footer">



                     <button class="modal-close-btn" data-dismiss="modal">Cancel</button>



                     <button class="button"  data-dismiss="modal" wire:click.prevent="store()">Save</button>



                  </div>



               </div>



            </div>



         </div>



         <div wire:ignore id="add-shipping-address-modal" class="customer-modal-main">

            <div class="customer-modal-inner">

               <div class="customer-modal">

                  <div class="modal-header">

                     <h2>Add new address</h2>

                     <span data-dismiss="modal" class="modal-close-btn">

                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">

                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>

                        </svg>

                     </span>

                  </div>

                  <div class="modal-body">

                     <form>

                        @csrf

                        <input type="hidden" wire:model="customer.id">

                        <div class="row">

                           <div class="form-field-list">



                           



                               <label>First Name</label>



                           



                               <input type="text" wire:model="customerBillingAddress.first_name">



                           



                           </div>



                           



                           <div class="form-field-list">



                           



                               <label>Last Name</label>



                           



                               <input type="text" wire:model="customerBillingAddress.last_name">



                           



                           </div>



                        </div>



                        <div class="row">



                           <div class="form-field-list">



                              <label>Company</label>



                              <input type="text" wire:model.lazy="customerBillingAddress.company">



                           </div>



                        </div>



                        <div class="row">



                           <div class="form-field-list">



                              <label>Street Name</label>



                              <input type="text" wire:model.lazy="customerBillingAddress.address">



                           </div>



                        </div>



                        <div class="row">



                           <div class="form-field-list">



                              <label>Unit Number</label>



                              <input type="text" wire:model.lazy="customerBillingAddress.apartment">



                           </div>



                        </div>



                        <div class="row">



                           <div class="form-field-list">



                              <label>City</label>



                              <input type="text" wire:model.lazy="customerBillingAddress.city">



                           </div>



                        </div>



                        <div class="row three-column-row">



                           <div class="form-field-list">



                              <label>Country/region</label>



                              <select wire:model.lazy="customerBillingAddress.country">



                                 @foreach($countries as $country)



                                 <option value="{{$country->name}}">{{$country->name}}</option>



                                 @endforeach



                              </select>



                           </div>



                           <div class="form-field-list">



                              <label>Zip</label>



                              <input type="text" wire:model.lazy="customerBillingAddress.postal_code">



                           </div>



                        </div>



                         <div class="row">



                           <div class="form-field-list">



                               <label>Phone number</label>



                               <div class="cd-phone-field">





                                   <input class="rounded-md shadow-sm block mt-1 w-full displaycode" id="customer_mobile_number" type="" name="phone" wire:model="customerBillingAddress.mobile_no">



                               </div>

                           </div>



                        </div> 

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" wire:ignore.self wire:model="shipping_address_type" id="defaultAddress">
                            <label class="form-check-label" for="defaultAddress">Make this my primary shipping address</label>
                        </div>



                     </form>



                  </div>



                  <div class="modal-footer">



                     <button class="modal-close-btn" data-dismiss="modal">Cancel</button>



                     <button class="button"  data-dismiss="modal" wire:click.prevent="storeshippping()">Save</button>



                  </div>



               </div>



            </div>



         </div>



         <div id="edit-tax-exemption" class="customer-modal-main"  wire:key="edit-tax-exemption" wire:ignore>



            <div class="customer-modal-inner">



               <div class="customer-modal">



                  <div class="modal-header">



                     <h2>Edit tax exemption</h2>



                     <span data-dismiss="modal" class="modal-close-btn">



                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>



                        </svg>



                     </span>



                  </div>



                  <div class="modal-body">



                     <label><input id="collectTax" name="CollectTax" type="checkbox" wire:model="customerData.detail.collect_tax"  >Collect tax</label>



                  </div>



                  <div class="modal-footer">



                     <button class="button secondary" wire:click="resetInputFields()">Cancel</button>



                     <button class="button" data-dismiss="modal" wire:click.prevent="$emit('update', 'collect_tax')">Save</button>



                  </div>



               </div>



            </div>



         </div>



         <!--Edit email marketing status-->



         <div id="edit-email-marketing-status" class="customer-modal-main" wire:key="edit-email-marketing-status" wire:ignore>



            <div class="customer-modal-inner">



               <div class="customer-modal">



                  <div class="modal-header">



                     <h2>Edit email marketing status</h2>



                     <span data-dismiss="modal" class="modal-close-btn">



                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>



                        </svg>



                     </span>



                  </div>



                  <div class="modal-body">



                     <div class="alert notice email-status-note">



                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                           <path fill-rule="evenodd" d="M10 20c5.514 0 10-4.486 10-10S15.514 0 10 0 0 4.486 0 10s4.486 10 10 10zm1-6a1 1 0 1 1-2 0v-4a1 1 0 1 1 2 0v4zm-1-9a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>



                        </svg>



                        <p>You should ask your customers for permission before you subscribe them to your marketing emails.</p>



                     </div>



                     <label class="checkbox-note"><input type="checkbox"  name="EditEmailMarketingStatus" wire:model="customerData.detail.agreed_to_receive_marketing_mails">Customer agreed to receive marketing emails.</label>



                  </div>



                  <div class="modal-footer">



                     <button class="button secondary" wire:click="resetInputFields()">Cancel</button>



                     <button class="button" data-dismiss="modal" wire:click.prevent="$emit('update', 'email_marketing_status')">Save</button>



                  </div>



               </div>



            </div>



         </div>



         <!--Edit email marketing status-->



         <!--View all tags modal-->



         <div  id="view-all-tags" class="customer-modal-main"  wire:ignore>



            <div class="customer-modal-inner">



               <input type="hidden" wire:model="customer.id">



               <div class="customer-modal">



                  <div class="modal-header">



                     <h2>Tags</h2>



                     <span data-dismiss="modal" class="modal-close-btn">



                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>



                        </svg>



                     </span>



                  </div>



                  <div class="modal-body">



                     <div class="applied-tags tags-section">



                        <h4>APPLIED TAGS</h4>



                           <div class="customer-detail-select-tags">                  



                              <span class="selected_tags"></span>



                             <!--  <input  id="customer_detail_tags"  class="block mt-1 w-full" type="text" value=""style="width: fit-content;" autofocus /> -->



                              <input  id="tags" wire:model="customerData.detail.tags" class="block mt-1 w-full" type="hidden" style="width: fit-content;" autofocus />



                           </div>



                           <!--  <input id="customer_tags" class="block mt-1 w-full" type="text" style="width: fit-content;"  value="" wire:model.lazy="customerData.detail.tags" wire:ignore.self name="customer_detail_tags" autofocus  />



                              -->



                     </div>



                     <div class="all-tags tags-section">



                        <div class="all-tags-title">



                           <h4>ALL TAGS</h4>



                           <!-- <div class="short-tags">



                              <span>Sort:</span>



                              <span class="button-group">



                              <button class="secondary short-tags-btn">Alphabetical</button>



                              <button class="secondary short-tags-btn">Most recent</button>



                              </span>



                           </div> -->



                        </div>



                        <div class="select-tag-list">



                           @if(!empty($tags))



                              @foreach($tags as $tag)



                                 <button class="secondary tag_added" value="{{$tag->label}}">{{$tag->label}}</button>



                              @endforeach



                           @endif



                        </div>



                     </div>



                  </div>



                  <div class="modal-footer">



                     <button class="button secondary">Cancel</button>



                     <button id="customer_tags" class="button" value="" data-dismiss="modal" wire:click.prevent="update('tags-change', event.target.value)">Apply changes</button>



                  </div>



               </div>



            </div>



         </div>



         <!--View all tags modal-->



         <!--Erase personal data modal-->



         <div id="erase-personal-data" class="customer-modal-main"  wire:ignore>



            <div class="customer-modal-inner">



               <div class="customer-modal">



                  <div class="modal-header">



                     <h2>Erase personal data</h2>



                     <span data-dismiss="modal" class="modal-close-btn">



                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>



                        </svg>



                     </span>



                  </div>



                  <div class="modal-body">



                     <p>You can send a request to Shopify to erase any information that can be used to identify this customer, including:</p>



                     <ul>



                        <li>Name</li>



                        <li>Address</li>



                        <li>Email</li>



                        <li>IP address</li>



                        <li>Credit card number</li>



                     </ul>



                     <p>The customer’s orders will still be visible for business reporting purposes. You’ll receive a confirmation email when the data is erased on <b>30 Oct 2021.</b> You can cancel the process until that date.</p>



                     <a href="#">Learn more about the process of erasure requests.</a>



                  </div>



                  <div class="modal-footer">



                     <button class="button secondary">Cancel</button>



                     <button class="button warning">Erase personal data</button>



                  </div>



               </div>



            </div>



         </div>



         

         



         <!--/Erase personal data modal-->



         <script type="text/javascript">



            // window.livewire.on('email_marketing', () => {



            //     $('#edit-email-marketing-status').modal('hide');



            // });



         </script>

         <script type="text/javascript">
          $(document).ready(
            function(){
                $('input:file').change(
                    function(){
                        if ($(this).val()) {
                            $('.postbuttone').attr('disabled',false); 
                        } 
                    }
                    );
            });
         </script>


         <script type="text/javascript">



            



            $(document).ready(function () {



               var mobile = $('#customer_mobile_number').val();



                mobile = $.trim(mobile);







                if(mobile.indexOf(' ') > -1) {



                    var split_arr = mobile.split(' ');



                    mobile = split_arr[1];



                }



               $('#customer_phone_code').val(split_arr[0]);











               $('#customer_phone_code').change(function () {







                var mobile = $('#customer_mobile_number').val();



                mobile = $.trim(mobile);







                if(mobile.indexOf(' ') > -1) {



                    var split_arr = mobile.split(' ');



                    mobile = split_arr[1];



                }



                $('#customer_mobile_number').val($(this).val()+' '+mobile);



                $('.email-change-btn').val($(this).val()+' '+mobile);



            });



            



            $('#billing_address').click(function () {



            



                var inputValue = $(this).attr("id");



            



                console.log(inputValue);



            



                $("." + inputValue).toggle();



            



            });









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

         <script type="text/javascript">
          $('#myEmoji').emojioneArea({
            pickerPosition:'right'
          });
        </script>


      </div>

   </x-admin-layout>



</div> 