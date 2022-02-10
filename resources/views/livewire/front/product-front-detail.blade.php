<div>

    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

<x-customer-layout>
    @php $symbol = CurrencySymbol(); @endphp
    

    <div id="breadcrumb-container" name="breadcrumb-container" >


            <div class="container">

                <div class="row">

                    <div class="col-12">

                        <div class="product-top-row" aria-label="breadcrumb">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" id="backLink">« Back</a></li>

                                <li class="breadcrumb-item "><a href="#">Shoes</a></li>

                                <li class="breadcrumb-item"><a href="#">Sneakers Athletic Shoes</a></li>

                                <li class="breadcrumb-item active" aria-current="page">

                                    <a href="#" id="product-brand" name="product-brand">ASICS</a>

                                </li>

                            </ol>

                            <p class="product-sku"> SKU 9399689</p>

                        </div>

                    </div>

                </div>

            </div>

    </div>



    <div class="product-sec">

            <div class="container">

                <div class="single-pd-sec">

                <div class="row">

                    <div class="col-lg-8 col-md-12">

                        <div class="product-slider">

                            <div class="product-slider-nav" wire:ignore>
                                @if(!empty($Productmedia))
                                @foreach($Productmedia as $image)
                                <div>

                                    <img src="{{ asset('storage/'.$image['image']) }}">

                                </div>

                                @endforeach
                                @endif

                            </div>



                            <div class="product-slider-for" wire:ignore>
