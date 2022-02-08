<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use DB;

class SliderController extends Controller
{
    public function getSlider(){
    	$sliders =  Slider::get();
    	$data=array();
    	$i=0; 
    	$image_path= public_path().'/image/slider/';
    	 
    	foreach($sliders as $value)
    	{
    		$data[$i]['id'] = $value->id;
    		$data[$i]['slider_image'] =$image_path.$value->slider_image;
    		$data[$i]['title'] = $value->title;
    		$data[$i]['description'] = $value->description;
    		$data[$i]['buttne_text'] = $value->buttne_text;
    		$data[$i]['button_link'] = $value->button_link;
    		$i++;
    	}
    	return response($data,200);
    }
}
