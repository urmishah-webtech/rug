<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductMedia;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function CartSave(Request $request){

    	$variantID = $request->variation;
        $variant = ProductVariant::select(['product_id','price'])->find($variantID);

        if(!empty($variant)) {


            if(isset($variant->selling_price)) {
                $price = $variant->selling_price;
            } else {
                $price = $variant->price;
            }

            if(!empty($request->user_id)) {

                $user_id = $request->user_id;

                $exist = Cart::where('product_id', $variant->product_id)->where('varientid', $variantID)->where('user_id', $user_id)->first(['stock', 'id']);

                if(empty($exist)) {


                   $cart =  Cart::create([
                        
                        'product_id' => $variant->product_id,

                        'user_id' => $user_id,

                        'varientid' => $variantID,

                        'price' => $price,

                        'stock' => $request->stock,

                        'locationid' => '1'

                    ]);

                    return response()->json([
                        'message' => 'Added Record',
                        'success' => true,
                        'cart' => $cart,
                        
                    ]);

                } else {

                    $cart = Cart::where('id', $exist->id)->update(['stock'  => $request->stock]);

                     return response()->json([
                        'message' => 'Updated Record',
                        'success' => true,
                        'cart' => $exist,
                        
                    ]);
                  //  $this->emitTo('header','getCart');
                }

            } else {

                $cart = Cart::where('product_id', $variant->product_id)->where('varientid', $variantID)->where('session_id','!=',null)->first(['stock', 'id','varientid']);

                $product_detail = Product::find($request->product_id)->toArray();
                $media_product = ProductMedia::where('product_id', $request->product_id)->get()->toArray();
                // if cart is empty then this the first product
                if(empty($cart)) {
                  
                    $cart = Cart::create([

                               // 'type' => 'variant',

                                'product_id' => $request->product_id,

                                'varientid' => $variantID,

                                'price' => $price,

                                'stock' => $request->stock,

                                'session_id' => $request->session_id,
                                
                                'locationid' => '1',

                               // 'product_detail' => $product_detail,

                                //'media_product' => $media_product
                            ]);

                    return response()->json([
                        'message' => 'Added Record',
                        'success' => true,
                        'cart' => $cart,
                        
                    ]);

                   // session()->put('cart', $cart);

                } else if(isset($cart['varientid'])) {

                  //  $cart[$variantID] = ['stock']++;
                    
                    $cart['varientid'] = Cart::where('id', $cart->id)->update(['stock'  => $request->stock]);

                    return response()->json([
                        'message' => 'Updated Record',
                        'success' => true,
                        'cart' => $cart,
                        
                    ]);
                  //  session()->put('cart', $cart);



                } else {
                     $cart['varientid'] =  Cart::create([

                        'type' => 'variant',

                        'product_id' => $request->product_id,

                        'varientid' => $variantID,

                        'price' => $price,

                        'stock' => $request->stock,

                        'session_id' => $request->session_id,

                        'product_detail' => $product_detail,

                        'media_product' => $media_product
                    ]);

                      return response()->json([
                        'message' => 'insert Record',
                        'success' => true,
                        'cart' => $cart,
                        
                    ]);
	               // session()->put('cart', $cart);
	             //  $this->emitTo('header','getCart');
                }

               

            }  

        } else {

        		$product  = Product::with('variants')->where('id',$request->product_id)->first();

                if($product->compare_selling_price){
                   $price = $product['compare_selling_price'];
                }else{
                   $price = $product['price'];
                }

                if(!empty($request->user_id)) {

                    $exist = Cart::where('product_id', $product->id)->where('user_id', $request->user_id)->where('varientid','=', null)->first(['id','stock']);
                  
                    if(empty($exist)) {

                        $cart = Cart::create([
                            
                            'product_id' => $product->id,

                            'user_id' => $request->user_id,

                            'price' => $price,

                            'stock' => $request->stock,

                            'locationid' => '1'

                        ]);

                        return response()->json([
                            'message' => 'insert Record',
                            'success' => true,
                            'cart' => $cart,
                            
                        ]);
                        // $this->emitTo('header','getCart');

                    } else {


                        $cart = Cart::where('id', $exist->id)->update(['stock'  => $request->stock]);
                        /*$exist->stock++;
                        $exist->save();*/

                        return response()->json([
                            'message' => 'Updated Record',
                            'success' => true,
                            'cart' => $cart,
                            
                        ]);

                         //$this->emitTo('header','getCart');
                    }   
                } else {

                    $cart = Cart::where('product_id', $product->id)->where('session_id','!=',null)->where('varientid','=', null)->first(['id','stock','product_id']);

                   
                  //  $cart = session()->get('cart');
                    $product_detail = Product::find($product->id)->toArray();
                    $media_product = ProductMedia::where('product_id', $product->id)->get()->toArray();

                    if(!$cart) {



                        $cart = Cart::create([

                         //   'type' => 'product',

                            'product_id' => $product->id,

                            'price' => $price,

                            'stock' => $request->stock,
                            
                            'session_id' => $request->session_id,

                            'locationid' => '1', 

                        //    'product_detail' => $product_detail,

                         //   'media_product' => $media_product
                        ]);
                        return response()->json([
                            'message' => 'Added Record',
                            'success' => true,
                            'cart' => $cart,
                            
                        ]);

                    } else if(isset($cart['product_id'])) {

                        $cart['product_id'] = Cart::where('id', $cart->id)->update(['stock'  => $request->stock]);
                        return response()->json([
                            'message' => 'Updated Record',
                            'success' => true,
                            'cart' => $cart,
                            
                        ]);
                       // $cart[$product->id]['stock']++;

                      //  session()->put('cart', $cart);
                      //  $this->emitTo('header','getCart');


                    } else {
                        // if item not exist in cart then add to cart with quantity = 1
                        $cart['product_id'] = Cart::create([

                            'type' => 'product',

                            'product_id' => $product->id,

                            'price' => $price,

                            'stock' => $request->stock,
                            
                            'session_id' => $request->session_id,

                            'locationid' => '1', 

                            'product_detail' => $product_detail,

                            'media_product' => $media_product
                        ]);

                    return response()->json([
                            'message' => 'Updated Record',
                            'success' => true,
                            'cart' => $cart,
                            
                        ]);


                      //  session()->put('cart', $cart);
                   //    $this->emitTo('header','getCart');
                    }
                } 
            }  
        }

    public function DeleteCartProduct($id)
    {

        if (!empty($id)) {
            Cart::find($id)->delete();
             return response()->json([
                'message' => 'Deleted Record',
                'success' => true, 
            ]);
        } else {

            return response()->json([
                'message' => 'Not Deleted Record',
                'success' => false, 
            ]);
          /*  $cart = session()->get('cart');

            if(isset($cart[$variantid]) && $cart[$variantid]['type'] == 'variant') {
                unset($cart[$variantid]);
            }

            if(isset($cart[$id]) && $cart[$id]['type'] == 'product') {
                unset($cart[$id]);
            }
             session()->put('cart', $cart);*/
        }
        //$this->getCart();
        //$this->emit('getCart');

    }

    public function getCart(Request $result)
    {   

        $CartItem =  Cart::with(['media_product', 'product_detail','product_variant'])->where('user_id',$result->user_id)->get();
        $CartsessionItem =  Cart::with(['media_product', 'product_detail','product_variant'])->where('session_id',$result->session_id)->get();

        if (count($CartItem) != 0) {
            $finalamount = 0;
            foreach ($CartItem as $key => $result) {
                $Totalamount = ($result->stock * $result->price);

                $finalamount += $Totalamount;
            }

             $cartCount = $CartItem->sum('stock');

          return response()->json([
                'message' => 'success',
                'cartitem' => $CartItem, 
                'Totalstock' => $cartCount, 
                'Totalamount' => $finalamount, 
                'success' => true, 
            ]);

        } 
        if(count($CartsessionItem) != 0) {
            $stock = 0;
            $finalamount = 0;
            foreach ($CartsessionItem as $item) {
                $stock += $item['stock'];
                $Totalamount = ($result->stock * $result->price);

                $finalamount += $Totalamount;
            }



            $cartCount = $stock;
            return response()->json([
                'message' => 'success',
                'cartitem' => $CartsessionItem, 
                'Totalstock' => $cartCount, 
                'Totalamount' => $finalamount,
                'success' => true, 
            ]);
        }

       // $this->dispatchBrowserEvent('onCartChanged');
    }
}