@if(!empty($Productmedia))
                                 @foreach($Productmedia as $image)

                                <div>

                                    <div class="single-pd-img">

                                        <img src="{{ asset('storage/'.$image['image']) }}">

                                    </div>

                                </div>

                                @endforeach
                                @endif

                                

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4 col-md-12 pd-sidebar-details">

                        <div class="product-rightbar">

                            <div class="product-title">

                                <h2 class="h2">

                                    <span class="product-brand">ASICS</span>

                                    <span class="product-title">{{$product->title}}</span>

                                </h2>

                                <div class="product-ratting">

                                    <i class="fa fa-star checked" aria-hidden="true"></i>

                                    <i class="fa fa-star checked" aria-hidden="true"></i>

                                    <i class="fa fa-star checked" aria-hidden="true"></i>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <a href="#" class="total-review">320 Reviews</a>

                                </div>

                            </div>

                            <div class="product-right-top">

                                <div class="pd-total">
                               
                                    @php 
                                    if(!empty($Productvariant['product_id'])){
                                    $result = shipcharge($Productvariant['product_id'],'variantproduct');
                                    }
                                   
                                    $priceres = allprice($product['id']);

                                    @endphp
                                    @if(!empty($priceres))
                                       
                                        <div class="pd-all-price offer-price "  wire:ignore>
                                            <h2 class="h2 @if(!empty($priceres['label'])) {{$priceres['label']}} @endif" id="getprice"><sup>{{$symbol['currency']}}</sup><span>   {{number_format($priceres['price'],2,'.',',')}}</span></h2>
                                            @if(!empty($priceres['selling_price']))
                                            <span class="pd-original-price"><s>{{number_format($priceres['selling_price'],2,'.',',')}}</s></span>
                                            @endif
                                        </div>

                                    @endif
                                     @if(!empty($result))
                                        <form><label class="free-shiping-tag"><i class="fa fa-truck" aria-hidden="true"></i>{{$result['label']}} {{$result['shipprice']}}</form></label>
                                        @endif
                                </div>

                               

                                <div class="pd-variation" :id="{{$product->id}}" wire:ignore>

                                    @if($product && isset($product->variants) && count($product->variants) > 0 )

                                     @foreach($product->variants as $row)

                                    <div class="form-group">

                                        @if(!empty($row->varient1) && !empty($varianttag))

                                        <div wire:ignore wire:key="first">



                                            <label>{{$varianttag[$row->varient1][0]['name']}}</label>

                                            <select name="attribute1"   class="form-control varition-change" id="varient1"  >

                                                @foreach($product->variants->unique('attribute1') as $row1)

                                                    @if($row1->attribute1 != "")

                                                    <option wire:key="attr1_{{ $loop->index }}" wire:ignore.self>{{$row1->attribute1}}</option> 

                                                    @endif 

                                                @endforeach

                                            </select>

                                        </div>

                                        @endif

                                    </div>

                                    <div class="form-group">

                                        @if(!empty($row->varient2) && !empty($varianttag))

                                        <div wire:ignore wire:key="second">

                                            <label>{{$varianttag[$row->varient2][0]['name']}}</label>

                                            <select name="attribute2"  class="form-control varition-change"   id="varient2">


                                                @foreach($product->variants->unique('attribute2') as $row2)

                                                    @if($row2->attribute2 != "")

                                                    <option wire:key="attr2_{{ $loop->index }}" wire:ignore.self>{{$row2->attribute2}}</option> 

                                                    @endif 

                                                @endforeach

                                            </select>

                                        </div>

                                        @endif
                                    </div>
                                    <div class="form-group">

                                        @if(!empty($row->varient3) && !empty($varianttag))

                                        <div wire:ignore wire:key="third">

                                            <label>{{$varianttag[$row->varient3][0]['name']}}</label>

                                            <select name="attribute3"  class="form-control varition-change" id="varient3" >


                                                @foreach($product->variants->unique('attribute3') as $row3)

                                                    @if($row3->attribute3 != "")

                                                    <option wire:key="attr3_{{ $loop->index }}" wire:ignore.self>{{$row3->attribute3}}</option> 

                                                    @endif 

                                                @endforeach

                                            </select>

                                        </div>

                                        @endif

                                    </div>

                                    <?php break; ?>

                                    @endforeach

                                    @endif

                                   

                                </div>

                                <div class="pd-btn-group">

                                    <button class="site-btn green-btn add-cart" id="variant_id" wire:ignore.self value="@if(!empty($row->id)){{$row->id}}@endif" wire:click="addCart($event.target.value)">Add to Cart</button>

                                    @php $favorite = favorite($product->id); @endphp


                                    @if(!empty($favorite))

                                    <button class="site-btn green-btn add-collection-btn add-wishlist" wire:click="UpdateWish(false, {{$product->id}})"><i class="fa fa-heart" aria-hidden="true"></i></i>Add to Favorite</button>

                                    @else

                                    <button class="site-btn green-btn add-collection-btn" wire:click="UpdateWish(true, {{$product->id}})"><i class="fa fa-heart" aria-hidden="true"></i></i>Add to Favorite</button>


                                    @endif

                              

                                </div>

                            </div>

                        </div>

                           

                        <div class="product-right-bottom">

                            <div class="size-and-social pd-right-p">

                                <!-- <a href="#">Don't See your size?</a>

                                <a href="#"> Notify Me of the New Styles</a> -->

                                <ul class="product-right-social">

                                    <li>Share:</li>

                                    <li><a class="pd-facebook" href="#">

                                        <i class="fa fa-link" aria-hidden="true"></i>

                                    </a></li>

                                    <li><a class="pd-twitter" href="#">

                                        <i class="fa fa-facebook" aria-hidden="true"></i>

                                    </a></li>

                                    <li><a class="pd-pinterest" href="#">

                                        <i class="fa fa-twitter" aria-hidden="true"></i>

                                    </a></li>

                                    <li><a class="pd-mail" href="#">

                                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>

                                    </a></li>

                                </ul>

                            </div>

                            <div class="pd-sort-dec">

                                <h4 class="h4">Product Information</h4>

                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                                <a class="site-link-btn" href="#pd-all-details">Show More Information <i class="fa fa-chevron-right" aria-hidden="true"></i></a>

                            </div>

                        </div>

                    </div>

                </div>

                </div>

                <div class="row">

                    <div class="col-12">

                        <div class="wear-it-With-sec multi-item-slider">

                            <h3 class="h3">Wear It With</h3>

                            <div class="wear-it-With-slider" wire:ignore>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/81aOMhB200L._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="pd-add-cart" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Item</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/71cpd1J29LL._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="pd-add-cart" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Item</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/81DnwjL9tBL._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="pd-add-cart" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Item</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/71YPVyvWFDL._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="pd-add-cart" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Item</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/71Gs5Cfb4hL._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="pd-add-cart" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Item</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/71Gs5Cfb4hL._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="pd-add-cart" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Item</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/71Gs5Cfb4hL._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="pd-add-cart" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Item</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12">

                        <div id="pd-all-details" class="product-information">

                            <h3 class="h3">Item Information</h3>

                            <ul>

                                <li>View the size chart</li>

                                <li>Neutral runners will love the all-new minimalistic upper and even softer FLYTEFOAM® technology for an unbelievable fit and feel right out of the box and well into your 400th mile!</li>

                                <li>Predecessor: Gel-Cumulus 21.</li>

                                <li>Support Type: Neutral.</li>

                                <li>Surface: Road.</li>

                                <li>Differential: 10 mm.</li>

                                <li>Heel/Toe: 23 mm/13 mm.</li>

                                <li>View the size chart</li>

                            </ul>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12">

                        <div class="item-bought-sec multi-item-slider">

                            <h3 class="h3">Customer Who Bought This Item Also Bought</h3>

                            <div class="item-bought-slider" wire:ignore>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/81aOMhB200L._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="wish-list add-wishlist" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 595</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/81aOMhB200L._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="wish-list" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 595</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/81aOMhB200L._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="wish-list" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 595</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/81aOMhB200L._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="wish-list" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 595</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/81aOMhB200L._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="wish-list" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 595</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/81aOMhB200L._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="wish-list" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 595</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                                <div>

                                    <img src="https://m.media-amazon.com/images/I/81aOMhB200L._AC_SX272_.jpg">

                                    <div class="multi-item-content">

                                        <a class="wish-list" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 595</a>

                                        <p>ASICS</p>

                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        <p class="product-price"><span class="mrp-price">{{$symbol['currency']}}99.95</span><span class="msrp-price"><s>MSRP: {{$symbol['currency']}}150.00</s></span></p>
                                        <p class="product-price product-single-price">{{$symbol['currency']}}99.95</p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12">

                        <div class="similar-items-sec multi-item-slider">

                            <h3 class="h3">Recommended For You</h3>

                            <div class="similar-items-slider" wire:ignore>
                                @if(!empty($productrelated))
                                @foreach($productrelated as $rows)

                                <?php $decodeA = json_decode($rows->collection);  

                                      $decodeB = json_decode($product->collection); 

                                ?>

                                @if(!empty($decodeA))

                                @foreach($decodeA as $decoderes)

                                @if(is_array($decodeB) && !empty($decodeB))

                                @if(in_array($decoderes, $decodeB) && $product->id != $rows->id)

                                 @php $priceres = allprice($rows->id) @endphp
                                <div>

                                    @if($rows['productmediaget'] && isset($rows['productmediaget'][0]))
                                    <a class="dropdown-header" href="{{ route('product-front-detail', $rows['seo_utl']) }}">
                                    <img src="{{ asset('storage/'.$rows['productmediaget'][0]['image']) }}"></a>

                                    @endif

                                    <div class="multi-item-content">

                                       @php $favorite = favorite($product->id); @endphp

                                    @if(!empty($favorite))

                                     <a class="wish-list add-wishlist" wire:click="UpdateWish(false, {{$rows->id}})"><i class="fa fa-heart-o" aria-hidden="true"></i></a>

                                    

                                    @else

                                     <a class="wish-list" wire:click="UpdateWish(true, {{$rows->id}})"><i class="fa fa-heart-o" aria-hidden="true"></i></a>


                                    @endif



                                        <!-- <p>ASICS</p> -->
                                        @if(!empty($priceres))
                                        <a href="{{ route('product-front-detail', $rows['seo_utl']) }}">
                                        <p class="multi-pd-title">{{$rows->title}}</p>
                                        </a>
                                        <p class="product-price @if(!empty($priceres['label'])) {{$priceres['label']}} @endif" >
                                        <span class="mrp-price">{{$symbol['currency']}}{{number_format($priceres['price'],2,'.',',')}}
                                        </span>
                                        @if(!empty($priceres['selling_price']))
                                        <span class="msrp-price"><s>MSRP: {{$symbol['currency']}}{{number_format($priceres['selling_price'],2,'.',',')}}</s></span>
                                        @endif
                                        </p>
                                        @endif

                                    </div>

                                </div>

                                @endif

                                @endif

                                @endforeach

                                @endif

                                @endforeach
                                @endif

                            </div>

                        </div>

                    </div>

                </div>

                <!-- <div class="row">
                    <div class="col-12">
                        <div class="free-shipping-return">
                            <h3 class="h3">Free Shipping and Free Return</h3>
                            <p>If, for any reason, you are unsatisfied with your purchase from Rugs.com LLC you may return it in its original condition within 365 days for a refund. We'll even pay for return shipping!</p>
                            <a href="#">Learn more about our free shipping and free returns policy</a>
                        </div>
                    </div>
                </div> -->
 @if(!empty($productrelated))
                <div class="row">

                    <div class="col-12">

                        <div class="recently-viewed-sec multi-item-slider">

                            <h3 class="h3">Your Recently Viewed Items</h3>

                            <div class="recently-viewed-slider" wire:ignore.self>

                                @if(Cookie::get('shopping_cart'))

                                <?php $cookieitem = json_decode(Cookie::get('shopping_cart')); ?>
                               
                                @foreach($productrelated as $pro_res)
                               
                                @if(in_array($pro_res->id, $cookieitem) && $pro_res['productmediaget'] && isset($pro_res['productmediaget'][0]) && $pro_res->id != $cookieitem)

                                @php $priceres = allprice($pro_res->id) @endphp
                                <div>
                                    <a class="dropdown-header" href="{{ route('product-front-detail', $pro_res['seo_utl']) }}">
                                    <img src="{{ asset('storage/'.$pro_res['productmediaget'][0]['image']) }}">
                                    </a>
                                    <div class="multi-item-content" >

                                        @php $favorite = favorite($product->id); @endphp


                                     
                                        @if(!empty($favorite))

                                         <a class="wish-list add-wishlist" wire:click="UpdateWish(false, {{$pro_res->id}})"><i class="fa fa-heart-o" aria-hidden="true" ></i></a>

                                        

                                        @else

                                         <a class="wish-list" wire:click="UpdateWish(true, {{$pro_res->id}})"><i class="fa fa-heart-o" aria-hidden="true"></i></a>


                                        @endif




                                        <a href="{{ route('product-front-detail', $rows['seo_utl']) }}">
                                        <p>{{$pro_res->title}}</p>
                                        </a>
                                        <p class="multi-pd-title">GEL-Nimbus® 22</p>

                                        @if(!empty($priceres))
                                        <p class="product-price @if(!empty($priceres['label'])) {{$priceres['label']}} @endif">
                                        <span class="mrp-price">{{$symbol['currency']}}{{number_format($priceres['price'],2,'.',',')}}
                                        </span>
                                        @if(!empty($priceres['selling_price']))
                                        <span class="msrp-price"><s>MSRP: {{$symbol['currency']}}{{number_format($priceres['selling_price'],2,'.',',')}}</s></span>
                                        @endif
                                        </p>
                                        @endif
                                    </div>

                                </div>

                                @endif


                                @endforeach

                                @endif
                               

                            </div>

                        </div>

                    </div>

                </div>
 @endif
                <div class="row">

                    <div class="col-12">

                        <div class="product-review">

                            <a class="site-btn blue-btn" href="{{ route('product-review', $product->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Write Review</a>

                            @if($this->reviewget)

                            @foreach($this->reviewget as $res)

                            <div class="pd-review-list">
                                <div class="review-row">
                                    <div class="review-star">
                                        <label>Overall</label>
                                        <input id="ratinginput" name="overall" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="@if($res){{$res->overall}}@endif" readonly>
                                    </div>
                                    <div class="review-star">
                                        <label>Comfort</label>
                                        <input id="ratinginput" name="overall" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="@if($res){{$res->comfort}}@endif" readonly>
                                    </div>
                                    <div class="review-star">
                                        <label>Style </label> 
                                        <input id="ratinginput" name="overall" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="@if($res){{$res->style}}@endif" readonly>
                                    </div>
                                </div>
                                <p>{{$res->text}}</p>

                                <p class="reviewer-name">{{$res->name}},{{$res->city}},{{$res->created_at}}</p>
                                <div class="reriew-img">
                                    @if($res['image'] && $res['image'] != 'null')
                                    <?php $image_decode = json_decode($res['image']); ?>
                                    @foreach($image_decode as $row)
                                    <img src="{{ asset('storage/'.$row) }}">
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                            @endforeach

                            @endif

                        </div>

                    </div>

                </div>

            </div>

    </div>

   

    <script type="text/javascript">

        $(function(){

            $(document).on("change", ".varition-change", function () {

                var val1 = $('#varient1').val();

                var val2 = $('#varient2').val();

                var val3 = $('#varient3').val();

                console.log(val3);

                var productid = $('#productid').val();

                $.ajax({

                    type: 'GET',

                    url: "{{URL('varientData')}}",

                    data: { text1: val1, text2: val2, text3: val3, productid: productid},

                    success: function(response) {

                        var price = stock = 0;

                        var id = null;

                        if(response.variant != null) 

                        {

                             price = response.price;

                             console.log(response.variant.variant_stock);

                             if(response.variant.variant_stock != null && response.variant.variant_stock.length > 0)
                                { 
                                    stock = response.variant.variant_stock[0].stock;
                                }
                            
                             id = response.variant.id;

                        }

                        

                         $('#getprice').html("<sup>{{$symbol['currency']}}</sup><span>"+price+"</span>");

                        $('#variant_id').prop('value',id);

                    }

                });

            });

        });



    </script>

</x-customer-layout>

</div>





