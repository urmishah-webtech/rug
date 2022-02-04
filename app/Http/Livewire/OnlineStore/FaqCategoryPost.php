<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\FaqCategory;

class FaqCategoryPost extends Component
{
    public function render()
    {
		$category = FaqCategory::get();
		$category_count = FaqCategory::get()->count();
        return view('livewire.online-store.faq-category-post',compact('category','category_count'));
    }
}
