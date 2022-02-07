<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page;

class PagesController extends Controller
{
    public function getAllPages() {
      $pages = page::get();
	  $i=0;
	  $data=array();
	  foreach($pages as $result)
	  {
		$data[$i]['id']=$result->id;
        $data[$i]['title']=$result->title;
        $data[$i]['content']=$result->content;
        $data[$i]['seo_title']=$result->seo_title;
        $data[$i]['seo_description']=$result->seo_description;
        $data[$i]['seo_url']=$result->seo_url;
        $data[$i]['visibility']=$result->visibility;
        $i++;
	  }
      return response($data, 200);
    }
	
	public function getPages($slug)
	{

		if (page::where('seo_url', $slug)->exists())
		{
			$pages = page::where('seo_url', $slug)->get(); 
			$data=array();
			foreach($pages as $result)
			{
				$data['id']=$result->id;
		        $data['title']=$result->title;
		        $data['content']=$result->content;
		        $data['seo_title']=$result->seo_title;
		        $data['seo_description']=$result->seo_description;
		        $data['seo_url']=$result->seo_url;
		        $data['visibility']=$result->visibility;
				return response($data, 200);
			}
		}
		else
		{
			return response()->json(["message" => "Page not found"], 404);
		}
    }
}
