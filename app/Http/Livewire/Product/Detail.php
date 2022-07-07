<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Product;

use App\Models\ProductMedia;

use App\Models\ProductVariant;

use App\Models\CollectionProduct;

use App\Models\Tag;

use App\Models\Country;

use App\Models\VariantStock;

use App\Models\Collection;

use App\Models\Location;

use App\Models\VariantTag;

use App\Models\tagsale;

use App\Models\ProductDetail;

use Illuminate\Http\Request;

use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Storage;

class Detail extends Component
{
    use WithFileUploads;
    
    public $answer, $question;

    public $product,$variantag,$tagsale,$Country,$uuid,$Productmedia,$Productvariant,$tags,$location,$variantStock,$variantStock_clone,$descripation, $LocationId, $editQuantitiesDetailsModal,$varition_name,$location_edit,$Collection,$fullStock,$urlpath, $productCollection = [];

    public $image = [], $selectedlocation = [], $stock = [], $locationarray;

    public $att_price = [], $varition_arrray = [];

    public $imgvariant,$varientsarray;

    public $filesvariant = [];
   
    public $removeimage = [];
  
    public $variantname = [];
  
    public $variantid = [];

   

    
    public $photo_variant, $file;

    protected $listeners = ['UpdateVarient'];

    public $productDetail, $existDetailCount = 0;
    public $product_array = [];
    public $product_last_key = 0;

    

 


    public function render()
    {
        if($this->filesvariant)
        {
            foreach ($this->filesvariant as $photo) {
                
                // $file_extension = $photo->extension();
                $path_url = $photo->storePublicly('media','public');
            
                $productinsert = ProductMedia::create([
                    'product_id' => $this->product['id'],
                    'image' => $path_url,
                ]);
            } 

            if($productinsert){
                 $this->Productmedia = ProductMedia::where('product_id',$this->product['id'])->get();
            } 
        }
        if(!empty($this->product['product_new']) && gettype($this->product['product_new'])== 'string') {
           $this->product['product_new'] =  json_decode($this->product['product_new']);
        }  
        
        if(!empty($this->product['product_new']) && gettype($this->product['product_new'])== 'string') {
           $this->product['product_new'] =  json_decode($this->product['product_new']);
        }  
        return view('livewire.product.detail');

    }

    public function addCustomiseOption($row_id)
    {
        $elem = ['name' => [], 'price' => null];
        array_push($this->varientsarray[$row_id], $elem);
    }
 
     public function mount($id) {


        $this->uuid = $id;
        $this->editQuantitiesDetailsModal = false;
        $this->product = Product::where('uuid',$this->uuid)->first();
        $this->product_array = json_decode($this->product->faq, true);

        if(empty($this->product_array) || count($this->product_array) <= 0) {
            $this->product_array[1]['question'] = $this->product_array[1]['answer'] = '';
            $this->product_array[2]['question'] = $this->product_array[2]['answer'] = '';

        } else {
            array_push($this->product_array, [
                'question'=>'',
                'answer' => ''
            ]);
        }
        $this->product_last_key = array_key_last($this->product_array);

        $this->Productmedia = ProductMedia::where('product_id',$this->product['id'])->get();
        $this->Productvariant = ProductVariant::with('variantmedia')->where('product_id',$this->product['id'])->get();
        $this->tagsale = tagsale::get();
        $this->tags = Tag::All();
        $this->variantag = VariantTag::All();
        $this->Collection = Collection::All();
        $this->location = Location::All();
        $this->Country = Country::All();
        $this->fullStock = VariantStock::All();
        $this->variantStock = VariantStock::with('product_variant')->where('product_id',$this->product['id'])->get(); 
        $this->locationarray = (array) json_decode($this->product['location']);
        $this->varientsarray = (array) json_decode($this->product['cv_option_price'],true);
        $this->collectionarray = (array) json_decode($this->product['collection']); 
        

        // dd($this->varientsarray);
        if($this->product['custom_variant'] == 1) {

            $this->product['custom_variant'] = true;

        } else {

            $this->product['custom_variant'] = false;

        }


        if($this->product['featured'] == 1) {

            $this->product['featured'] = true;

        } else {

            $this->product['featured'] = false;

        }

        if($this->product['trackqtn'] == 'true') {

            $this->product['trackqtn'] = true;

        } else {

            $this->product['trackqtn'] = false;

        }

        if($this->product['outofstock'] == 'true') {

            $this->product['outofstock'] = true;

        } else {

            $this->product['outofstock'] = false;

        }


        if(!empty($this->product['product_new'])) {
           $this->product['product_new'] =  json_decode($this->product['product_new']);
        }


        $this->getProductDetail();
        $this->productCollection = (array) json_decode($this->product->collection);

       
    }


