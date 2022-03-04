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
        $product = DB::table('product')->get();

        $data = array();
        $i = 0;
        $image_path = 'https://projects.webtech-evolution.com/rug/public/storage/';

        foreach ($product as $val)
        {
            $price_data = Product::join('product_variants', 'product_variants.product_id', '=', 'product.id')->select('product_variants.price as price')
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
            }
            else
            {
                $min = '';
                $max = '';
            }
            $data[$i]['id'] = $val->id;
            $data[$i]['title'] = $val->title;
            $data[$i]['description'] = $val->descripation;
            $data[$i]['image'] = $image_path . $product_image->image;
            $data[$i]['price_range'] = '$' . $min . '-' . '$' . $max;
            $i++;

        }
        return response($data, 200);
    }

    public function getIndividualProduct($id)
    {
        if (Product::where('id', $id)->exists())
        {
            $product = Product::with('productmediaget')->with('favoriteget')
                ->with('variants')
                ->where('id', $id)->get();

            $product_arra = array();
            $image_path = 'https://projects.webtech-evolution.com/rug/public/storage/';

            foreach ($product as $key => $val)
            {
                $price_data = Product::join('product_variants', 'product_variants.product_id', '=', 'product.id')->select('product_variants.price as price')
                    ->where('product.id', $val->id)
                    ->whereNotNull('product_variants.price')
                    ->get();
                $price_array = array();

                foreach ($price_data as $keynm => $value)
                {
                    $price_array[$keynm] = $value->price;
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
                //dump($key);
                $product_arra['id'] = $val['id'];
                $product_arra['title'] = $val['title'];
                $product_arra['collection'] = json_decode($val['collection']);
                $product_arra['description'] = $val['descripation'];
                $product_arra['image'] = $image_path . $val['productmediaget'][$key]['image'];
                $product_arra['price_range'] = '$' . $min . '-' . '$' . $max;

            }
            // $data_result = json_encode($data_result);
            return response($product_arra, 200);
        }
        else
        {
            return response()->json(["message" => "Product not found"], 404);
        }
    }

    public function getIndividualProduct_variant($id)
    {
        if (Product::where('id', $id)->exists())
        {
            $varianttag = VariantTag::all()->groupBy('id')->toArray();
            $product = Product::with('productmediaget')->with('favoriteget')
                ->with('productDetail')->with(['variants' => function ($q)
            {
                return $q->with('detail');
            }
            ])
            ->where('id', $id)->get();

            $product_arra = array();
            $image_path = 'https://projects.webtech-evolution.com/rug/public/storage/';

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
                $product_arra['price_range'] = '$' . $min . '-' . '$' . $max;

                $data_color = [];
                $data_size = [];
                $data_color_main = [];
                $insert_stock = [];
                foreach ($val['variants'] as $key => $result)
                {
                    $insert_stock['variant_id'] = $result['id'];
                    $insert_stock['image'] = $image_path . $result['photo'];
                    $insert_stock['price'] = $result['price'];
                    $insert_stock['selling_price'] = $result['selling_price'];
                    $insert_stock['sku'] = $result['sku'];
                    $insert_stock['outofstock'] = $result['outofstock'];
                    $insert_stock['barcode'] = $result['barcode'];
                    $insert_stock['varient1'] = $result['varient1'];
                    $insert_stock['attribute1'] = $result['attribute1'];
                    $insert_stock['varient2'] = $result['varient2'];
                    $insert_stock['attribute2'] = $result['attribute2'];
                    $insert_stock['varient3'] = $result['varient3'];
                    $insert_stock['attribute3'] = $result['attribute3'];

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

                }
                // $data_result = json_encode($data_result);
                 return response(['data' => $data_result,'colormain' => $color_main_result, 'color' => $color_result, 'size' => $size_result,'varianttag' => $varianttag], 200);
            }
        }
        else
        {
            return response()->json(["message" => "Product not found"], 404);
        }
    }

    public function get_related_Products($id)
    {
        if (Product::where('id', $id)->exists())
        {
            $productget = Product::where('id', $id)->first();
            $product = Product::with('productmediaget')->with('variants')
                ->get();

            $data = array();
            $price_array = array();
            $image_path = 'https://projects.webtech-evolution.com/rug/public/storage/';
            foreach ($product as $key => $value)
            {

                $decodeA = json_decode($value->collection);
                $decodeB = json_decode($productget->collection);
                if (!empty($decodeA))
                {
                    foreach ($decodeA as $decoderes)
                    {
                        if (is_array($decodeB) && !empty($decodeB))
                        {

                            if (in_array($decoderes, $decodeB))
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
                                    $price_array[$key] = $value->price;

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
                                $dataArr['price_range'] = '$' . $min . '-' . '$' . $max;
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
                                // $data['price_range']='$'.$min.'-'.'$'.$max;
                                // $data_result[$key] = $data;
                                

                                
                            }

                        }

                    }

                }

            }
            dd($data);
            return response($data, 200);
        }
        else
        {
            return response()->json(["message" => "Product not found"], 404);
        }
    }
}

