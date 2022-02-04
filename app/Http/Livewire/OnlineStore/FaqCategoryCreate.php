<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads; 
use Redirect;

class FaqCategoryCreate extends Component
{
    public function render()
    {
        return view('livewire.online-store.faq-category-create');
    }
	
	public function store_FaqCategory(Request $request){
		 
        $validator = Validator::make($request->all(), [
            'category' => 'required|unique:faq_categories'  
        ]); 
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
		 
        $category=new FaqCategory();
        $category->category=$request->category;
        $category->save();
		 
        return redirect('/admin/faq-category');
    }
}