    protected $rules = [

        'urlpath' => '',
        'product.title' => 'required',
        'product.descripation' => 'required',
        'product.seo_title' => '',
        'product.seo_descripation' => '',
        'product.seo_utl' => 'unique:product,seo_utl',
        'product.product_type' => '',
        'product.vender' => '',
        'product.status' => '',
        'product.price' => 'required',
        'product.compare_price' => '',
        'product.cost' => '',
        'product.tax' => '',
        'product.margin' => '',
        'product.profit' => '',
        'product.selling_price' => '',
        'product.compare_selling_price' => '',
        'LocationId.name' => '',
        'product.weight' => '',
        'product.weight_lable' => '',
        'product.shipping_weight' => '',
        'product.width' => '',
        'product.height' => '',
        'product.depth' => '',
        'product.country' => '',
        'product.sku' => '',
        'product.barcode' => '',
        'product.hscode' => '',
        'product.stock' => '',
        'product.location' => '',
        'product.product_new' => '',
        'product.trackqtn' => '',
        'product.outofstock' => '',
        'product.featured' => '',
        'product.custom_variant' => '',
        'product.cv_width_height_price' => '',
        'Productvariant.*.price' => 'required',
        'Productvariant.*.selling_price' => '',
        'Productvariant.*.sku' => '',
        'Productvariant.*.barcode' => '',
        'Productvariant.*.hscode' => '',
        'Productvariant.*.stock' => '',
        'variantStock.*.stock' => '',
        'Productvariant.*.photo' => [],
        'product_array.*.question' => '',
        'product_array.*.answer' => '',
        'att_price' => [],

    ];



    public function add()
    {
        
        $this->product_last_key = $this->product_last_key +1;
        
        $this->product_array[$this->product_last_key]['question'] = $this->product_array[$this->product_last_key]['answer'] = '';

    }

    public function remove($i)
    {
        unset($this->product_array[$i]);
    }


    public function UpdateVarient($flag)
    {
        
        $arr = [];
        
        if($flag == 'update-location'){
            
            foreach($this->selectedlocation as $row){
             $arr[$row] = '';

            }
            
            $locationid = json_encode($arr);
           
            Product::where('id', $this->product['id'])->update(['location' => $locationid ]);
    
        }

        if($flag == 'add-varient-type')
        {

            $this->validate([
                'varition_name' => 'required'
            ]);

             VariantTag::insert(['name' => $this->varition_name]);

             session()->flash('message', 'variant Created Successfully.');

            //  $this->resetInput();
        }

        //  $this->initial();

    }

    public function deleteimage()
    {
       

        foreach ($this->removeimage as $key => $result) {
        //   dd($this->removeimage);
            $unlinkimg = ProductMedia::where('id',$result)->first();
            $deleteimg = "";

            if(storage_path("app/public/{$unlinkimg->image}")) {
            $image_path = storage_path("app/public/{$unlinkimg->image}");
            $deleteimg = unlink($image_path);
            }

            if($unlinkimg){
                $unlinkimg = ProductMedia::where('id',$result)->delete();
            }
        }
         return redirect()->back();
        $this->Productmedia = ProductMedia::where('product_id',$this->product['id'])->get();
        
        session()->flash('message', 'Deleted Record Successfully.');
        
    }

    public function EditAddress($locid)

    {
     $this->LocationId = Location::where('id' , $locid)->first();
    
     $this->location_edit = $locid;
   
     $this->editQuantitiesDetailsModal = true;
    }

