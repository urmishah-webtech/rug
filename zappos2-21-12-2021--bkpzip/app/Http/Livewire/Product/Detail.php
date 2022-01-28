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

use Illuminate\Http\Request;

use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Storage;

class Detail extends Component
{
    use WithFileUploads;


    public $product,$variantag,$tagsale,$Country,$uuid,$Productmedia,$Productvariant,$tags,$location,$variantStock,$variantStock_clone,$descripation, $LocationId, $editQuantitiesDetailsModal,$varition_name,$location_edit,$Collection,$fullStock,$urlpath, $productCollection = [];

    public $image = [], $selectedlocation = [], $stock = [], $locationarray;

    public $att_price = [], $varition_arrray = [];

    public $imgvariant;

    public $filesvariant = [];
    
    public $photo_variant, $file;

    protected $listeners = ['UpdateVarient'];

 


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
 
     public function mount($id) {
        
        $this->uuid = $id;
        $this->editQuantitiesDetailsModal = false;
        $this->product = Product::where('uuid',$this->uuid)->first();
        $this->Productmedia = ProductMedia::where('product_id',$this->product['id'])->get();
        $this->Productvariant = ProductVariant::where('product_id',$this->product['id'])->get();
        $this->tagsale = tagsale::get();
        $this->tags = Tag::All();
        $this->variantag = VariantTag::All();
        $this->Collection = Collection::All();
        $this->location = Location::All();
        $this->Country = Country::All();
        $this->fullStock = VariantStock::All();
        $this->variantStock = VariantStock::with('product_variant')->where('product_id',$this->product['id'])->get();
        
        $this->locationarray = (array) json_decode($this->product['location']);

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
       
    }


    protected $rules = [

        'urlpath' => '',
        'product.title' => 'required',
        'product.descripation' => 'required',
        'product.seo_title' => 'required',
        'product.seo_descripation' => 'required',
        'product.seo_utl' => 'required',
        'product.product_type' => 'required',
        'product.vender' => 'required',
        'product.status' => 'required',
        'product.price' => 'required',
        'product.compare_price' => '',
        'product.cost' => '',
        'product.tax' => '',
        'product.margin' => '',
        'product.profit' => '',
        'product.selling_price' => '',
        'product.compare_selling_price' => '',
        'LocationId.name' => 'required',
        'product.weight' => '',
        'product.weight_lable' => '',
        'product.country' => '',
        'product.sku' => '',
        'product.barcode' => '',
        'product.hscode' => '',
        'product.location' => '',
        'product.product_new' => '',
        'product.trackqtn' => '',
        'product.outofstock' => '',
        'Productvariant.*.price' => 'required|string',
        'Productvariant.*.selling_price' => 'required|string',
        'Productvariant.*.sku' => 'required|string',
        'Productvariant.*.barcode' => 'required|string',
        'Productvariant.*.hscode' => 'required|string',
        'variantStock.*.stock' => 'required',
        'Productvariant.*.photo' => [],
        'att_price' => [],

    ];




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

            if($variantimgsave){
            $this->Productvariant = ProductVariant::where('product_id',$this->product['id'])->get();

            session()->flash('message', 'Image Updated Successfully.');
            }
        }


    }


    public function updateDetail()
    {  

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

        Product::where('id', $this->product['id'])->update(

                [

                    'title'            => $this->product['title'],

                    'descripation'     => $this->product['descripation'],

                    'seo_title'        => $this->product['seo_title'],

                    'seo_descripation' => $this->product['seo_descripation'],

                    'seo_utl'          => $this->product['seo_utl'],

                    'product_type'     => $this->product['product_type'],

                    'vender'           => $this->product['vender'],
                    
                    'status'           => $this->product['status'],
                    
                    'weight'           => $this->product['weight'],
                    
                    'weight_lable'     => $this->product['weight_lable'],
                    
                    'country'          => $this->product['country'],
                    
                    'sku'              => $this->product['sku'],
                    
                    'barcode'          => $this->product['barcode'],
                    
                    'outofstock'       => $outofstock,
                    
                    'trackqtn'         => $trackqtn,
                    
                    'location'         => json_encode($this->locationarray),
                    
                    'hscode'           => $this->product['hscode'],
                    
                    'price'            => $this->product['price'],
                    
                    'compare_price'    => $this->product['compare_price'],
                    
                    'cost'             => $this->product['cost'],
                    
                    'margin'           => $this->product['margin'],
                    
                    'product_new'      => json_encode($this->product['product_new']),
                    
                    'profit'           => $this->product['profit'],
                    
                    'selling_price'         => $this->product['selling_price'],
                    
                    'compare_selling_price' => $this->product['compare_selling_price'],       

                ]

            );

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

                $this->Productmedia = ProductMedia::where('product_id',$this->product['id'])->get();
            }
        }


        foreach ($this->Productvariant as $key => $value) {
        $id = $this->Productvariant[$key]['id'];
        $variationValue = ProductVariant::query()->findOrFail($id);

            if ($id) {
               $variationValue->update([
                   'price' => $this->Productvariant[$key]['price'],
                   'selling_price' => $this->Productvariant[$key]['selling_price'],
                   'sku' => $this->Productvariant[$key]['sku'],
                   'barcode' => $this->Productvariant[$key]['barcode'],
                   'hscode' => $this->Productvariant[$key]['hscode']

                ]);
            } 
         }

        $this->product = Product::where('uuid',$this->uuid)->first();

         session()->flash('message', 'Product Updated Successfully.');
    }

    public function deleteproduct($deleteid)
    {
        $unlinkimg = ProductMedia::where('product_id',$deleteid)->get();
        $deleteimg = "";
        foreach ($unlinkimg as $key => $delete) {

            $image_path = storage_path("app/public/{$delete->image}");
           $deleteimg = unlink($image_path);

            
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
}
