<div>
<x-admin-layout>
<section class="full-width home-page">
    <article>
        <div class="columns home-left-sec">
            
            <article>
                <div class="column six">
                    <div class="card">
                        <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL CUSTOMER</h3>
                        <p class="fw-6 fs-26">@if(!empty($User)) {{$User}} @else No sales yet @endif<svg class="chart-svg _1KiF5" viewBox="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg"><g fill="none"><polygon points="0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00 50 30 0 30" class="_2xfgW" style="fill: rgb(0, 161, 159); fill-opacity: 0.3;"></polygon><path class="_1Pq_P" d="M 0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00" stroke-dasharray="95.60269927978516" stroke-dashoffset="95.60269927978516" stroke-width="1.5" style="stroke: rgb(0, 161, 159);"></path><circle class="_3HS19" cx="50" cy="30" r="2" style="fill: rgb(0, 161, 159);"></circle></g></svg></p>
                       
                    </div>
                </div>
                <div class="column six">
                    <div class="card">
                        <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL PRODUCT</h3>
                        <p class="fw-6 fs-26">@if($product) {{$product}} @else No sales yet @endif<svg class="chart-svg _1KiF5" viewBox="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg"><g fill="none"><polygon points="0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00 50 30 0 30" class="_2xfgW" style="fill: rgb(0, 161, 159); fill-opacity: 0.3;"></polygon><path class="_1Pq_P" d="M 0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00" stroke-dasharray="95.60269927978516" stroke-dashoffset="95.60269927978516" stroke-width="1.5" style="stroke: rgb(0, 161, 159);"></path><circle class="_3HS19" cx="50" cy="30" r="2" style="fill: rgb(0, 161, 159);"></circle></g></svg></p>
                        
                    </div>
                </div>
                <div class="column six">
                    <div class="card">
                        <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL ORDERS</h3>
                        <p class="fw-6 fs-26">@if($order) {{$order}} @else No sales yet @endif<svg class="chart-svg _1KiF5" viewBox="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg"><g fill="none"><polygon points="0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00 50 30 0 30" class="_2xfgW" style="fill: rgb(0, 161, 159); fill-opacity: 0.3;"></polygon><path class="_1Pq_P" d="M 0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00" stroke-dasharray="95.60269927978516" stroke-dashoffset="95.60269927978516" stroke-width="1.5" style="stroke: rgb(0, 161, 159);"></path><circle class="_3HS19" cx="50" cy="30" r="2" style="fill: rgb(0, 161, 159);"></circle></g></svg></p>
                        
                    </div>
                </div>
                

          
            </article>
       
           <div class="dash-pd-sale-stock">
               <div class="row">
                  <div class="col-md-6">
                     <div class="dash-card">
                        <div class="card-header">
                           <h4>product wise sale</h4>
                        </div>
                        <div class="chart-body">
                           <ul class="chart-info">
                              <li>
                                 <span class="chart-info-color blue-color"></span>
                                 <b>Number of sale</b>
                              </li>
                           </ul>
                           <canvas id="PdSaleChart" width="250" height="250"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="top-products-sec dash-card">
               <div class="card-header">
                  <h4>Top  {{ count($mostsellingproduct) }} Products</h4>
               </div>
               <div class="card-body">
                  <div class="top-products-slider">
                  @if($mostsellingproduct)
                    @foreach($mostsellingproduct as $result)
                     <div>
                        <a class="top-pd">
                           @if(!empty($result->image))
                           <img src="{{ url($result->image) }}">
                           @else
                           <img src="{{ url('assets/blank-img.jpg') }}">
                           @endif
                           <div class="top-pd-details">
                              <span class="pd-price">
                                 <?php /* @if(!empty($result->product_MOQ)) <?php echo number_format($result->product_MOQ, 2, '.', ','); ?> @endif */ ?></span>
                                 
                              <span class="pd-name">{{$result->title}}</span>
                           </div>
                        </a>
                     </div>
                     @endforeach
                  @endif
                  </div>
               </div>
            </div> 

        </div>
       
</div>
</article>
</section>
<script type="text/javascript">
   
</script>
</x-admin-layout>
</div>