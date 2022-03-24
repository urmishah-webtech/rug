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
        $image_path= public_path().'/storage/';
         
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

    public function getStudiopage(){
        $studioget =  page::where('id',11)->first();
        $data=array();
        $image_path= storage_path().'/storage/';
         
            $data['studiopagetitle'] = $studioget->title;
           
            $data['beniexperiencetitle'] = $studioget->title1;
            $data['beniexperiencedescripation'] = $studioget->content;
           
            $data['newwayshoptitle'] = $studioget->title3;
            $data['newwayshopdescriaption'] = $studioget->descripation3;
            $data['newwayshopimage'] = $image_path.$studioget->image3;

            $data['newwayshopmaintitle'] = $studioget->title4;
            $data['newwayshopimage1'] = $image_path.$studioget->product_image1;
            $data['newwayshoptitle1'] = $studioget->product_title1;
            $data['newwayshopdescriaption1'] = $studioget->product_button_name1;

            $data['newwayshopimage2'] = $image_path.$studioget->product_image2;
            $data['newwayshoptitle2'] = $studioget->product_title2;
            $data['newwayshopdescriaption2'] = $studioget->product_button_name2;

            $data['newwayshopimage3'] = $image_path.$studioget->product_image3;
            $data['newwayshoptitle3'] = $studioget->product_title3;
            $data['newwayshopdescriaption3'] = $studioget->product_button_name3;

            $data['newwayshopimage4'] = $image_path.$studioget->product_image4;
            $data['newwayshoptitle4'] = $studioget->product_title4;
            $data['newwayshopdescriaption4'] = $studioget->product_button_name4;

            $data['ourteamtitle'] = $studioget->title5;
            $data['ourteamdescripation'] = $studioget->desctipation5;
            $data['ourteamimage'] = $image_path.$studioget->flat_image1;

            $data['operationtitle'] = $studioget->title2;
            $data['operationdescripation'] = $studioget->descripation2;
            $data['operationimage'] = $image_path.$studioget->flat_image2;

            $data['onlydescripation'] = $studioget->product_title2;
            $data['onlyimage'] = $image_path.$studioget->product_image5;

            $data['nyctitle'] = $studioget->title6;
            $data['nycdescripation'] = $studioget->descripation6;
            $data['nycimage'] = $image_path.$studioget->image;
            $data['nycbuttonname'] = $studioget->button_name;
            $data['nycbuttonlink'] = $studioget->button_url;
        return response($data,200);
    }

    public function getApartmentpage(){
        $apartmentget =  page::where('id',12)->first();
        $data=array();
        $image_path= storage_path().'/storage/';
         
            $data['apartmentpagetitle'] = $apartmentget->title;
           
            $data['bringingmoroccotitle'] = $apartmentget->title1;
            $data['bringingmoroccodescripation'] = $apartmentget->content;
           
            $data['detailstitle'] = $apartmentget->title3;
            $data['detailsdescriaption'] = $apartmentget->descripation3;
            $data['detailsimage'] = $image_path.$apartmentget->image3;

            $data['leafytitle'] = $apartmentget->title2;
            $data['leafydescriaption'] = $apartmentget->descripation2;
            $data['leafyimage'] = $image_path.$apartmentget->flat_image2;

            $data['onlytitle'] = $apartmentget->product_title1;
            $data['onlydescriaption'] = $apartmentget->product_button_name1;

            $data['expecttitle'] = $apartmentget->product_title5;
            $data['expectdescriaption'] = $apartmentget->product_button_name5;
            $data['expectimage'] = $image_path.$apartmentget->product_image5;
           
            $data['singlebigimage'] = $image_path.$apartmentget->product_image1;

            $data['marrakechtitle'] = $studioget->title6;
            $data['marrakechdescripation'] = $studioget->descripation6;
            $data['marrakechimage'] = $image_path.$studioget->image;
            $data['marrakechbuttonname'] = $studioget->button_name;
            $data['marrakechbuttonlink'] = $studioget->button_url;

          
        return response($data,200);
    }
}
