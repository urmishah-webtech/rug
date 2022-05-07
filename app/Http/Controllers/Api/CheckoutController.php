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
				'mobile_no' => $request->mobile_no,
				'address_type' => $request->address_type
			]);
    	
        $data = CustomerAddress::where('user_id',$request->user_id)->first();
    	return response()->json([
		    'success' => true, 
		    'data'    => $addshipping,
            'dataget' => $data,
            ]);
    }
    public function updateAddress(Request $request, $id)
    {
    	$addshipping = CustomerAddress::where('id',$id)->update([	
				'first_name'=> $request->first_name,
				'last_name' => $request->last_name,
				'address' => $request->address,
				'city' => $request->city,
				'country' => $request->country,
				'state' => $request->state,
				'postal_code' => $request->postal_code,
				'email' => $request->email,
				'mobile_no' => $request->mobile_no,
			]);
    	
        $data = CustomerAddress::where('user_id',$request->user_id)->first();
    	return response()->json([
		    'success' => true, 
		    'data'    => $addshipping,
            'dataget' => $data,
            ]);
    }
}
