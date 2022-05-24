<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\{Country, State, City};

class CountryController extends Controller
{
    public function getCountry (){
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
   /* public function getCountry (){
    	$path = public_path()."/countries+states.json";
    	$json = json_decode(file_get_contents($path), true); 
    	$i=0;
    	$id = 0;
    	foreach($json as $val)
    	{
    		$data[$i]['id'] = $id+1; 
    		$data[$i]['name'] = $val['name'];
    		$i++;
    		$id++;
    	}
    	return response($data,200);
    }
    public function getStates(Request $request){
    	$input = $request->all();
    	$validator = Validator::make($input,[
    		'country_id' => 'required'
    	]);
    	if ($validator->fails()) {
    		return response()->json(['status' =>false, 'message' =>$validator->errors()->first()]);
    	}else{
	    	$path = public_path()."/countries+states.json";
	    	$json = json_decode(file_get_contents($path), true); 
	    	// print_r($json[0]['states'][0]['name']); exit();
	    	$countryId = $request->country_id;
	    	$i=0;
	    	$id = 0;
	    	if(!empty($json[$countryId-1]['states'])){
		    	foreach($json[$countryId-1]['states'] as $val)
		    	{
		    		 // echo "<pre>"; print_r($val['name']); echo "</pre>";
		    		$data[$i]['id'] = $id+1;
		    		$data[$i]['name'] = $val['name'];
		    		$i++;
		    		$id++;
		    		 
		    	}
		    	// exit();
		    	return response($data,200);
	    	}else{
	    		return response()->json(["message" => "This country Don't have any States.",'status'=>true],); 
	    	}
	    }
    }*/
}
