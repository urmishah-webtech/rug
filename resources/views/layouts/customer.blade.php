<html>

@php 
$value = \App\Models\preference::where(['id' => 1])->first();
@endphp

<head>



    <meta charset="utf-8">



    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="description" content="{{$value->meta_description}}">

    <meta name="title" content="{{$value->meta_title}}">

    <link rel="icon" href="{{ asset('storage/'.$value['social_img']) }}" type="image/jpg">


    <title>{{ config('app.name', 'Shoes, Sneaker, Clothes &amp; Clothing') }}</title>



    @livewireStyles



<!--     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"



          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->



<!--     <link rel="stylesheet" type="text/css" href="{{ URL::asset('/styles/my-login.css') }}"> -->



    <!---Slick Carousel--->



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>





    <!---------Link font Awsome---------->



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Bootstrap CSS  -->



    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->



        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />



        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />



        <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> -->

    <link href="{{ URL::asset('/styles/main.css') }}" type="text/css" rel="stylesheet" />





    <!-- <script src="{{ URL::asset('/js/font.js') }}"></script> -->



    <!-----Custom-css-->



<!--     <link rel="stylesheet" href="{{ URL::asset('/css/mansory.css') }}"> -->



{{--        <link rel="stylesheet" type="text/css" href="slick/slick.css" />--}}



{{--        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />--}}



<!-- Scripts -->

   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->



   

<!--     <script type="text/javascript" src="{{ URL::asset('js/main.js') }}'"></script> -->



    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>



    <!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->



    <!-- <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script> -->



    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>



    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



</head>



<body>



   @php $symbol = CurrencySymbol(); @endphp





<div class="container-fluid m-0 p-0">



    <div class="first-container"></div>



    <!-- Page Heading -->



    <livewire:header/>





</div>



<!-- Page Heading -->



@if (isset($header))



    {{ $header }}



@endif





<!-- Page Content -->



<main>

     <div>

        @if (session()->has('message'))

            <div class="alert alert-success alert-msg-modal text-center">
                <div class="alert-success-modal">
                    <div class="container">
                        <p class="success-msg">
                            <img src="{{ asset('assets/success.png') }}">
                            {{ session('message') }}

                        </p>
                    </div>
                </div>
            </div>

        @endif

        @if (session()->has('warning'))

            <div class="alert alert-warning alert-msg-modal text-center">
                <div class="alert-warning-modal">
                    <div class="container">
                        <p class="delete-msg">
                            <img src="{{ asset('assets/warning-icon.png') }}">
                            {{ session('warning') }}
                        </p>
                        <a href="#" class="close site-btn" data-dismiss="alert" aria-label="close">Close</a>
                    </div>
                </div>
            </div>

        @endif

        @if (session()->has('alert'))

            <div class="alert alert-danger alert-msg-modal text-center">
                <div class="alert-danger-modal">
                    <div class="container">
                        <p class="delete-msg">
                            <img src="{{ asset('assets/delete-icon.png') }}">
                            {{ session('alert') }}
                        </p>
                    </div>
                </div>
            </div>

        @endif

        @if (session()->has('success'))

            <div class="alert alert-success alert-msg-modal text-center">
                <div class="alert-success-modal">
                    <div class="container">
                        <p class="success-msg">
                            <img src="{{ asset('assets/success.png') }}">
                            {{ session('success') }}
                        </p>
                        <a href="#" class="close site-btn" data-dismiss="alert" aria-label="close">Close</a>
                    </div>
                </div>
            </div>

        @endif

    </div>

    @php 

        Illuminate\Support\Facades\Session::forget('message'); 

        Illuminate\Support\Facades\Session::forget('warning'); 

        Illuminate\Support\Facades\Session::forget('alert'); 

        Illuminate\Support\Facades\Session::forget('success'); 

    @endphp

    





    {{ $slot }}



</main>



<livewire:footer/>





@livewireScripts

<!-- Optional JavaScript & Slice Carousel -->

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> -->



<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

<!-- jQuery first, then Bootstrap JS -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>