    public function tags($flag, $params = null)
    {
        if($flag == 'tag-change')

        {

            if (!empty($params)) {

                $params = ucfirst(trim($params));



                $customer_tags = explode(',', $this->product['tags']);



                if(!in_array($params, $customer_tags)) 

                {
                    $tags = empty($this->product['tags']) ? $params : $this->product['tags'].','.$params;

                    Product::where('id', $this->product['id'])->update(['tags'  => $tags]);

                    $exist = Tag::where('label',  $params)->first();

                    if (empty($exist)) {

                        Tag::insert(['label'=>$params]);

                    }

                }

                session()->flash('message', 'product Updated Successfully.');

            }

        }

        if($flag == 'remove-tag')

        {

            if (!empty($params)) {



                $customer_tags = explode(',', $this->product['tags']);

                if (($key = array_search($params, $customer_tags)) !== false) {

                    unset($customer_tags[$key]);

                }

                $customer_tags = implode(',', $customer_tags);

                Product::where('id', $this->product['id'])->update(['tags'  => $customer_tags]);

               

                session()->flash('message', 'Users Updated Successfully.');

            

            }



        }

    }

    public function variantimgsubmit($variantid)
    {
        
        if($this->imgvariant != ''){
             $getimg =  ProductMedia::where('id', $this->imgvariant)->first();
             if ($getimg->image) {

             $variantimgsave = ProductVariant::where('id', $variantid)->update([
                        'photo' => $getimg->image
                    ]);
            }
        }
        
        $this->Productvariant = ProductVariant::where('product_id',$this->product['id'])->get();
        $this->Productmedia = ProductMedia::where('product_id',$this->product['id'])->get();
         session()->flash('message', 'Image Updated Successfully.');

    }

