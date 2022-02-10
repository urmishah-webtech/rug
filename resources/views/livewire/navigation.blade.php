<style>

    .vl {

        border-left: 1px #c3cfd8 ridge;

        height: 450px;

    }

</style>

<nav class="navbar navbar-expand-lg navbar-light container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"

            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

    </button>



    <div class="collapse navbar-collapse" id="navbarSupportedContent">



        <ul class="navbar-nav mr-auto menu-ul">

            @foreach($menu_arr as $menu)

                <li class="nav-item dropdown f-bl">

                    <a class="nav-link dropdown-toggle f-bl" href="#" id="navbarDropdown" role="button"

                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        {{$menu['name']}}

                    </a>



                    @if(count($menu['items']) > 0)

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <div class="masonry-with-columns">

                                @foreach($menu['items'] as $menuitem)

                                    <div class="mansory-item">

                                        <div class="dropdown-header">{{$menuitem['label']}}</div>

                                        @if(isset($menuitem['items']))

                                            @foreach($menuitem['items'] as $item)

                                                <a class="dropdown-item" href="#">{{$item['label']}}</a>

                                            @endforeach

                                        @endif

                                    </div>

                                @endforeach

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







                            {{-- <div class="d-md-flex align-items-start justify-content-start" >





                                 @foreach($menu['items'] as $menuitem)

                                     <div>

                                         <div class="dropdown-header">{{$menuitem['label']}}</div>

                                         @if(isset($menuitem['items']))

                                             @foreach($menuitem['items'] as $item)

                                                 <a class="dropdown-item" href="#">{{$item['label']}}</a>

                                             @endforeach

                                         @endif

                                     </div>

                                 @endforeach

                                 @if(isset($menu['images']) && count($menu['images']) > 0)

                                     <div class="vl"></div>

                                     <div>

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

                             </div>--}}

                        </div>

                    @endif

                </li>

            @endforeach

        </ul>

    </div>

    @if (Route::has('login'))

        @auth

            @if(empty(Auth::User()->email_verified_at))

                <a href="#" class=" mr-3 turn-btn f-bl" name="login-btn" id="login-btn">Sign In / Register</a>

            @else

                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item dropdown ">

                        <a class="nav-link dropdown-toggle f-bl" href="#" id="navbarDropdown" role="button"

                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="#">Your Profile</a>

                            <div class="dropdown-divider"></div>

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

            <a href="#" class=" mr-3 turn-btn f-bl" name="login-btn" id="login-btn">Sign In / Register</a>

        @endauth

    @endif



    <section class="sign-in-form turn-child z-999 dis-none col-12 p-0 left position-absolute" id="sign-in-form"

             name="sign-in-form">

        <div class=" position-relative signin-inner m-auto">

            <div class="bg-white position-absolute">

                <div class="top d-flex align-items-center">

                    <h3 class="login-heading p-2 pt-3 pl-3 s-22 f-24 f-bl">Sign-in</h3>

                    <div class="cross-container turn-cross mr-4" id="login-close">

                        <span id="login-close" class="cross"></span>

                        <span id="login-close" class="cross"></span>

                    </div>

                </div>

                <div class="middle row col-12 m-0 p-0">

                    <div class="col-md-6 col-12 left order-md-0 order-1  mt-md-4 pt-md-3">



                        <a href="{{ route('login') }}">

                            <div class="col-md-11 ml-auto mr-auto  signin-item rounded mb-3 d-flex align-items-center">

                                <div class="platform zappos pt-1 ml-auto">

                                    <img class="img-fluid" src="{{ URL::asset('/assets/adminlogo.svg')}}" alt="">

                                </div>

                                <p class="sign-options m-0 ml-1 mr-auto">SIGN IN WITH ZAPOOS</p>

                            </div>

                        </a>



                        <div class="col-md-11 ml-auto mr-auto  signin-item rounded mb-3 d-flex align-items-center">

                            <div class="platform amazon ml-auto">

                                <img class="img-fluid pt-2 mt-1"

                                     src="https://cdn.freebiesupply.com/images/large/2x/amazon-logo-transparent.png"

                                     alt="">

                            </div>

                            <p class="sign-options m-0 ml-2 mr-auto">SIGN IN WITH AMAZON</p>

                        </div>



                        <div class="col-md-11 ml-auto mr-auto  signin-item rounded mb-3 d-flex align-items-center">

                            <div class="platform google ml-auto">

                                <img class="img-fluid w-100 d-block pt-1 mt-1"

                                     src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-google-icon-logo-png-transparent-svg-vector-bie-supply-14.png"

                                     alt="">

                            </div>

                            <p class="sign-options m-0 ml-2 mr-auto">SIGN IN WITH GOOGLE</p>

                        </div>



                        <div class="d-flex m-auto col-12">

                            <span class="ml-auto m-3" style="width: 40%; height:0.13em; background: grey;"></span>

                            <p class="pl-4 pr-4">or</p>

                            <span class="mr-auto m-3" style="width: 40%; height: 0.13em; background: grey;"></span>

                        </div>



                        <a href="{{ route('register') }}">

                            <div class="col-md-11 ml-auto mr-auto  signin-item rounded mb-3 d-flex align-items-center">

                                <div class="platform zappos pt-1 ml-auto d-none">

                                    <img class="img-fluid" src="{{ URL::asset('/assets/adminlogo.svg')}}" alt="">

                                </div>

                                <p class="sign-options m-0 ml-1 m-auto">CREATE YOUR ZAPOOS ACCOUNT</p>

                            </div>

                        </a>



                        <div class="col-8 terms mr-auto ml-auto mt-md-5 mt-4 text-center">

                            <p class="f-12 m-0">By signing in, you agree to Rugs</p>

                            <p class="f-12"><a href="#" class="f-12 underline hover-blue">Terms and Conditions</a> and

                                <a href="#" class="f-12 underline hover-blue">Privacy Policy</a>.</p>

                        </div>



                    </div>

                    <div class="col-md-6 col-12 right pl-md-5">

                        <h5 class="heading f-18 s-16 f-bl">

                            By logging in with Amazon, you may be eligible for additional Prime benefits like FREE

                            Upgraded Shipping. Then, join Rugs VIP for additional Prime-linked VIP perks:

                        </h5>

                        <ul>

                            <li>If you are an Amazon Prime Member, sign in with Amazon to qualify for free upgraded

                                shipping!

                            </li>

                            <li>Get FREE Expedited Shipping</li>

                            <div class="d-none d-md-block">

                                <li>Earn 2 Points for Every $1 Spent</li>

                                <li>Receive Bonus Points on Select Brands</li>

                                <li>Redeem Points for VIP Codes</li>

                            </div>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </section>

</nav>

