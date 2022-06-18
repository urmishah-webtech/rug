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

        $product->faq = json_decode($product->faq);
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
        $product = Product::with('detail', 'productmediafirst')->where('seo_utl', $slug)->first();

        if(empty($product)) {
            return response()->json(['success' => false, "message" => "Product not found"]);
        }

        $variants = ProductVariant::with(['variantmediafirst:variant_id,image'])->where('product_id', $product->id)->get(['id','product_id', 'price', 'selling_price', 'sku', 'outofstock', 'barcode', 'varient1', 'attribute1', 'varient2', 'attribute2', 'varient3', 'attribute3', 'varient4', 'attribute4']);


        $variant_tag = VariantTag::all()->keyBy('id')->toArray();

        $attribute =  [];

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
        $image_path =  env('IMAGE_PATH');
        $default_img = '/image/defult-image.png';
        $product_img = isset($product->productmediafirst->image) ? $product->productmediafirst->image : '';

        return response(['success' => true, 'variants' => $variants, 'detail'=> $product->detail, 'image_path' => $image_path, 'product_img'=> $product_img, 'default_img' => $default_img, 'attribute' => $attribute, 'message' => 'Variants List!']);
       
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


        $products = Product::with('productmediafirst:product_id,image')
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

        $product = Product::with(['variants' => function($q) {
            return $q->with('variantmedia');
        }, 'productmediaget'])->where('seo_utl', $request->slug)->first(['id']);
      
        if(empty($product)) {
            return response()->json(['success' => false, "message" => "Product not found"]);
        }
            
        $image_path =  env('IMAGE_PATH');
        $productvariant = null;

        if (!empty($product->variants) && count($product->variants) > 0)
        {

            foreach ($product->variants as $variant)
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

                foreach ($product->variants as $variant)
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
                foreach ($product->variants as $variant)
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
                $productvariant = $product->variants->first();
            }
            $productvariant = $productvariant->toArray();


            if(empty($productvariant['variantmedia'])) {

                if(empty($product->productmediaget)) {

                    $image = 'image/defult-image.png';
                    $productvariant['variantmedia'][] = $image;
                } else {
                    $productvariant['variantmedia'] = $product->productmediaget;
                }
            }


        } 
        
       return response(['success' => true, 'variant' => $productvariant, 'image_path' => $image_path, 'message' => 'Variant Fetched!']);
    }
	
	public function getCustomVariant($id)
    { 
        $product = Product::select('id','custom_variant', 'cv_option_price', 'cv_width_height_price')->find($id);
        if(empty($product)) {
            return response()->json(['success' => false, "message" => "Product not found"]);
        }
        $product->cv_option_price = json_decode($product->cv_option_price);
		return response(['success' => true, 'product' => $product, 'message' => 'Custom Varinat In Product!']);
	 
	}
}

