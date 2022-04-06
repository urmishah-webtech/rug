<div>
  <x-admin-layout>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
     <script src="https://code.highcharts.com/highcharts.js"></script>
     <style>
        .shadow-custom{
        box-shadow: 0 0 0 1px rgb(63 63 68 / 5%), 0 1px 3px 0 rgb(63 63 68 / 15%);
        }
        .carousel-control { 
        width: 8%;
        width: 0px;
        }
        .carousel-control.left,
        .carousel-control.right { 
        margin-right: 10px;
        margin-left: 10px; 
        background-image: none;
        opacity: 1;
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
        }
        .active > div { display:none; }
        .active > div:first-child { display:block; }
        /*xs*/
        @media (max-width: 767px) {
        .carousel-inner .active.left { left: -50%; }
        .carousel-inner .active.right { left: 50%; }
        .carousel-inner .next        { left:  50%; }
        .carousel-inner .prev		     { left: -50%; }
        .carousel-col                { width: 50%; }
        .active > div:first-child + div { display:block; }
        }
        /*sm*/
        @media (min-width: 768px) and (max-width: 991px) {
        .carousel-inner .active.left { left: -50%; }
        .carousel-inner .active.right { left: 50%; }
        .carousel-inner .next        { left:  50%; }
        .carousel-inner .prev		     { left: -50%; }
        .carousel-col                { width: 50%; }
        .active > div:first-child + div { display:block; }
        }
        /*md*/
        @media (min-width: 992px) and (max-width: 1199px) {
        .carousel-inner .active.left { left: -33%; }
        .carousel-inner .active.right { left: 33%; }
        .carousel-inner .next        { left:  33%; }
        .carousel-inner .prev		     { left: -33%; }
        .carousel-col                { width: 33%; }
        .active > div:first-child + div { display:block; }
        .active > div:first-child + div + div { display:block; }
        }
        /*lg*/
        @media (min-width: 1200px) {
        .carousel-inner .active.left { left: -25%; }
        .carousel-inner .active.right{ left:  25%; }
        .carousel-inner .next        { left:  25%; }
        .carousel-inner .prev		     { left: -25%; }
        .carousel-col                { width: 25%; }
        .active > div:first-child + div { display:block; }
        .active > div:first-child + div + div { display:block; }
        .active > div:first-child + div + div + div { display:block; }
        }
        .block {
        width: 306px;
        height: 230px;
        }
        .red {background: red;}
        .blue {background: blue;}
        .green {background: green;}
        .yellow {background: yellow;}
        #containergraph{
        width: 100% ;
        padding-top: 2%;
        height: 400px;
        }
        #container {
        display: grid ;
        }
       
        .carousel-col span {
        color: #000;
        font-size: 16px;
        text-align: left;
        display: block;
        padding: 10px 10px 5px 10px;
        font-weight: 500;
        }
        .carousel-col p {
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
    padding: 40px;
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
               <div class="column six">
                  <div class="card">
                     <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL CUSTOMER</h3>
                     <p class="fw-6 fs-26">
                        @if(!empty($User)) {{$User}} @else No sales yet @endif
                        
                     </p>
                  </div>
               </div>
               <div class="column six">
                  <div class="card">
                     <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL PRODUCT</h3>
                     <p class="fw-6 fs-26">
                        @if($product) {{$product}} @else No sales yet @endif
                        
                     </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="column six">
                  <div class="card">
                     <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL ORDERS</h3>
                     <p class="fw-6 fs-26">
                        @if($order) {{$order}} @else No sales yet @endif
                        
                     </p>
                  </div>
               </div>
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
     <div class="row">
      <h5>Product Wise Sale</h5>
     <div class="col-xs-11 col-md-12 col-centered">
     <div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">
     <div class="carousel-inner">
     @if($mostsellingproduct)
     @foreach($mostsellingproduct as $activekey => $result)
     <div class="item @if($activekey == 0) active @endif">
     <div class="carousel-col">
     @if(!empty($result->image))
     <img src="{{ url('storage/'.$result->image) }}" class="w-h-image">
     @else
     <img src="{{ url('assets/blank-img.jpg') }}" class="w-h-image">
     @endif
     <div class="shadow-custom">
     <span>{{$result->price}}</span>
     <p>{{$result->title}}</p>
     </div>
     </div>
     </div>
     @endforeach
     @endif
     </div>
     <!-- Controls -->
     <div class="left carousel-control">
     <a href="#carousel" role="button" data-slide="prev">
      <i class="fas fa-arrow-left " aria-hidden="true"></i>
     <span class="sr-only">Previous</span>
     </a>
     </div>
     <div class="right carousel-control">
     <a href="#carousel" role="button" data-slide="next">
      <i class="fas fa-arrow-right " aria-hidden="true"></i>
     <span class="sr-only">Next</span>
     </a>
     </div>
     </div>
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
             groupPadding: 0.1
                } 
          },
            series: [{
                name: 'Revenue',
                data: [2200, 2800, 2300, 1700, 2000, 1200, 1400]
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
     </script>
  </x-admin-layout>
  </div>