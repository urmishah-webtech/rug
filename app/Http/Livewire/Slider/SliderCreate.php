<?php

namespace App\Http\Livewire\Slider;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class SliderCreate extends Component
{
	use WithFileUploads;

	public $title,$buttne_text,$button_link,$description,$image;

    public function render()
    {
        return view('livewire.slider.slider-create');
    }

    public function StoreSlider($flag)
    {
        if($flag == 'add-slider')
        {

            $this->validate([
                'title' => 'required',
                'image' => 'required|image|max:1024'
            ]);

            if(!empty($this->image)){
               $path_url = $this->image->storePublicly('slider','public');
        	}else{
        		$path_url = "";
        	}

             Slider::insert([

             	'title' 	  => $this->title,
             	'buttne_text' => $this->buttne_text,
             	'button_link' => $this->button_link,
             	'description' => $this->description,
             	'slider_image' => $path_url,

             ]);

             session()->flash('message', 'Slider Created Successfully.');

        }

    }
}
