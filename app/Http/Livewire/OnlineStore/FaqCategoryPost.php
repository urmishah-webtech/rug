<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\FaqCategory;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Faq;

class FaqCategoryPost extends Component
{

	use WithPagination;

	public $filter_faqcat;

    public $selectefaqcat = [];

    public $selectall = false;
  
    public $bulkDisabled = true;

    public $perPage = 10;

    public function render()
    {
		$category = FaqCategory::get();
		$category_count = FaqCategory::get()->count();
        return view('livewire.online-store.faq-category-post',['category' => $this->faqcatpaginate]);
    }

     public function deleteselected(){
        $articles = FaqCategory::query()
                  ->whereIn('id', $this->selectefaqcat)
                  ->delete();

        $articlescat = Faq::query()
                  ->whereIn('category_id', $this->selectefaqcat)
                  ->delete();
        $this->selectefaqcat = [];
        $this->selectall = false;
    }

     public function getfaqcatpaginateProperty(){
        $faqcat = FaqCategory::when($this->filter_faqcat, function ($query, $filter_faqcat) {

            $query->Where('category', 'LIKE', '%' . $filter_faqcat . '%');

            })->get();
        $items = $faqcat->forPage($this->page, $this->perPage);
        return new LengthAwarePaginator($items, $faqcat->count(), $this->perPage, $this->page);
    }

    public function updatedSelectAll($value){

        if($value){
            $this->selectefaqcat = $this->faqcatpaginate->pluck('id')->toArray();
        
        }else{
            $this->selectefaqcat = [];
        }
    }

    public function updatedSelectefaqcat(){
         $this->selectall = false;
    }

    public function isSelectefaqcat($order_id){
        return in_array($order_id, $this->selectefaqcat);
    }
}
