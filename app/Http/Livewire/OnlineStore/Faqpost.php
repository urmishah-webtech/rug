<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\Faq;
use App\Models\FaqCategory;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
class Faqpost extends Component
{

	use WithPagination;

	public $filter_faq;

    public $selectefaq = [];

    public $selectall = false;
  
    public $bulkDisabled = true;

    public $perPage = 10;

    public function render()
    {
		$faq = Faq::get();
		$category=FaqCategory::get();
		$faq_count = Faq::get()->count();
        return view('livewire.online-store.faqpost',['faq' => $this->faqpaginate]);
    }

     public function deleteselected(){
        $articles = Faq::query()
                  ->whereIn('id', $this->selectefaq)
                  ->delete();
        $this->selectefaq = [];
        $this->selectall = false;
    }

     public function getfaqpaginateProperty(){
        $faq = Faq::when($this->filter_faq, function ($query, $filter_faq) {

            $query->Where('title', 'LIKE', '%' . $filter_faq . '%');

            })->get();
        $items = $faq->forPage($this->page, $this->perPage);
        return new LengthAwarePaginator($items, $faq->count(), $this->perPage, $this->page);
    }

    public function updatedSelectAll($value){

        if($value){
            $this->selectefaq = $this->faqpaginate->pluck('id')->toArray();
        
        }else{
            $this->selectefaq = [];
        }
    }

    public function updatedSelectefaq(){
         $this->selectall = false;
    }

    public function isSelectefaq($order_id){
        return in_array($order_id, $this->selectefaq);
    }
}
