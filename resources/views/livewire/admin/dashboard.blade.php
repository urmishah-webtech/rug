<div>
   <x-admin-layout>
 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <style>
 
 .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot{
    background-color: #47c5f4 !important;
     background-image: linear-gradient(315deg, #47c5f4 0%, #6791d9 74%) !important;
     outline: none !important;
     color: #fff;
     width: 40px;
     height: 40px;
     border-radius: 50%;
    
 }
 .owl-next span, .owl-prev span{
    font-size: 30px;
    position: relative;
     top: -5px;
 }
 .owl-prev{
   position: absolute;
    left: -25px;
    top: 35%;
}
 .owl-next {
   position: absolute;
    right: -25px;
    top: 35%;
 }
 
 .home-demo h2 {
     color: #FFF;
     text-align: center;
     padding: 5rem 0;
     margin: 0;
     font-style: italic;
     font-weight: 300;
 }
         .shadow-custom{
         box-shadow: 0 0 0 1px rgb(63 63 68 / 5%), 0 1px 3px 0 rgb(63 63 68 / 15%);
         }
         
         .fas.fa-arrow-left {
          position: absolute;
     top: 35%;
     right: 0;
     background: #fff;
     border-radius: 50em;
     border: 0;
     box-shadow: 0 0 1px 1px rgb(20 23 28 / 10%), 0 3px 1px 0 rgb(20 23 28 / 10%);
     font-size: 15px;
     line-height: 40px;
     padding: 0;
     text-align: center;
     -webkit-transform: translateY(-50%);
     width: 40px;
     height: 40px;
         }
         .heightbox{
            height: 70px;
         }

        .home-demo .item {
    box-shadow: 0px 14px 22px -9px #bbcbd8;
     background: #fff;
   
     border: 1px solid #cccccc9e
 }
         .fas.fa-arrow-right {
          position: absolute;
     top: 35%;
     left: 0;
     background: #fff;
     border-radius: 50em;
     border: 0;
     box-shadow: 0 0 1px 1px rgb(20 23 28 / 10%), 0 3px 1px 0 rgb(20 23 28 / 10%);
     font-size: 15px;
     line-height: 40px;
     padding: 0;
     text-align: center;
     -webkit-transform: translateY(-50%);
     width: 40px;
     height: 40px;
         }
         .carousel-control > a > span {
         color: white;
         font-size: 29px !important;
         }
         .carousel-col { 
         position: relative; 
         min-height: 1px; 
         padding: 5px; 
         float: left;
         margin: 8px;
         outline: none !important;
         }
        
       
         #containergraph{
         width: 100% ;
         padding-top: 2%;
         height: 400px;
         }
         #container {
         display: grid ;
         }
        
         .heightbox span {
         color: #000;
         font-size: 16px;
         text-align: left;
         display: block;
         padding: 4px 10px 5px 10px;
         font-weight: 500;
         }
         .heightbox p {
         color: #000;
         font-size: 14px;
         text-align: left;
         display: block;
         padding: 0px 10px 10px 10px;
         }
         
         .w-h-image{
         width: 100%;
         height: 200px;
         object-fit: cover;
         }
         .home-left-sec {
         padding: 32px;
         max-width: unset;
         margin: 0 auto !important;
         }
         section{
           width: 100%;
     margin: 0;
     max-width: unset;
         }
         .ml-0{
           margin-left:0;
           padding-top: 32px;
         }
         .card-bg .card{
           background-color: #47c5f4;
     background-image: linear-gradient(315deg, #47c5f4 0%, #6791d9 74%);
         }
         .card-bg h3{
           color: #fff !important;
           font-size: 18px;
         }
         .card-bg p{
           color: #fff !important;
         }
         .bg-custom-shadow{
           box-shadow: 0 0 0 1px rgb(63 63 68 / 5%), 0 1px 3px 0 rgb(63 63 68 / 15%);
     background: #ffffff;
     border-radius: 8px;
     padding: 30px;
     margin-top: 50px;
     margin-bottom: 50px;
     padding-top: 20px;
 
         }
         .bg-custom-shadow h5{
          padding-bottom: 20px;
         }
      </style>
      <section class="">
 
       <div class="row ">
         <div class="column six">
 
           <div class="home-left-sec card-bg">
             <div class="row">

                <a href="{{ route('customers') }}">
                  <div class="column six">
                     <div class="card">
                        <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL CUSTOMER</h3>
                        <p class="fw-6 fs-26">
                           @if(!empty($User)) {{$User}} @else No sales yet @endif
                           
                        </p>
                     </div>
                  </div>
                </a>
                <a href="{{ route('products') }}">
                  <div class="column six">
                     <div class="card">
                        <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL PRODUCT</h3>
                        <p class="fw-6 fs-26">
                           @if($product) {{$product}} @else No sales yet @endif        
                        </p>
                     </div>
                  </div>
                </a>
             </div>
             <div class="row">
              <a href="{{ route('order-list') }}">
                <div class="column six">
                   <div class="card">
                      <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL ORDERS</h3>
                      <p class="fw-6 fs-26">
                         @if($order) {{$order}} @else No sales yet @endif
                         
                      </p>
                   </div>
                </div>
              </a>
             </div>
             <div class="card suggested-reading-card"></div>
          </div>
         </div>
         <div class="column six ml-0">
           <div class="card">
             <h5>Product Wise Sale</h5>
             <div id="containergraph" ></div>
             </div>
         </div>
       </div>
 
         
      </section>
     
 
 
      
 <section class="bg-custom-shadow">
    <h5>Product Wise Sale</h5>
      <div class="home-demo">
       
       <div class="owl-carousel owl-theme">
          @if($mostsellingproduct)
      @foreach($mostsellingproduct as $activekey => $result)
         <div class="item">
          
           @if(!empty($result->image))
      <img src="{{ url('storage/'.$result->image) }}" class="w-h-image">
      @else
      <img src="{{ url('assets/blank-img.jpg') }}" class="w-h-image">
      @endif
      <div class="heightbox">
      <span>{{$result->price}}</span>
      <p>{{$result->title}}</p>
      </div>
         </div>
 
         @endforeach
      @endif
         
       
         
       </div>
     </div>
    </section>
 
      <script>
         $(function () { 
         Highcharts.setOptions({
         colors: ['#67BCE6'],
         chart: {
             style: {
                 
                 color: '#fff'
             }
         }
         });  
         $('#containergraph').highcharts({
             chart: {
               
                 type: 'column',
                 backgroundColor: '#fff'
             },
             title: {
                 text: 'No. of Sale',
                 style: {  
                   color: '#6d7175'
                 }
             },
             xAxis: {
                 tickWidth: 0,
                 labels: {
                   style: {
                       color: '#6d7175',
                      
                      }
                   },
                 categories: [<?php foreach ($mostsellingproduct as $key => $value): ?>
           '{{$value->title}}',
         <?php endforeach; ?>]
             },
             yAxis: {
                gridLineWidth: .5,
             gridLineDashStyle: 'dash',
             gridLineColor: 'black',
                title: {
                     text: '',
                     style: {
                       color: '#6d7175'
                      }
                 },
                 labels: {
                   formatter: function() {
                             return '$'+Highcharts.numberFormat(this.value, 0, '', ',');
                         },
                   style: {
                       color: '#6d7175',
                      }
                   }
                 },
             legend: {
                 enabled: false,
             },
             credits: {
                 enabled: false
             },
             tooltip: {
                valuePrefix: '€'
             },
             plotOptions: {
             column: {
              borderRadius: 2,
                  pointPadding: 0,
              groupPadding: 0.4
                 } 
           },
             series: [{
                 name: 'Revenue',
                 data: [2200, 2800, 2300, 1700, 2000, 1200, 1400, 1500, 1600, 6000]
             }]
         });
         });
         
         
         
         
         
         $('.carousel[data-type="multi"] .item').each(function() {
         var next = $(this).next();
         if (!next.length) {
         next = $(this).siblings(':first');
         }
         next.children(':first-child').clone().appendTo($(this));
         
         for (var i = 0; i < 2; i++) {
         next = next.next();
         if (!next.length) {
         next = $(this).siblings(':first');
         }
         
         next.children(':first-child').clone().appendTo($(this));
         }
         });
 
         $(function() {
   // Owl Carousel
   var owl = $(".owl-carousel");
   owl.owlCarousel({
      autoplay: true,
     items: 5,
     margin: 10,
     loop: true,
     nav: true,
     dots:false
   });
 });
 
      </script>
   </x-admin-layout>
   </div>