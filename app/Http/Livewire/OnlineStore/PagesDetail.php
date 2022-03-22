<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\page;
use Livewire\WithFileUploads;

class PagesDetail extends Component
{

    use WithFileUploads;
    public $page,$content,$image,$image3,$product_image1,$product_image2,$product_image3,$product_image4,$product_image5;
    public function mount($id) {
        
        $this->uuid = $id;
        //$this->editQuantitiesDetailsModal = false;
        $this->page = page::where('uuid',$this->uuid)->first();
       
    }

    public function render()
    {
        return view('livewire.online-store.pages-detail');

        if($this->page['visibility'] == 'yes') {

            $this->page['visibility'] = true;

        } else {

            $this->page['visibility'] = false;

        }
    }

     protected $rules = [

        'page.title' => 'required',
        'page.content' => 'required',
        'page.button_name' => 'required',
        'page.button_url' => '',
        'page.video_link' => '',
        'page.title2' => '',
        'page.descripation2' => '',
        'page.button_name2' => '',
        'page.button_link2' => '',
        'page.title3' => '',
        'page.descripation3' => '',
        'page.image3' => '',
        'page.button_name3' => '',
        'page.button_link3' => '',
        'page.title4' => '',
        'page.product_title1' => '',
        'page.product_title2' => '',
        'page.product_title3' => '',
        'page.product_title4' => '',
        'page.product_title5' => '',
        'page.product_button_name1' => '',
        'page.product_button_name2' => '',
        'page.product_button_name3' => '',
        'page.product_button_name4' => '',
        'page.product_button_name5' => '',
        'page.product_button_link1' => '',
        'page.product_button_link2' => '',
        'page.product_button_link3' => '',
        'page.product_button_link4' => '',
        'page.product_button_link5' => '',
        'page.product_image1' => '',
        'page.product_image2' => '',
        'page.product_image3' => '',
        'page.product_image4' => '',
        'page.product_image5' => '',
        'page.title5' => '',
        'page.desctipation5' => '',
        'page.button_name5' => '',
        'page.button_link5' => '',
        'page.flat_image1' => '',
        'page.flat_image2' => '',
        'page.title6' => '',
        'page.descripation6' => '',
        'page.button_name6' => '',
        'page.button_link6' => '',
        'page.image2' => '',
        'page.seo_title' => 'required',
        'page.seo_description' => 'required',
        'page.seo_url' => 'required',

    ];

    public function Updatepages()
    {
        if ($this->page['visibility'] == 'no') {
            $visibility = 'yes';
        } 
        else {
            $visibility = 'no';
        }

        if ($this->image) {
            $path_url = $this->image->storePublicly('media','public');
        }else{
            $path_url = $this->page['image'];
        }

        page::where('id', $this->page['id'])->update(

                [

                    'title'            => $this->page['title'],

                    'content'          => $this->page['content'],
                    
                    'image'          => $path_url,

                    'button_name'            => $this->page['button_name'],

                    'button_url'          => $this->page['button_url'],

                    'video_link'            => $this->page['video_link'],

                    'title2'          => $this->page['title2'],

                    'descripation2'            => $this->page['descripation2'],

                    'button_name2'          => $this->page['button_name2'],

                    'button_link2'            => $this->page['button_link2'],

                    'title3'          => $this->page['title3'],

                    'descripation3'            => $this->page['descripation3'],

                    'button_name3'          => $this->page['button_name3'],

                    'button_link3'            => $this->page['button_link3'],

                    'title4'          => $this->page['title4'],

                    'product_title1'            => $this->page['product_title1'],

                    'product_title2'          => $this->page['product_title2'],
                    
                    'product_title3'          => $this->page['product_title3'],
                    
                    'product_title4'          => $this->page['product_title4'],
                    
                    'product_title5'          => $this->page['product_title5'],
                    
                    'product_button_name1'          => $this->page['product_button_name1'],
                 
                    'product_button_name2'          => $this->page['product_button_name2'],
                 
                    'product_button_name3'          => $this->page['product_button_name3'],
                 
                    'product_button_name4'          => $this->page['product_button_name4'],
                 
                    'product_button_name5'          => $this->page['product_button_name5'],
                  
                    'product_button_link1'          => $this->page['product_button_link1'],
                    
                    'product_button_link2'          => $this->page['product_button_link2'],

                    'product_button_link3'          => $this->page['product_button_link3'],
                    
                    'product_button_link4'          => $this->page['product_button_link4'],
                    
                    'product_button_link5'          => $this->page['product_button_link5'],

                    'title5'            => $this->page['title5'],

                    'desctipation5'          => $this->page['desctipation5'],

                    'button_name5'            => $this->page['button_name5'],

                    'button_link5'          => $this->page['button_link5'],

                    'title6'            => $this->page['title6'],

                    'descripation6'          => $this->page['descripation6'],

                    'button_name6'            => $this->page['button_name6'],

                    'button_link6'          => $this->page['button_link6'],

                    'seo_title'        => $this->page['seo_title'],

                    'seo_description'  => $this->page['seo_description'],

                    'seo_url'          => $this->page['seo_url'],
                    
                    'visibility'       => $visibility,

                ]

        );

        $this->page = page::where('id',$this->page['id'])->first();

         session()->flash('message', 'Record Updated Successfully.');
    }

}
