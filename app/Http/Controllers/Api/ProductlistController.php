<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\VariantTag;
use App\Models\ProductMedia;
use App\Models\Collection;
use DB;
class ProductlistController extends Controller
{
    public function getAllProducts()
    {

        $symbol = CurrencySymbol();
        $image_path =  env('IMAGE_PATH');

        $products = Product::with(['productmediafirst:product_id,image', 'variants'])->get(['id', 'title', 'descripation', 'seo_utl as url']);

        $products->each(function($product, $key) use ($image_path, $symbol) {

            $product->image = url('/') . '/image/defult-image.png';
            if(isset($product->productmediafirst->image))
                $product->image = $image_path . $product->productmediafirst->image;

            $product->price_range = $symbol['currency'] . $product->price;
            if(!empty($product->variants))
                $product->price_range = $symbol['currency'] . $product->variants->min('price') . '-' . $symbol['currency'] . $product->variants->max('price');
            
            unset($product->variants);
            unset($product->productmediafirst);
        });

                
        return response(['success' => true, 'products' => $products, 'message' => 'Products List!']);

    }

    public function getProductBySlug($slug)
    {

        $symbol = CurrencySymbol();
        $product = Product::with('productmediafirst')
                ->with('variants:product_id,price')->with('detail:id,product_id,title,description')
                ->where('seo_utl', $slug)->first(['id','title', 'descripation', 'collection', 'faq', 'price']);

        if(empty($product)) {
            return response()->json(['success' => false, "message" => "Product not found"]);
        }

        if (!empty($product->variants)){
            
            $product->price_range = $symbol['currency'] .$product->variants->min('price') . '-' . $symbol['currency'] . $product->variants->max('price');
        
        } elseif(!empty($product->price)){
            
            $product->price_range = $symbol['currency'] . $product->price;
        } 

        unset($product->price);

        if (!empty($product->productmediafirst) && !empty($product->productmediafirst->image)) {
            $image_path =  env('IMAGE_PATH');
            $product->image = $image_path . $product->productmediafirst->image;
        }
        else {
            $product->image = url('/') . '/image/defult-image.png';
        }

        unset($product->productmediafirst);
        unset($product->variants);


        return response(['success' => true, 'product' => $product, 'message' => 'Product Fetched successfully!']);


    }

    public function getVariantsBySlug($slug)
    {

        $symbol = CurrencySymbol();
        $image_path =  env('IMAGE_PATH');
        $attribute =  [];

        $variants = ProductVariant::whereHas('product', function($q) use ($slug) {
            return $q->where('seo_utl', $slug);
        })->with(['product'=> function ($q1) {
            return $q1->select('id')->with('detail');
        }, 'variantmediafirst:variant_id,image'])->get(['id','product_id', 'price', 'selling_price', 'sku', 'outofstock', 'barcode', 'varient1', 'attribute1', 'varient2', 'attribute2', 'varient3', 'attribute3', 'varient4', 'attribute4']);


        $variants->each(function($variant, $key) use ($image_path, $symbol, $attribute) {

            $variant->image = url('/') . '/image/defult-image.png';
            $variant->detail = [];
            
            if(isset($variant->variantmediafirst->image))
                $variant->image = $image_path . $variant->variantmediafirst->image;

            if(!empty($variant->product->detail))
                $variant->detail = $variant->product->detail;
            
            unset($variant->product);
            unset($variant->variantmediafirst);

        });

        $variant_tag = VariantTag::all()->keyBy('id')->toArray();

        $i = 1;
        while($i <= 4 ) {
            $variantnumber = $variants->unique('varient'.$i)->pluck('varient'.$i)->first();
            if(!empty($variantnumber))
            {
                $key = ($variantnumber == 36 ? 1 : ($variantnumber == 37 ? 2 : ($variantnumber == 38 ? 3 : 4 )));
                $attribute[$key]['data'] = $variants->unique('attribute'.$i)->pluck('attribute'.$i)->toArray();
                $attribute[$key]['variantnumber'] = $variantnumber;
                $attribute[$key]['variant_tag'] = $variant_tag[$variantnumber]['name'];
            }
            $i++;
        }
        return response(['success' => true, 'variants' => $variants, 'attribute' => $attribute, 'message' => 'Variants List!']);
       
    }

