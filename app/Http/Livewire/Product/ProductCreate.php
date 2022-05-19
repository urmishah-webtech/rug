<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Product;

use App\Models\VariantTag;

use App\Models\ProductMedia;

use App\Models\VariantStock;

use App\Models\Tag;

use App\Models\Collection;

use App\Models\Country;

use App\Models\ProductVariant;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $title,$Country,$descripation,$price,$compare_price,$cost,$weight,$weight_lable,$country,$hscode,$status,$seo_title,$seo_descripation,$seo_url,$variantag,$product,$Productmedia,$varition_name,$Collection, $productCollection = [], $product_new = [], $product_last_key = 0;

    public $image = [];


    public $product_array = [];

    protected $rules = [

        'title' => ['required', 'string', 'max:255'],
        'descripation' => ['required'],
        'image' => ['required'],
        'varition_arrray' => ['required'],

        'status' => '',

        'price' => ['required'],

        'compare_price' => [],

        'cost' => [],

        'weight' => [],

        'weight_lable' => [],

        'hscode' => [],

        'country' => [],

        'varition_name' => [],
       
        'productCollection' => [],
        
        'product_new' => [],

        'seo_title' => ['required'],

        'seo_descripation' => ['required'],

        'seo_url' => ['required', 'unique:product,seo_utl'],

        'product_array.*.question' => '',

        'product_array.*.answer' => '',
    ];


    public function mount() {

       $this->initial();

       $old_product_array = request()->old('product_array');
       if(isset($old_product_array) && !empty($old_product_array)) {
        $this->product_array = $old_product_array;
        
       } else {
            $this->product_array[1]['question'] = $this->product_array[1]['answer'] = '';
            $this->product_array[2]['question'] = $this->product_array[2]['answer'] = '';
       }
       $this->product_last_key = array_key_last($this->product_array);

    }

    public function initial()
    {
        $this->variantag = VariantTag::All();
        $this->Collection = Collection::All();
    }


    public function render()
    {
        return view('livewire.product.product-create');
    }

   
    public function storeProduct(Request $request)
    {    
        if(!empty($request->varition_arrray)){
            $this->rules['att_price.*'] = ['required'];
        }
        $validator = Validator::make($request->all(), $this->rules);
        
        if ($validator->fails()) {

            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $variantprice = $request->variantprice;
        $variantid = $request->variantid;
        $i=0;
        foreach ($variantprice as $key => $value) {
          if($variantprice[$i] != ""){
            $price = $variantprice[$i];
            $varientcheckid = $variantid[$i];
            $custom_variant_Save_arry[] =  array(
                'price' => $price,
                'lable' => $varientcheckid,
            );
          }else{
            $price = '';
            $varientcheckid = $variantid[$i];
            $custom_variant_Save_arry[] =  array(
                'price' => $price,
                'lable' => $varientcheckid,
                );
          }
          $i++;
        }      

            $price_arr = $request['att_price'];
            $price_selling_arr = $request['att_price_selling'];
            $stock_single_arr = $request['att_stock_qtn'];

            $productCollection_arrray = [];
       

            if(!empty($request['productCollection'])){
                $productCollection_arrray = $request['productCollection'];
            }

            if(!empty($request['product_new'])){
                $product_new_arrray = $request['product_new'];
            }

            $urllink = (!empty($request['seo_url'])) ? $request['seo_url'] : $request['title'] ;
            
            
            $product_array = $request->product_array;  
             array_pop($product_array);

             $varition_arrray_crunch = $request['varition_arrray'];
             $product_data = $request->all();
             $image = $request['image'];

                unset($product_data['varition_arrray']);
                unset($product_data['variantid']);
                unset($product_data['variantprice']);
                unset($product_data['seo_url']);
                unset($product_data['product_array']);
                unset($product_data['productCollection']);
                unset($product_data['image']);


                $product_data['faq'] = json_encode($product_array, true);
                $product_data['cv_option_price'] = json_encode($custom_variant_Save_arry);
                $product_data['product_new']  = json_encode($product_new_arrray);
                $product_data['collection'] = json_encode($productCollection_arrray);
                $product_data['seo_utl'] = str_replace(' ', '-', $urllink);

          
            $this->product = Product::create($product_data);

            if($this->product)
            {

                if ($image) {
                    foreach ($image as $photo) {
                        
                        $path_url = $photo->storePublicly('media','public');
            
                        ProductMedia::create([
                            'product_id' => $this->product->id,
                            'image' => $path_url,
                        ]);
                    }
                }
            }


            

            if($varition_arrray_crunch){
             foreach ($varition_arrray_crunch as  $key => $value) {
                $explode_array = explode("/",$value);
                $variations = [];
                $variations['product_id'] = $this->product['id'];
                $variations['price'] = $price_arr[$key];
                $variations['selling_price'] = $price_selling_arr[$key];
              
                $variations['stock'] = $stock_single_arr[$key];
               if(!empty($explode_array[0])) {
                 
                 $variations['varient1'] = (int) $explode_array[0];
                 $variations['attribute1'] = $explode_array[1];
                 
               }
               if(!empty($explode_array[2])) {
                 $variations['varient2'] = (int) $explode_array[2];
                 $variations['attribute2'] = $explode_array[3];
               }
               if(!empty($explode_array[4])) {
                 $variations['varient3'] = (int) $explode_array[4];
                 $variations['attribute3'] = $explode_array[5];
               }

               if(!empty($explode_array[6])) {
                 $variations['varient4'] = (int) $explode_array[7];
                 $variations['attribute4'] = $explode_array[6];
               }

               if(!empty($explode_array[8])) {
                 $variations['varient5'] = (int) $explode_array[9];
                 $variations['attribute5'] = $explode_array[8];
               }

               if(!empty($explode_array[10])) {
                 $variations['varient6'] = (int) $explode_array[11];
                 $variations['attribute6'] = $explode_array[10];
               }

               if(!empty($explode_array[12])) {
                 $variations['varient7'] = (int) $explode_array[13];
                 $variations['attribute7'] = $explode_array[12];
               }

               if(!empty($explode_array[14])) {
                 $variations['varient8'] = (int) $explode_array[15];
                 $variations['attribute8'] = $explode_array[14];
               }

               if(!empty($explode_array[16])) {
                 $variations['varient8'] = (int) $explode_array[17];
                 $variations['attribute8'] = $explode_array[16];
               }

               if(!empty($explode_array[18])) {
                 $variations['varient8'] = (int) $explode_array[19];
                 $variations['attribute8'] = $explode_array[18];
               }


               $variations['updated_at'] = now();

              
                $product_variant = ProductVariant::create($variations);

             
            }
        }

            session()->flash('message', 'Product created.');

            return redirect(route('product-detail', $this->product->uuid));

    }
    public function add()
    {
      
        $this->product_last_key = $this->product_last_key +1;
        

        $this->product_array[$this->product_last_key]['question'] = $this->product_array[$this->product_last_key]['answer'] = '';


    }

    public function remove($i)
    {
        unset($this->product_array[$i]);
    }

}
