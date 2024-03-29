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
        $product = DB::table('product')->get();

        $data = array();
        $i = 0;
        $image_path =  env('IMAGE_PATH');

        foreach ($product as $val)
        {
            $price_data = Product::join('product_variants', 'product_variants.product_id', '=', 'product.id')->select('product_variants.price as price','product.price as main_price')
                ->where('product.id', $val->id)
                ->whereNotNull('product_variants.price')
                ->get();

            $product_image = DB::table('product')->leftJoin('product_media as pm', 'product.id', '=', 'pm.product_id')
                ->select('product.id as id', 'pm.image as image', 'product.title as title', 'product.descripation as descripation')
                ->where('product.id', $val->id)
                ->first();

            $price_array = array();
            foreach ($price_data as $key => $value)
            {
                $price_array[$key] = $value->price;
            }

            if (!empty($price_array))
            {
                $min = min($price_array);
                $max = max($price_array);
            }else{
                $min = '';
                $max = '';
            }
            $data[$i]['id'] = $val->id;
            $data[$i]['title'] = $val->title;
            $data[$i]['description'] = $val->descripation;
            $data[$i]['url'] = $val->seo_utl;
            $data[$i]['image'] = $image_path . $product_image->image;
            if (!empty($price_array)){
            $data[$i]['price_range'] = $symbol['currency'] . $min . '-' . $symbol['currency'] . $max;
            }else{
                 $data[$i]['price_range'] = $symbol['currency'] . $val->price;
            }
            $i++;

        }
        return response($data, 200);
    }

    public function getIndividualProduct($slug)
    {

        $symbol = CurrencySymbol();
        $product = Product::select('id','title', 'descripation', 'collection', 'faq', 'price')->with('productmediafirst')->with('favoriteget')
                ->with('variants')->with('productDetail')
                ->where('seo_utl', $slug)->first();

        if(empty($product)) {
            return response()->json(["message" => "Product not found"], 404);
        }

        $productResponse['id'] = $product->id;
        $productResponse['title'] = $product->title;
        $productResponse['descripation'] = $product->descripation;
        $productResponse['collection'] = json_decode($product->collection);
        $productResponse['productfaq'] = array_values((array)json_decode($product->faq));
        $productResponse['detail'] =  (!empty($product->productDetail)) ? $product->productDetail->toArray() : [];
        
        if (!empty($product->productmediafirst) && !empty($product->productmediafirst->image)) {
            $image_path =  env('IMAGE_PATH');
            $productResponse['image'] = $image_path . $product->productmediafirst->image;
        }
        else {
            $productResponse['image'] = url('/') . '/image/defult-image.png';
        }

        $productResponse['price_range'] = '';
        $variantsPrice = $product->variants->pluck('price')->toArray();

        if (!empty($variantsPrice)){
            
            $productResponse['price_range'] = $symbol['currency'] . min($variantsPrice) . '-' . $symbol['currency'] . max($variantsPrice);
        
        } elseif(!empty($product->price)){
            
            $productResponse['price_range'] = $symbol['currency'] . $product->price;
        } 

        return response($productResponse, 200);

    }

    public function getIndividualProduct_variant($slug)
    {

       
        $product = Product::with('productmediaget')->with('variantmedia')->with('favoriteget')
                ->with('productDetail')->with(['variants' => function ($q)
            {
                return $q->with('detail');
            }
            ])
                ->where('seo_utl', $slug)->first();
                
        if(empty($product)) {
            return response()->json(["message" => "Product not found"], 404);
        }
        

        $result_attr1 = $result_attr2 = $result_attr3 = $result_attr4 = null;
                $variant1 = $variant2 = $variant3 = $variant4 = false;
            $symbol = CurrencySymbol();
            $product_arra = array();
            $image_path =  env('IMAGE_PATH');


                $price_data = Product::join('product_variants', 'product_variants.product_id', '=', 'product.id')->select('product_variants.price as price')
                    ->where('product.id', $product->id)
                    ->whereNotNull('product_variants.price')
                    ->get();

                $price_array = array();

                foreach ($price_data as $key => $value)
                {
                    $price_array[$key] = $value->price;
                }

                if (!empty($price_array))
                {
                    $min = min($price_array);
                    $max = max($price_array);
                }
                else
                {
                    $min = '';
                    $max = '';
                }

                $product_arra['id'] = $product->id;
                $product_arra['title'] = $product->title;
                $product_arra['description'] = $product->descripation;
                // $product_arra['image'] = $image_path . $val['productmediaget'][$key]['image'];
                // dd($val['variants']);
                $product_arra['price_range'] = $symbol['currency'] . $min . '-' . $symbol['currency'] . $max;
                $data_color = [];
                $data_size = [];
                $data_color_main = [];
                $insert_stock = [];
                $arrayvarit = [];
                $data_result = [];
                

                if(!$product->variants->isEmpty()) {

                foreach ($product->variants as $key => $result)
                {

                    $insert_stock['variant_id'] = $result['id'];
                    $insert_stock['image'] = $image_path . $result['photo'];
                    $insert_stock['price'] = $result['price'];
                    $insert_stock['selling_price'] = $result['selling_price'];
                    $insert_stock['sku'] = $result['sku'];
                    $insert_stock['outofstock'] = $result['outofstock'];
                    $insert_stock['barcode'] = $result['barcode'];
                    /*    $insert_stock['varient1'] = $result['varient1'];
                    $insert_stock['attribute1'] = $result['attribute1'];
                    $insert_stock['varient2'] = $result['varient2'];
                    $insert_stock['attribute2'] = $result['attribute2'];
                    $insert_stock['varient3'] = $result['varient3'];
                    $insert_stock['attribute3'] = $result['attribute3'];*/

                    $color_result[$key] = $data_color;
                    $size_result[$key] = $data_size;
                    $color_main_result[$key] = $data_color_main;
                    $data_result[$key] = $insert_stock;

                    if ($result['detail']->isEmpty())
                    {
                        $data_result[$key]['detail'] = $product->productDetail;
                    }
                    else
                    {
                        $data_result[$key]['detail'] = $result['detail'];
                    }
                    // $data_result[$key]['variantmedia'] = $result['variantmedia'];

                }

                $result_attributes = [];

                $color = [];
                $colorvarient = [];
                $first_variant = $product->variants->first();

                foreach ($product->variants->unique('attribute1') as $sizekey1 => $row1)
                {
                    $variant_tag = VariantTag::where('id', $first_variant->varient1)
                        ->first();
                    if ($variant_tag)
                    {
                        $tag_name = $variant_tag->name;
                    }
                    else
                    {
                        $tag_name = '';
                    }
                    if ($row1->attribute1 != "")
                    {
                        $colorvarient['variantnumber'] = $first_variant->varient1;
                        $colorvarient['variant_tag'] = $tag_name;
                        $color[] = $row1->attribute1;

                    }
                    else
                    {
                        $colorvarient[] = "null";
                        $color[] = "null";
                    }

                }
                   
                if($color && $colorvarient){
                    $color_arry[] = $color;
                    $color_arry[] = $colorvarient;
                }else{
                    $color_arry[] = '';
                    $color_arry[] = '';
                }
                $result_attributes[$first_variant->varient1] = $color_arry;


                $othercolor = [];
                $othercolorvarient = [];

                foreach ($product->variants->unique('attribute2') as $sizekey2 => $row2)
                {
                    $variant_tag = VariantTag::where('id', $first_variant->varient2)
                        ->first();
                    if ($variant_tag)
                    {
                        $tag_name = $variant_tag->name;
                    }
                    else
                    {
                        $tag_name = '';
                    }
                    if ($row2->attribute2 != "")
                    {
                        $othercolorvarient['variantnumber'] = $first_variant->varient2;
                        $othercolorvarient['variant_tag'] = $tag_name;
                        $othercolor[] = $row2->attribute2;
                    }
                    else
                    {
                        $othercolorvarient[] = '';
                        $othercolor[] = '';
                    }
                }

                $other_color_arry[] = $othercolor;
                $other_color_arry[] = $othercolorvarient;
                $result_attributes[$first_variant->varient2] = $other_color_arry;

                $size = [];
                $sizevarient = [];
                foreach ($product->variants->unique('attribute3') as $sizekey => $row3)
                {
                    $variant_tag = VariantTag::where('id', $first_variant->varient3)
                        ->first();
                    if ($variant_tag)
                    {
                        $tag_name = $variant_tag->name;
                    }
                    else
                    {
                        $tag_name = '';
                    }
                    if ($row3->attribute3 != "")
                    {
                        $sizevarient['variantnumber'] = $first_variant->varient3;
                        $sizevarient['variant_tag'] = $tag_name;
                        $size[] = $row3->attribute3;
                    }
                    else
                    {
                        $sizevarient[] = '';
                        $size[] = '';
                    }
                }

                $size_arry[] = $size;
                $size_arry[] = $sizevarient;
                $result_attributes[$first_variant->varient3] = $size_arry;


                $tassels = [];
                $tasselsverient = [];
                foreach ($product->variants->unique('attribute4') as $sizekey4 => $row4)
                {
                    $variant_tag = VariantTag::where('id', $first_variant->varient4)
                        ->first();
                    if ($variant_tag)
                    {
                        $tag_name = $variant_tag->name;
                    }
                    else
                    {
                        $tag_name = '';
                    }
                    if ($row4->attribute4 != "")
                    {
                        $tasselsverient['variantnumber'] = $first_variant->varient4;
                        $tasselsverient['variant_tag'] = $tag_name;
                        $tassels[] = $row4->attribute4;
                    }
                    else
                    {
                        $tassels[] = '';
                        $tasselsverient[] = '';
                    }
                }
                
                $tassels_arry[] = $tassels;
                $tassels_arry[] = $tasselsverient;
                $result_attributes[$first_variant->varient4] = $tassels_arry;
                
                foreach($result_attributes as $key=>$item) {
                    switch($key) {
                        case(36): 
                            $result_attr1 = isset($result_attributes[36]) ? $result_attributes[36] : null;
                            $variant1 = true;
                            break;
                        case(37): 
                            $result_attr2 = isset($result_attributes[37]) ? $result_attributes[37] : null;
                            $variant2 = true;
                            break;
                        case(38): 
                            $result_attr3 = isset($result_attributes[38]) ? $result_attributes[38] : null;
                            $variant3 = true;
                            break;
                        case(41): 
                            $result_attr4 = isset($result_attributes[41]) ? $result_attributes[41] : null;
                            $variant4 = true;
                            break;
                    }
                }
                }

                // $result_attr1 = $result_attributes[$val->variants[0]['varient1']];
                // $result_attr2 = $result_attributes[$val->variants[0]['varient2']];
                // $result_attr3 = isset($result_attributes[38]) ? $result_attributes[38] : null;
                // $result_attr4 = $result_attributes[$val->variants[0]['varient4']];
                // $result_attr1 = !empty($result_attributes[36])? $result_attributes[36] : null;
                // $result_attr2 = !empty($result_attributes[37])? $result_attributes[37] : null;
                // $result_attr3 = !empty($result_attributes[38])? $result_attributes[38] : null;
                // $result_attr4 = !empty($result_attributes[41])? $result_attributes[41] : null;

                $data_result['variantmedia'] = $product->variantmedia;
                
                

                
                
                
               
                return response(['data' => $data_result, 'attribute1' => $result_attr1, 'attribute2' => $result_attr2, 'attribute3' => $result_attr3, 'attribute4' => $result_attr4, 'variant1' => $variant1, 'variant2' => $variant2, 'variant3' => $variant3, 'variant4' => $variant4], 200);
            
                            

        
        
    }

    public function get_related_Products($slug)
    {

        $symbol = CurrencySymbol();
        if (Product::where('seo_utl', $slug)->exists())
        {
            $productget = Product::where('seo_utl', $slug)->first();
            $product = Product::with('productmediaget')->with('variants')
                ->get()
                ->toArray();

            //             $product=Product::leftJoin('product_media as pm','pm.product_id','=','product.id')->
            // leftJoin('product_variants as pv','pv.product_id','=','product.id')->groupBy('product.id')
            // ->get();
            // dd()
            $data = array();
            $price_array = array();
            $image_path =  env('IMAGE_PATH');
            foreach ($product as $key => $value)
            {
                $decodeA = json_decode($value['collection']);
                $decodeB = json_decode($productget['collection']);
                if (!empty($decodeA))
                {
                    foreach ($decodeA as $decoderes)
                    {
                        if (is_array($decodeB) && !empty($decodeB))
                        {

                            if (in_array($decoderes, $decodeB) && $productget['id'] != $value['id'])
                            {

                                if (!empty($value['variants'][$key]['price']))
                                {
                                    $price_array[$key] = $value['variants'][$key]['price'];

                                    if (!empty($price_array))
                                    {
                                        $min = min($price_array);
                                        $max = max($price_array);
                                    }
                                    else
                                    {
                                        $min = '';
                                        $max = '';
                                    }
                                }
                                else
                                {
                                    $price_array[$key] = $value['price'];

                                    if (!empty($price_array))
                                    {
                                        $min = min($price_array);
                                        $max = max($price_array);
                                    }
                                    else
                                    {
                                        $min = '';
                                        $max = '';
                                    }
                                }

                                $dataArr = array();
                                $dataArr['id'] = $value['id'];
                                $dataArr['title'] = $value['title'];
                                $dataArr['collection'] = json_decode($value['collection']);
                                $dataArr['image'] = (!empty($value['productmediaget'][$key]['image'])) ? $image_path . $value['productmediaget'][$key]['image'] : '';
                                $dataArr['price_range'] = $symbol['currency'] . $min . '-' . $symbol['currency'] . $max;
                                $data_result[$key] = $dataArr;
                                $data[] = $dataArr;

                                //  dump($value);
                                /*  $price_data=Product::join('product_variants','product_variants.product_id', '=', 'product.id')->select('product_variants.price as price')->where('product.id',$value->id)->whereNotNull('product_variants.price')->get();
                                $price_array=array();
                                
                                foreach($price_data as $key2=> $value)
                                {
                                $price_array[$key2]=$value->price;
                                }
                                
                                if(!empty($price_array)){
                                $min = min($price_array);
                                $max = max($price_array);
                                }
                                else{
                                $min='';
                                $max='';
                                }
                                //dump($value);
                                $data['id']=$value['id'];
                                $data['title']=$value['title'];
                                $data['description']=$value['descripation'];
                                $data['image']= (!empty($value['productmediaget'][$key]['image']))? $image_path.$value['productmediaget'][$key]['image'] : '' ;*/
                                // $data['price_range']=$symbol['currency'].$min.'-'.$symbol['currency'].$max;
                                // $data_result[$key] = $data;
                                

                                
                            }

                        }

                    }

                }

            }
            return response($data, 200);
        }
        else
        {
            return response()->json(["message" => "Product not found"], 404);
        }
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

