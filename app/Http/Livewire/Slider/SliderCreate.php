<?php

namespace App\Http\Livewire\Slider;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\page;
use Livewire\WithFileUploads;

class SliderCreate extends Component
{
	use WithFileUploads;

	public $title,$buttne_text,$button_link,$description,$image,$pageget,$page_id;

    public function mount(){
         $this->pageget =  page::get();
    }

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
                'image' => 'required|image|max:1024',
                'page_id' => 'required'
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
                'page_id' => $this->page_id,
             	'slider_image' => $path_url,

             ]);
             
             return redirect(route('slider-list'));

        }

    }
}
