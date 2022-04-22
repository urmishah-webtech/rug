<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Collection;

use Illuminate\Support\Facades\Validator;

use App\Models\CollectionProduct;

use App\Models\Product;

use Illuminate\Http\Request;

use Livewire\WithFileUploads;

class Collectionscreate extends Component
{
    use WithFileUploads;
    public $productpaginator;

    public function mount()
    {
         $this->productpaginator = Product::All();
    }
    public function render()
    {
        return view('livewire.product.collectionscreate');
    }

    public function collectionCreate(Request $request)
    {      


        $photo = $request['image'];

        if ($photo) {
        $path_url = $photo->storePublicly('collection','public');
        }else{
            $path_url = '';
        }
        
        $customer_detail_arr = [

            'title' => $request['title'],

            'description' => $request['description'],

            //'customer_email' => $request['customer_email'],

            'image' => $path_url,

            'collection_type' => $request['collection_type'],

            'condition_match' => $request['condition_match'],

            'seo_title' => $request['seo_title'],

            'seo_description' => $request['seo_description'],

            'seo_url' => str_replace(' ', '-', $request['seo_url']),

            'status' => 'invited'

        ];

            if ($request['online_store']) {

                $customer_detail_arr['online_store'] = 'true';

            } else {

                $customer_detail_arr['online_store'] = 'false';

            }

            if ($request['point_of_sale']) {

                $customer_detail_arr['point_of_sale'] = 'true';

            } else {

                $customer_detail_arr['point_of_sale'] = 'false';

            }

            Collection::create($customer_detail_arr);


            $Collectionfirst = Collection::orderBy('id', 'DESC')->first();

            $insert_stock =[];
            // dd($request->att_stock);
            if($request['getproductid']){
                foreach($request['getproductid'] as $key => $row) { 
                 $variationValue = Product::query()->findOrFail($row);         
                    if(!empty($row)) {
                        $stock_arr = [
                        'product_id' =>$variationValue['id'],
                        'collection_id' => $Collectionfirst->id,
                        'product_name' => $variationValue['title'],
                        'updated_at' => now()
                        ];
                      
                        CollectionProduct::insert($stock_arr);
                    }
                   
                }
                
            }


            session()->flash('message', 'Customer created.');

            return redirect(route('collections'));


        session()->flash('message', 'Try Again.');


    }
}
