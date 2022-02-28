<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function getshipping($id) 
    {
    	if(!empty($id)){
    	   $getshipping = CustomerAddress::where('user_id',$id)->first();
    	}else
    	{
    		$getshipping = '';
    	}

    	return response()->json([
		    'success' => true, 
		    'data' => $getshipping,
            ]);
    }
    public function SaveShipping(Request $request)
    {
    	$getshipping = CustomerAddress::where('user_id',$request->user_id)->first();

    	if(!empty($getshipping)){
    		$addshipping = CustomerAddress::where('user_id',$request->user_id)->update([ 
                'user_id' => $request->user_id,
				'first_name'=> $request->first_name,
				'last_name' => $request->last_name,
				'address' => $request->address,
				'city' => $request->city,
				'country' => $request->country,
				'state' => $request->state,
				'postal_code' => $request->postal_code,
				'email' => $request->email,
				'mobile_no' => $request->mobile_no
            ]);
    	}else{
    		$addshipping = CustomerAddress::create([	
				'user_id' => $request->user_id,
				'first_name'=> $request->first_name,
				'last_name' => $request->last_name,
				'address' => $request->address,
				'city' => $request->city,
				'country' => $request->country,
				'state' => $request->state,
				'postal_code' => $request->postal_code,
				'email' => $request->email,
				'mobile_no' => $request->mobile_no
			]);
    	}
    	

    	return response()->json([
		    'success' => true, 
		    'data' => $addshipping,
            ]);
    }
}
