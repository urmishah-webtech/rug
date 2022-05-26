<?php
namespace app\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Payment;
use Log;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\order_item;
use App\Models\ProductVariant;
use App\Models\Orders;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Models\tax;
use App\Models\Country;
use App\Models\ShippingZone;
use App\Models\ShippingZoneCountry;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\CartController;

class PaymentController extends Controller
{
    public function sendJson($data, $withDie = false)
    {
        if ($withDie)
        {
            echo json_encode($data);
            die;
        }
        else
        {
            return response()->json($data);
        }
    }

    public function getshipping($amount, $country_name){
        $country = Country::where('name',$country_name)->get()->first();
        $taxes = tax::where('country_name',$country_name)->first();
        $code = (!empty($country)) ? $country->code : 'all';
        $get_zone_ids = ShippingZoneCountry::select('zone')->where('country_code', $code)->get();
        $rate = !empty($taxes) ? $taxes->rate : 0;

        if (empty($get_zone_ids)) {
            return ['cost' => 0, 'taxes' => $rate, 'success' => true];
        }

        $get_zone = ShippingZone::whereIn('id', $get_zone_ids)->where('start','<=',$amount)->where('end','>=',$amount)->orderBy('price', 'DESC')->get()->first();

        if (!empty($get_zone)) {
            return ['cost' => $get_zone->price, 'taxes' => $rate, 'success' => true];
        }else{
            return ['cost' => 0, 'taxes' => $rate, 'success' => true];
        }
        
    }

