<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads; 
use Redirect;
use DB;
class BlogPostDetail extends Component
{
    public function render()
    {
        return view('livewire.online-store.blog-post-detail');
    }
	
	public function get_BlogPost_detail($id)
	{
		$edit_post=Blog::where('id',$id)->first();   
		return view('livewire.online-store.blog-post-detail',compact('edit_post'));
	}
	
	public function update_BlogPost_detail(Request $request)
    {	
		
		if($request['image']){
		$path_url = $request['image']->storePublicly('media','public');
		}else {$path_url = '';}
		
        $blog=Blog::where('id',$request->id)->first();
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->image=$path_url;
        $blog->seo_title=$request->seo_title;
        $blog->seo_description=$request->seo_description;
        $blog->seo_url=$request->seo_url;
        $blog->save();
	
        return redirect('/admin/articles');
    }
	
	public function delete_blog_post($id)
	{
		$data = Blog::where('id',$id)->delete();
		return redirect('/admin/articles'); 
    }
	  
}