    public function storeProductvarient(Request $request)
    {
       // dd($request);

        $varition_arrray_crunch = $request['varition_arrray'];
        $varition_name = $request['varition_name'];
        $heightwidthprice = $request['heightwidthprice'];
       // $varition_name_two = array_unique($request['varition_name']["two"]);
        $price_arr = $request['att_price'];
        $size = $request['size'];
        $variant_custom_price = $request['variant_custom_price'];
        $price_selling_arr = $request['att_price_selling'];
        $stock_single_arr = $request['att_stock_qtn'];
        $custom_variant = $request['custom_variant'];
/*        $cost_arr = $request['att_cost'];
        $sku_arr = $request['att_sku'];
        $barcode_arr = $request['att_barcode'];
        $hscode_arr = $request['att_hscode'];
        $country_arr = $request['att_country'];*/
        $margin_arr = $request['margin_arry'];
        $profit_arr = $request['profit_arry'];
        $variations_arr = [];
        $arr = [];
        $productCollection_arrray = [];
        $product_new_arrray = [];
       

        $priceincrement = 0;
        foreach ($variant_custom_price as $price) {
            $priceincrement += $price;
        }

        $i = 0;
        foreach ($varition_name as $key => $value) {
           
            $price = $variant_custom_price[$i];
            $sizearry = $size[$i];
            $custom_variant_Save_arry[] =  array(

                'varientname' => array_unique($varition_name[$key]),
                'price' => $price,
                'lable' => $sizearry,
            );

        $i++;
        }
     //   dd($custom_variant_Save_arry);
  //dd($request['product_id_request'],$custom_variant);
       $save = Product::where('id', $request['product_id_request'])->update([

            'custom_variant'            => $custom_variant,

            'cv_option_price'           => $custom_variant_Save_arry,

            'cv_width_height_price'     => $heightwidthprice,
        ]);

      
        if($varition_arrray_crunch){
             foreach ($varition_arrray_crunch as  $key => $value) {
                $explode_array = explode("/",$value);
              //   dd($explode_array);
            }
        }
            if($varition_arrray_crunch){
             foreach ($varition_arrray_crunch as  $key => $value) {
                $explode_array = explode("/",$value);
                $variations = [];
                $variations['product_id'] = $request['product_id'];
                $variations['price'] = $price_arr[$key];
                $variations['selling_price'] = $price_selling_arr[$key];
                $variations['stock'] = $stock_single_arr[$key];
                /*$variations['cost'] = $cost_arr[$key];
                $variations['sku'] = $sku_arr[$key];
                $variations['barcode'] = $barcode_arr[$key];
                $variations['hscode'] = $hscode_arr[$key];
                $variations['country'] = $country_arr[$key];*/
                $variations['margin'] = $margin_arr[$key];
                $variations['profit'] = $profit_arr[$key];
                // dd($explode_array);
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
        return redirect()->back();
    }


    public function updateDetail()
    {  
      //  $this->validate($this->rules);
    	date_default_timezone_set('Asia/Kolkata');

       if ($this->product['custom_variant'] == 1) {
            $customvariant = '1';
        } 

        else {
            $customvariant = '0';
        } 


        if ($this->product['trackqtn'] == 'false') {
            $trackqtn = 'true';
        } 

        else {
            $trackqtn = 'false';
        }

        if ($this->product['outofstock'] == 'false') {
            $outofstock = 'true';
        } 
        else {
            $outofstock = 'false';
        }

        if($this->product['featured'] == 1) {

           $featuredvalue = '1';

        } else {

           $featuredvalue = '0';

        }

        $product_price = (!empty($this->product['price'])) ? $this->product['price'] : '' ;
        $product_selling = (!empty($this->product['compare_price'])) ? $this->product['compare_price'] : '' ;

         array_pop($this->product_array);


         foreach ($this->varientsarray as $key => $row) {
           if($key == 36 || $key == 37){
            foreach ($row as $key2 => $item) {
                if(empty($item['price']) && $key2 > 0) {
                    unset($this->varientsarray[$key][$key2]);
                } else if(isset($item['name'])) {
                    if(in_array("select_all", $item['name'])) {
                        $values = ['natural wool', 'azure blue', 'saffron yellow', 'emerald green', 'navy blue', 'tangerine orange', 'scarlet red', 'sahara brown', 'midnight black', 'light gray'];
                        $this->varientsarray[$key][$key2]['name'] = $values;
                    }
                    if(in_array("clear_all", $item['name'])) {
                        $this->varientsarray[$key][$key2]['name'] = [];
                    }
                }
            }
             
           }
         }

         // dd($this->varientsarray);

        Product::where('id', $this->product['id'])->update(

                [

                    'title'            => $this->product['title'],

                    'descripation'     => $this->product['descripation'],

                    'seo_title'        => $this->product['seo_title'],

                    'seo_descripation' => $this->product['seo_descripation'],

                    'seo_utl'          => str_replace(' ', '-', $this->product['seo_utl']),

                    'product_type'     => $this->product['product_type'],

                    'vender'           => $this->product['vender'],
                    
                    'faq'              => json_encode($this->product_array, true),
                    
                    'status'           => $this->product['status'],
                    
                    'weight'           => $this->product['weight'],
                    
                    'weight_lable'     => $this->product['weight_lable'],

                    'shipping_weight'     => $this->product['shipping_weight'],

                    'width'     => $this->product['width'],

                    'height'     => $this->product['height'],
                    
                    'depth'     => $this->product['depth'],
                    
                    'country'          => $this->product['country'],
                    
                    'sku'              => $this->product['sku'],
                    
                    'barcode'          => $this->product['barcode'],
                    
                    'outofstock'       => $outofstock,
                    
                    'trackqtn'         => $trackqtn,
                    
                    'location'         => json_encode($this->locationarray),
                    
                    'hscode'           => $this->product['hscode'],
                    
                    'price'            => $product_price,
                    
                    'compare_price'    => $product_selling,
                    
                    'stock'            => $this->product['stock'],
                    
                    'cost'             => $this->product['cost'],
                    
                    'margin'           => $this->product['margin'],
                    
                    'product_new'      => json_encode($this->product['product_new']),
                    
                    'profit'           => $this->product['profit'],
                    
                    'selling_price'         => $this->product['selling_price'],
                    
                    'compare_selling_price' => $this->product['compare_selling_price'],       
                    
                    'cv_width_height_price' => $this->product['cv_width_height_price'],       
                    
                    'custom_variant'        => $customvariant,       
                    
                    'updated_at'            => now(),

                    'featured'              => $featuredvalue,

                    'cv_option_price'       => json_encode($this->varientsarray)

                ]

            );


        // $i=0;

        // foreach ($this->varientsarray as $key => $value) {
        //   if($this->varientsarray[$key] != ""){
        //     $price = $this->varientsarray[$i]['price'];
        //     $varientcheckid = $this->varientsarray[$i]['lable'];
        //     $custom_variant_Save_arry[] =  array(
        //         'price' => $price,
        //         'lable' => $varientcheckid,
        //     );

        //     $i++;
        //   }
        // }


        // if(!empty($custom_variant_Save_arry)){
        // Product::where('id', $this->product['id'])->update( ['cv_option_price' => json_encode($custom_variant_Save_arry) ]);
        // }

        if($this->productCollection){
        Product::where('id', $this->product['id'])->update( ['collection' => json_encode($this->productCollection) ]);
        }

        if($this->variantStock)
        {
            
            foreach ($this->variantStock as $stock) {
                VariantStock::where('id', $stock->id)->update(['stock' => $stock->stock]);
            }
            
           
        } 



        if ($this->image) {
            foreach ($this->image as $photo) {
                
                // $file_extension = $photo->extension();
                $path_url = $photo->storePublicly('media','public');
    
               $mediaimg = ProductMedia::create([
                    'product_id' => $this->product['id'],
                    'image' => $path_url,
                ]);
            }

            if($mediaimg){

                $this->image = [];
                $this->Productmedia = ProductMedia::where('product_id',$this->product['id'])->get();
            }
        }

        foreach ($this->Productvariant as $key => $value) {
        $id = $this->Productvariant[$key]['id'];
        $variationValue = ProductVariant::query()->findOrFail($id);

            if ($id) {
            	$product_variant_price = (!empty($this->Productvariant[$key]['price'])) ? $this->Productvariant[$key]['price'] : 'NULL' ;
               $variationValue->update([
                   'price' => $product_variant_price,
                   'selling_price' => $this->Productvariant[$key]['selling_price'],
                   'sku' => $this->Productvariant[$key]['sku'],
                   'barcode' => $this->Productvariant[$key]['barcode'],
                   'hscode' => $this->Productvariant[$key]['hscode'],
                   'stock' => $this->Productvariant[$key]['stock']

                ]);
            } 
         }

         if(!empty($this->productDetail)) {
           
            foreach ($this->productDetail as $detail) {
                $data = [
                    'title'=> $detail['title'],
                    'description' =>$detail['description'],
                ];
                if(isset($detail['id'])) {
                    ProductDetail::where('id', $detail['id'])->update($data);
                } else {
                    $data['product_id'] = $this->product['id'];
                    ProductDetail::create($data);
                }
            }
         }
         $this->getProductDetail();

        $this->product = Product::where('uuid',$this->uuid)->first();

        $this->collectionarray = $this->productCollection;

         session()->flash('message', 'Product Updated Successfully.');
    }

    public function deleteproduct($deleteid)
    {
        $unlinkimg = ProductMedia::where('product_id',$deleteid)->get();
        $deleteimg = "";
        foreach ($unlinkimg as $key => $delete) {

            if (file_exists("app/public/{$delete->image}")){
            $image_path = storage_path("app/public/{$delete->image}");

            $deleteimg = unlink($image_path);
            }
        }


        if($deleteimg){

        Product::where('id',$deleteid)->delete();

        CollectionProduct::where('product_id',$deleteid)->delete();

        ProductMedia::where('product_id',$deleteid)->delete();

        ProductVariant::where('product_id',$deleteid)->delete();
        
        VariantStock::where('product_id',$deleteid)->delete();
        }
        else
        {
            Product::where('id',$deleteid)->delete();

            CollectionProduct::where('product_id',$deleteid)->delete();

            ProductVariant::where('product_id',$deleteid)->delete();
            
            VariantStock::where('product_id',$deleteid)->delete();
        }


       return redirect(route('products'));
    }
    public function openModel($model_name)
    {
        if($model_name == 'edit-quantities-details-modal') $this->editQuantitiesDetailsModal = true;
    }
    public function closeModel($model_name)
    {
        if($model_name == 'edit-quantities-details-modal') $this->editQuantitiesDetailsModal = false;
    }


    public function getProductDetail()
    {
        $detailData = ProductDetail::where('product_id', $this->product['id'])->whereNULL('variant_id')->select('title', 'description','id')->get()->toArray();

        if(!empty($detailData)) {
            $this->existDetailCount = count($detailData);
            $this->productDetail = $detailData;

        } else {

            $this->productDetail  = [
                ['title' => '', 'description' => '']
            ]; 
        }
    }
    public function addProductDetailSection(){

        $this->productDetail[] =  ['title' => '', 'description' => ''];

    }   
    public function removeProductDetailSection($index){

        if(isset($this->productDetail[$index]['id'])) {
            ProductDetail::where('id', $this->productDetail[$index]['id'])->delete();
        }
        unset($this->productDetail[$index]);
        $this->productDetail = array_values($this->productDetail);

    }
}
