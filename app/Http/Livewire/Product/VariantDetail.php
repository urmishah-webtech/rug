<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\ProductVariant;

use App\Models\Product;

use App\Models\VariantTag;

use App\Models\ProductMedia;

use App\Models\VariantStock;

use App\Models\Location;

use App\Models\Country;

use App\Models\ProductDetail;

use Livewire\WithFileUploads;

class VariantDetail extends Component
{
    use WithFileUploads;

    public $product,$Country, $Productvariant, $Productvariant_first, $Varianttype, $variantStock, $location;

    public $photo, $locationarray,  $selectedlocation = [];


    protected $listeners = ['changevariant'];

    public $productDetail, $existDetailCount = 0;


    protected $rules = [

        'Productvariant_first.price' => ['required'],
        'Productvariant_first.cost' => [],
        'product.compare_price' => [],
        'Productvariant_first.margin' => [],
        'Productvariant_first.profit' => [],
        'Productvariant_first.sku' => [],
        'Productvariant_first.barcode' => [],
        'Productvariant_first.hscode' => [],
        'Productvariant_first.outofstock' => [],
        'Productvariant_first.trackqtn' => [],
        'Productvariant_first.image' => 'nullable|sometimes|max:5000',
        'Productvariant_first.attribute1' => ['required'],
        'Productvariant_first.attribute2' => [],
        'Productvariant_first.attribute3' => [],
        'Productvariant_first.attribute4' => [],
        'Productvariant_first.attribute5' => [],
        'Productvariant_first.attribute6' => [],
        'Productvariant_first.attribute7' => [],
        'Productvariant_first.attribute8' => [],
        'Productvariant_first.attribute9' => [],
        'Productvariant_first.attribute10' => [],
        'Productvariant_first.selling_price' => [],
        'Productvariant_first.weight' => '',
        'Productvariant_first.weight_lable' => '',
        'Productvariant_first.country' => '',
        'Productvariant_first.stock' => '',
        'variantStock.*.stock' => [],
    ];

    public function render()
    {
        return view('livewire.product.variant-detail');
    }

    public function mount($id) {

       //$this->product = Product::where('uuid',$this->uuid)->first();
       //$this->Productmedia = ProductMedia::where('product_id',$this->product['id'])->get();
       $this->Productvariant_first = ProductVariant::where('id',$id)->first();
       $this->Productvariant = ProductVariant::where('product_id',$this->Productvariant_first["product_id"])->get();
       $this->product = Product::where('id',$this->Productvariant_first["product_id"])->first();
       $this->variantStock = VariantStock::where('variant_main_id',$this->Productvariant_first["id"])->get();
       $this->Varianttype = VariantTag::All();
       $this->location = Location::All();
       $this->Country = Country::All();

      //  $this->locationarray = (array) json_decode($this->Productvariant_first['location']);

       if($this->Productvariant_first['outofstock'] == '0') {

            $this->Productvariant_first['outofstock'] = true;

        } else {

            $this->Productvariant_first['outofstock'] = false;

        }

        if($this->Productvariant_first['trackqtn'] == '0') {

            $this->Productvariant_first['trackqtn'] = true;

        } else {

            $this->Productvariant_first['trackqtn'] = false;

        }
        $this->getProductDetail();


    }

    public function UpdateVarient($flag)
    {
        
        $arr = [];
        
        if($flag == 'update-location'){
            
            foreach($this->selectedlocation as $row){
             $arr[$row] = '';

            }
            
            $locationid = json_encode($arr);
           
            ProductVariant::where('id', $this->Productvariant_first['id'])->update(['location' => $locationid ]);

        }

        //  $this->initial();

    }

    public function deletevariant($deleteid)
    {

        $unlinkimg = ProductVariant::where('id',$deleteid)->first();

        if($unlinkimg->photo){
           $image_path = storage_path("app/public/{$unlinkimg->photo}");
           $deleteimg = unlink($image_path);
        }

           ProductVariant::where('id',$deleteid)->delete(); 


       return redirect(route('products'));
    }

