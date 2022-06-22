<?php

namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\page;
use App\Models\Product;
use App\Models\contact;
use App\Models\TradeModel;
use Validator;
use DB;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Models\Menu;
use App\Models\MenuItem;


class SliderController extends Controller
{

    public function sendJson($data, $withDie = false)
    {
        if ($withDie)
        {
            echo json_encode($data);
            die;
        }
        else
        {
            return response()->json($data);
        }
    }

    public function ContactSave(Request $request){

        $validator = Validator::make($request->all() , ['firstname' => 'required', 'email' => 'required', 'message' => 'required']);

         if ($validator->fails())
        {
            return $this->sendJson(['status' => 0, 'message' => $validator->errors() ]);
        }

        $contact = contact::create([

            'firstname' => $request->firstname,

            'lastname' => $request->lastname,

            'email' => $request->email,

            'mobilenumber' => $request->mobilenumber,

            'message' => $request->message,

        ]);

        $user['to'] = 'prajapativishal999991@gmail.com';

        $contactget = TradeModel::orderBy('id', 'DESC')->first();
        
        Mail::send('livewire.mail-template.contact-mail', ['contactget' => $contactget], function($message) use($user) {
                $message->to($user['to']);
                $message->subject('Rug Contact Mail!!!');
            });

        return response(['status' => 0, 'message' => 'Save successed']);

    }

    public function TradeSave(Request $request){

        $validator = Validator::make($request->all() , ['firstname' => 'required', 'mobilenumber' => 'required', 'companyname' => 'required', 'companywebsite' => 'required', 'message' => 'required']);

        if ($validator->fails())
        {
            return $this->sendJson(['status' => 0, 'message' => $validator->errors() ]);
        }

        $trade = TradeModel::create([

            'firstname' => $request->firstname,

            'lastname' => $request->lastname,

            'email' => $request->email,

            'mobilenumber' => $request->mobilenumber,
           
            'companyname' => $request->companyname,
            
            'companywebsite' => $request->companywebsite,

            'message' => $request->message,

        ]);

        $user['to'] = 'prajapativishal999991@gmail.com';

        $tradeget = TradeModel::orderBy('id', 'DESC')->first();

        Mail::send('livewire.mail-template.trade-mail', ['tradeget' => $tradeget], function($message) use($user) {
                $message->to($user['to']);
                $message->subject('Rug Trade Mail!!!');
            });

        return response(['status' => 0, 'message' => 'Save successed']);

    }

