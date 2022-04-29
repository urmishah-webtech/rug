<?php

namespace App\Http\Livewire\Slider;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class SliderList extends Component
{

	use WithPagination;

	public $filter_slider;

    public $selecteslider = [];

    public $selectall = false;
  
    public $bulkDisabled = true;

    public $perPage = 10;

    public function render()
    {
    	 $slider = Slider::when($this->filter_slider, function ($query, $filter_slider) {
            $query->Where('title', 'LIKE', '%' . $filter_slider . '%');
            })->get();

        return view('livewire.slider.slider-list',  ['slider' => $this->sliderpaginate]);
    }

    public function deleteselected(){
        $articles = Slider::query()
                  ->whereIn('id', $this->selecteslider)
                  ->delete();
        $this->selecteslider = [];
        $this->selectall = false;
    }

    public function getsliderpaginateProperty(){
        $slider = Slider::when($this->filter_slider, function ($query, $filter_slider) {

            $query->Where('title', 'LIKE', '%' . $filter_slider . '%');

            })->get();
        $items = $slider->forPage($this->page, $this->perPage);
        return new LengthAwarePaginator($items, $slider->count(), $this->perPage, $this->page);
    }

    public function updatedSelectAll($value){

        if($value){
            $this->selecteslider = $this->sliderpaginate->pluck('id')->toArray();
        
        }else{
            $this->selecteslider = [];
        }
    }

    public function updatedSelecteslider(){
         $this->selectall = false;
    }

    public function isSelecteslider($order_id){
        return in_array($order_id, $this->selecteslider);
    }
}
