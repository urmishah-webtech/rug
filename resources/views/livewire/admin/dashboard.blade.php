<div>
<x-admin-layout>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style>
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

#slider-container #slider .slide span {
    color: #000;
    font-size: 16px;
    text-align: left;
    display: block;
    padding: 10px 20px 5px 20px;
    font-weight: 500;
}

#slider-container #slider .slide p {
    color: #000;
    font-size: 14px;
    text-align: left;
    display: block;
    padding: 0px 20px 5px 20px;
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
                        <p class="fw-6 fs-26">@if(!empty($User)) {{$User}} @else No sales yet @endif<svg class="chart-svg _1KiF5" viewBox="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg"><g fill="none"><polygon points="0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00 50 30 0 30" class="_2xfgW" style="fill: rgb(0, 161, 159); fill-opacity: 0.3;"></polygon><path class="_1Pq_P" d="M 0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00" stroke-dasharray="95.60269927978516" stroke-dashoffset="95.60269927978516" stroke-width="1.5" style="stroke: rgb(0, 161, 159);"></path><circle class="_3HS19" cx="50" cy="30" r="2" style="fill: rgb(0, 161, 159);"></circle></g></svg></p>
                       
                    </div>
                </div>
                <div class="column six">
                    <div class="card">
                        <h3 class="text-grey fs-12 fw-6 mb-8 tt-u lh-normal">TOTAL PRODUCT</h3>
                        <p class="fw-6 fs-26">@if($product) {{$product}} @else No sales yet @endif<svg class="chart-svg _1KiF5" viewBox="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg"><g fill="none"><polygon points="0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00 50 30 0 30" class="_2xfgW" style="fill: rgb(0, 161, 159); fill-opacity: 0.3;"></polygon><path class="_1Pq_P" d="M 0.00 30.00 5.56 30.00 11.11 30.00 16.67 30.00 22.22 0.00 27.78 30.00 33.33 30.00 38.89 30.00 44.44 30.00 50.00 30.00" stroke-dasharray="95.60269927978516" stroke-dashoffset="95.60269927978516" stroke-width="1.5" style="stroke: rgb(0, 161, 159);"></path><circle class="_3HS19" cx="50" cy="30" r="2" style="fill: rgb(0, 161, 159);"></circle></g></svg></p>
                        
                    </div>
                </div>
            </article>


           <!--  <div class="card suggested-reading-card">
                <article>
                    <div class="column">
                        <div class="suggested-reading-card-left ta-center">
                            <img src="https://cdn.shopify.com/shopifycloud/shopify/assets/admin/home/blogs/blog-card--big-43ceac7c0165886502361aad700356c7ec063ced597ccbba4ff4408b3e41a4a4.svg">
                            <h3 class="fs-12 fw-6 mb-0">SUGGESTED READING</h3>
                        </div>
                    </div>
                    <div class="column">
                        <div class="suggested-reading-card-right">
                            <p class="text-grey fs-12">Because you added a product <button class="secondary"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M6 10a2 2 0 1 1-4.001-.001A2 2 0 0 1 6 10zm6 0a2 2 0 1 1-4.001-.001A2 2 0 0 1 12 10zm6 0a2 2 0 1 1-4.001-.001A2 2 0 0 1 18 10z"></path></svg></button></p>
                            <h3 class="fs-16 fw-6">Compelling product descriptions can persuade visitors to buy. Here are 9 things to add to yours.</h3>
                            <div class="read-blog-btn">
                                <button class="secondary">Read blog post</button>
                                <span class="fs-12 text-grey">6 min read</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div> -->



        </div>

        
        
       

</article>
</section>

<section class="">

    <div class="card">

        <h5>Product Wise Sale</h5>
    <div id="containergraph"></div>
</div>
</section>

<section>
    
<div id="container">
    
    <div id="slider-container">
      <span onclick="slideRight()" class="btn"></span>
      <h5>Product Wise Sale</h5>
        <div id="slider">
            <div class="slide">
              <img src="https://rug.webtech-evolution.com/assets/img/sec1-img.png" alt="" class="w-h-image">
              <span>100</span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit maxime placeat architecto illo</p>

            </div>
            <div class="slide">
                <img src="https://rug.webtech-evolution.com/assets/img/sec1-img.png" alt="" class="w-h-image">
                <span>100</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit maxime placeat architecto illo</p>
  
              </div>
              <div class="slide">
                <img src="https://rug.webtech-evolution.com/assets/img/sec1-img.png" alt="" class="w-h-image">
                <span>100</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit maxime placeat architecto illo</p>
  
              </div>
              <div class="slide">
                <img src="https://rug.webtech-evolution.com/assets/img/sec1-img.png" alt="" class="w-h-image">
                <span>100</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit maxime placeat architecto illo</p>
  
              </div>
              <div class="slide">
                <img src="https://rug.webtech-evolution.com/assets/img/sec1-img.png" alt="" class="w-h-image">
                <span>100</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit maxime placeat architecto illo</p>
  
              </div>
              <div class="slide">
                <img src="https://rug.webtech-evolution.com/assets/img/sec1-img.png" alt="" class="w-h-image">
                <span>100</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit maxime placeat architecto illo</p>
  
              </div>
      </div>
      <span onclick="slideLeft()" class="btn"></span>
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
            categories: ['May 5', 'May 6', 'May 7', 'May 8', 'May 9', 'May 10', 'May 11']
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


var container = document.getElementById('container')
var slider = document.getElementById('slider');
var slides = document.getElementsByClassName('slide').length;
var buttons = document.getElementsByClassName('btn');


var currentPosition = 0;
var currentMargin = 0;
var slidesPerPage = 0;
var slidesCount = slides - slidesPerPage;
var containerWidth = container.offsetWidth;
var prevKeyActive = false;
var nextKeyActive = true;

window.addEventListener("resize", checkWidth);

function checkWidth() {
    containerWidth = container.offsetWidth;
    setParams(containerWidth);
}

function setParams(w) {
    if (w < 551) {
        slidesPerPage = 1;
    } else {
        if (w < 901) {
            slidesPerPage = 2;
        } else {
            if (w < 1101) {
                slidesPerPage = 3;
            } else {
                slidesPerPage = 4;
            }
        }
    }
    slidesCount = slides - slidesPerPage;
    if (currentPosition > slidesCount) {
        currentPosition -= slidesPerPage;
    };
    currentMargin = - currentPosition * (100 / slidesPerPage);
    slider.style.marginLeft = currentMargin + '%';
    if (currentPosition > 0) {
        buttons[0].classList.remove('inactive');
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove('inactive');
    }
    if (currentPosition >= slidesCount) {
        buttons[1].classList.add('inactive');
    }
}

setParams();

function slideRight() {
    if (currentPosition != 0) {
        slider.style.marginLeft = currentMargin + (100 / slidesPerPage) + '%';
        currentMargin += (100 / slidesPerPage);
        currentPosition--;
    };
    if (currentPosition === 0) {
        buttons[0].classList.add('inactive');
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove('inactive');
    }
};

function slideLeft() {
    if (currentPosition != slidesCount) {
        slider.style.marginLeft = currentMargin - (100 / slidesPerPage) + '%';
        currentMargin -= (100 / slidesPerPage);
        currentPosition++;
    };
    if (currentPosition == slidesCount) {
        buttons[1].classList.add('inactive');
    }
    if (currentPosition > 0) {
        buttons[0].classList.remove('inactive');
    }
};
</script>
</x-admin-layout>
</div>