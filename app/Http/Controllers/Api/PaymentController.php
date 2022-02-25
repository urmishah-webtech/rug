<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Payment;
use Log;
class PaymentController extends Controller
{
    public function sendJson($data, $withDie = false)
    {
        if ($withDie) {
            echo json_encode($data);
            die;
        } else {
            return response()->json($data);
        }
    }
    public function payment(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id'=>'required'
        ]);

        if ($validator->fails()) {
            return $this->sendJson([
                'status' => 0,
                'message' => $validator->errors()
            ]);
        }
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_MWdVxyQfjxrTBq6DwUAMF3NKCmh7yE");
        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00"
            ],
            "method"=>"creditcard",
            "description" => "My first API payment",
            "redirectUrl" => "https://projects.webtech-evolution.com/rug_frontend/",
            "webhookUrl"  => "https://projects.webtech-evolution.com/rug/public/api/webhook",
        ]);
        return $this->sendJson([
            'status' => 0,
            'message' => $payment
        ]);
      
    }
    public function webhook(Request $request){
        $pay = new Payment();
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_MWdVxyQfjxrTBq6DwUAMF3NKCmh7yE");
        $payment = $mollie->payments->get($request->id);
        //$orderId = $payment->metadata->order_id;
       // Log::info('payment '.$payment);

    if ($payment->isPaid() && ! $payment->hasRefunds() && ! $payment->hasChargebacks()) {
        $pay->status=1;
        /*
         * The payment is paid and isn't refunded or charged back.
         * At this point you'd probably want to start the process of delivering the product to the customer.
         */
    } elseif ($payment->isOpen()) {
        $pay->status=2;
        /*
         * The payment is open.
         */
    } elseif ($payment->isPending()) {
        $pay->status=3;
        /*
         * The payment is pending.
         */
    } elseif ($payment->isFailed()) {
        $pay->status=4;
        /*
         * The payment has failed.
         */
    } elseif ($payment->isExpired()) {
        $pay->status=5;
        /*
         * The payment is expired.
         */
    } elseif ($payment->isCanceled()) {
        $pay->status=6;
        /*
         * The payment has been canceled.
         */
    } elseif ($payment->hasRefunds()) {
        $pay->status=7;
        /*
         * The payment has been (partially) refunded.
         * The status of the payment is still "paid"
         */
    } elseif ($payment->hasChargebacks()) {
        $pay->status=8;
        /*
         * The payment has been (partially) charged back.
         * The status of the payment is still "paid"
         */
    }
    $pay->save();

    }
}

