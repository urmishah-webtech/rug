<?php

namespace App\Http\Livewire\Slider;

use Livewire\Component;
use App\Models\Slider;

class SliderList extends Component
{
	public $slider;

    public function mount()
    {
        $this->slider = Slider::all();
    }
    public function render()
    {
        return view('livewire.slider.slider-list');
    }
}
