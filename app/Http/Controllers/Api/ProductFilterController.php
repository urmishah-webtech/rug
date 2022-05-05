<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\VariantTag;
use App\Models\ProductMedia;
use App\Models\Collection;

class ProductFilterController extends Controller
{	

	public function getFilter($id) {
	   	$symbol = CurrencySymbol();
        if (Product::where('id', $id)->exists())
        {
            // $varianttag = VariantTag::all()->groupBy('id')->toArray();
            $product = Product::with('productmediaget')->with('favoriteget')
                ->with('productDetail')->with(['variants' => function ($q)
            {
                return $q->with('detail')->with('variantmedia');
            }
            ])
                ->where('id', $id)->get();

            $product_arra = array();
            $image_path =  env('IMAGE_PATH');

            foreach ($product as $key => $val)
            {

                $price_data = Product::join('product_variants', 'product_variants.product_id', '=', 'product.id')->select('product_variants.price as price')
                    ->where('product.id', $val->id)
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

                $product_arra['id'] = $val['id'];
                $product_arra['title'] = $val['title'];
                $product_arra['description'] = $val['descripation'];
                // $product_arra['image'] = $image_path . $val['productmediaget'][$key]['image'];
                // dd($val['variants']);
                $product_arra['price_range'] = $symbol['currency'] . $min . '-' . $symbol['currency'] . $max;

                $data_color = [];
                $data_size = [];
                $data_color_main = [];
                $insert_stock = [];
                $arrayvarit = [];
                $data_result = [];
                foreach ($val['variants'] as $key => $result)
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
                        $data_result[$key]['detail'] = $val['productDetail'];
                    }
                    else
                    {
                        $data_result[$key]['detail'] = $result['detail'];
                    }
                    $data_result[$key]['variantmedia'] = $result['variantmedia'];

                }

                $color = [];
                $colorvarient = [];

                foreach ($val->variants->unique('attribute1') as $sizekey1 => $row1)
                {
                    $variant_tag = VariantTag::where('id', $val->variants[0]['varient1'])
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
                        $colorvarient['variantnumber'] = $val->variants[0]['varient1'];
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

                $othercolor = [];
                $othercolorvarient = [];

                foreach ($val->variants->unique('attribute2') as $sizekey2 => $row2)
                {
                    $variant_tag = VariantTag::where('id', $val->variants[0]['varient2'])
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
                        $othercolorvarient['variantnumber'] = $val->variants[0]['varient2'];
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

                $size = [];
                $sizevarient = [];
                foreach ($val
                    ->variants
                    ->unique('attribute3') as $sizekey => $row3)
                {
                    $variant_tag = VariantTag::where('id', $val->variants[0]['varient3'])
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
                        $sizevarient['variantnumber'] = $val->variants[0]['varient3'];
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


                $tassels = [];
                $tasselsverient = [];
                foreach ($val->variants->unique('attribute4') as $sizekey4 => $row4)
                {
                    $variant_tag = VariantTag::where('id', $val->variants[0]['varient4'])
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
                        $tasselsverient['variantnumber'] = $val->variants[0]['varient2'];
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

                $data_result = $color_arry;
                return response(['attribute1' => $color_arry, 'attribute2' => $other_color_arry, 'attribute3' => $size_arry, 'attribute4' => $tassels_arry], 200);
            }
        }
        else
        {
            return response()->json(["message" => "Product not found"], 404);
        }
	}


	public function getGetFilter(Request $request){

		$color = $request->color;
		$product = Product::with(['variants' => function ($query ) use ($request){

			$color = $request->color;
			$size = $request->size; 
            $query->when($color, function ($q) use ($color) {
                 $q->whereIn('attribute1',$color);
	            })->when($size, function ($q) use ($size) {
	                 $q->whereIn('attribute3', $size);
	            });
         	}])->orderBy('updated_at', 'desc')->get();


        // })->when($request->anouthercolor, function ($query, $attribute2) {

        //     $query->whereHas('variants', function ($q) use ($attribute2) {

        //          $q->whereIn('attribute2', $attribute2);

        //     });

        // })->when($request->size, function ($query, $attribute3) {

        //     $query->whereHas('variants', function ($q) use ($attribute3) {

        //          $q->whereIn('attribute3', $attribute3);

        //     });

        // })->when($request->tassels, function ($query, $attribute4) {

        //     $query->whereHas('variants', function ($q) use ($attribute4) {

        //          $q->whereIn('attribute4', $attribute4);

        //     });

        // })->when($request->price, function ($query, $price_with) {

        //     $query->whereHas('variants', function ($q) use ($price_with) {

        //          $q->where('price','>', $price_with);

        //     });

        // })->orderBy('updated_at', 'desc')->get();


       return response(['data' => $product], 200);
	}
}
