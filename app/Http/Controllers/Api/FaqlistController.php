<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\Faq;

class FaqlistController extends Controller
{
     public function getAllFaqCategory()
	{
      $category = FaqCategory::get();
	  return response($category, 200);
	}
	
	public function getFaq_Category_Post($id)
	{
		if (FaqCategory::where('id', $id)->exists())
		{
			$posts = Faq::where('category_id', $id)->get();     
			$data=array();
 
			foreach($posts as $key => $post)
			{
				$data['id']=$post['id'];
				$data['title']=$post['title'];
				$data['description']=$post['description'];
				$data['category_id']=$post['category_id'];
				$data['seo_title']=$post['seo_title'];
				$data['seo_description']=$post['seo_description'];
				$data['seo_url']=$post['seo_url'];
				$data_result[$key] = $data;   
				
			}
			return response($data_result, 200);
		}
		else
		{
			return response()->json(["message" => "FAQ not found"], 404);
		}
    }
}
