<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductMedia;
use App\Models\VariantMedia;
use App\Models\ProductVariant;
use App\Models\CollectionProduct;
use App\Models\VariantStock;
use App\Models\Collection;
use App\Models\VariantTag;
use App\Models\tagsale;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Detail extends Component {

    use WithFileUploads;
    public $product, $tagsale, $uuid, $Productmedia, $Collection, $imgvariant;
    public $image = [], $filesvariant = [], $productimage = [], $faq = [];
    public $product_last_key = 0;
    public $select_all_images = false, $update_price = false, $update_selling_price  = false;
    public $price_all, $selling_price_all;

    protected $rules = [
        'product.title' => 'required', 
        'product.descripation' => 'required', 
        'product.seo_title' => '', 
        'product.seo_descripation' => '', 
        'product.seo_utl' => 'required', 
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
        'product.featured' => '', 
        'product.custom_variant' => '', 
        'product.collection' => '', 
        'product.cv_width_height_price' => '', 
        'product.variants.*.selling_price' => '', 
        'product.variants.*.price' => '', 
        'product.variants.*.sku' => '', 
        'product.variants.*.barcode' => '', 
        'product.variants.*.hscode' => '', 
        'product.variants.*.stock' => '', 
        'product.variants.*.photo' => [], 
        'faq.*.question' => '',
        'faq.*.answer' => '', 
        'product.cv_option_price.*.price' => '', 
        'product.cv_option_price.*.lable' => '',
    ];

    
    protected $messages = [
        'product.seo_utl.unique' => 'This value has already been taken. Put different.',
        'product.seo_utl.required' => 'This field is required.',
    ];


    public function mount($id) {

        $this->uuid = $id;
        $this->getProduct();

        $this->tagsale = tagsale::get();
        $this->Collection = Collection::select('title', 'id')->get()->groupBy('id')->toArray();
        $variantag = VariantTag::all()->toArray();
        $this->variantag = array_combine(array_column($variantag, 'id'), array_column($variantag, 'name'));
    }

    public function getProduct()
    {
        $this->product = Product::with(['productmediaget', 'variants' => function($q) {
            $q->with('variantmedia')->with('variant_stock');
        }])->where('uuid', $this->uuid)->first();

        //faq
        $this->faq = json_decode($this->product->faq, true);
        if (empty($this->faq) || count($this->faq) <= 0) {
            $this->faq[1]['question'] = $this->faq[1]['answer'] = '';
            $this->faq[2]['question'] = $this->faq[2]['answer'] = '';
        } else {
            array_push($this->faq, ['question' => '', 'answer' => '']);
        }
        $this->product_last_key = array_key_last($this->faq);

        $this->product->location = (array)json_decode($this->product->location);
        $this->product->collection = (array)json_decode($this->product->collection);
        $this->product->cv_option_price = (array) json_decode($this->product->cv_option_price);

        $this->product->custom_variant = ($this->product->custom_variant == 1) ? true : false;
        $this->product->featured = ($this->product->featured == 1) ? true : false;

        if (!empty($this->product['product_new'])) {
            $this->product->product_new = json_decode($this->product->product_new);
        }


    }

    public function render() {
        // if ($this->filesvariant) {
        //     foreach ($this->filesvariant as $photo) {
        //         // $file_extension = $photo->extension();
        //         $path_url = $photo->storePublicly('media', 'public');
        //         $productinsert = ProductMedia::create(['product_id' => $this->product['id'], 'image' => $path_url, ]);
        //     }
        //     if ($productinsert) {
        //         $this->Productmedia = ProductMedia::where('product_id', $this->product['id'])->get();
        //     }
        // }
       
        return view('livewire.product.detail');
    }
     
    public function add() {
        $this->product_last_key = $this->product_last_key + 1;
        $this->faq[$this->product_last_key]['question'] = $this->faq[$this->product_last_key]['answer'] = '';
    }
    public function remove($i) {
        unset($this->faq[$i]);

    }
    public function updateDetail() {

        $this->product->seo_utl = str_replace(' ', '-', $this->product->seo_utl);
        $this->rules["product.seo_utl"] = ['required','unique:product,seo_utl,'.$this->product->id];
        $validatedData = $this->validate($this->rules);

        array_pop($this->faq);

        $validatedData['product']['faq'] = json_encode($this->faq, true);
        $validatedData['product']['location'] =  json_encode($this->product->location);
        $validatedData['product']['product_new'] = json_encode($this->product->product_new);
        $validatedData['product']['collection'] = json_encode($this->product->collection); 

        $validatedData['product']['custom_variant'] = ($this->product->custom_variant) ? 1 : 0;

        if(!$this->product->custom_variant && !empty($validatedData['product']['cv_option_price'])) {
             foreach ($validatedData['product']['cv_option_price'] as $key => $value) {

                 $validatedData['product']['cv_option_price'][$key]['price'] = '';

             }

        } 
        $validatedData['product']['cv_option_price'] = json_encode($validatedData['product']['cv_option_price']);

        

        $validatedData['variants'] = $validatedData['product']['variants'];
        unset($validatedData['product']['variants']);

        

        $updated = Product::where('id', $this->product->id)->update($validatedData['product']);
        if ($this->image) {
            foreach ($this->image as $photo) {
                $path_url = $photo->storePublicly('media', 'public');
                $mediaimg = ProductMedia::create(['product_id' => $this->product['id'], 'image' => $path_url]);
            }
            if ($mediaimg) {
                $this->image = [];
                $this->Productmedia = ProductMedia::where('product_id', $this->product['id'])->get();
            }
        }
        foreach ($this->product->variants as $key => $variant) {
            if($this->update_price) {
                $variant->price = $this->price_all;
            }
            if($this->update_selling_price) {
                $variant->selling_price = $this->selling_price_all;
            }
            $variant->save();
        }        

        $this->getProduct();
         
        session()->flash('message', 'Product Updated Successfully.');
    }

    public function deleteproduct($deleteid)
    {
        $medias = ProductMedia::where('product_id',$deleteid)->get();
        foreach ($medias as $media) {
            if (file_exists("app/public/{$media->image}")) {
                $image_path = storage_path("app/public/{$media->image}");
                $unlinked = unlink($image_path);
                if ($unlinked) {
                    ProductMedia::where('id', $media->id)->delete();
                }
            }
        }
        Product::where('id', $deleteid)->delete();
        CollectionProduct::where('product_id', $deleteid)->delete();
        ProductVariant::where('product_id', $deleteid)->delete();
        VariantStock::where('product_id', $deleteid)->delete();
        return redirect(route('products'));
    }

    public function deleteimage() {
        if($this->select_all_images) {
            $images = $this->product->productmediaget;
        } else {
            $images = $this->productimage;
        }
        foreach ($images as $media) {
            $media= json_decode($media);
            if (file_exists(storage_path("app/public/{$media->image}"))) {
                $image_path = storage_path("app/public/{$media->image}");
                $unlinked = unlink($image_path);
                if ($unlinked) {
                    ProductMedia::where('id', $media->id)->delete();
                }
            }
        }
        session()->flash('message', 'Deleted Record Successfully.');
    }

    public function variantimgsubmit($variantid) {
        $imagevariant = json_decode($this->imgvariant);
        if (!empty($imagevariant)) {
            $variantimgsave = VariantMedia::create([
                'product_id' => $imagevariant->product_id,
                'variant_id' =>$variantid,
                'image' => $imagevariant->image
            ]);
            $this->getProduct();
            $this->imgvariant = '';
            session()->flash('message', 'Image Updated Successfully.');

        }
    }
    public function applyAll($variable_name)
    {
        $this->{$variable_name} = true;
    }

}
