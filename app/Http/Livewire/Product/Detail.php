<?php
namespace App\Http\Livewire\Product;
use Livewire\Component;
use App\Models\Product;
use App\Models\ProductMedia;
use App\Models\VariantMedia;
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

class Detail extends Component {

    use WithFileUploads;
    public $answer, $question;
    public $product, $variantag, $tagsale, $Country, $uuid, $Productmedia, $Productvariant, $location, $variantStock, $variantStock_clone, $descripation, $LocationId, $editQuantitiesDetailsModal, $varition_name, $Collection, $fullStock, $urlpath, $productCollection = [];
    public $image = [], $selectedlocation = [], $stock = [], $locationarray;
    public $att_price = [], $varition_arrray = [];
    public $imgvariant, $varientsarray;
    public $filesvariant = [];
    public $productimage = [];
    public $variantname = [];
    public $variantid = [];
    public $photo_variant, $file;
    public $productDetail, $existDetailCount = 0;
    public $faq = [];
    public $product_last_key = 0;
    public $select_all_images = false;

    protected $rules = [
        'urlpath' => '', 
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
        'product.featured' => '', 
        'product.custom_variant' => '', 
        'product.collection' => '', 
        'product.cv_width_height_price' => '', 
        'product.variants.*.selling_price' => '', 
        'product.variants.*.price' => 'required', 
        'product.variants.*.sku' => '', 
        'product.variants.*.barcode' => '', 
        'product.variants.*.hscode' => '', 
        'product.variants.*.stock' => '', 
        'variantStock.*.stock' => '', 
        'product.variants.*.photo' => [], 
        'faq.*.question' => '',
        'faq.*.answer' => '', 
        'product.cv_option_price.*.price' => '', 
        'product.cv_option_price.*.lable' => '',
        'att_price' => [], 
    ];


    public function mount($id) {

        $this->uuid = $id;
        $this->getProduct();

        $this->editQuantitiesDetailsModal = false;
        $this->tagsale = tagsale::get();
        $this->Collection = Collection::select('title', 'id')->get()->groupBy('id')->toArray();
        $this->location = Location::All();
        $this->Country = Country::All();
        $this->fullStock = VariantStock::All();
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
        $validatedData['product']['cv_option_price'] = json_encode($this->product->cv_option_price); 

        $validatedData['product']['custom_variant'] = ($this->product->custom_variant) ? 1 : 0;

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
            $variant->save();
        }        

        $this->getProduct();
       
      
        // if ($this->variantStock) {
        //     foreach ($this->variantStock as $stock) {
        //         VariantStock::where('id', $stock->id)->update(['stock' => $stock->stock]);
        //     }
        // }
        
        // foreach ($this->Productvariant as $key => $value) {
        //     $id = $this->Productvariant[$key]['id'];
        //     $variationValue = ProductVariant::query()->findOrFail($id);
        //     if ($id) {
        //         $product_variant_price = (!empty($this->Productvariant[$key]['price'])) ? $this->Productvariant[$key]['price'] : 'NULL';
        //         $variationValue->update(['price' => $product_variant_price, 'selling_price' => $this->Productvariant[$key]['selling_price'], 'sku' => $this->Productvariant[$key]['sku'], 'barcode' => $this->Productvariant[$key]['barcode'], 'hscode' => $this->Productvariant[$key]['hscode'], 'stock' => $this->Productvariant[$key]['stock']]);
        //     }
        // }
        // if (!empty($this->productDetail)) {
        //     foreach ($this->productDetail as $detail) {
        //         $data = ['title' => $detail['title'], 'description' => $detail['description'], ];
        //         if (isset($detail['id'])) {
        //             ProductDetail::where('id', $detail['id'])->update($data);
        //         } else {
        //             $data['product_id'] = $this->product['id'];
        //             ProductDetail::create($data);
        //         }
        //     }
        // }
        // $this->product = Product::where('uuid', $this->uuid)->first();
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

}