    public function getSlider(){
    	$sliders =  Slider::where('page_id',10)->get();
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

    public function FeatureProduct(){
        $product = Product::with('productmediaget')->where('featured',1)->get();
        $data=array();
        $i=0; 
        $image_path=  env('IMAGE_PATH');
        foreach ($product as $key => $val)
        {

            if (isset($val['productmediaget'][$key]))
            {
                $data[$i]['image'] = $image_path . $val['productmediaget'][$key]['image'];
            }
            else
            {
                $data[$i]['image'] = url('/') . '/image/defult-image.png';
            }

            $data[$i]['id'] = $val->id;
            $data[$i]['title'] = $val->title;
            $data[$i]['description'] = $val->descripation;
            $data[$i]['price'] = $val->price;
            $i++;

        }

        return response($data, 200);
    }

    public function getHomepage(){
        $homeget =  page::where('id',10)->first();
        $data=array();
        $image_path=  env('IMAGE_PATH');
         
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
		$sliders =  Slider::where('page_id',11)->get();
		$data1=array();
    	$i=0; 
    	$image_path= url('/storage/'); 
    	 
    	foreach($sliders as $value)
    	{
    		$data1[$i]['id'] = $value->id;
    		$data1[$i]['slider_image'] =$image_path.'/'.$value->slider_image;
    		$data1[$i]['title'] = $value->title;
    		$data1[$i]['description'] = $value->description;
    		$data1[$i]['buttne_text'] = $value->buttne_text;
    		$data1[$i]['button_link'] = $value->button_link;
    		$i++;
    	}
		
        $data=array();
        $image_path=  env('IMAGE_PATH');
         
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
        return response([$data,$data1],200);
    }

    public function getApartmentpage(){
        $apartmentget =  page::where('id',12)->first();
		
		$sliders =  Slider::where('page_id',12)->get();
		$data1=array();
    	$i=0; 
    	$image_path= url('/storage/'); 
    	 
    	foreach($sliders as $value)
    	{
    		$data1[$i]['id'] = $value->id;
    		$data1[$i]['slider_image'] =$image_path.$value->slider_image;
    		$data1[$i]['title'] = $value->title;
    		$data1[$i]['description'] = $value->description;
    		$data1[$i]['buttne_text'] = $value->buttne_text;
    		$data1[$i]['button_link'] = $value->button_link;
    		$i++;
    	}
		
        $data=array();
        $image_path=  env('IMAGE_PATH');
         
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

            $data['marrakechtitle'] = $apartmentget->title6;
            $data['marrakechdescripation'] = $apartmentget->descripation6;
            $data['marrakechimage'] = $image_path.$apartmentget->image;
            $data['marrakechbuttonname'] = $apartmentget->button_name;
            $data['marrakechbuttonlink'] = $apartmentget->button_url;

          
        return response([$data,$data1],200);
    }


     public function getProcesspage(){
        $processget =  page::where('id',13)->first();
        $sliders =  Slider::where('page_id',13)->get();
        $data1=array();
        $i=0; 
        $image_path= url('/storage/'); 
         
        foreach($sliders as $value)
        {
            $data1[$i]['id'] = $value->id;
            $data1[$i]['slider_image'] =$image_path.$value->slider_image;
            $data1[$i]['title'] = $value->title;
            $data1[$i]['description'] = $value->description;
            $data1[$i]['buttne_text'] = $value->buttne_text;
            $data1[$i]['button_link'] = $value->button_link;
            $i++;
        }


        $data=array();
        $image_path=  env('IMAGE_PATH');
         
            $data['processpagetitle'] = $processget->title;
           
            $data['singletitle1'] = $processget->title1;
          
            $data['rugsproducttitle1'] = $processget->product_title1;
            $data['rugsproductbuttonname1'] = $processget->product_button_name1;
            $data['rugsproductproductimage1'] = $image_path.$processget->product_image1;

            $data['processtitle2'] = $processget->product_title2;
            $data['processbuttonname2'] = $processget->product_button_name2;
            $data['processproductimage2'] = $image_path.$processget->product_image2;
          
            $data['singletitle2'] = $processget->product_button_link1;

            $data['processtitle3'] = $processget->product_title3;
            $data['processbuttonname3'] = $processget->product_button_name3;
            $data['processproductimage3'] = $image_path.$processget->product_image3;

            $data['processtitle4'] = $processget->product_title4;
            $data['processbuttonname4'] = $processget->product_button_name4;
            $data['processproductimage4'] = $image_path.$processget->product_image4;

            $data['singletitle3'] = $processget->product_button_link2;

            $data['processtitle5'] = $processget->product_title5;
            $data['processbuttonname5'] = $processget->product_button_name5;
            $data['processproductimage5'] = $image_path.$processget->product_image5;

            $data['processtitle6'] = $processget->title6;
            $data['processbuttonname6'] = $processget->button_name;
            $data['processproductimage6'] = $image_path.$processget->image;

        return response([$data,$data1],200);
    }

    public function getStorypage(){
        $storyget =  page::where('id',14)->first();
        $sliders =  Slider::where('page_id',14)->get();
        $data1=array();
        $i=0; 
        $image_path= env('IMAGE_PATH'); 
         
        foreach($sliders as $value)
        {
            $data1[$i]['id'] = $value->id;
            $data1[$i]['slider_image'] =$image_path.$value->slider_image;
            $data1[$i]['title'] = $value->title;
            $data1[$i]['description'] = $value->description;
            $data1[$i]['buttne_text'] = $value->buttne_text;
            $data1[$i]['button_link'] = $value->button_link;
            $i++;
        }


        $data=array();
         
            $data['storymaintitle'] = $storyget->title;
           
            $data['wowearetitle1'] = $storyget->title1;
            $data['wowearedescripation'] = $storyget->content;
            $data['woweareimage'] = $image_path.$storyget->image;
          
            $data['beginningtitle'] = $storyget->title3;
            $data['beginningdescripation'] = $storyget->descripation3;
            $data['beginningimage'] = $image_path.$storyget->image3;
            $data['beginningbuttonname'] = $storyget->button_name3;
            $data['beginningbuttonelink'] = $storyget->button_link3;
          
            $data['inspiredtitle1'] = $storyget->product_title1;
            $data['inspireddescripation1'] = $storyget->descripation2;
            $data['inspiredproductimage1'] = $image_path.$storyget->product_image1;
            $data['inspiredbuttonname1'] = $storyget->product_button_name1;
            $data['inspiredproductbuttonlink1'] = $storyget->product_button_link1;

            $data['dedicationtitle2'] = $storyget->product_title2;
            $data['dedicationdescripation2'] = $storyget->descripation6;
            $data['dedicationproductimage2'] = $image_path.$storyget->product_image2;
            $data['dedicationbuttonname2'] = $storyget->product_button_name2;
            $data['dedicationproductbuttonlink2'] = $storyget->product_button_link2;

            $data['communitytitle'] = $storyget->title5;
            $data['communitydesctipation'] = $storyget->desctipation5;
            $data['communityimage1'] = $image_path.$storyget->flat_image1;


        return response([$data,$data1],200);
    }

     public function getSwatchespage(){
        $swatchesget =  page::where('id',15)->first();
        $sliders =  Slider::where('page_id',15)->get();
        $data1=array();
        $i=0; 
        $image_path= url('/storage/'); 
         
        foreach($sliders as $value)
        {
            $data1[$i]['id'] = $value->id;
            $data1[$i]['slider_image'] =$image_path.$value->slider_image;
            $data1[$i]['title'] = $value->title;
            $data1[$i]['description'] = $value->description;
            $data1[$i]['buttne_text'] = $value->buttne_text;
            $data1[$i]['button_link'] = $value->button_link;
            $i++;
        }
        $data=array();
        $image_path=  env('IMAGE_PATH');
         
            $data['swatchesmaintitle'] = $swatchesget->title;
           
            $data['swatchsettitle1'] = $swatchesget->title1;
            $data['swatchsedescripation'] = $swatchesget->content;
            $data['swatchseimage'] = $image_path.$swatchesget->image;
            $data['swatchsebuttonname'] = $swatchesget->button_name;
            $data['swatchsebuttonelink'] = $swatchesget->button_url;

            $data['pickcolorettitle1'] = $swatchesget->title3;
            $data['pickcoloredescripation'] = $swatchesget->descripation3;
            $data['pickcoloreimage'] = $image_path.$swatchesget->image3;
          
            $data['knottedflattitle'] = $swatchesget->title5;
            $data['knottedflatdescripation'] = $swatchesget->desctipation5;
            $data['knottedflatimage1'] = $image_path.$swatchesget->flat_image1;
            $data['knottedflatbuttonname1'] = $swatchesget->button_name2;
            $data['knottedflatbuttonlink1'] = $swatchesget->button_link2;
            $data['knottedflatimage2'] = $image_path.$swatchesget->flat_image2;
            $data['knottedflatbuttonname2'] = $swatchesget->button_name5;
            $data['knottedflatbuttonlink2'] = $swatchesget->button_link5;

            $data['videotitle'] = $swatchesget->title6;
            $data['videoimage'] = $image_path.$swatchesget->product_image1;


        return response([$data,$data1],200);
    }

     public function getSizeGuidepage(){
        $sizeguideget =  page::where('id',16)->first();
        $sliders =  Slider::where('page_id',16)->get();
        $data1=array();
        $i=0; 
        $image_path= url('/storage/'); 
         
        foreach($sliders as $value)
        {
            $data1[$i]['id'] = $value->id;
            $data1[$i]['slider_image'] =$image_path.$value->slider_image;
            $data1[$i]['title'] = $value->title;
            $data1[$i]['description'] = $value->description;
            $data1[$i]['buttne_text'] = $value->buttne_text;
            $data1[$i]['button_link'] = $value->button_link;
            $i++;
        }
        $data=array();
        $image_path=  env('IMAGE_PATH');
         
            $data['sizeguidetitle'] = $sizeguideget->title;
           
            $data['sizeguidetitle1'] = $sizeguideget->title1;
            $data['sizeguidedescripation'] = $sizeguideget->content;

            $data['sizeguidesmalltitle1'] = $sizeguideget->title2;
            $data['sizeguidesmallcommonsize1'] = $sizeguideget->video_link;
            $data['sizeguidesmallimage1'] = $image_path.$sizeguideget->image3;
            $data['sizeguidesmallimagename1'] = $sizeguideget->button_name3;
            $data['sizeguidesmallimage2'] = $image_path.$sizeguideget->product_image1;
            $data['sizeguidesmallimagename1'] = $sizeguideget->product_button_name1;
            $data['sizeguidesmallimage3'] = $image_path.$sizeguideget->product_image2;
            $data['sizeguidesmallimagename'] = $sizeguideget->product_button_name2;

            $data['sizeguidemediumtitle1'] = $sizeguideget->title4;
            $data['sizeguidemediumcommonsize1'] = $sizeguideget->product_title3;
            $data['sizeguidemediumimage1'] = $image_path.$sizeguideget->product_image3;
            $data['sizeguidemediumimagename1'] = $sizeguideget->product_button_name3;
            $data['sizeguidemediumimage2'] = $image_path.$sizeguideget->product_image4;
            $data['sizeguidemediumimagename1'] = $sizeguideget->product_button_name4;
            $data['sizeguidemediumimage3'] = $image_path.$sizeguideget->product_image5;
            $data['sizeguidemediumimagename'] = $sizeguideget->product_button_name5;

            $data['sizeguidelargetitle1'] = $sizeguideget->title5;
            $data['sizeguidelargecommonsize1'] = $sizeguideget->title6;
            $data['sizeguidelargeimage1'] = $image_path.$sizeguideget->flat_image1;
            $data['sizeguidelargeimagename1'] = $sizeguideget->button_link5;
            $data['sizeguidelargeimage2'] = $image_path.$sizeguideget->flat_image2;
            $data['sizeguidelargeimagename1'] = $sizeguideget->button_name5;

        return response([$data,$data1],200);
    }
    public function getfooterpage(){
        $footerget =  page::where('id',17)->first();
        $data=array();
        $image_path=  env('IMAGE_PATH');
         
            $data['footermaintitle'] = $footerget->title;
           
            $data['footerabouttitle1'] = $footerget->title1;
            $data['footeraboutdescripation'] = $footerget->content;
            $data['footercompanyemail'] = $footerget->title5;
            $data['footercompanynumber'] = $footerget->button_name5;
            $data['footerlogo'] = $image_path.$footerget->flat_image1;

        return response($data,200);
    }
	
	 public function getFooterNavigationList($id)
	{	 
			 
		if (Menu::where('id', $id)->exists())
		{	$image_path = url('/storage/uploads');
			$menu_list = MenuItem::join('admin_menus as m2', 'm2.id', '=', 'admin_menu_items.menu')
			->where('admin_menu_items.menu', $id)->where('admin_menu_items.parent',0)->get(['admin_menu_items.*', 'm2.name']); 
		 
			foreach($menu_list as $key1 => $result)
			{
				$insert_stock['id']=$result['id'];
				$insert_stock['label']=$result['label'];
				$insert_stock['link']=$result['link'];
				if($result['image']){
				$insert_stock['image']=$image_path.'/'.$result['image'];
				}
				$data_result[$key1] = $insert_stock;
			}
       
			return response($data_result , 200);
		}
	}
}
