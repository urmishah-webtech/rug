<?php

namespace App\Http\Livewire\Slider;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class SliderDetail extends Component
{

	use WithFileUploads;

	public $slider,$slider_image;

	protected $rules = [
        'slider.title' => '',
        'slider.buttne_text' => '',
        'slider.button_link' => '',
        'slider.description' => '',
        'slider_image' => '',

    ];
	public function mount($id)
	{
		$this->slider = Slider::where('id',$id)->first();
	}
    public function render()
    {
        return view('livewire.slider.slider-detail');
    }

    public function update()
    {

    	if(!empty($this->slider_image)){
           $path_url = $this->slider_image->storePublicly('slider','public');
    	}else{
    		$path_url = $this->slider['slider_image'];
    	}

    	Slider::where('id', $this->slider['id'])->update(

                [

                    'title'           => $this->slider['title'],

                    'buttne_text'     => $this->slider['buttne_text'],

                    'button_link'     => $this->slider['button_link'],

                    'description' 	  => $this->slider['description'],

                    'slider_image'    => $path_url,    

                ]

            );
    }
}
