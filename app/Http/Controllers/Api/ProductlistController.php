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
      $product = Product::join('product_media', 'product_media.product_id', '=', 'product.id')->get();
      return response($product, 200);
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
