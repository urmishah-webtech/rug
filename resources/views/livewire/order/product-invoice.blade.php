<div>
    @php 
    $symbol = CurrencySymbol();
    $Stock_sum = 0;
    @endphp
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
            </div>
            <!-- /.invoice -->
          </div>
        </div>
    </div>
</div>