    public function payment(Request $request)
    {
        $paymentSettings = DB::table('payment_setting')->first();
        if(empty($paymentSettings)) {
            return $this->sendJson(['status' => 0, 'message' => 'Please contact site Admin. Payment setting is not filled yet']);
        }
        $validator = Validator::make($request->all() , ['user_id' => 'required']);

        if ($validator->fails())
        {
            return $this->sendJson(['status' => 0, 'message' => $validator->errors() ]);
        }

        $payment_type = $request->payment_type;
        
        if($request->account_type==1){
            $user_detail = User::where('session_id', $request['user_id'])->first();

            $Cart = Cart::where('session_id',$user_detail['session_id'])->get();
      
            $shipping = CustomerAddress::where('session_id', $user_detail['session_id'])->first();
    
        }
        else{

            $user_detail = User::where('id', $request['user_id'])->first();

            $Cart = Cart::where('user_id',$user_detail['id'])->get();
      
            $shipping = CustomerAddress::where('user_id', $user_detail['id'])->first();

        }

        if($Cart->isEmpty()) {
           return $this->sendJson(['status' => 0, 'message' => 'Cart is Empty!']);
        }


        $netamount = 0;
        foreach($Cart as $res) {         
            if($res) {
                $totalamout = ($res->price * $res->stock);
                $netamount += $totalamout;
            }               
        }

         $shipping_cost_data = $this->getshipping($netamount, $shipping['country']);
        if(!$shipping_cost_data['success']) {
            return $this->sendJson(['status' => 0, 'message' => $shipping_cost_data['message']]);
        }

        if($netamount <= 0) {
            return $this->sendJson(['status' => 0, 'message' => 'Amount is 0']);
        }

        $includeshipping = $netamount + $shipping_cost_data['cost'] + $shipping_cost_data['taxes'];
        $netamounttotal = number_format($includeshipping, 2, '.', '' );

        if($shipping_cost_data['taxes']){
            $tax = $shipping_cost_data['taxes'];
        }else{
            $tax = 0;
        }

        if(!empty($request->account_type) && $request->account_type == '1'){

            $Order_insert = orders::insert($order_arr = [

                'session_id' => $user_detail['session_id'],

                'transactionid' => '',

                'email' => $user_detail['email'],

                'netamout' => $netamounttotal,

                'shipping_cost' => $shipping_cost_data['cost'],
               
                'tax' => $tax,

                'paymentstatus' => 'pending',

                'first_name' => $shipping['first_name'],

                'last_name' => $shipping['last_name'],

                'address' => $shipping['address'],

                'state' => $shipping['state'], 

                'city' => $shipping['city'], 

                'country' => $shipping['country'], 

                'pincode' => $shipping['postal_code'], 

                'mobile' => $shipping['mobile_no'],
                
                'payment_type' => $payment_type,
               
                'account_type' => '1',
            ]);
        }else{

            $Order_insert = orders::insert($order_arr = [

                'user_id' =>  $request->user_id,

                'transactionid' => '',

                'email' => $user_detail['email'],

                'netamout' => $netamounttotal,

                'shipping_cost' => $shipping_cost_data['cost'],

                'tax' => $tax,
                
                'paymentstatus' => 'pending',

                'first_name' => $shipping['first_name'],

                'last_name' => $shipping['last_name'],

                'address' => $shipping['address'],

                'state' => $shipping['state'], 

                'city' => $shipping['city'], 

                'country' => $shipping['country'], 

                'pincode' => $shipping['postal_code'], 

                'mobile' => $shipping['mobile_no'],
                
                'payment_type' => $payment_type,
               
                'account_type' => '2',
            ]);
        }


        if($Order_insert){
            // Insert Record Order Item
            if($request->account_type==1){
                $lastorderid = Orders::where('user_id',$user_detail['session_id'])->orderBy('id', 'DESC')->first();

            }
            else{
                $lastorderid = Orders::where('user_id',$user_detail['id'])->orderBy('id', 'DESC')->first();

            }

            $insert_order_item =[];
            foreach($Cart as $res) {         
                if($res) {
                    $totalamout = ($res->price * $res->stock);
                    $order_item_arr = [

                        'order_id' => $lastorderid['id'],
                        
                        'user_id' => $res->user_id,

                        'product_id' => $res->product_id,

                        'varition_id' => $res->varientid,
                        
                        'price' => $res->price,
                        
                        'stock' => $res->stock,
                        
                        'total' => $totalamout,

                        'customeid' => $res->cutomeid

                    ];
                    $insert_order_item[] = $order_item_arr;
                }               
            }
        }

        $Orderitemvalue =  order_item::insert($insert_order_item);    


        if($payment_type == 1){      
        
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey($paymentSettings->mollie_api_key);
            $payment = $mollie
                ->payments

                ->create(["amount" => ["currency" => $paymentSettings->currency, "value" => $netamounttotal], "method" => "creditcard", "description" => "payment", "redirectUrl" => $paymentSettings->redirectUrl, "webhookUrl"  => $paymentSettings->webhookUrl,
                ]);
            $pay = new Payment();
            $pay->payment_id = $payment->id;
            $pay->user_id = $request['user_id'];
            $pay->order_id = $lastorderid['id'];
            $pay->amount = $netamounttotal;
            $pay->payment_type = $payment_type;
            $pay->payment_link = $payment->_links->checkout->href;
            $pay->status = $payment->status;
               
            $pay->save();
            
            if($request->account_type == 1)
            {
                Cart::where('session_id',$user_detail['session_id'])->delete();
            }
            else{
                Cart::where('user_id',$user_detail['id'])->delete();
            
            }


            return $this->sendJson(['status' => 1, 'message' => $payment]);
        }

        if ($payment_type == 0) {
            if($request->account_type == 1)
            {
            $Cart = Cart::where('session_id',$request['user_id'])->get();
            }
            else{
            $Cart = Cart::where('user_id',$request['user_id'])->get();
            }
            $pay = new Payment();
            $pay->payment_id = 'Cash On Delivery';
            if($request->account_type == 1){
                $pay->session_id = $request['user_id'];
            }
            else{
                $pay->user_id = $request['user_id'];
            }
            $pay->order_id = $lastorderid['id'];
            $pay->amount = $netamounttotal;
            $pay->payment_type = $payment_type;
            $pay->status = 'successed';
            $pay->payment_link = '';
            $pay->save();


            foreach($Cart as $res) { 

                if($res->varientid != ""){

                    $varient_stock = ProductVariant::where('id',$res->varientid)->first();

                    $finalstock = ($varient_stock->stock - $res->stock);

                    $paymentdetail = ProductVariant::where('id', $res->varientid)->update(['stock' => $finalstock]);

                }
                else
                {
                    if($res->product_id != ""){
                        $product_stock = Product::where('id',$res->product_id)->first();

                        $finalstock = ($product_stock->stock - $res->stock);

                        $paymentdetail = Product::where('id', $res->product_id)->update(['stock' => $finalstock]);
                    }     
                }
            }

            if($request->account_type == 1)
            {
                Cart::where('session_id',$user_detail['session_id'])->delete();
            }
            else{
                Cart::where('user_id',$user_detail['id'])->delete();
            
            }
            

            return $this->sendJson(['status' => 0, 'message' => 'cash on delivery place successed']);
        }   
    }

