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

    	$data = [
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
    	];

    	if(isset($request->user_id) && !empty($request->user_id))
    		$data['user_id'] = $request->user_id;

    	if(isset($request->session_id) && !empty($request->session_id))
    		$data['session_id'] = $request->session_id;


    	$addshipping = CustomerAddress::create($data);
    	
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

    public function deleteShipping($id)
    {
    	$deleted = CustomerAddress::where('id', $id)->delete();
    	return response()->json([
		    'success' => true, 
		    'message'=> 'deleted sucessfully.',
		    'data'    => $deleted,
            ]);
    }
}
