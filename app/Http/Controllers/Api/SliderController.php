<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\page;
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

    public function getHomepage(){
        $homeget =  page::where('id',10)->first();
        $data=array();
        $image_path= storage_path().'/storage/';
         
            $data['homepagetitle'] = $homeget->title;
           
            $data['ourstorytitle1'] = $homeget->title1;
            $data['ourstorydescripation'] = $homeget->content;
            $data['ourstoryimage'] = $image_path.$homeget->image;
            $data['ourstorybuttonname'] = $homeget->button_name;
            $data['ourstorybuttonlink'] = $homeget->button_url;
           
            $data['oursuccessvideolink'] = $homeget->video_link;
            $data['oursuccesstitle'] = $homeget->title2;
            $data['oursuccessdescripation'] = $homeget->descripation2;
            $data['oursuccessbuttonname'] = $homeget->button_name2;
            $data['oursuccessbuttonlink'] = $homeget->button_link2;
          
            $data['meetresolutetitle'] = $homeget->title3;
            $data['meetresolutedescripation'] = $homeget->descripation3;
            $data['meetresoluteimage'] = $image_path.$homeget->image3;
            $data['meetresolutebuttonname'] = $homeget->button_name3;
            $data['meetresolutebuttonelink'] = $homeget->button_link3;
          
            $data['rugsAccordancetitle'] = $homeget->title4;
            $data['rugsproducttitle1'] = $homeget->product_title1;
            $data['rugsproductproductimage1'] = $image_path.$homeget->product_image1;
            $data['rugsproductbuttonname1'] = $homeget->product_button_name1;
            $data['rugsproductproductbuttonlink1'] = $homeget->product_button_link1;

            $data['rugsproducttitle2'] = $homeget->product_title2;
            $data['rugsproductproductimage2'] = $image_path.$homeget->product_image2;
            $data['rugsproductbuttonname2'] = $homeget->product_button_name2;
            $data['rugsproductproductbuttonlink2'] = $homeget->product_button_link2;

            $data['rugsproducttitle3'] = $homeget->product_title3;
            $data['rugsproductproductimage3'] = $image_path.$homeget->product_image3;
            $data['rugsproductbuttonname3'] = $homeget->product_button_name3;
            $data['rugsproductproductbuttonlink3'] = $homeget->product_button_link3;

            $data['rugsproducttitle4'] = $homeget->product_title4;
            $data['rugsproductproductimage4'] = $image_path.$homeget->product_image4;
            $data['rugsproductbuttonname4'] = $homeget->product_button_name4;
            $data['rugsproductproductbuttonlink4'] = $homeget->product_button_link4;

            $data['rugsproducttitle5'] = $homeget->product_title5;
            $data['rugsproductproductimage5'] = $image_path.$homeget->product_image5;
            $data['rugsproductbuttonname5'] = $homeget->product_button_name5;
            $data['rugsproductproductbuttonlink5'] = $homeget->product_button_link5;

            $data['flattitle'] = $homeget->title5;
            $data['flatdesctipation'] = $homeget->desctipation5;
            $data['flatimage1'] = $image_path.$homeget->flat_image1;
            $data['flatimage2'] = $image_path.$homeget->flat_image2;
            $data['flatbuttonname'] = $homeget->button_name5;
            $data['flatbuttonlink'] = $homeget->button_link5;

            $data['collectiontitle'] = $homeget->title6;
            $data['collectiondescripation'] = $homeget->descripation6;
            $data['collectionbuttonname'] = $homeget->button_name6;
            $data['collectionbuttonlink'] = $homeget->button_link6;

        return response($data,200);
    }
}