    public function get_thankyou($userid,$userExists){
        if($userExists==1)
        {
            $ordercheck = Orders::where('user_id',$userid)->count();
            $user_detail = User::where('id', $userid)->first();
        }
        else{
            $ordercheck = Orders::where('session_id',$userid)->count();
            $user_detail = User::where('session_id', $userid)->first();
        }
        if($ordercheck != 0){
            if($userExists==1){
                $order = Orders::where('user_id',$userid)->orderBy('id', 'DESC')->first();
            }
            else{
                $order = Orders::where('session_id',$userid)->orderBy('id', 'DESC')->first();
            }
            
            $order_item = order_item::with('media_product')->with(['variant_product' => function($q) {
                return $q->with('variantmediafirst');
            }])->with('order_product')->where('order_id',$order->id)->orderBy('id', 'DESC')->get();

            $image_path= env('IMAGE_PATH');

            $finalamount = 0;
                $i=0;
                
               
            foreach ($order_item as $key => $result)
            {
                if(!$result->variant_product->isEmpty() && isset($result->variant_product[0]) && !empty($result->variant_product[0]->variantmediafirst) && !empty($result->variant_product[0]->variantmediafirst->image)) {
                    $order_item[$key]['image'] = $image_path.$result->variant_product[0]->variantmediafirst->image;
                } else {
                    $order_item[$key]['image'] = $image_path.$result['media_product'][0]['image'];
                }
               
                $order_item[$key]['title'] = $result['order_product'][0]['title'];
                $Totalamount = ($result->stock * $result->price);
                $finalamount += $Totalamount;
                
            }



            //$data = ['name'=>'vishal', 'data'=>'hello vishal'];
            $user['to'] = $order['email'];
            try{
            //  Mail::send('livewire.mail-template.order-place', ['orders' => $order,'order_item' => $order_item,'image' => $order_item], function($message) use($user) {
            //         $message->to($user['to']);
            //         $message->subject('Rug Order Mail!!!');
            //     });
            }
            catch(Exception $e)
            {

            }
            return $this->sendJson(['status' => 0, 'orders' => $order,'order_item' => $order_item,'image' => $order_item,'product_amount'=>$finalamount]);

        }else
        {
             return $this->sendJson(['error' => 'Not avalible Order']);
        }
    }

