<div>
<x-customer-layout>

        <!-- banner start -->
        <div class="banner">        
            <img src="{{ asset('assets/main.gif') }}">
        </div>
        <!-- banner end -->

        <!-- home category section start -->
        <div class="home-category-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 home-cat-box">
                        <figure><img src="https://m.media-amazon.com/images/G/01/2020/homepage12.7/HOMEPAGE-TRIPTYCH-WOMENS-COATS-OUTERWEAR-500x500_1.jpg"></figure>
                        <div class="home-cat-box-cont">
                            <h4 class="h4">Cozy at Home: Clothing Favourites</h4>
                            <p>Super-soft pieces that look and feel amazing!</p>
                            <a href="#" class="site-link-btn">Shop Cozy Clothing <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 home-cat-box">
                        <figure><img src="https://m.media-amazon.com/images/G/01/2020/homepage12.7/HOMEPAGE-TRIPTYCH-KIDS-COATS-OUTERWEAR-500x500.jpg"></figure>
                        <div class="home-cat-box-cont">
                            <h4 class="h4">Cozy at Home: Clothing Favourites</h4>
                            <p>Super-soft pieces that look and feel amazing!</p>
                            <a href="#" class="site-link-btn">Shop Cozy Clothing <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 home-cat-box">
                        <figure><img src="https://m.media-amazon.com/images/G/01/2020/homepage12.7/HOMEPAGE-TRIPTYCH-MENS-COATS-OUTERWEAR-500x500.jpg"></figure>
                        <div class="home-cat-box-cont">
                            <h4 class="h4">Cozy at Home: Clothing Favourites</h4>
                            <p>Super-soft pieces that look and feel amazing!</p>
                            <a href="#" class="site-link-btn">Shop Cozy Clothing <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- home second section end -->

        <!-- home left container section start-->
        <div class="left-container-sec half-container-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5 half-container">
                        <h2 class="h2">The Cozy Shop</h2>
                        <p>Supremely cozy looks for all your plan(or not-plans) - because around-the-clock cozy is the name of our game.</p>
                        <a href="#" class="site-btn blue-border-btn">Peak Cozy Right This Way</a>
                    </div>
                    <div class="col-lg-8 col-md-7 full-container">
                        <div class="full-container-img">
                            <figure><img src="../assets/women3.jpg"></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- home left container section end -->

        <!-- home right container section start-->
        <div class="right-container-sec half-container-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-7 full-container">
                        <div class="full-container-img">
                            <figure><img src="https://m.media-amazon.com/images/G/01/2020/style-room/HOMEPAGE-THE-STYLE-ROOM-ADIDAS-STELLA-MCCARTNEY-DECEMBER-965x500.jpg"></figure>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 half-container">
                        <h2 class="h2">The Cozy Shop</h2>
                        <p>Supremely cozy looks for all your plan(or not-plans) - because around-the-clock cozy is the name of our game.</p>
                        <a href="#" class="site-btn blue-border-btn ">Peak Cozy Right This Way</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- home left container section end -->

        <!-- Home Product section start -->
        <div class="home-product-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 home-pd-col">
                        <h2 class="h2">UGG® for Her: Impeccable Style, Cozy Comfort</h2>
                        <a href="#" class="site-btn blue-border-btn">shop women's ugg®</a>
                        <img src="https://m.media-amazon.com/images/G/01/2020/homepage12.14/500x740_LLBean.jpg">
                    </div>
                    <div class="col-md-8 home-pd-col">
                        <div class="cat-product-section">
                            <div class="row" >
                                @if(count($this->Product) > 0)
                                @foreach($this->Product as $result)
                                @php $priceres = allprice($result->id) @endphp
                                <div class="col-md-4 cat-pd-col"  >
                                    <div class="cat-pd-img" wire:target="refresh" >
                                        @if($result['productmediaget'] && isset($result['productmediaget'][0]))
                                        <a href="{{ route('product-front-detail', $result->seo_utl) }}">
                                            <img src="{{ asset('storage/'.$result['productmediaget'][0]['image']) }}">
                                        </a>
                                        @endif

                                        <!-- Wish-list code -->
                                        @php
                                        $favresult = favorite($result->id);
                                        @endphp
                                        @if(!empty($favresult))
                                         <a class="cat-wishlist-btn wishlist-pd wish-list add-wishlist" wire:click="UpdateWish(false, {{$result->id}});refresh()"><i class="fa fa-heart-o" aria-hidden="true"></i> <?php echo count($result['favoriteget']); ?></a>

                                         @else

                                         <a class="cat-wishlist-btn wishlist-pd wish-list" wire:click="UpdateWish(true, {{$result->id}}); refresh()"><i class="fa fa-heart-o" aria-hidden="true"></i> <?php echo count($result['favoriteget']); ?></a>

                                        @endif 
                                        <!-- Wish-list code ends -->
                                        
                                    </div>
                                    <div class="cat-pd-content">
                                        <a href="{{ route('product-front-detail', $result['seo_utl']) }}">
                                            <h6 class="h6">{{$result->title}}</h6>
                                            <p>Slipper Socks</p>
                                        </a>
                                        @if(!empty($priceres))
                                        <p class="product-price @if(!empty($priceres['label'])) {{$priceres['label']}} @endif" >
                                        <span class="mrp-price">${{number_format($priceres['price'],2,'.',',')}}
                                        </span>
                                        @if(!empty($priceres['selling_price']))
                                        <span class="msrp-price"><s>MSRP: ${{number_format($priceres['selling_price'],2,'.',',')}}</s></span>
                                        @endif
                                        </p>
                                        @endif
                                  
                                        <div class="cat-pd-review">
                                            <p class="review-gold"><i class="fa fa-star" aria-hidden="true"></i></p>
                                            <p class="review-gold"><i class="fa fa-star" aria-hidden="true"></i></p>
                                            <p class="review-gold"><i class="fa fa-star" aria-hidden="true"></i></p>
                                            <p class="review-gold"><i class="fa fa-star" aria-hidden="true"></i></p>
                                            <p><i class="fa fa-star" aria-hidden="true"></i></p>
                                            <span>(595)</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Home Product section end -->

        <!-- home mini banner start -->
        <div class="home-mini-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="mini-banner-content">
                            <h2 class="h2">Earn a Total of 5% Back at Rug</h2>
                            <p>Automatically earn a total of 5% Back on all Rug purchases when using your Amazon Rewards Visa card.*</p>
                            <a href="#" class="site-btn blue-border-btn">Learn more</a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                    </div>
                </div>
            </div>
        </div>
        <!-- home mini banner end -->

        <!-- home category section start -->
        <div class="home-category-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 home-cat-box">
                        <figure><img src="https://m.media-amazon.com/images/G/01/zopus2020v/tony/TonyHsieh-500x500.jpg"></figure>
                        <h4 class="h4">Cozy at Home: Clothing Favourites</h4>
                        <p>Super-soft pieces that look and feel amazing!</p>
                        <a href="#" class="site-link-btn">Shop Cozy Clothing <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-4 home-cat-box">
                        <figure><img src="https://m.media-amazon.com/images/G/01/zappos/landing/opus/2020/homepage/july/NCR-01.svg"></figure>
                        <h4 class="h4">Cozy at Home: Clothing Favourites</h4>
                        <p>Super-soft pieces that look and feel amazing!</p>
                        <a href="#" class="site-link-btn">Shop Cozy Clothing <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-4 home-cat-box">
                        <figure><img src="https://m.media-amazon.com/images/G/01/zappos/landing/opus/2020/homepage/july/Inthistogether.jpg"></figure>
                        <h4 class="h4">Cozy at Home: Clothing Favourites</h4>
                        <p>Super-soft pieces that look and feel amazing!</p>
                        <a href="#" class="site-link-btn">Shop Cozy Clothing <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- home second section end -->
</x-customer-layout>
</div>
