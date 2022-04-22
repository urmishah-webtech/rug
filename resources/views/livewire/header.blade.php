<div id="main_model">



    <div class="main-heder">



        <div class="first-container"></div>



        <header class="text-white" name="header" id="header">



            <div class="header-top" name='header-top' id="header-top">



                <div class="container">



                    <div class="row">



                        <div class="col-12 d-flex align-items-center">



                            <div class="dropdown cs-drop-head" id="left-header-btn">



                                <button class="btn customer-service-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Customer Service </button>



                                <div class="dropdown-menu customer-service-dropdown" aria-labelledby="dropdownMenuButton">



                                    <li><a class="dropdown-item" href="#">Contact Info</a></li>



                                    <li><a class="dropdown-item" href="#">FAQ</a></li>



                                    <li><a class="dropdown-item" href="#">Give your Feedback</a></li>



                                </div>      



                            </div>                      



                        </div>



                    </div>



                </div>



            </div>



            <section class="header-mid">



                <div class="container"> 



                    <div class="row">



                        <div class="col-12 d-flex align-items-center">



                            <div class="logo">



                                <a href="{{url('/')}}"><img src="{{URL::asset('Storage/mailimg/adminlogo.png')}}"></a>



                            </div>



                            <div class="search-box">



                                <form class="search-container d-flex align-items-center" method="get" target="_parent" action="" autocomplete="off">



                                    <input class="form" type="text" placeholder="Search for shoes, clothes, etc." wire:model="filter_product" id="searched-input">



                                    <div class="header-search-icon"><i class="fa fa-search" aria-hidden="true"></i></div>



                                </form>



                                <div class="col-12 text-dark p-0 auto-fill" id="autofill" style="display: none">



                                    <div class="border bg-white search-autofill">



                                        <div class="link-fill"><button class="link-fill-btn">cases</button></div>



                                        <div class="link-fill"><button class="link-fill-btn">iphone cases</button></div>



                                        <div class="link-fill"><button class="link-fill-btn">samsung cases</button></div>



                                        <div class="link-fill"><button class="link-fill-btn">winter sweaters</button></div>



                                        <div class="link-fill"><button class="link-fill-btn">Trousers</button></div>



                                        <div class="sub-link-fill">



                                            @foreach($getproduct as $row)



                                            <div class="link-fill product-item"><a href="{{ route('product-front-detail', $row->seo_utl) }}"><button class="link-fill-btn">{{$row->title}}</button></a></div>



                                            @endforeach



                                        </div>



                                    </div>



                                </div>



                            </div>



                            



                            <div class="my-cart turn-btn ml-auto" id="my-cart">



                                <button class="site-btn green-border-btn bg-cart" onclick="document.getElementById('proceed-cart').style.display='block'">



                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.9 107.5" style="enable-background:new 0 0 122.9 107.5" xml:space="preserve"><g><path d="M3.9,7.9C1.8,7.9,0,6.1,0,3.9C0,1.8,1.8,0,3.9,0h10.2c0.1,0,0.3,0,0.4,0c3.6,0.1,6.8,0.8,9.5,2.5c3,1.9,5.2,4.8,6.4,9.1 c0,0.1,0,0.2,0.1,0.3l1,4H119c2.2,0,3.9,1.8,3.9,3.9c0,0.4-0.1,0.8-0.2,1.2l-10.2,41.1c-0.4,1.8-2,3-3.8,3v0H44.7 c1.4,5.2,2.8,8,4.7,9.3c2.3,1.5,6.3,1.6,13,1.5h0.1v0h45.2c2.2,0,3.9,1.8,3.9,3.9c0,2.2-1.8,3.9-3.9,3.9H62.5v0 c-8.3,0.1-13.4-0.1-17.5-2.8c-4.2-2.8-6.4-7.6-8.6-16.3l0,0L23,13.9c0-0.1,0-0.1-0.1-0.2c-0.6-2.2-1.6-3.7-3-4.5 c-1.4-0.9-3.3-1.3-5.5-1.3c-0.1,0-0.2,0-0.3,0H3.9L3.9,7.9z M96,88.3c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6 c-5.3,0-9.6-4.3-9.6-9.6C86.4,92.6,90.7,88.3,96,88.3L96,88.3z M53.9,88.3c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6 c-5.3,0-9.6-4.3-9.6-9.6C44.3,92.6,48.6,88.3,53.9,88.3L53.9,88.3z M33.7,23.7l8.9,33.5h63.1l8.3-33.5H33.7L33.7,23.7z"/></g></svg>



                               <span id="" class="clearContent">{{$cartCount}} <span>My Cart</span></span>



                                  







                                </button>



                            </div>



                            <form method="post" action="{{ route('add-order') }}" name="form">



                             @csrf



                            <div class="proceed-cart" id="proceed-cart" wire:ignore.self>



                                <div class="proceed-cart-head">



                                    <h4 class="h4">My Cart</h4>



                                    <a class="myclose-close" onclick="document.getElementById('proceed-cart').style.display='none'">



                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                                            <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>



                                        </svg>



                                    </a>



                                </div>







                                <!-- <div class="row cart-vip-code" name="cart-vip-code">



                                    <div class="col-12">



                                        <p class="vip-text"><img src="https://www.flaticon.com/svg/static/icons/svg/2909/2909599.svg" class="stars img-fluid"> Check out to earn Zappos VIP points worth up to <span class="font-weight-bold">$1.20</span> in VIP codes.</p>



                                    </div>



                                </div> -->



                                <div>



                                    @if($CartItem && !empty($CartItem) && count($CartItem) > 0)







                                    <div>



                                        <div class="items">



                                            <div class="col-12 p-0">



                                                @php $subtotal = 0;  $subtotal1 = 0;  $subtotal2 = 0; $discountrate = 0; $total = 0; $subtotal3 = 0; $subtotal4 = 0; $subtotal5 = 0; $subtotal6 = 0; @endphp



                                                @if(!empty($CartItem))



                                                @foreach($CartItem as $key => $cart)



                                                <?php 



                                                $detailfetch = allprice($cart['product_id']);



                                                $symbol = CurrencySymbol();











                                                if(!empty($discoutget->promocode) && count($discoutget->promocode) > 0) 



                                                {



                                                    $decodeproduct = json_decode($discoutget['promocode'][0]['apply_c_p']);



                                                    if ($discoutget['promocode'][0]['applyto'] == 3 && in_array($cart['product_id'], $decodeproduct))



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







                                                @if(Auth::check())



                                                <input name="cartid[]" type="hidden" value="{{$cart['id']}}">



                                                @endif



                                                <div class="cart-list">



                                                    <div class="product-img">



                                                        <a class="dropdown-header" href="{{ route('product-front-detail', $cart['product_detail']['seo_utl']) }}"><img src="{{ asset('storage/'.$cart['media_product'][0]['image']) }}" alt=""></a>



                                                    </div>



                                                    <div class="product-data">



                                                        <a href="{{ route('product-front-detail', $cart['product_detail']['seo_utl']) }}">



                                                        <p class="cart-pd-title">{{$cart['product_detail']['title']}}</p>



                                                        </a>



                                                        <a class="cart-pd-clear" href="#">Clare Tree</a>



                                                        <div class="product-data-inner">







                                                           @include('livewire.front.cartdetail')







                                                            <div class="add-cart-select">



                                                               



                                                                <div class="total-item-select">







                                                                    @if(Auth::check())



                                                                         <input wire:model="CartItem.{{$key}}.stock" wire:click="stockplusminus({{$key}})" name="stockitem" type="number" min="1" wire:ignore.self>



                                                                    @else



                                                                         <input wire:model="CartItem.{{$key}}.stock" wire:click="stockplusminus({{$cart['product_id']}}, {{$cart['varientid']}})" name="stockitem" type="number" min="1">



                                                                    @endif



                                                                    



                                                                       



                                                               



                                                                </div>



                                                            </div>



                                                        </div>



                                                        @php



                                                        $result = favorite($cart['product_id']);



                                                        @endphp



                                                        @if(!empty($result))



                                                        <a  class="wish-list add-wishlist" name="r-heart-button" wire:click.prevent="UpdateWish(false, {{$cart['product_id']}})">



                                                            Move To<i class="fa fa-heart-o" aria-hidden="true"></i>



                                                        </a>



                                                        @else



                                                         <a  class="wish-list" name="r-heart-button" wire:click.prevent="UpdateWish(true, {{$cart['product_id']}})">



                                                            Move To<i class="fa fa-heart-o" aria-hidden="true"></i>



                                                        </a>







                                                        @endif



                                                    </div>



                                                 



                                                    <div class="cart-list-right">



                                                        @if(!empty($detailfetch))



                                                        <p class="product-price @if(!empty($detailfetch['label'])) {{$detailfetch['label']}} @endif" >



                                                        <span class="mrp-price">{{$symbol['currency']}}{{number_format($cart['price'],2,'.',',')}}



                                                        </span>



                                                        @if(!empty($detailfetch['selling_price']))



                                                        <span class="msrp-price"><s>MSRP: {{$symbol['currency']}}{{number_format($detailfetch['selling_price'],2,'.',',')}}</s></span>



                                                        @endif



                                                        </p>



                                                        @endif







                                                       @if(Auth::check())



                                                        <a :key="{{$key}}" wire:click="DeleteCartProduct({{$cart['id']}})"  href="javascript:;">delete</a>



                                                        @else



                                                        <a :key="{{$key}}" wire:click="DeleteCartProduct({{$cart['product_id']}}, {{$cart['varientid']}})"  href="javascript:;">delete</a>



                                                        @endif



                                                    </div>



                                                </div>







                                                @endforeach



                                               @endif



                                            </div>



                                        </div>



                                    </div>



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



                                    <div class="cart-footer">



                                        <p>Cart Subtotal (<?php echo $cartCount ?> Items) {{$symbol['currency']}}{{number_format($total,2,".",",")}}</p>



                                        <div class="cart-footer-btn">







                                            @if(empty($this->user_id))



                                            <button class="site-btn blue-btn signin-btn">Sign In</button>



                                            @endif



                                            <a href="{{ route('view-cart') }}" class="site-btn green-btn view-cart-btn">View Cart</a>



                                            <input type="hidden" name="total_price" value="{{$total}}" />



                                            @if(Auth::check())



                                            <input type="submit" name="checkout" class="site-btn green-btn checkout-btn" value="Proceed to checkout">



                                            @endif



                                        </div>



                                    </div>



                                    @else



                                    <div class="empty-cart-modal">



                                        <p>Fill up your Cart by checking out all the awesome things you can buy on company name or by adding items from Your Favorites!</p>



                                        <!-- <ul>



                                            <li><a href="#">Shop Women's</a></li>



                                            <li><a href="#">Shop Men's</a></li>



                                            <li><a href="#">Shop Shoes</a></li>



                                            <li><a href="#">Brand List</a></li>



                                        </ul> -->



                                        <img src="http://185.160.67.108/estore/public/assets/empty-cart.svg">







                                    </div>



                                    @endif



                                </div>



                            </div>



                            </form>







                        </div>



                    </div>



                </div>



            </section>



        </header>



        <!------------NAVBAR-------------------------->



        <div class="header-navbar container-fluid">



            <nav class="navbar navbar-expand-lg navbar-light container">



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">



                <span class="navbar-toggler-icon">

                    <img src="{{ asset('assets/mobile-menu.png') }}">

                </span>



                </button>



                



    <div class="collapse navbar-collapse" id="navbarSupportedContent">















    <ul class="navbar-nav mr-auto menu-ul">







        @foreach($menu_arr as $menu)







            <li class="nav-item dropdown f-bl">







                <a class="nav-link @if(count($menu['items']) > 0) dropdown-toggle @endif f-bl" href="#" id="navbarDropdown" role="button"







                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">







                    {{$menu['name']}}







                </a>











                @if(count($menu['items']) > 0)







                    <div class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">







                        <div class="dropdown-menu-inner">







                            <div class="masonry-with-columns">







                                @foreach($menu['items'] as $menuitem)







                                    <div class="mansory-item">



                                        @if($menuitem['type_category'] == 3)



                                        <a class="dropdown-header" href="{{ route('product-front-category', $menuitem['link']) }}">{{$menuitem['label']}}</a>



                                        @endif



                                        @if($menuitem['type_category'] == 2)



                                        <a class="dropdown-header" href="{{ route('product-front-detail', $menuitem['link']) }}">{{$menuitem['label']}}</a>



                                        @endif



                                        @if($menuitem['type_category'] == 1)



                                        <a class="dropdown-header" href="javascript:;">{{$menuitem['label']}}</a>



                                        @endif







                                        @if(isset($menuitem['items']))







                                            @foreach($menuitem['items'] as $item)







                                                <a class="dropdown-item" href="#">{{$item['label']}}</a>







                                            @endforeach







                                        @endif











                                    </div>







                                @endforeach



                            </div>



                            <div class="masonry-with-columns mega-img-col">







                                    @if(isset($menu['images']) && count($menu['images']) > 0)







                                        <div class="mansory-item">







                                            <div class="dropdown-header"></div>







                                            @foreach($menu['images'] as $menuimage)







                                                <aside>







                                                    <a class="dropdown-item" href="#">







                                                        <img src="{{asset('storage/uploads/'.$menuimage['image'])}}"







                                                             alt="&quot;&quot;" height="175px"







                                                             width="175px">







                                                        <p> {{$menuimage['label']}}</p>







                                                    </a>







                                                </aside>







                                            @endforeach



                                        </div>







                                    @endif







                            </div>







                        </div>







                    </div>







                @endif







            </li>







        @endforeach







    </ul>







</div>







@if (Route::has('login'))







    @auth







        @if(empty(Auth::User()->email_verified_at))







            <a href="#" class=" mr-3 turn-btn f-bl" name="login-btn" id="login-btn" onclick="document.getElementById('sign-in-form').style.display='block'"><i class="fa fa-user-circle-o mb-login-icon" aria-hidden="true"></i> Sign In / Register</a>







        @else







            <ul class="navbar-nav navbar-nav-right mr-auto user-login-lbl">



                <li class="nav-item dropdown">







                    <a class="nav-link dropdown-toggle f-bl" href="#" id="navbarDropdown" role="button"







                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">







                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}







                    </a>







                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">







                        <a class="dropdown-item" href="{{ route('front-user-detail') }}">Your Profile</a>







                        <a href="{{ route('favorite-detail') }}">My Favorites</a>







                        <form method="POST" action="{{ route('logout') }}">







                            @csrf























                            <x-jet-dropdown-link href="{{ route('logout') }}"







                                                 onclick="event.preventDefault();







                                            this.closest('form').submit();">







                                {{ __('Log Out') }}







                            </x-jet-dropdown-link>







                        </form>







                    </div>







                </li>







            </ul>







        @endif







    @else







        <a href="#" class=" mr-3 turn-btn f-bl" name="login-btn" id="login-btn" onclick="document.getElementById('sign-in-form').style.display='block'"><i class="fa fa-user-circle-o mb-login-icon" aria-hidden="true"></i> Sign In / Register</a>







    @endauth







