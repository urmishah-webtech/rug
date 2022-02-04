<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;

class GeneralSettingController extends Controller
{
    public function getGeneralSettings()
	{
		$settings = General::get();
		$data=array();
		$image_path= url('/storage/');
		foreach($settings as $setting)
		{
			$data['id']=$setting->id;
			$data['store_name']=$setting->store_name;
			$data['favicon_logo']=$image_path. '/'. $setting->favicon_logo;
			$data['backend_logo']=$image_path. '/'. $setting->backend_logo;
			$data['contact_email']=$setting->contact_email;
			$data['sender_email']=$setting->sender_email;
			$data['status']=$setting->status;
			$data['industry']=$setting->industry;
			$data['company']=$setting->company;
			$data['address']=$setting->address;
			$data['apartment']=$setting->apartment;
			$data['mobile_number']=$setting->mobile_number;
			$data['city']=$setting->city;
			$data['country']=$setting->country;
			$data['pincode']=$setting->pincode;
		}
      return response($data, 200);
	   
    }
}
