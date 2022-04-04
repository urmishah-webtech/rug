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
    margin-right: 40px;
    margin-left: 32px; 
    background-image: none;
    opacity: 1;
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
          #slider-container {
          box-shadow: 0 0 0 1px rgb(63 63 68 / 5%), 0 1px 3px 0 rgb(63 63 68 / 15%);
          position: relative;
          overflow: hidden;
          padding: 20px;
          }
          #slider-container .btn {
          position: absolute;
          top: calc(50% - 30px);
          height: 20px;
          width: 20px;
          border-left: 8px solid #ccc;
          border-top: 8px solid #ccc;
          }
          #slider-container .btn:hover {
          transform: scale(1.2);
          }
          #slider-container .btn.inactive {
          border-color: rgb(153, 121, 126)
          }
          #slider-container .btn:first-of-type {
          transform: rotate(-45deg);
          left: 10px
          }
          #slider-container .btn:last-of-type {
          transform: rotate(135deg);
          right: 10px;
          }
          #slider-container #slider {
          display: flex;
          width: 1000%;
          height: 100%; 
          transition: all .5s;
          }
          #slider-container #slider .slide {
          box-shadow: 0 0 0 1px rgb(63 63 68 / 5%), 0 1px 3px 0 rgb(63 63 68 / 15%);
          margin: auto 10px;
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
          @media only screen and (min-width: 1100px) {
          #slider-container #slider .slide {
          width: calc(2.5% - 20px);
          }
          }
          @media only screen and (max-width: 1100px) {
          #slider-container #slider .slide {
          width: calc(3.3333333% - 20px);
          }
          }
          @media only screen and (max-width: 900px) {
          #slider-container #slider .slide {
          width: calc(5% - 20px);
          }
          }
          @media only screen and (max-width: 550px) {
          #slider-container #slider .slide {
          width: calc(10% - 20px);
          }
          }
          .w-h-image{
          width: 100%;
          height: 200px;
          object-fit: cover;
          }
       </style>
       <section class="">
          <article>
          <div class="columns home-left-sec">
          <article>
             <div class="column six">
                <div class="card">
                   <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL CUSTOMER</h3>
                   <p class="fw-6 fs-26">
                      @if(!empty($User)) {{$User}} @else No sales yet @endif
                      <svg class="chart-svg _1KiF5" viewBox="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg">
                         <g fill="none">
                            <polygon points="0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00 50 30 0 30" class="_2xfgW" style="fill: rgb(0, 161, 159); fill-opacity: 0.3;"></polygon>
                            <path class="_1Pq_P" d="M 0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00" stroke-dasharray="95.60269927978516" stroke-dashoffset="95.60269927978516" stroke-width="1.5" style="stroke: rgb(0, 161, 159);"></path>
                            <circle class="_3HS19" cx="50" cy="30" r="2" style="fill: rgb(0, 161, 159);"></circle>
                         </g>
                      </svg>
                   </p>
                </div>
             </div>
             <div class="column six">
                <div class="card">
                   <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL PRODUCT</h3>
                   <p class="fw-6 fs-26">
                      @if($product) {{$product}} @else No sales yet @endif
                      <svg class="chart-svg _1KiF5" viewBox="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg">
                         <g fill="none">
                            <polygon points="0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00 50 30 0 30" class="_2xfgW" style="fill: rgb(0, 161, 159); fill-opacity: 0.3;"></polygon>
                            <path class="_1Pq_P" d="M 0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00" stroke-dasharray="95.60269927978516" stroke-dashoffset="95.60269927978516" stroke-width="1.5" style="stroke: rgb(0, 161, 159);"></path>
                            <circle class="_3HS19" cx="50" cy="30" r="2" style="fill: rgb(0, 161, 159);"></circle>
                         </g>
                      </svg>
                   </p>
                </div>
             </div>
             <div class="column six">
                <div class="card">
                   <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL ORDERS</h3>
                   <p class="fw-6 fs-26">
                      @if($order) {{$order}} @else No sales yet @endif
                      <svg class="chart-svg _1KiF5" viewBox="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg">
                         <g fill="none">
                            <polygon points="0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00 50 30 0 30" class="_2xfgW" style="fill: rgb(0, 161, 159); fill-opacity: 0.3;"></polygon>
                            <path class="_1Pq_P" d="M 0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00" stroke-dasharray="95.60269927978516" stroke-dashoffset="95.60269927978516" stroke-width="1.5" style="stroke: rgb(0, 161, 159);"></path>
                            <circle class="_3HS19" cx="50" cy="30" r="2" style="fill: rgb(0, 161, 159);"></circle>
                         </g>
                      </svg>
                   </p>
                </div>
             </div>
          </article>
          <div class="card suggested-reading-card">
         
       </section>
       <section class="">
       <div class="card">
       <h5>Product Wise Sale</h5>
       <div id="containergraph"></div>
       </div>
       </section>


       
       <section>

       
            <div class="row">
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
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <div class="right carousel-control">
                            <a href="#carousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
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
                 valuePrefix: '$'
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