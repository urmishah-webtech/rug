<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads; 
use Redirect;

class FaqCreate extends Component
{
    public function render()
    {
		$category=FaqCategory::get();
        return view('livewire.online-store.faq-create',compact('category'));
    }
	
	public function store_FaqPost(Request $request){
		 
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required' 
        ]); 
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
		 
        $faq=new Faq();
        $faq->title=$request->title;
        $faq->description=$request->description;
		$faq->category_id=$request->category_id; 
        $faq->seo_title=$request->seo_title;
        $faq->seo_description=$request->seo_description;
        $faq->seo_url=$request->seo_url;
        $faq->save();
		 
        return redirect('/admin/faq');
    }
}
