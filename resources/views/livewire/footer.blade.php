<div>
    <footer name="footer" id="footer" class="page-footer">
        <div class="newsletter-col">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="h4">Newsletter</h4>
                        <p>Make your inbox happy by joining our newsletter!</p>
                        <form action="" class="footer-input">
                            <input type="email" placeholder="Email">
                            <button class="site-btn blue-btn" id="btn-ouline-nl">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-inner">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-3 col-md-3">
                        <h4 class="h4">Explore Rugs</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Clothing</a></li>
                            <li><a href="#">The Style room</a></li>
                            <li><a href="#">Eyewear</a></li>
                            <li><a href="#">New Arrivals</a></li>
                            <li><a href="#">Outdoor</a></li>
                            <li><a href="#">Rideshop</a></li>
                            <li><a href="#">Running</a></li>
                            <li><a href="#">Jackets</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Clothing</a></li>
                            <li><a href="#">The Style room</a></li>
                            <li><a href="#">Eyewear</a></li>
                            <li><a href="#">New Arrivals</a></li>
                            <li><a href="#">Outdoor</a></li>
                            <li><a href="#">Rideshop</a></li>
                            <li><a href="#">Running</a></li>
                            <li><a href="#">Jackets</a></li>
                        </ul>        
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="col-12 p-0 footer-inner-col">
                            <h4 class="h4">Customer Service</h4>
                            <ul class="list-unstyled">
                                <li><a href="{{route('faqs')}}">FAQs</a></li>
                                <li><a href="#">Contact Info</a></li>
                                <li><a href="#">Shipping and return</a></li>
                                <li><a href="#">About proposition</a></li>
                                <li><a href="#">Delievery</a></li>
                            </ul>
                        </div>
                        <div class="col-12 p-0 footer-inner-col">
                            <h4 class="h4">Fit Info</h4>
                            <ul class="list-unstyled">
                                <li><a href="#">Measrement Guides</a></li>
                                <li><a href="#">Size Conversion Chart</a></li>
                                <li><a href="#">Measure you Bra size</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="col-12 p-0 footer-inner-col">
                            <h4 class="h4">About Rugs</h4>
                            <ul class="list-unstyled">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Beyond box</a></li>
                                <li><a href="#">Rugs for good</a></li>
                                <li><a href="#">Rugs insights</a></li>
                                <li><a href="#">Tours</a></li>
                                <li><a href="#">Get mobile app</a></li>
                                <li><a href="#">Cupons</a></li>
                            </ul>
                        </div>
                        <div class="col-12 p-0 footer-inner-col">
                            <h4 class="h4">Resources</h4>
                            <ul class="list-unstyled">
                                <li><a href="#">Assosiated Programs</a></li>
                                <li><a href="#">jobs</a></li>
                                <li><a href="#">Press Kit</a></li>
                                <li><a href="#">Glossary</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 footer-last-col">
                        <div class="col-12 p-0 footer-inner-col footer-social-col">
                            <h4 class="h4">Connect With Us</h4>
                            <ul class="footer-social">
                                <li>
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-copyrigh">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                @foreach($pages as $row)
                                <li>
                                    <a href="{{ route('pages-front',$row->seo_url) }}">{{$row->title}}</a>
                                </li>
                                @endforeach
                                <li>
                                    <a href="#">Interest-based Ads</a>
                                </li>
                                <li>
                                    <a href="#">24/7 Customer Service (123)456-789</a>
                                </li>
                            </ul>
                            <p>&copy; 2020-2021 - Company Name</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>  

