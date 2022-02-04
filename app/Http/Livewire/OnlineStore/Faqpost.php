<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\Faq;
use App\Models\FaqCategory;
class Faqpost extends Component
{
    public function render()
    {
		$faq = Faq::get();
		$category=FaqCategory::get();
		$faq_count = Faq::get()->count();
        return view('livewire.online-store.faqpost',compact('faq','faq_count','category'));
    }
}
