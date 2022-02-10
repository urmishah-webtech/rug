<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\ShippingInfo;

class ShippingController extends Controller
{
	public function shippingInfo(Request $request){
		$input = $request->all(); 
		$validator = Validator::make($input,[
			'first_name' => 'required',
			'last_name' => 'required',
			'address' => 'required',
			'city' => 'required',
			'country' => 'required',
			'state' => 'required',
			'zip_code' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
		]);
		if ($validator->fails()) {
			return response()->json(['status' =>false, 'message' =>$validator->errors()->first()]);
		}else{
			$addshipping = ShippingInfo::create([	
				'user_id' => auth()->id(),
				'first_name'=> $request->first_name,
				'last_name' => $request->last_name,
				'address' => $request->address,
				'city' => $request->city,
				'country' => $request->country,
				'state' => $request->state,
				'zip_code' => $request->zip_code,
				'email' => $request->email,
				'phone' => $request->phone
			]);

			if(!is_null($addshipping)){
				return response()->json([
					'message' => 'Added Shipping Information',
					'success' => true,
					'shipping' => $addshipping,
				]);
			}else{
				return response()->json(['status' => false, 'message' =>'Somthing worng, Please try again']);
			}

		}
	}
}
