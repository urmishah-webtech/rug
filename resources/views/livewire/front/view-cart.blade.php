<div>
    <x-customer-layout>
       <div class="view-cart-sec">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="continue-shoping-btn">
                            <a href="#" class="site-link-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="my-cart-tbl">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $subtotal = 0;  $subtotal1 = 0;  $subtotal2 = 0; $discountrate = 0; $total = 0; $subtotal3 = 0; $subtotal4 = 0; $subtotal5 = 0; $subtotal6 = 0;  $symbol = CurrencySymbol();@endphp
                                    @if(!empty($CartItem))
                                    @foreach($CartItem as $key => $cart)
                                    <?php 
                                    $detailfetch = allprice($cart['product_id']);
                                   


                                    if(!empty($discoutget->promocode) && count($discoutget->promocode) > 0) 
                                    {
                                        $decodeproduct = json_decode($discoutget['promocode'][0]['apply_c_p']);
                                        if ($discoutget['promocode'][0]['applyto'] == 3 && in_array($cart->product_id, $decodeproduct))
                                        {
                                            if($discoutget['promocode'][0]['type'] == 2){
                                              
                                                if($detailfetch['selling_price']){
                                                  $subtotal3 += $cart['stock'] * $detailfetch['selling_price'];
                                                }else
                                                {
                                                  $subtotal4 += $cart['stock'] * $cart['price'];
                                                   
                                                }
                                               
                                            }
                                            if($discoutget['promocode'][0]['type'] == 1){

                                                if($detailfetch['selling_price']){
                                                  $subtotal3 += $cart['stock'] * $detailfetch['selling_price'];
                                                }else
                                                {
                                                  $subtotal4 += $cart['stock'] * $cart['price'];
                                                   
                                                }
                                            }
                                        }
                                        elseif ($discoutget['promocode'][0]['applyto'] == 2){
                                            $categoryget = json_decode($detailfetch['product']['collection']);
                                     
                                            foreach ($categoryget as $key => $value) {
                                               if(in_array($value, $decodeproduct)){

                                                if($discoutget['promocode'][0]['type'] == 2){
                                                    if($detailfetch['selling_price']){
                                                      $subtotal3 += $cart['stock'] * $detailfetch['selling_price'];
                                                    }else
                                                    {
                                                      $subtotal4 += $cart['stock'] * $cart['price'];
                                                       
                                                    }
                                                   
                                                }
                                                if($discoutget['promocode'][0]['type'] == 1){

                                                    if($detailfetch['selling_price']){
                                                      $subtotal3 += $cart['stock'] * $detailfetch['selling_price'];
                                                    }else
                                                    {
                                                      $subtotal4 += $cart['stock'] * $cart['price'];
                                                       
                                                    }
                                                    
                                                }
                                               }else{
                                                    if($detailfetch['selling_price']){

                                                     $subtotal1 += $cart['stock'] * $detailfetch['selling_price'];
                                                    }else
                                                    {
                                                      $subtotal2 += $cart['stock'] * $cart['price'];
                                                    }

                                               }
                                            }
                                        }else{

                                            if($detailfetch['selling_price']){

                                             $subtotal1 += $cart['stock'] * $detailfetch['selling_price'];
                                            }else
                                            {

                                              $subtotal2 += $cart['stock'] * $cart['price'];
                                            }

                                        }
                                    }

                                    else
                                    {

                                        if($detailfetch['selling_price']){

                                         $subtotal1 += $cart['stock'] * $detailfetch['selling_price'];
                                        }else
                                        {

                                          $subtotal2 += $cart['stock'] * $cart['price'];
                                        }


                                    }

                                    if(!empty($detailfetch['discount'])){
                                      $discountrate += $detailfetch['discount'] * $cart['stock'];
                                    }

 
                                   ?>
                                    <tr>
                                        <td>
                                            <div class="my-cart-pd-details">
                                                <div class="my-cart-img">
                                                    <a class="dropdown-header" href="{{ route('product-front-detail', $cart['product_detail']['seo_utl']) }}">
                                                    <img src="{{ asset('storage/'.$cart['media_product'][0]['image']) }}"></a>
                                                </div>
                                                <div class="my-cart-desc">
                                                    <span>Vans</span>
                                                    <a href="{{ route('product-front-detail', $cart['product_detail']['seo_utl']) }}">
                                                    <h6> {{$cart['product_detail']['title']}}</h6>
                                                    </a>
                                                    @include('livewire.front.cartdetail')
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="add-cart-select">
                                                    <span class="mb-tbl-title">
                                                        Quantity
                                                    </span>
                                                <div class="total-item-select">
                                                    @if(Auth::check())
                                                        <input wire:model="CartItem.{{$key}}.stock" wire:click="stockplusminus({{$key}})" name="stockitem" type="number" min="1" wire:ignore.self>
                                                    @else
                                                        <input wire:model="CartItem.{{$key}}.stock" wire:click="stockplusminus({{$cart['product_id']}}, {{$cart['varientid']}})" name="stockitem" type="number" min="1" wire:ignore.self>
                                                    @endif
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                        <td>
                                            <span class="mb-tbl-title">
                                                Price
                                            </span>
                                            <span class="cart-pd-price">
                                            {{$symbol['currency']}}{{$detailfetch['selling_price']}}
                                            @if(!$detailfetch['selling_price'])
                                            {{$cart['price']}}
                                            @endif

                                            </span>
                                            @if(!empty($detailfetch['discount']))
                                            <span class="msrp-price">-  {{$symbol['currency']}}{{number_format($detailfetch['price'],2,".",",")}}</span>
                                            @endif

                                        </td>
                                        <td>
                                            <div class="viewcart-tbl-btn">


                                                @php $favorite = favorite($cart['product_detail']['id']); @endphp


                                     
                                        @if(!empty($favorite))



                                         <a class="wish-list add-wishlist" wire:click="UpdateWish(false, {{$cart['product_detail']['id']}})"><span>move to</span><i class="fa fa-heart-o" aria-hidden="true"></i></a>

                                        

                                        @else

                                         <a class="wish-list" wire:click="UpdateWish(true, {{$cart['product_detail']['id']}})"><span>move to</span><i class="fa fa-heart-o" aria-hidden="true"></i></a>


                                        @endif




                                               
                                                 @if(Auth::check())
                                                        <a class="remove-btn" wire:click.prevent="DeleteCartProduct({{$cart['id']}})"><span>Remove</span> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                @else
                                                        <a class="remove-btn" wire:click.prevent="DeleteCartProduct({{$cart['product_id']}}, {{$cart['varientid']}})"><span>Remove</span> <i class="fa fa-trash" aria-hidden="true"></i></a>

                                                @endif
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr><td colspan="3" align="center">No items yet!</td></tr>

                                    @endif

                                    <?php 
                                    if(!empty($discoutget->promocode) && count($discoutget->promocode) > 0) 
                                    {
                                        if ($discoutget['promocode'][0]['applyto'] == 3)
                                        {
                                            if($discoutget['promocode'][0]['type'] == 2){
                                            $promocode = $discoutget['promocode'][0]['discount_value'];
                                            $sumproduct = $subtotal4 + $subtotal3;
                                            $subtotal5 = $sumproduct - $promocode;
                                            }
                                            if($discoutget['promocode'][0]['type'] == 1){
                                            $promocode = $discoutget['promocode'][0]['discount_value'];
                                            $sumproduct = $subtotal4 + $subtotal3;
                                            $saveprofit = ($sumproduct * $promocode / 100);
                                            $subtotal5 = $sumproduct - $saveprofit;
                                            }
                                        }
                                        if ($discoutget['promocode'][0]['applyto'] == 2)
                                        {
                                            if($discoutget['promocode'][0]['type'] == 2){
                                            $promocode = $discoutget['promocode'][0]['discount_value'];
                                            $sumproduct = $subtotal4 + $subtotal3;
                                            $subtotal5 = $sumproduct - $promocode;
                                            }
                                            if($discoutget['promocode'][0]['type'] == 1){
                                            $promocode = $discoutget['promocode'][0]['discount_value'];
                                            $sumproduct = $subtotal4 + $subtotal3;
                                            $saveprofit = ($sumproduct * $promocode / 100);
                                            $subtotal5 = $sumproduct - $saveprofit;
                                            }

                                        }
                                    }

                                    $subtotal6 = $subtotal1 + $subtotal2;

                                    $subtotal = $subtotal6 + $subtotal5;
                                        

                                    if (!empty($discoutget->promocode) && count($discoutget->promocode) > 0 && $discoutget['promocode'][0]['applyto'] == 3)
                                    {
                                    //discount apply
                                        if($discoutget['promocode'][0]['type'] == 2){
                                            
                                             $promocode = $discoutget['promocode'][0]['discount_value'];
                                            $total = ($subtotal - $discountrate) - $promocode;

                                        }
                                        if($discoutget['promocode'][0]['type'] == 1){
                                          
                                            $total = $subtotal - $discountrate;


                                        
                                        }
                                    }
                                    elseif (!empty($discoutget->promocode) && count($discoutget->promocode) > 0 && $discoutget['promocode'][0]['applyto'] == 2) {

                                        if($discoutget['promocode'][0]['type'] == 2){
                                            
                                            $total = $subtotal - $discountrate;


                                        }
                                        if($discoutget['promocode'][0]['type'] == 1){
                                          
                                            $total = $subtotal - $discountrate;
                                            
                                        
                                        }
                                    }
                                    else{

                                        if(!empty($discoutget->promocode) && count($discoutget->promocode) > 0 && $discoutget['promocode'][0]['type'] == 2){
                                            $promocode = $discoutget['promocode'][0]['discount_value'];
                                            $total = ($subtotal - $discountrate) - $promocode;


                                        }
                                        if(!empty($discoutget->promocode) && count($discoutget->promocode) > 0 && $discoutget['promocode'][0]['type'] == 1){
                                            $promocode = $discoutget['promocode'][0]['discount_value'];
                                            $percetage_discount = $subtotal - $discountrate;
                                            $saveprofit = ($percetage_discount * $promocode / 100);
                                            $total = $percetage_discount - $saveprofit;
                                        
                                        }
                                        else
                                        {
                                            $total = $subtotal - $discountrate;
                                        }
                                    }
                                ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="checkout-right">

                            <div class="offer-code">
                                <div class="form-group">
                                   
                                    <label for="formGroupExampleInput">Have a Promotional Code?</label>
                                    <p class="d-flex" wire:ignore>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Promotional Code" wire:model="promotioncode">
                                        <button type="submit" class="site-btn green-btn" wire:click="PromotionalCode">Apply</button>
                                    </p>

                                    @if(!empty($discoutget->promocode) && count($discoutget->promocode) > 0 && $discoutget['promocode'][0]['type'] == 2)
                                    <a style="color: red;">Apply <b>{{$discoutget['promocode'][0]['discount_value']}}{{$symbol['currency']}}</b> Discount</a>
                                    @endif
                                    @if(!empty($discoutget->promocode) && count($discoutget->promocode) > 0 && $discoutget['promocode'][0]['type'] == 1)
                                    <a style="color: red;">Apply <b>{{$discoutget['promocode'][0]['discount_value']}}%</b> Discount</a>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="viewcart-checkout">
                                <form method="post" action="{{ route('add-order') }}" name="form">
                                    @csrf
                                    <div class="vc-inner">
                                        <?php 

                                            $stock = 0;
                                            if($CartItem && !empty($CartItem)) {

                                                foreach ($CartItem as $item) {
                                                    $stock += $item['stock'];
                                                }
                                            }
                                            $cartCount = $stock;

                                        ?>
                                        <p class="cart-summary">Cart Summary (@php echo $cartCount; @endphp Item)</p>
                                        <p class="subtotal">subtotal: <span>{{$symbol['currency']}}{{number_format($subtotal,2,".",",")}}</span></p>
                                        <p class="discount-price">discount: <span>-{{$symbol['currency']}}{{number_format($discountrate,2,".",",")}}</span></p>
                                        <p class="total-price">total: <span>{{$symbol['currency']}}{{number_format($total,2,".",",")}}</span></p>
                                    </div>
                                    @if(Auth::check())
                                    <div class="vc-inner">
                                        <input type="hidden" name="total_price" value="{{$total}}" />
                                            <button type="submit" class="site-btn green-btn">Proceed to Checkout</button>
                                    </div>
                                    @endif
                                </form>
                                @if(!Auth::check())
                                 <div class="vc-inner">
                                    <input type="hidden" name="total_price" value="{{$total}}" />
                                    <button wire:click="checkout()" class="site-btn green-btn">Proceed to Checkout</button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div wire:key="alert">

         @if (session()->has('message'))

         <div class="alert alert-success">

            {{ session('message') }}

         </div>

         @endif

      </div>
    </x-customer-layout>
</div>
