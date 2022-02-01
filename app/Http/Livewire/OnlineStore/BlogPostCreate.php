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
        return view('livewire.online-store.blog-post-create');
    }
	
	public function store_BlogPost(Request $request){
		 
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'seo_url' => 'required|unique:blogs' 
        ]); 
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
		
		if($request['image']){
		$path_url = $request['image']->storePublicly('media','public');}
		else{$path_url = '';}
        $blog=new Blog();
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->image=$path_url;
        $blog->seo_title=$request->seo_title;
        $blog->seo_description=$request->seo_description;
        $blog->seo_url=$request->seo_url;
        $blog->save();
		 
        return redirect('/admin/articles');
    }
}
