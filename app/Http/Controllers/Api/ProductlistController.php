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
      $product = DB::table('product')->get();
     
      $data=array();
      $i=0;
      $image_path='https://projects.webtech-evolution.com/rug/public/storage/';

      foreach($product as $val)
      {
        $price_data=Product::join('product_variants','product_variants.product_id', '=', 'product.id')->select('product_variants.price as price')->
        where('product.id',$val->id)->whereNotNull('product_variants.price')->get();

        $product_image = DB::table('product')->leftJoin('product_media as pm', 'product.id','=','pm.product_id')
        ->select('product.id as id','pm.image as image','product.title as title','product.descripation as descripation')
        ->where('product.id',$val->id)->first();

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
        $data[$i]['image']=$image_path. $product_image->image;
        $data[$i]['price_range']='$'.$min.'-'.'$'.$max;
        $i++;

      }
      return response($data, 200);
    }

    public function getIndividualProduct($id) {
      if (Product::where('id', $id)->exists())
      {
        $product = Product::with('productmediaget')->with('favoriteget')->with('variants')->where('id',$id)->get(); 
       
        $product_arra= array();
        $image_path='https://projects.webtech-evolution.com/rug/public/storage/';

        foreach($product as $key => $val)
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

           $product_arra['id']=$val['id'];
           $product_arra['title']=$val['title'];
           $product_arra['description']=$val['descripation'];
           $product_arra['image']=$image_path.$val['productmediaget'][$key]['image'];
           $product_arra['price_range']='$'.$min.'-'.'$'.$max;
           
                    
          }          
         // $data_result = json_encode($data_result);
         return response($product_arra, 200);
        }
         
       
      else
      {
        return response()->json([
          "message" => "Product not found"
        ], 404);
      }
    }
}
