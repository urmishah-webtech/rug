<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Collection;

use Livewire\WithPagination;

use App\Models\Payment;

use Illuminate\Pagination\LengthAwarePaginator;


class Collections extends Component
{
	use WithPagination;
    public $filter_collection;

    public $selectecollection = [];

    public $selectall = false;
  
    public $bulkDisabled = true;

    public $perPage = 10;


    public function mount()
    {

    	$this->bulkDisabled = count($this->selectecollection) < 1;
        //$this->collection = Collection::all();
    }

    public function deleteselected(){
        $collectiondelete = Collection::query()
                  ->whereIn('id', $this->selectecollection)
                  ->delete();
        $this->selectecollection = [];
        $this->selectecollection = false;
    }

    public function render()
    {
        return view('livewire.product.collections',['collection' => $this->Collectionpaginate]);
    }

    public function getCollectionpaginateProperty(){
        $collection = Collection::when($this->filter_collection, function ($query, $filter_collection) {
            $query->Where('title', 'LIKE', '%' . $filter_collection . '%');
            })->get();
        $items = $collection->forPage($this->page, $this->perPage);
        return new LengthAwarePaginator($items, $collection->count(), $this->perPage, $this->page);
    }

    public function updatedSelectAll($value){

        if($value){
            $this->selectecollection = $this->Collectionpaginate->pluck('id')->toArray();
        
        }else{
            $this->selectecollection = [];
        }
    }

    public function updatedselectecollection(){
         $this->selectall = false;
    }

    public function isselectecollection($collection_id){
        return in_array($collection_id, $this->selectecollection);
    }
}
