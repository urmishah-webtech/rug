<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Product;

use App\Models\VariantTag;

use App\Models\ProductMedia;

use App\Models\VariantStock;

use App\Models\Tag;

use App\Models\Location;

use App\Models\Collection;

use App\Models\Country;

use App\Models\ProductVariant;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $title,$Country,$descripation,$price,$compare_price,$cost,$weight,$weight_lable,$country,$hscode,$status,$seo_title,$seo_descripation,$seo_url,$variantag,$product,$Productmedia,$varition_name,$tags,$location,$Collection, $productCollection = [], $product_new = [], $product_last_key = 0;

    public $image = [];


    public $product_array = [];

    protected $rules = [

        'title' => ['required', 'string', 'max:255'],

        'descripation' => ['required'],

        'status' => '',

        'price' => [],

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

        'seo_url' => ['required'],

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
        $this->tags = Tag::all(['label']);
        $this->variantag = VariantTag::All();
        $this->location = Location::All();
        $this->Collection = Collection::All();
    }


    public function render()
    {
        return view('livewire.product.product-create');
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

         $this->initial();

    }

    public function AddStock($flag)
    {

        if($flag)
        {

            $this->validate([
                'varition_name' => 'required'
            ]);

             VariantTag::insert(['name' => $this->varition_name]);

             session()->flash('message', 'variant Created Successfully.');

             $this->resetInput();
        }

         $this->initial();

    }

    public function deleteattribute($deleteid)
    {
        VariantTag::where('id',$deleteid)->delete();
         $this->initial();
    }

    public function storeProduct(Request $request)
    {   

        
        // if(!empty($request['varition_arrray'])){

        //        $validator = Validator::make($request->all(),[
        //             'title'     =>  'required',
        //             'att_price.*'     =>  'required',
        //             'seo_url' => 'unique:product,seo_utl'
        //         ],
        //         [
        //             "title.required"          =>  "Enter your Title!",
        //             "att_price.*.required"      =>  "Enter your Variant Price!",
        //             "seo_url.unique" => "This value has already been taken. Put different."
        //         ]);
            

        //     session()->flash('messagevarient', 'Enter your Variant Price!');
        // }else{
        //     $validator = Validator::make($request->all(),[
        //         'title'     =>  'required',
        //         'price_main'     =>  'required',
        //         'seo_url' => 'unique:product,seo_utl'
        //     ],
        //     [
        //         "title.required"          =>  "Enter your Title!",
        //         "price_main.required"     =>  "Enter your Price!",
        //         "seo_url.unique" => "This value has already been taken. Put different."
        //     ]);
        // }

        // if ($validator->fails()) {

        //     return redirect()->back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }


        $custom_variant_Save_arry = [];
        // dd($request->variant);

        foreach ($request->variant as $key => $row) {

           if($key == 36 || $key == 37){
            foreach ($row as $key2 => $item) {


                if(!empty($item['price']) || $key2 == 0) {
                  $custom_variant_Save_arry[$key][$key2]['price'] = $item['price'];
                    
                  if(isset($item['name'])) {
                      foreach ($item['name'] as $key3 => $value) {
                        if(!empty($value)) {
                          $custom_variant_Save_arry[$key][$key2]['name'][] = $value;
                        }
                      }
                    }
                  }
                  
                }

            } else{
              $custom_variant_Save_arry[$key] = $row;
             
            }
          }
         

        // foreach ($variants as $key => $variant) {
        //   if($variantprice[$i] != ""){
        //     $price = $variantprice[$i];
        //     $varientcheckid = $variantid[$i];
        //     $custom_variant_Save_arry[] =  array(
        //         'price' => $price,
        //         'lable' => $varientcheckid,
        //     );
        //   }else{
        //     $price = '';
        //     $varientcheckid = $variantid[$i];
        //     $custom_variant_Save_arry[] =  array(
        //         'price' => $price,
        //         'lable' => $varientcheckid,
        //         );
        //   }
        //   $i++;
        // }      

        // dd($custom_variant_Save_arry);

          

            $varition_arrray_crunch = $request['varition_arrray'];
            $price_arr = $request['att_price'];
            $price_selling_arr = $request['att_price_selling'];
            $cost_arr = $request['att_cost'];
            $sku_arr = $request['att_sku'];
            $barcode_arr = $request['att_barcode'];
            $stock_single_arr = $request['att_stock_qtn'];
            $country_arr = $request['att_country'];
            $margin_arr = $request['margin_arry'];
            $profit_arr = $request['profit_arry'];
           // $stock_single_arr = $request['att_single_stock'];

            $variations_arr = [];
            $arr = [];
            $productCollection_arrray = [];
       

            if(!empty($request['productCollection'])){

            $productCollection_arrray = $request['productCollection'];
            }
            if(!empty($request['product_new'])){
            $product_new_arrray = $request['product_new'];
            }else{
              $product_new_arrray = '';
            }

            $urllink = (!empty($request['seo_url'])) ? $request['seo_url'] : $request['title'] ;
            
            $locationid = json_encode($arr);
            
            $product_array = $request->product_array;  
             array_pop($product_array);


            $product_detail_arr = [

                'title' => $request['title'],

                'descripation' => $request['descripation'],

                //'customer_email' => $request['customer_email'],

                'price' => $request['price_main'],

                'compare_price' => $request['compare_price'],

                'cost' => $request['cost_main'],
                
                'selling_price' => $request['selling_price'],
                
                'compare_selling_price' => $request['compare_selling_price'],
                
                'stock' => $request['stock'],
                
                'weight' => $request['weight'],
                
                'weight_lable' => $request['weight_lable'],

                'shipping_weight' => $request['shipping_weight'],

                'width' => $request['width'],

                'height' => $request['height'],
                
                'depth' => $request['depth'],
            
                'country' => $request['country'],

                'hscode' => $request['hscode'],

                'sku' => $request['sku'],

                'barcode' => $request['barcode'],

                'location' => $locationid,
                
                'faq' => json_encode($product_array, true),
                
                'custom_variant' => $request->custom_variant_check,
                
                'cv_width_height_price' => $request->heightwidthprice,
                
                'cv_option_price' => json_encode($custom_variant_Save_arry),

                'product_new'  => json_encode($product_new_arrray),

                'product_type' => $request['product_type'],

                'vender' => $request['vender'],
                
                'collection' => json_encode($productCollection_arrray),

                //'collection' => $request['collection'],

               // 'tags' => $request['tags'], 

                'seo_title' => $request['seo_title'],

                'seo_descripation' => $request['seo_descripation'],

                'seo_utl' => str_replace(' ', '-', $urllink),

                'status' => $request['status']

            ];



                if ($request['trackqtn']) {

                    $product_detail_arr['trackqtn'] = 'true';

                } else {

                    $product_detail_arr['trackqtn'] = 'false';

                }

                if ($request['outofstock']) {

                    $product_detail_arr['outofstock'] = 'true';

                } else {

                    $product_detail_arr['outofstock'] = 'false';

                }
                
                if ($request['tax']) {

                    $product_detail_arr['tax'] = 'true';

                } else {

                    $product_detail_arr['tax'] = 'false';

                }

                if ($request['online_store']) {

                    $product_detail_arr['online_store'] = 'true';

                } else {

                    $product_detail_arr['online_store'] = 'false';

                }

                if ($request['point_of_sale']) {

                    $product_detail_arr['point_of_sale'] = 'true';

                } else {

                    $product_detail_arr['point_of_sale'] = 'false';

                }


             if (!empty($request['customer_detail_tags'])) {

                $tags = strtolower($request['customer_detail_tags']).',';

                $tags_arr = explode(" ", $tags);

                $product_detail_arr['tags'] = implode(',', $tags_arr);

                $create_tag = [];

                foreach ($tags_arr as $tag) {

                    $tag = trim($tag);

                    $exist = Tag::where('label', $tag)->first();



                    if (empty($exist)) {

                        $create_tag[] = ['label'=>$tag];

                    }

                }

                Tag::insert($create_tag);

            }

           //dd($product_detail_arr);
            Product::create($product_detail_arr);

            if($product_detail_arr)
            {

                $this->product = Product::orderBy('id', 'DESC')->first();

                    if ($request['image']) {
                    foreach ($request['image'] as $photo) {
                        
                        // $file_extension = $photo->extension();
                        $path_url = $photo->storePublicly('media','public');
            
                        ProductMedia::create([
                            'product_id' => $this->product['id'],
                            'image' => $path_url,
                        ]);
                    }
                }
            }


            $this->product = Product::orderBy('id', 'DESC')->first();
            if($varition_arrray_crunch){

             foreach ($varition_arrray_crunch as  $key => $value) {

                $explode_array = explode("/",$value);
                $variations = [];
                $variations['product_id'] = $this->product['id'];
                $variations['price'] = $price_arr[$key];
                $variations['selling_price'] = $price_selling_arr[$key];
               // $variations['cost'] = $cost_arr[$key];
               // $variations['sku'] = $sku_arr[$key];
              //  $variations['barcode'] = $barcode_arr[$key];
              //  $variations['hscode'] = $hscode_arr[$key];
              //  $variations['country'] = $country_arr[$key];
              //  $variations['margin'] = $margin_arr[$key];
              //  $variations['profit'] = $profit_arr[$key];
                $variations['stock'] = $stock_single_arr[$key];
             //  dd($explode_array);
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

                //  $variations_arr[] = $variations;
              
                $product_variant = ProductVariant::create($variations);

                $insert_stock =[];
                // dd($request->att_stock);
                if($request->att_stock){
                    foreach($request->att_stock as $key1 =>$stock) {          
                        if(!empty($stock[$key])) {
                            $stock_arr = [
                            'product_id' =>$this->product['id'],
                            'variant_main_id' => $product_variant->id,
                            'location_id' => $key1,
                            'stock' => $stock[$key]
                            ];
                            $insert_stock[] = $stock_arr;
                        }
                       
                    }
                    VariantStock::insert($insert_stock);
                }
                // dd($insert_stock);     
            }
        }
        // ProductVariant::insert($variations_arr);

            session()->flash('message', 'Customer created.');

            return redirect(route('product-detail', $this->product['uuid']));

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