    public function webhook(Request $request)
    {
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey($paymentSettings->mollie_api_key);
        $payment = $mollie
            ->payments
            ->get($request->id);

        $pay = Payment::where('payment_id', $request->id)
            ->first();

        $user_detail = User::where('id', $pay->user_id)->first();

        $Cart = Cart::where('user_id',$user_detail->id)->get();
        //$orderId = $payment->metadata->order_id;
        
        if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks())
        {
            $pay->status = 1;
             if(!empty($Cart)){
            foreach($Cart as $res) { 

                if($res->varientid != ""){

                    $varient_stock = ProductVariant::where('id',$res->varientid)->first();

                    $finalstock = ($varient_stock->stock - $res->stock);

                    $paymentdetail = ProductVariant::where('id', $res->varientid)->update(['stock' => $finalstock]);

                    Orders::where('id', $pay->order_id)->update(['transactionid' => $pay->payment_id]);

                }
                else
                {
                    if($res->product_id != ""){
                        $product_stock = Product::where('id',$res->product_id)->first();

                        $finalstock = ($product_stock->stock - $res->stock);

                        $paymentdetail = Product::where('id', $res->product_id)->update(['stock' => $finalstock]);

                        Orders::where('id', $pay->order_id)->update(['transactionid' => $pay->payment_id]);
                    }     
                }
            }


               $data= Cart::where('user_id',$user_detail->id)->delete();             

            }
            /*
            /*
             * The payment is paid and isn't refunded or charged back.
             * At this point you'd probably want to start the process of delivering the product to the customer.
            */
        }
        elseif ($payment->isOpen())
        {
            $pay->status = 2;

           
             /* The payment is open.
            */
        }
        elseif ($payment->isPending())
        {
            $pay->status = 3;
            /*
             * The payment is pending.
            */
        }
        elseif ($payment->isFailed())
        {
            $pay->status = 4;
            /*
             * The payment has failed.
            */
        }
        elseif ($payment->isExpired())
        {
            $pay->status = 5;
            /*
             * The payment is expired.
            */
        }
        elseif ($payment->isCanceled())
        {
            $pay->status = 6;
            /*
             * The payment has been canceled.
            */
        }
        elseif ($payment->hasRefunds())
        {
            $pay->status = 7;
            /*
             * The payment has been (partially) refunded.
             * The status of the payment is still "paid"
            */
        }
        elseif ($payment->hasChargebacks())
        {
            $pay->status = 8;
            /*
             * The payment has been (partially) charged back.
             * The status of the payment is still "paid"
            */
        }
        $pay->save();

    }

    public function countryCheck(Request $request)
    {
        $validator = Validator::make($request->all() , ['country' => 'required']);

        if ($validator->fails())
        {
            return $this->sendJson(['status' => 0, 'message' => $validator->errors() ]);
        }

        $taxes = tax::where('country_name',$request->country)->first();
        if(empty($taxes)) {
            return $this->sendJson(['status' => 0, 'message' => 'We don\'t ship to this Country' ]);
        } else {
            return $this->sendJson(['status' => 1, 'data' => $taxes ]);
        }
    }

    public function get_order($id){

        $order = Orders::find($id);
        if(empty($order)) {
            return $this->sendJson(['status' => 0, 'message' => 'Not avalible Order' ]);
        }

        $order_item = order_item::with('media_product')->with(['variant_product' => function($q) {
                return $q->with('variantmediafirst');
            }])->with('order_product')->where('order_id',$id)->orderBy('id', 'DESC')->get();

        $image_path= env('IMAGE_PATH');

        $finalamount = 0;
        $i=0;
                
               
        foreach ($order_item as $key => $result)
        {
            if(!$result->variant_product->isEmpty() && isset($result->variant_product[0]) && !empty($result->variant_product[0]->variantmediafirst) && !empty($result->variant_product[0]->variantmediafirst->image)) {
                    $order_item[$key]['image'] = $image_path.$result->variant_product[0]->variantmediafirst->image;
            } else {
                    $order_item[$key]['image'] = $image_path.$result['media_product'][0]['image'];
            }
               
            $order_item[$key]['title'] = $result['order_product'][0]['title'];
            $Totalamount = ($result->stock * $result->price);
            $finalamount += $Totalamount;
                
            }
            
         
        return $this->sendJson(['status' => 0, 'orders' => $order,'order_item' => $order_item,'product_amount'=>$finalamount]);

        
    }
}

