<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads; 
use Redirect;

class FaqDetail extends Component
{
    public function render()
    {
        return view('livewire.online-store.faq-detail');
    }
	
	public function get_FAQ_detail($id)
	{
		$edit_faq=Faq::where('id',$id)->first();  
		$category = FaqCategory::get();		
		return view('livewire.online-store.faq-detail',compact('edit_faq','category'));
	}
	
	public function update_FAQ_detail(Request $request)
    {	
		$validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required' 
        ]); 
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
		 
        $faq=Faq::where('id',$request->id)->first();
        $faq->title=$request->title;
        $faq->description=$request->description;
		$faq->category_id=$request->category_id; 
        $faq->seo_title=$request->seo_title;
        $faq->seo_description=$request->seo_description;
        $faq->seo_url=$request->seo_url;
        $faq->save();
	
        return redirect('/admin/faq');
    }
	
	public function delete_FAQ_post($id)
	{
		$data = Faq::where('id',$id)->delete();
		return redirect()->route('faq');
    }
}
