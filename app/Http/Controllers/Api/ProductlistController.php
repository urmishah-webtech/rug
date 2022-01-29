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
           
           $insert_stock =[];
          foreach($val['variants'] as $key => $result){
            $insert_stock['variant_id']=$result['id'];
            $insert_stock['variant1']=$result['varient1'];
           $insert_stock['attribute1']=$result['attribute1'];
           $insert_stock['varient2']=$result['varient2'];
           $insert_stock['attribute2']=$result['attribute2'];
           $insert_stock['varient3']=$result['varient3'];
           $insert_stock['attribute3']=$result['attribute3'];
           $insert_stock['image']=$image_path.$result['photo'];
           $insert_stock['price']=$result['price'];
           $insert_stock['selling_price']=$result['selling_price'];
           $insert_stock['sku']=$result['sku'];
           $insert_stock['outofstock']=$result['outofstock'];
           $insert_stock['barcode']=$result['barcode'];
          $data_result[$key] = $insert_stock;          
          }          
         // $data_result = json_encode($data_result);
         return response([$product_arra, $data_result], 200);
        }
         
      }
      else
      {
        return response()->json([
          "message" => "Product not found"
        ], 404);
      }
    }
}
