<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\ProductVariant;

use App\Models\Product;

use App\Models\VariantTag;

use App\Models\VariantStock;

use App\Models\ProductMedia;

use App\Models\Location;

use App\Models\Country;

use Livewire\WithFileUploads;

use Illuminate\Http\Request;



class Variant extends Component
{

    use WithFileUploads;

    public $product,$Country, $Productvariant, $Productvariant_first,$Varianttype,$sku,$price,$cost,$selling_price,$margin,$profit,$barcode,$hscode,$attribute_one,$attribute_two,$attribute_three,$lastid,$location,$variant_main_id,$location_id,$stock,$varition_name;

    public $photo;



    public function mount($id) {

       //$this->product = Product::where('uuid',$this->uuid)->first();
       //$this->Productmedia = ProductMedia::where('product_id',$this->product['id'])->get();
       $this->product = Product::where('uuid',$id)->first();
       $this->Productvariant_first = ProductVariant::where('product_id',$this->product['id'])->first();
       $this->Productvariant = ProductVariant::where('product_id',$this->product['id'])->get();
       $this->location = Location::All();
       $this->Varianttype = VariantTag::All();
       $this->Country = Country::All();


    }

    protected $rules = [

        'price' => [],
        'cost' => [],
        'selling_price' => [],
        'margin' => [],
        'profit' => [],
        'sku' => [],
        'barcode' => [],
        'hscode' => [],
        'photo' => 'nullable|sometimes|max:5000',
        'attribute_one' => [],
        'attribute_two' => [],
        'attribute_three' => [],
        'varient1' => [],
        'varient2' => [],
        'varient3' => [],
        'location_id' => [],
        'stock' => [],
        'varition_name' => [],
        'variant_main_id' => []
    ];

    public function render()
    {
        return view('livewire.product.variant');
    }

    private function resetInput()
    {
        $this->varition_name = null;
    }

    public function StoreVarient($flag)
    {

        if($flag == 'add-varient-type')
        {

            $this->validate([
                'varition_name' => 'required'
            ]);

             VariantTag::insert(['name' => $this->varition_name]);

             session()->flash('message', 'variant Created Successfully.');

             $this->resetInput();
        }

         $this->Varianttype = VariantTag::All();

    }

    public function deleteattribute($deleteid)
    {
        VariantTag::where('id',$deleteid)->delete();
        $this->Varianttype = VariantTag::All();
    }

    public function Addvariant(Request $request)
    {

        $request->validate([
            'price' => 'required',
            'photo' => 'required',
            'attribute1' => 'required',
        ],
        [
            "price.required"        =>  "Price required!",
            "photo.required"        =>  "Image required!",
            "attribute1.required"   =>  "Attribute required!",
        ]);
             

        $variant_stock_arr = [];

            $filename =  $request['photo']->storePublicly('variant','public');
            $product_variant = ProductVariant::insert(
            $variant_detail_arr = 

                [
                    'product_id'       => $request['product_id'],

                    'varient1'       => $request['varient1'],

                    'varient2'       => $request['varient2'],

                    'varient3'       => $request['varient3'],
                    
                    'attribute1'      => $request['attribute1'],

                    'attribute2'       => $request['attribute2'],

                    'attribute3'       => $request['attribute3'],

                    'price'            => $request['price'],

                    'cost'             => $request['cost'],
                   
                    'stock'             => $request['stock'],
                    
                    'selling_price'    => $request['selling_price'],

                    'margin'           => $request['margin'],

                    'profit'           => $request['profit'],

                    'sku'              => $request['sku'],

                    'barcode'          => $request['barcode'],
                    
                    'hscode'           => $request['hscode'],

                    'updated_at'       => now(),
                    
                     'photo'            => $filename,

                ]

            );
             

             

            $this->lastid = ProductVariant::orderBy('id', 'DESC')->first();

/*
            $insert_stock =[];
                    foreach($request->request as $key1 =>$stock) {  
                     $id = explode("_",$key1);
                     $stockname = $id[0];        
                        if($stockname == "stock") {
                            $stock_arr = [
                            'product_id' =>$request['product_id'],
                            'variant_main_id' => $this->lastid['id'],
                            'location_id' => $id[1],
                            'stock' => $stock[0]
                            ];
                            $insert_stock[] = $stock_arr;
                        }
                       
                    }
                    VariantStock::insert($insert_stock);*/


                 return redirect(route('variant-detail', $this->lastid));

            session()->flash('message', 'Users Updated Successfully.');
        

    }
}