<script src="{{ URL::asset('/js/front/custom.js') }}"></script>

</body>



</html>





<script>

    $("#ratinginput").rating();

 

    $(document).ready(function() {

        $(document).on('click', '.qty-plus', function () {

           $(this).prev().val(+$(this).prev().val() + 1);

        });

        $(document).on('click', '.qty-minus', function () {

           if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);

        });

    });

    

    $(document).ready(function () {



        item = 1;



        $('.item-plus').on('click', function () {



            item++;



            $(this).parent().parent().find('.total-item').text(item);



        });



        $('.item-minus').on('click', function () {



            if (item > 0) {



                item--;



            }



            $(this).parent().parent().find('.total-item').text(item);



        });











        $('#drop-down-div,#cs-close').on('click', function () {



            $('.drop-down-container').toggleClass('drop-down-anim');



            $('#drop-btn').toggleClass('rotate');



        });







        $('header .header-mid .my-cart button').mouseover(function () {



            $('header .header-mid .my-cart button .cart-img').css('transform', 'scale(1.1)');



        });







        $('header .header-mid .my-cart button').mouseout(function () {



            $('header .header-mid .my-cart button .cart-img').css('transform', 'scale(1)');



        });







        $('#searched-input').on('click', function () {



            $('#autofill').toggle();



        });



        /*Items in Cart*/



        cartItems = 1;



        $('#mycart-btn').on('click', function () {



            if (cartItems > 0) {



                if ($('body').width() > 910) {



                    $('header .header-mid #my-cart button #cartItems').text(cartItems + " ITEM IN CART");



                    $('header .header-mid #my-cart button #cartItems').addClass('clearContent');



                }



            }



        });



        /*Background fill if cart items is greater than 0*/



        $('body').each(function () {



            if (cartItems > 0) {



                $('#mycart-btn').addClass('bg-cart');



            } else {



                $('#mycart-btn').removeClass('bg-cart');



            }



        });



        /*End of Items in Cart*/







        /*Media Query for mycart*/



        function myFunction(x) {



            if (x.matches) {



                $('header .header-mid .my-cart button #cartItems').text("");



                $('header .header-mid .my-cart button #cartItems').removeClass('clearContent');



            } else {



                if (cartItems > 0) {



                    $('header .header-mid .my-cart button #cartItems').text(cartItems + " ITEM IN CART");



                    $('header .header-mid .my-cart button #cartItems').addClass('clearContent');



                    $(this).addClass('bg-cart');



                }



            }



        }







        var x = window.matchMedia("(max-width: 910px)")



        myFunction(x)



        x.addListener(myFunction);

        /*** Dont Remove it will update heart color when its span has liked class**/



        $('.heart').each(function () {



            heart = $(this);



            if (heart.hasClass("liked")) {



                heart.html('<i class="fas fa-heart" aria-hidden="true"></i>');



            } else {



                heart.html('<i class="far fa-heart" aria-hidden="true"></i>');



            }



        });



        /*Heart Clicked*/



        $(".move-heart-button").click(function () {



            heart = $(this).find('.heart');



            if (heart.hasClass("liked")) {



                heart.html('<i class="far fa-heart" aria-hidden="true"></i>');



                heart.removeClass("liked");



            } else {



                heart.html('<i class="fas fa-heart" aria-hidden="true"></i>');



                heart.addClass("liked");



            }



        });



        /****/







        $('.signin-btn').on('click', function () {



            $('.sign-in-form').show();



            $('.first-container').show();



            $('#proceed-cart').hide();



        });







        $('.turn-btn,.first-container,.turn-cross').on('click', function () {



            $('body').toggleClass("pause-page");



            $(this).siblings('.turn-child').toggle();



            if ($('.first-container').is(":visible")) {



                $('.turn-child').hide();



            }







            $('.first-container').toggle();



        });











    });



    /* ---------background black------------*/







</script>











<script>



    $(document).ready(function () {



        $(".wish-icon i").click(function () {



            $(this).toggleClass("fa-heart fa-heart-o");



        });



    });



</script>



<!--FOOTER OF THE WEB -->









