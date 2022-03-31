<?php

namespace App\Http\Livewire\Slider;

use Livewire\Component;
use App\Models\Slider;

class SliderList extends Component
{
	public $filter_slider;

    public function render()
    {
    	 $slider = Slider::when($this->filter_slider, function ($query, $filter_slider) {
            $query->Where('title', 'LIKE', '%' . $filter_slider . '%');
            })->get();

        return view('livewire.slider.slider-list',  ['slider' => $slider]);
    }
}
