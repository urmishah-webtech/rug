<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads; 
use Redirect;
 
class BlogPostCreate extends Component
{
    public function render()
    {
		//$blog_video = Blog::where('id',1)->first();
        return view('livewire.online-store.blog-post-create');
    }
	
	public function store_BlogPost(Request $request){
		 
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required|regex:/^[\s\w-]*$/|unique:blogs',
			'description' => 'required'
        ]); 
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
		
		if($request['image']){
		$path_url = $request['image']->storePublicly('media','public');}
		else{$path_url = '';}
		if($request['video']){
		$video_url = $request['video']->storePublicly('media','public');}
		else{$video_url = '';}
		
        $blog=new Blog();
        $blog->title=$request->title;
        $blog->description=$request->description;
		$blog->slug=$request->slug;
        $blog->image=$path_url;
		$blog->video=$video_url;
        $blog->seo_title=$request->seo_title;
        $blog->seo_description=$request->seo_description;
        $blog->seo_url=$request->seo_url;
        $blog->save();
		 
        return redirect('/admin/articles');
    }
}
