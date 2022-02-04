<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function getAllSlider() {
      $slider = Slider::get();
	  $i=0;
	  $data=array();
	  $image_path= url('/storage');
	  foreach($slider as $result)
	  {
		    $data[$i]['id']=$result->id;
        $data[$i]['slider_image']=$image_path. '/'. $result->slider_image;
        $data[$i]['title']=$result->title;
        $data[$i]['description']=$result->description;
        $data[$i]['buttne_text']=$result->buttne_text;
        $data[$i]['button_link']=$result->button_link;

        $i++; 
	  }
      return response($data, 200);
    }
}