    public function changevariant($flag, $params = null)
    {

            if(!empty($this->productDetail)) {

                foreach ($this->productDetail as $key => $detail) {

                    $data = [
                        'title'=> $detail['title'],
                        'description' =>$detail['description'],
                    ];
                    
                    if(isset($detail['id']) && !isset($detail['product_id'])) {
                        ProductDetail::where('id', $detail['id'])->update($data);
                    } else {
                        $data['product_id'] = $this->product->id;
                        $data['variant_id'] = $this->Productvariant_first->id;
                        ProductDetail::create($data);

                    }
                }
            }


            if ($this->Productvariant_first['outofstock'] == '0') {

                $outofstock_first = '1';

            } 

            else {

                $outofstock_first = '0';

            }

            if ($this->Productvariant_first['trackqtn'] == '0') {

                $trackqtn_first = '1';

            } 

            else {

                $trackqtn_first = '0';

            }

            if($this->photo)
            {

                $filename =  $this->photo->storePublicly('variant','public');
                ProductVariant::where('id', $flag)->update(

                    [
                        
                        'photo'            => $filename,

                    ]

                );
            }

            if($this->variantStock)
            {
                foreach ($this->variantStock as $key => $stockedit) {
                $stockid = $this->variantStock[$key]['id'];
                $variationstock = VariantStock::query()->findOrFail($stockid);

                    if ($stockid) {
                       $variationstock->update([
                           'stock' => $this->variantStock[$key]['stock']

                        ]);
                    } 
                }
            }

            ProductVariant::where('id', $flag)->update(

                [

                    'attribute1'            => $this->Productvariant_first['attribute1'],

                    'attribute2'            => $this->Productvariant_first['attribute2'],
                   
                    'attribute3'            => $this->Productvariant_first['attribute3'],

                    'attribute4'            => $this->Productvariant_first['attribute4'],
                    
                    'attribute5'            => $this->Productvariant_first['attribute5'],
                    
                    'attribute6'            => $this->Productvariant_first['attribute6'],
                    
                    'attribute7'            => $this->Productvariant_first['attribute7'],
                    
                    'attribute8'            => $this->Productvariant_first['attribute8'],
                    
                    'attribute9'            => $this->Productvariant_first['attribute9'],
                    
                    'attribute10'            => $this->Productvariant_first['attribute10'],
                    
                    'stock'            => $this->Productvariant_first['stock'],

                    'price'            => $this->Productvariant_first['price'],

                    'cost'             => $this->Productvariant_first['cost'],
                    
                    'selling_price'    => $this->Productvariant_first['selling_price'],

                    'margin'           => $this->Productvariant_first['margin'],

                    'profit'           => $this->Productvariant_first['profit'],

                    'sku'              => $this->Productvariant_first['sku'],
                    
                    'weight'           => $this->Productvariant_first['weight'],
                    
                    'weight_lable'     => $this->Productvariant_first['weight_lable'],
                    
                    'country'          => $this->Productvariant_first['country'],
                    
                    'hscode'           => $this->Productvariant_first['hscode'],

                    'barcode'          => $this->Productvariant_first['barcode'],
                    
                    'outofstock'       => $outofstock_first,
                    
                    'trackqtn'         => $trackqtn_first

                ]

            );

            
                 return redirect(route('variant-detail', $flag));

        

            session()->flash('message', 'Users Updated Successfully.');
    
   

    }
  public function getProductDetail()
    {
        $detailData = ProductDetail::where('product_id', $this->product->id)->where('variant_id', $this->Productvariant_first->id)->select('title', 'description','id')->get()->toArray();
        
        if(empty($detailData)) {
            $detailData = ProductDetail::where('product_id', $this->product->id)->select('title', 'description','id', 'product_id')->get()->toArray();
        }


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

        if(isset($this->productDetail[$index]['id']) && !isset($this->productDetail[$index]['product_id'])) {
            ProductDetail::where('id', $this->productDetail[$index]['id'])->delete();
        }
        unset($this->productDetail[$index]);
        $this->productDetail = array_values($this->productDetail);

    }
}