@endif











    </nav>



</div>



 



</div>











<script type="text/javascript">



    $(document).ready(function(){



  $("#searched-input").on("keyup", function() {



    var value = $(this).val().toLowerCase();



    $(".product-item").filter(function() {



      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)



    });



  });



});







$(document).ready(function(){



  $("#searched-input").on("keyup", function() {



  var x = document.getElementById('searched-input').value;



  var y = document.getElementById('product-item');



  if (x.length > 0) {



    y.style.display = 'block';



  } else {



    y.style.display = 'none';



  }



  });   



});



</script>























    <!-- modal start -->



    <div class="site-modal" id="sign-in-form" name="sign-in-form">



        <div class="site-modal-main">



            <div class="site-modal-inner">



                <button class="signin-close-btn" onclick="document.getElementById('sign-in-form').style.display='none'">



                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">



                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>



                    </svg>



                </button>



                <div class="site-modal-middle">



                    <div class="container" id="container">



                        <div class="form-container sign-up-container">



                            <form action="{{ route('register') }}" method="POST">



                                @csrf







                                <h2 class="h2">Create Account</h2>



                                <!-- <span>or use your email for registration</span> -->







                                <input type="text" placeholder="First Name" name="first_name" @if(old('first_name')) value="{{old('first_name')}}" @endif />



                                @if(Session::has('screen') && Session::get('screen') == 'register')



                                @error('first_name') <span class="error text-danger">{{ $message }}</span> @enderror



                                @endif



                                



                                <input type="text" placeholder="Last Name" name="last_name" @if(old('last_name')) value="{{old('first_name')}}" @endif />



                                @if(Session::has('screen') && Session::get('screen') == 'register')



                                @error('last_name') <span class="error text-danger">{{ $message }}</span> @enderror



                                @endif



                                



                                <input type="email" placeholder="Email" name="email" @if(old('email')) value="{{old('email')}}" @endif />



                                 @if(Session::has('screen') && Session::get('screen') == 'register')



                                @error('email') <span class="error text-danger">{{ $message }}</span> @enderror







                                @endif



                                <div class="password-filed">



                                    <input type="password" id="login_password" placeholder="Password" name="password" />



                                    <span class="input-group-btn eye-close" id="eyeSlash">



                                       <button class="btn btn-default reveal" onclick="visibility3()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>



                                    </span>



                                    <span class="input-group-btn eye-open" id="eyeShow" style="display: none;">



                                       <button class="btn btn-default reveal" onclick="visibility3()" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>



                                    </span>



                                </div>



                                <div class="password-filed">



                                    <input type="password" placeholder="Re-enter password" id="login_password2" name="password_confirmation" />



                                    <span class="input-group-btn eye-close" id="eyeSlash2">



                                       <button class="btn btn-default reveal" onclick="visibility2()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>



                                     </span>



                                    <span class="input-group-btn eye-open" id="eyeShow2" style="display: none;">



                                        <button class="btn btn-default reveal" onclick="visibility2()" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>



                                    </span>



                                </div>



                                  @if(Session::has('screen') && Session::get('screen') == 'register')



                                 @error('password') <span class="error text-danger">{{ $message }}</span> @enderror



                                 @endif



                                <button type="submit" class="site-btn blue-btn">Sign Up</button>



                                <p class="mobile-swipe-btn">Already registered?<a class="signIn-mobile">Sign in</a></p>



                            </form>



                            <div class="signin-bottom-cont">



                                <p>By signing in, you agree to company name</p>



                                <p>



                                    <a href="#">Terms and Conditions</a>



                                    <span>and</span>



                                    <a href="#">Privacy Policy</a>



                                </p>



                            </div>



                        </div>



                        <div class="form-container sign-in-container">



                            <form action="{{ route('login') }}" method="POST">



                                @csrf



                                <h2 class="h2">Sign in</h2>



                                <!-- <span>or use your account</span> -->


                                  @if(Session::has('screen') && Session::get('screen') == 'login')



                                   @error('email') <span class="error text-danger">{{ $message }}</span> @enderror



                                  @endif



                                <input type="hidden" name="login_from" value="frontend" />



                                <input type="email" placeholder="Email" name="email" />



                                <div class="password-filed">



                                <input type="password" placeholder="Password" id="login_password1" name="password" />



                                    <span class="input-group-btn  eye-close" id="eyeSlash1">



                                       <button class="btn btn-default reveal" onclick="visibility4()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>



                                    </span>



                                    <span class="input-group-btn  eye-open" id="eyeShow1" style="display: none;">



                                       <button class="btn btn-default reveal" onclick="visibility4()" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>



                                    </span>



                                </div>
    

                                @if (Session::has('not_varify'))

                                <span class="error text-danger">{{ Session::get('not_varify') }}</span><br>
                               <!--  <p>If you haven't received verification email. Please <a href="{{ route('resendemail') }}">click here</a> to resend the email</p> -->

                                @endif

                                <a href="{{ route('password.request.front') }}">Forgot your password?</a>



                                <button type="submit" class="site-btn blue-btn">Sign In</button>



                                <p class="mobile-swipe-btn">Not registered?<a class="signUp-mobile" href="#">Sign Up</a></p>



                            </form>



                            <div class="signin-bottom-cont">



                                <p>By signing in, you agree to company name</p>



                                <p>



                                    <a href="#">Terms and Conditions</a>



                                    <span>and</span>



                                    <a href="#">Privacy Policy</a>



                                </p>



                            </div>



                        </div>



                        <div class="overlay-container">



                            <div class="overlay">



                                <div class="overlay-panel overlay-left">



                                    <h2 class="h2">Welcome Back!</h2>



                                    <p>To keep connected with us please login with your personal info</p>



                                    <button class="ghost site-btn light-blue-btn" id="signIn">Sign In</button>



                                </div>



                                <div class="overlay-panel overlay-right">



                                    <h2 class="h2">Hello, Friend!</h2>



                                    <p>Enter your personal details and start journey with us</p>



                                    <button class="ghost site-btn light-blue-btn" id="signUp">Sign Up</button>



                                </div>



                            </div>



                        </div>



                    </div>



                </div>



            </div>



        </div>



    </div>



    <!-- modal end -->



