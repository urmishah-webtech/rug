<?php
namespace App\Http\Controllers\api;

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
    public function payment(Request $request)
    {
        $validator = Validator::make($request->all() , ['user_id' => 'required', 'amount' => 'required']);

        if ($validator->fails())
        {
            return $this->sendJson(['status' => 0, 'message' => $validator->errors() ]);
        }
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_MWdVxyQfjxrTBq6DwUAMF3NKCmh7yE");
        $payment = $mollie
            ->payments
            ->create(["amount" => ["currency" => "USD", "value" => $request->amount], "method" => "creditcard", "description" => "My first API payment", "redirectUrl" => "https://projects.webtech-evolution.com/rug_frontend/thankyou"
        ]);
    $pay->payment_id = $payment->id;
        $pay->amount = $request->amount;
        $pay->payment_link = $payment
            ->_links
            ->checkout->href;
        $pay->save();
        if($pay){
            $user_detail = User::where('id', $request['user_id'])->first();

            $Cart = Cart::where('user_id',$user_detail['id'])->get();

            $pay = 1;

            if ($pay == 1)
            {
             $shipping = CustomerAddress::where('user_id', $user_detail['id'])->first();
                $Order_insert = orders::insert($order_arr = [

                'user_id' => $user_detail['id'],

                'transactionid' => 'vcevevnerv',

                'email' => $user_detail['email'],

                'netamout' => "230",

                'paymentstatus' => 'pending',

                'first_name' => $shipping['first_name'],

                'last_name' => $shipping['last_name'],

                'address' => $shipping['address'],

                'state' => $shipping['state'], 

                'city' => $shipping['city'], 

                'country' => $shipping['country'], 

                'pincode' => $shipping['postal_code'], 

                'mobile' => $shipping['mobile_no'],

                ]);
            }

            if($Order_insert){
                // Insert Record Order Item
                $lastorderid = Orders::where('user_id',$user_detail['id'])->orderBy('id', 'DESC')->first();

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
                            
                            'total' => '230',

                        ];
                        $insert_order_item[] = $order_item_arr;
                    }               
                }
            }

            $Orderitemvalue =  order_item::insert($insert_order_item);

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


                Cart::where('user_id',$user_detail['id'])->delete(); 
            
        }
        return $this->sendJson(['status' => 0, 'message' => $payment]);

    }

    public function get_thankyou($userid){

        $ordercheck = Orders::where('user_id',$userid)->count();
        if($ordercheck != 0){
            $order = Orders::where('user_id',$userid)->orderBy('id', 'DESC')->first();
            
            $order_item = order_item::with('media_product')->with('variant_product')->with('order_product')->where('order_id',$order->id)->orderBy('id', 'DESC')->get();

            $image_path='https://projects.webtech-evolution.com/rug/public/storage/';

            $finalamount = 0;
                $i=0;
            foreach ($order_item as $key => $result)
            {
                $order_item[$key]['title'] = $result['order_product'][0]['title'];
                $order_item[$key]['image'] = $image_path.$result['media_product'][0]['image'];
                $Totalamount = ($result->stock * $result->price);
                $finalamount += $Totalamount;
            }



            return $this->sendJson(['status' => 0, 'orders' => $order,'order_item' => $order_item,'image' => $order_item]);
        }else
        {
             return $this->sendJson(['error' => 'Not avalible Order']);
        }
    }

    public function orderplace(Request $request){

        $user_detail = User::where('id', $request['user_id'])->first();

        $Cart = Cart::where('user_id',$user_detail['id'])->get();
        $pay = 1;

            if ($pay == 1)
            {
                $shipping = CustomerAddress::where('user_id', $user_detail['id'])->first();
                $Order_insert = orders::insert($order_arr = [

                'user_id' => $user_detail['id'],

                'transactionid' => 'vcevevnerv',

                'email' => $user_detail['email'],

                'netamout' => "230",

                'paymentstatus' => 'pending',

                'first_name' => $shipping['first_name'],

                'last_name' => $shipping['last_name'],

                'address' => $shipping['address'],

                'state' => $shipping['state'], 

                'city' => $shipping['city'], 

                'country' => $shipping['country'], 

                'pincode' => $shipping['postal_code'], 

                'mobile' => $shipping['mobile_no'],

                ]);
            }

            if($Order_insert){
                // Insert Record Order Item
                $lastorderid = Orders::where('user_id',$user_detail['id'])->orderBy('id', 'DESC')->first();

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
                            
                            'total' => '230',

                        ];
                        $insert_order_item[] = $order_item_arr;
                    }               
                }
            }

            $Orderitemvalue =  order_item::insert($insert_order_item);

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

            if($paymentdetail){

                Cart::where('user_id',$user_detail['id'])->delete();
            }

            return response()->json(['message' => 'Thank you', 'success' => true]);
    }
    public function webhook(Request $request)
    {
        $user_detail = User::where('id', $request['user_id'])->first();
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_MWdVxyQfjxrTBq6DwUAMF3NKCmh7yE");
        $payment = $mollie
            ->payments
            ->get($request->id);
        $pay = Payment::where('payment_id', $request->id)
            ->first();

        $Cart = Cart::where('user_id',$user_detail['id'])->get();
        //$orderId = $payment->metadata->order_id;
        // Log::info('payment '.$payment);
        if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks())
        {
            $pay->status = 1;

            if ($pay->status == 1)
            {
                $shipping = CustomerAddress::where('user_id', $user_detail['id'])->first();
                $Order_insert = orders::insert($order_arr = [

                'user_id' => $user_detail['id'],

                'transactionid' => $pay['payment_id'],

                'email' => $user_detail['email'],

                'netamout' => $pay->amount,

                'paymentstatus' => 'pending',

                'first_name' => $shipping['first_name'],

                'last_name' => $shipping['last_name'],

                'address' => $shipping['address'],

                'state' => $shipping['state'], 

                'city' => $shipping['city'], 

                'country' => $shipping['country'], 

                'pincode' => $shipping['postal_code'], 

                'mobile' => $shipping['mobile_no'],

                ]);
            }

            if($Order_insert){
                // Insert Record Order Item
                $lastorderid = Orders::where('user_id',$user_detail['id'])->orderBy('id', 'DESC')->first();

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
                            
                            'total' => $pay->amount,

                        ];
                        $insert_order_item[] = $order_item_arr;
                    }               
                }
            }

            $Orderitemvalue =  order_item::insert($insert_order_item);

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

            if($paymentdetail){

                Cart::where('user_id',$user_detail['id'])->delete();
            }
            /*
             * The payment is paid and isn't refunded or charged back.
             * At this point you'd probably want to start the process of delivering the product to the customer.
            */
        }
        elseif ($payment->isOpen())
        {
            $pay->status = 2;
            /*
             * The payment is open.
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
}