    public function get_related_Products($id)
    {

        $symbol = CurrencySymbol();
        $image_path =  env('IMAGE_PATH');

        $get_product = Product::select('collection')->find($id);
        if(empty($get_product)) {
            return response()->json(['success' => false, "message" => "Product not found"]);
        }
        $collection = json_decode($get_product->collection);


        $products = Product::with('productmediafirst')
                ->with('variants:product_id,price')
                ->where('id', '!=',$id)->get(['id','title', 'collection', 'price']);

        $relatedProducts = [];

        foreach ($collection as $collection_obj) {
            
            foreach ($products as $key => $product) {
                  
                if(gettype($product->collection) == 'string') {

                    $product->collection = json_decode($product->collection);
                }

                if(empty($product->collection))
                {
                    unset($products[$key]);
                    continue;
                }


                $exist = in_array($collection_obj, $product->collection);


                if($exist) {

                    $product->image = url('/') . '/image/defult-image.png';
                    if(isset($product->productmediafirst->image))
                        $product->image = $image_path . $product->productmediafirst->image;

                    $product->price_range = $symbol['currency'] . $product->price;
                    if(!empty($product->variants))
                        $product->price_range = $symbol['currency'] . $product->variants->min('price') . '-' . $symbol['currency'] . $product->variants->max('price');
                        
                    unset($product->variants);
                    unset($product->productmediafirst);
                    unset($product->price);

                    $relatedProducts[] = $product;
                } 

                
            }
        }

        return response(['success' => true, 'products' => $relatedProducts, 'message' => 'Related Products List!']);

    }

    
    public function fetchPrice(Request $request)
    {

        $product = Product::select('id')->where('seo_utl', $request->product_id)->first();
      
        if(empty($product)) {
            return response()->json(["message" => "Product not found"], 404);
        }

        $productvariants = ProductVariant::with('variantmedia')->where('product_id', $product->id)
            ->get();
      
        $productimage = ProductMedia::Where('product_id', $product->id)
            ->get();
        $image_path =  env('IMAGE_PATH');
        

        $price = 0;
        $Productvariant= null;
        if (!empty($productvariants) && count($productvariants) > 0)
        {

            foreach ($productvariants as $variant)
            {
                $variant->attribute1 = trim($variant->attribute1);
                $variant->attribute2 = trim($variant->attribute2);
                $variant->attribute3 = trim($variant->attribute3);
                $variant->attribute4 = trim($variant->attribute4);

                $request->text1 = trim($request->text1);
                $request->text2 = trim($request->text2);
                $request->text3 = trim($request->text3);
                $request->text4 = trim($request->text4);
                
                if (($variant->attribute1 == $request->text1) && ($variant->attribute2 == $request->text2) && ($variant->attribute3 == $request->text3) && ($variant->attribute4 == $request->text4))
                {
                    $productvariant = $variant;
                   
                    break;
                }
            }
            if (empty($productvariant))
            {

                foreach ($productvariants as $variant)
                {
                    $variant->attribute1 = trim($variant->attribute1);
                    $variant->attribute2 = trim($variant->attribute2);
                    $variant->attribute3 = trim($variant->attribute3);
                    $variant->attribute4 = trim($variant->attribute4);

                    $request->text1 = trim($request->text1);
                    $request->text2 = trim($request->text2);
                    $request->text3 = trim($request->text3);
                    $request->text4 = trim($request->text4);

                    if ($variant->attribute1 == $request->text1 && $variant->attribute2 == $request->text2)
                    {
                        $productvariant = $variant;
                        break;
                    }
                    else if ($variant->attribute1 == $request->text1 && $variant->attribute3 == $request->text3)
                    {
                        $productvariant = $variant;
                        break;

                    }
                    else if ($variant->attribute1 == $request->text1 && $variant->attribute4 == $request->text4)
                    {
                        $productvariant = $variant;
                        break;
                    }
                    else if ($variant->attribute2 == $request->text2 && $variant->attribute3 == $request->text3)
                    {
                        $productvariant = $variant;
                        break;
                    }
                    else if ($variant->attribute2 == $request->text2 && $variant->attribute4 == $request->text4)
                    {
                        $productvariant = $variant;
                        break;
                    }
                    else if ($variant->attribute3 == $request->text3 && $variant->attribute4 == $request->text4)
                    {
                        $productvariant = $variant;
                        break;
                    }
                }
            }
            if (empty($productvariant))
            {
                foreach ($productvariants as $variant)
                {
                    $variant->attribute1 = trim($variant->attribute1);
                    $variant->attribute2 = trim($variant->attribute2);
                    $variant->attribute3 = trim($variant->attribute3);
                    $variant->attribute4 = trim($variant->attribute4);

                    $request->text1 = trim($request->text1);
                    $request->text2 = trim($request->text2);
                    $request->text3 = trim($request->text3);
                    $request->text4 = trim($request->text4);

                    if (($variant->attribute1 == $request->text1) || ($variant->attribute2 == $request->text2) || ($variant->attribute3 == $request->text3) || ($variant->attribute4 == $request->text4))
                    {
                        $productvariant = $variant;
                        break;
                    }
                }
            }


            if (empty($productvariant))
            {
                $productvariant = $productvariants[0];
            }
            $Productvariant = $productvariant->toArray();

            if (empty($Productvariant['variantmedia']))
            {
         
                if(!empty($productimage)){
                    $Productvariant['variantmedia'] = $productimage;
                }
                else{
                    $image = 'image/defult-image.png';
                    $Productvariant['variantmedia'][] = $image;
                }
             
            }

            $price = number_format($Productvariant['price'], 2, '.', ',');

        } 


        
        return response()
            ->json(array(
            'variant' => $Productvariant,
            'price' => $price,
            'image_path' => $image_path
        ));
    }
	
	public function Custome_Modual_InProduct($id)
    { 
		if (Product::where('id', $id)->exists())
        {
			$product = Product::where('id', $id)->get(); 
			 $data = array();
			foreach ($product as $val)
			{
				$data['id'] = $val->id;
				$data['custom_variant'] = $val->custom_variant;
				$data['cv_option_price'] = json_decode($val->cv_option_price);
				$data['cv_width_height_price'] = $val->cv_width_height_price;
			}
			return response($data, 200);    
		}
		else
        {
            return response()->json(["message" => "Product not found"], 404);
        }
	}
}

