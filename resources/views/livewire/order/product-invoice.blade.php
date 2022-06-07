<style>
  .container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.col-sm-4{width:33.33%;
}
.col-sm-12{width:100%;}
.row {
    margin-right: -15px;
    margin-left: -15px;
    clear: both;
}
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
    float: left;
}
.text-center {
    text-align: center;
}
.title-cls{
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-weight:600;
    font-size:16px;
}
body{
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.h4, h4 {
    font-size: 18px;
}
.h4, .h5, .h6, h4, h5, h6 {
    margin-top: 10px;
    margin-bottom: 10px;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}
.h4 .small, .h4 small, .h5 .small, .h5 small, .h6 .small, .h6 small, h4 .small, h4 small, h5 .small, h5 small, h6 .small, h6 small {
    font-size: 75%;
}
address {
    margin-bottom: 20px;
    font-style: normal;
    line-height: 1.42857143;
}
.table-responsive {
    min-height: .01%;
    overflow-x: auto;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
    border-collapse: collapse;
    border-spacing: 0;
}
.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
    border-top: 0;
}
.table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 2px solid #ddd;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
th {
    text-align: left;
}
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
.logo-sec {margin-bottom: 40px;}
.invoice-info {margin-top: 10px;}
.float-right{float: right;}
</style>
<div>
    @php 
    $symbol = CurrencySymbol();
    $Stock_sum = 0;
    @endphp
    <div class="container">
            <!-- Main content -->
              <!-- title row -->
              <div class="row">
                <div class="col-sm-12">
                  <div class="logo-sec text-center">
                    <img src="https://rug.webtech-evolution.com/admin/public/assets/rug-logo.png" width="200">
                  </div>
                  <h4>
                   @if($companydetail) {{$companydetail->store_name}}, Inc. @endif
                    <small class="float-right">Date: {{$order->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <div class="title-cls">From</div>
                  @if($companydetail)
                  <address>
                    <strong>{{$companydetail->store_name}}, Inc.</strong><br>
                    {{$companydetail->apartment}} {{$companydetail->address}}<br>
                    {{$companydetail->city}}, {{$companydetail->country}} {{$companydetail->pincode}}<br>
                    Phone: {{$companydetail->mobile_number}}<br>
                    Email: {{$companydetail->sender_email}}
                  </address>
                  @else
                  <address>No data avilable</address>
                  @endif
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <div class="title-cls">To</div>
                  <address>
                    <strong>{{$order->first_name}} {{$order->last_name}}</strong><br>
                    {{$order->unit_number}} {{$order->address}}<br>
                    {{$order->city}}, {{$order->country}} {{$order->pincode}}<br>
                    Phone: {{$order->mobile}}<br>
                    Email: {{$order->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #{{$order->id}}</b>
                  <br>
                  <b>Order ID:</b> {{$order->id}}<br>
                  <!-- <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-sm-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Product</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($OrderItem)
                    @foreach($OrderItem as $item)
                    <tr>
                      <td>1</td>
                      <td>{{$item['order_product'][0]['title']}}</td>
                    </tr>
                    @endforeach
                    @endif
                
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            <!-- /.invoice -->
    </div>
</div>
