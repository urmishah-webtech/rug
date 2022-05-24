<div>
    @php 
    $symbol = CurrencySymbol();
    $Stock_sum = 0;
    @endphp

    @if($OrderItem)
    @foreach($OrderItem as $item)
    <?php $Stock_sum  += $item['stock']; ?>
    @endforeach
    @endif
    <?php 
    if(!empty($Taxes->rate)){
    $gst = $Taxes->rate;
    }else{
    $gst = 0;
    }
    $netamount = $order->netamout;
    $GetGst = ($gst/100)+1;
    $withoutgstaount = $netamount / $GetGst;

    $gst_include =  ($withoutgstaount*$gst) / 100;

    $shipping_cost = $order->shipping_cost;

    $total = $netamount + $shipping_cost;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fa fa-globe"></i> @if($companydetail) {{$companydetail->store_name}}, Inc. @endif
                    <small class="float-right">Date: {{$order->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
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
                  To
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
                  <b>Invoice #{{$order->id}}</b><br>
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
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Product</th>
                      <th>Qtn</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($OrderItem)
                    @foreach($OrderItem as $item)
                    <tr>
                      <td>1</td>
                      <td>{{$item['order_product'][0]['title']}}</td>
                      <td>{{$item['stock']}}</td>
                      <td>{{$symbol['currency']}}{{number_format($item['price'],2,".",",")}}</td>
                    </tr>
                    @endforeach
                    @endif
                
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal(excluding GST):</th>
                        <th>{{$Stock_sum}} item:</th>
                        <td>{{$symbol['currency']}}{{number_format($withoutgstaount,2,'.',',')}}</td>
                      </tr>
                      @if($gst == 0)
                      <tr>
                        <th>No tax applicable</th>
                        <td>{{$symbol['currency']}}0.00</td>
                      </tr>
                      @else
                      <tr>
                        <th>Tax</th>
                        <th>IGST {{$gst}}%</th>
                        <td>{{$symbol['currency']}}{{number_format($gst_include,2,'.',',')}}</td>
                      </tr>
                      @endif
                      <tr>
                        <th>Subtotal(including GST):</th>
                        <th>{{$Stock_sum}} item:</th>
                        <td>{{$symbol['currency']}}{{number_format($netamount,2,'.',',')}}</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>{{$symbol['currency']}}{{number_format($shipping_cost,2,'.',',')}}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{$symbol['currency']}}{{number_format($total,2,'.',',')}}</td>
                      </tr>

                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

 

            </div>
            <!-- /.invoice -->
          </div>
        </div>
    </div>
</div>
