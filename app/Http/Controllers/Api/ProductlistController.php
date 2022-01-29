<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductMedia;
use DB;
class ProductlistController extends Controller
{
    public function getAllProducts() {
      $product = Product::join('product_media as pm', 'pm.product_id', '=', 'product.id')->
      select('pm.image as image')
      ->addSelect('product.id as id','pm.product_id','product.title as title','product.descripation as descripation')
      ->get();
     
      $data=array();
      $i=0;
      $image_path='https://projects.webtech-evolution.com/rug/public/storage/';

      foreach($product as $val)
      {
        $price_data=Product::join('product_variants','product_variants.product_id', '=', 'product.id')->select('product_variants.price as price')->
        where('product.id',$val->id)->whereNotNull('product_variants.price')->get();

      
        $price_array=array();
        foreach($price_data as $key=> $value)
        {
          $price_array[$key]=$value->price;
        }
       
        if(!empty($price_array)){
          $min = min($price_array);
          $max = max($price_array);
        }
        else{
          $min='';
          $max='';
        }
        $data[$i]['id']=$val->id;
        $data[$i]['title']=$val->title;
        $data[$i]['description']=$val->descripation;
        $data[$i]['image']=$image_path.$val->image;
        $data[$i]['price_range']='$'.$min.'-'.'$'.$max;
        $i++;

      }
      return response($data, 200);
    }

    public function getIndividualProduct($id) {
      if (Product::where('id', $id)->exists())
      {
        $product1 = Product::join('product_variants', 'product_variants.product_id', 'product.id')
        ->join('product_media', 'product_media.product_id', 'product.id')->where('product_variants.product_id',$id)->where('product_media.product_id',$id)->get();        
        return response($product1, 200);
      }
      else
      {
        return response()->json([
          "message" => "Product not found"
        ], 404);
      }
    }
}
