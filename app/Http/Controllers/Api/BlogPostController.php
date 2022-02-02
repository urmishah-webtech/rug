<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;


class BlogPostController extends Controller
{
    public function getAllBlogPost() {
      $post = Blog::get();
	  
	  $data=array();
	  $i=0;
	  $image_path= url('/storage');
	  foreach($post as $posts)
	  {
		$data[$i]['id']=$posts->id;
        $data[$i]['title']=$posts->title;
        $data[$i]['description']=$posts->description;
		$data[$i]['slug']=$posts->slug;
        $data[$i]['image']=$image_path. '/'. $posts->image;
		$data[$i]['video']=$image_path. '/'. $posts->video;
        $data[$i]['seo_title']=$posts->seo_title;
        $data[$i]['seo_description']=$posts->seo_description;
        $data[$i]['seo_url']=$posts->seo_url;
        $i++;
	  }
      return response($data, 200);
    }
	
	public function getBlogPost($slug)
	{
		if (Blog::where('slug', $slug)->exists())
		{
			$posts = Blog::where('slug', $slug)->get(); 
			$data=array();
			$image_path= url('/storage');
			foreach($posts as $post)
			{
				$data['id']=$post->id;
				$data['title']=$post->title;
				$data['description']=$post->description;
				$data['slug']=$post->slug;
				$data['image']=$image_path. '/'. $post->image;
				$data['video']=$image_path. '/'. $post->video;
				$data['seo_title']=$post->seo_title;
				$data['seo_description']=$post->seo_description;
				$data['seo_url']=$post->seo_url;
				return response($data, 200);
			}
		}
		else
		{
			return response()->json(["message" => "Blog not found"], 404);
		}
    }
}
