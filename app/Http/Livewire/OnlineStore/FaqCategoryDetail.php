<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads; 
use Redirect;
use DB;

class FaqCategoryDetail extends Component
{
    public function render()
    {
        return view('livewire.online-store.faq-category-detail');
    }
	
	public function get_FaqCategory_Detail($id)
	{
		$edit_cat=FaqCategory::where('id',$id)->first();    
		return view('livewire.online-store.faq-category-detail',compact('edit_cat'));
	}
	
	public function update_FaqCategory_Detail(Request $request)
    {	
		$validator = Validator::make($request->all(), [
            'category' => 'required|unique:faq_categories,category,'.$request->id 
        ]); 
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
		 
        $category=FaqCategory::where('id',$request->id)->first();
        $category->category=$request->category;
        $category->save();
	
        return redirect('/admin/faq-category');
    }
	
	public function delete_FaqCategory($id)
	{
		$data = FaqCategory::where('id',$id)->delete();
		return redirect()->route('faq-category');
    }
}