<script type="text/javascript">







function visibility2() {



  var x = document.getElementById('login_password2');



  if (x.type === 'password') {



    x.type = "text";



    $('#eyeShow2').show();



    $('#eyeSlash2').hide();



  }else {



    x.type = "password";



    $('#eyeShow2').hide();



    $('#eyeSlash2').show();



  }



}



function visibility3() {



  var x = document.getElementById('login_password');



  if (x.type === 'password') {



    x.type = "text";



    $('#eyeShow').show();



    $('#eyeSlash').hide();



  }else {



    x.type = "password";



    $('#eyeShow').hide();



    $('#eyeSlash').show();



  }



}



function visibility4() {



  var x = document.getElementById('login_password1');



  if (x.type === 'password') {



    x.type = "text";



    $('#eyeShow1').show();



    $('#eyeSlash1').hide();



  }else {



    x.type = "password";



    $('#eyeShow1').hide();



    $('#eyeSlash1').show();



  }



}











    @if(Session::has('screen') && Session::get('screen') == 'register' && count($errors) > 0)



        $('#sign-in-form').css('display', 'block');







        $('#container').addClass("right-panel-active");



        @php



            Illuminate\Support\Facades\Session::forget('screen');



        @endphp



    @endif



    @if(Session::has('screen') && Session::get('screen') == 'login' && count($errors) > 0)



        $('#sign-in-form').css('display', 'block');







        $('#container').addClass("left-panel-active");



        @php



            Illuminate\Support\Facades\Session::forget('screen');



        @endphp



    @endif







</script>







</div>
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
<script>
$(function() {
    $('#sign-in-form').modal('show');
   // $('#myModal').modal('show');
});
</script>
@endif

<script type="text/javascript">



    $("[type='number']").keypress(function (evt) {



    evt.preventDefault();



});



</script>















