<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\page;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Pages extends Component
{
	use WithPagination;

    public $filter_pages;

    public $selectepages = [];

    public $selectall = false;
  
    public $bulkDisabled = true;

    public $perPage = 10;
 	
    public function render()
    {
    	// $pages = page::when($this->filter_pages, function ($query, $filter_pages) {
     //        $query->Where('title', 'LIKE', '%' . $filter_pages . '%');
     //        })->get();
        return view('livewire.online-store.pages', ['pages' => $this->pagespaginate]);
    }

     public function deleteselected(){
        $articles = page::query()
                  ->whereIn('id', $this->selectepages)
                  ->delete();
        $this->selectepages = [];
        $this->selectall = false;
    }

     public function getpagespaginateProperty(){
        $pages = page::when($this->filter_pages, function ($query, $filter_pages) {

            $query->Where('title', 'LIKE', '%' . $filter_pages . '%');

            })->get();
        $items = $pages->forPage($this->page, $this->perPage);
        return new LengthAwarePaginator($items, $pages->count(), $this->perPage, $this->page);
    }

    public function updatedSelectAll($value){

        if($value){
            $this->selectepages = $this->pagespaginate->pluck('id')->toArray();
        
        }else{
            $this->selectepages = [];
        }
    }

    public function updatedSelectepages(){
         $this->selectall = false;
    }

    public function isSelectepages($order_id){
        return in_array($order_id, $this->selectepages);
    }
}
