<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use App\Models\tax;
use App\Models\Cart;
use App\Models\User;
use App\Models\ShippingZoneCountry;
use App\Models\ShippingZone;
use Illuminate\Support\Facades\Auth;
use App\Models\{Country, State, City};

class CheckoutController extends Controller
{
    public function getshipping($id) 
    {
        $shipping = CustomerAddress::where('user_id',$id)->first();
    	if(empty($shipping)){
            return response()->json(["success"=> false, "message" => "Address not found"]);
    	}
    	return response()->json([
		    'success' => true, 
		    'data' => $shipping,
            ]);
    }
     public function getCountry(){
         $data['country'] = Country::get();      
        return response()->json($data);
    }
     public function getStates(Request $request)
    {
         $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function SaveShipping(Request $request)
    {

        $country = Country::where("id",$request->country)->first();
        $state = State::where("id",$request->state)->first();
        $city = City::where("id",$request->city)->first();

    	$data = [
    		'first_name'=> $request->first_name,
			'last_name' => $request->last_name,
			'address' => $request->address,
			'city' => $city->name,
			'country' => $country->name,
			'state' => $state->name,
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

        $country = Country::where("id",$request->country)->first();
        $state = State::where("id",$request->state)->first();
        $city = City::where("id",$request->city)->first();

    	$addshipping = CustomerAddress::where('id',$id)->update([	
				'first_name'=> $request->first_name,
				'last_name' => $request->last_name,
				'address' => $request->address,
				'city' => $city->name,
				'country' => $country->name,
				'state' => $state->name,
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

    public function getshippingCountry(Request $request) 
    {
        $country = Country::where('id',$request->country_id)->first(["name", "id", "phonecode"]);
        $taxes = tax::where('country_name',$country->name)->first();
       
        $code = (!empty($country)) ? $country->phonecode : 'all';

        $get_zone_ids = ShippingZoneCountry::select('zone')->where('country_code', $code)->get();
        $rate = !empty($taxes) ? $taxes->rate : 0;

        if (empty($get_zone_ids)) {
            return ['shippingcost' => 0, 'taxes' => $rate, 'success' => true];
        }

        if($request->account_type==1){
            $user_detail = User::where('session_id', $request['session_id'])->first();

            $Cart = Cart::where('session_id',$request['session_id'])->get();
      
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

        $get_zone = ShippingZone::whereIn('id', $get_zone_ids)->where('start','<=',$netamount)->where('end','>=',$netamount)->orderBy('price', 'DESC')->get()->first();
        if (!empty($get_zone)) {
            return ['shippingcost' => $get_zone->price, 'taxes' => $rate, 'success' => true];
        }else{
            return ['shippingcost' => 0, 'taxes' => $rate, 'success' => true];
        }
    }

    public function getTax(Request $request)
    {

        $country= Country::where("id",$request->country_id)->first(["name", "id"]);

        $get_tax = tax::where('country_name',$country->name)->first();
        return response()->json([
            'success' => true,
            'data'    => $get_tax,
            ]);
    }
}
