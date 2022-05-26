<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductMedia;
use App\Models\Product;
use App\Models\Cart;
use App\Models\VariantMedia;
use App\Models\Country;
use App\Models\ShippingZone;
use App\Models\ShippingZoneCountry;

class CartController extends Controller
{
    public function CartSave(Request $request)
    {
        $variantID = $request->variation;
       
        $variant = ProductVariant::select(['product_id', 'price'])->find($variantID);
        if (!empty($variant))
        {
            if (isset($variant->selling_price))
            {
                $price = $variant->selling_price;
            }
            else
            {
                $price = $variant->price;
            }
            if (!empty($request->user_id))
            {
              
                $user_id = $request->user_id;
                $exist = Cart::where('product_id', $variant->product_id)
                    ->where('varientid', $variantID)->where('user_id', $user_id)->first(['stock', 'id']);
                if (empty($exist))
                {
                    $cart = Cart::create([
                    'product_id' => $variant->product_id,
                    'user_id' => $user_id,
                    'varientid' => $variantID,
                    'price' => $price,
                    'stock' => $request->stock,
                    'locationid' => '1'
                    ]);
                    $cartcount = Cart::where('user_id', $user_id)->count();
                    return response()
                        ->json(['message' => 'Added Record', 'success' => true, 'cartcount' => $cartcount ,'cart' => $cart,
                    ]);
                }
                else
                {
                    $cart = Cart::where('id', $exist->id)
                        ->update(['stock' => $request->stock]);
                    return response()
                        ->json(['message' => 'Updated Record', 'success' => true, 'cart' => $exist,
                    ]);
                    //  $this->emitTo('header','getCart');
                }
            }
            else
            {
                $product = Product::where('seo_utl', $request->product_id)->first();

                if(empty($product)) {
                    return response()->json(["message" => "Product not found"], 404);
                }

                $cart = Cart::where('product_id', $variant->product_id)->where('session_id',$request->session_id)
                    ->where('varientid', $variantID)->where('session_id', '!=', null)
                    ->first(['stock', 'id', 'varientid']);
                $product_detail = $product->toArray();
                $media_product = ProductMedia::where('product_id', $product->id)
                    ->get()
                    ->toArray();
                // if cart is empty then this the first product
                if (empty($cart))
                {
                    $cart = Cart::create([
                    // 'type' => 'variant',
                    'product_id' => $product->id,
                    'varientid' => $variantID,
                    'price' => $price,
                    'stock' => $request->stock,
                    'session_id' => $request->session_id,
                    'locationid' => '1',
                    // 'product_detail' => $product_detail,
                    //'media_product' => $media_product
                    ]);
                    $cartcount = Cart::where('session_id', $request->session_id)->count();
                    return response()
                        ->json(['message' => 'Added Record', 'success' => true , 'cartcount' => $cartcount, 'cart' => $cart,
                    ]);
                    // session()->put('cart', $cart);
                }
                else if (isset($cart['varientid']))
                {
                    //  $cart[$variantID] = ['stock']++;
                    $cart['varientid'] = Cart::where('id', $cart->id)
                        ->update(['stock' => $request->stock]);
                    return response()
                        ->json(['message' => 'Updated Record', 'success' => true, 'cart' => $cart,
                    ]);
                    //  session()->put('cart', $cart);
                }
                else
                {
                    $cart['varientid'] = Cart::create([
                    'type' => 'variant',
                    'product_id' => $product->id,
                    'varientid' => $variantID,
                    'price' => $price,
                    'stock' => $request->stock,
                    'session_id' => $request->session_id,
                    'product_detail' => $product_detail,
                    'media_product' => $media_product]);
                     $cartcount = Cart::where('session_id', $request->session_id)->count();
                    return response()->json(['message' => 'insert Record','success' => true,'cartcount' => $cartcount, 'cart' => $cart,
                    ]);
                    // session()->put('cart', $cart);
                    //  $this->emitTo('header','getCart');
                }
            }
        }
        else
        {
            $product = Product::with('variants')->where('seo_utl', $request->product_id)->first();

            if(empty($product)) {
                return response()->json(["message" => "Product not found"], 404);
            }

            if ($product->compare_selling_price)
            {
                $price = $product['compare_selling_price'];
            }
            else
            {
                $price = $product['price'];
            }

            if (!empty($request->user_id))
            {
                $exist = Cart::where('product_id', $product->id)
                    ->where('user_id', $request->user_id)
                    ->where('varientid', '=', null)
                    ->first(['id', 'stock']);
                if (empty($exist))
                {
                    $cart = Cart::create([
                        'product_id' => $product->id,
                        'user_id' => $request->user_id,
                        'price' => $price,
                        'stock' => $request->stock,
                        'locationid' => '1'
                    ]);
                    $cartcount = Cart::where('user_id', $request->user_id)->count();
                    return response()
                        ->json(['message' => 'insert Record', 'success' => true, 'cartcount' => $cartcount, 'cart' => $cart,
                    ]);
                    // $this->emitTo('header','getCart');
                }
                else
                {
                    $cart = Cart::where('id', $exist->id)
                        ->update(['stock' => $request->stock]);
                    /*$exist->stock++;
                     $exist->save();*/
                    return response()
                        ->json(['message' => 'Updated Record', 'success' => true, 'cart' => $cart,
                    ]);
                    //$this->emitTo('header','getCart');
                }
            }
            else
            {
                $cart = Cart::where('product_id', $product->id)
                    ->where('session_id', $request->session_id)
                    ->where('varientid', '=', null)
                    ->first(['id', 'stock', 'product_id']);
                //  $cart = session()->get('cart');
                $product_detail = Product::find($product->id)
                    ->toArray();
                $media_product = ProductMedia::where('product_id', $product->id)
                    ->get()
                    ->toArray();
                if (!$cart)
                {
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
                    $cartcount = Cart::where('session_id', $request->session_id)->count();
                    return response()
                        ->json(['message' => 'Added Record', 'success' => true, 'cartcount' => $cartcount,'cart' => $cart,
                    ]);
                }
                else if (isset($cart['product_id']))
                {
                    $cart['product_id'] = Cart::where('id', $cart->id)
                        ->update(['stock' => $request->stock]);
                    return response()
                        ->json(['message' => 'Updated Record', 'success' => true, 'cart' => $cart,
                    ]);
                    // $cart[$product->id]['stock']++;
                    //  session()->put('cart', $cart);
                    //  $this->emitTo('header','getCart');
                }
                else
                {
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
                    $cartcount = Cart::where('session_id', $request->session_id)->count();
                    return response()->json(['message' => 'Updated Record', 'success' => true,'cartcount' => $cartcount ,'cart' => $cart,
                    ]);
                    //  session()->put('cart', $cart);
                    //    $this->emitTo('header','getCart');
                }
            }
        }
    }
    public function DeleteCartProduct($id)
    {
        Cart::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Item removed from Cart']);
    }

    public function UpdateCartProduct(Request $request)
    {
        if (!empty($request->cartid))
        {   
            Cart::where('id', $request->cartid)->update(['stock' => $request->stock]);
            return response()
                ->json(['message' => 'Updated Record', 'success' => true, ]);
        }
        else
        {
            return response()
                ->json(['message' => 'Not Updated Record', 'success' => false, ]);
        }
    }

    public function getCart($id)
    {

        $CartItem = Cart::with(['variantmediafirst','productmediafirst','media_product', 'product_detail', 'product_variant']);

        if (preg_match("/^\d+$/", $id)) {
          $CartItem->where('user_id', $id);
          
        } else {
           $CartItem->where('session_id', $id);
        }

        $CartItem = $CartItem->get();


        if($CartItem->isEmpty()) {
            return response()->json(['success' => false, "message" => "Cart Is Empty!"]);
        }

        $image_path= env('IMAGE_PATH');

        if ($CartItem)
        {
            $finalamount = 0;
            foreach ($CartItem as $key => $result)
            { 

                $CartItem[$key]['image'] = $image_path.'/image/defult-image.png';

                if(!empty($result->variantmediafirst)) {

                    $CartItem[$key]['image'] = $image_path.$result->variantmediafirst->image;

                } else if(!empty($result->productmediafirst)) {

                    $CartItem[$key]['image'] = $image_path.$result->productmediafirst->image;
                }

                $Totalamount = ($result->stock * $result->price);
                $finalamount += $Totalamount;
                unset($CartItem[$key]->productmediafirst);
                unset($CartItem[$key]->variantmediafirst);
                
            }
            $cartStock = $CartItem->sum('stock');
            return response()
                ->json(['success' => true, 'message' => 'Cart', 'cartcount' => count($CartItem), 'cartitem' => $CartItem, 'Totalstock' => $cartStock, 'Totalamount' => $finalamount ]);
        }
        
    }




    public function getshipping(Request $request){
       
        $country = Country::where('name',$request->country)->get()->first();
        $code = (!empty($country)) ? $country->code : 'all';
        $get_zone_ids = ShippingZoneCountry::select('zone')->where('country_code', $code)->get();

        if (empty($get_zone_ids)) {
             return response()->json([
                'cost' => 0, 'success' => true,
            ]);
        }

        $get_zone = ShippingZone::whereIn('id', $get_zone_ids)->where('start','<=',$request->amount)->where('end','>=',$request->amount)->orderBy('price', 'DESC')->get()->first();

        if (!empty($get_zone)) {
            return response()->json([
                'cost' => $get_zone->price, 'success' => true,
            ]);
        }else{
            return response()->json([
                'cost' => 0, 'success' => true,
            ]);
        }
        
    }

    public function CustomeCartSave(Request $request){
        $product = Product::where('seo_utl', $request->product_id)->first();
        if(empty($product)) {
                return response()->json(["message" => "Product not found"], 404);
        }
        $price = $request->price;

            
            if (!empty($request->user_id))
            {
                $exist = Cart::where('product_id', $product->id)
                    ->where('user_id', $request->user_id)
                    ->where('cutomeid', '=', 1)->where('varient1', $request->varient1)->where('attribute1', $request->attribute1)->where('varient2',$request->varient2)->where('attribute2', $request->attribute2)->where('varient3',$request->varient3)->where('attribute3', $request->attribute3)->where('varient4', $request->varient4)->where('height', $request->height)->where('width', $request->width)
                    ->first(['id', 'stock']);
                if (empty($exist))
                {
                    $cart = Cart::create([
                        'product_id' => $product->id,
                        'cutomeid' => '1',
                        'user_id' => $request->user_id,
                        'price' => $price,
                        'stock' => '1',
                        'varient1' => $request->varient1,
                        'attribute1' => $request->attribute1,
                        'varient2' => $request->varient2,
                        'attribute2' => $request->attribute2,
                        'varient3' => $request->varient3,
                        'attribute3' => $request->attribute3,
                        'varient4' => $request->varient4,
                        'height' => $request->height,
                        'width' => $request->width
                    ]);
                    $cartcount = Cart::where('user_id', $request->user_id)->count();
                    return response()
                        ->json(['message' => 'insert Record', 'success' => true, 'cartcount' => $cartcount, 'cart' => $cart,
                    ]);
                    // $this->emitTo('header','getCart');
                }
                else
                {
                    $cart = Cart::where('id', $exist->id)
                        ->update(['stock' => ($exist->stock+$request->stock)]);
                    /*$exist->stock++;
                     $exist->save();*/
                    return response()
                        ->json(['message' => 'Updated Record', 'success' => true, 'cart' => $cart,
                    ]);
                    //$this->emitTo('header','getCart');
                }
            }
            else
            {
                $cart = Cart::where('product_id', $product->id)
                    ->where('session_id', $request->session_id)
                    ->where('cutomeid', '=', 1)->where('varient1', $request->varient1)->where('attribute1', $request->attribute1)->where('varient2',$request->varient2)->where('attribute2', $request->attribute2)->where('varient3',$request->varient3)->where('attribute3', $request->attribute3)->where('varient4', $request->varient4)->where('height', $request->height)->where('width', $request->width)->first(['id', 'stock','product_id']);
                  
                //  $cart = session()->get('cart');
                $product_detail = Product::find($product->id)
                    ->toArray();
                $media_product = ProductMedia::where('product_id', $product->id)
                    ->get()
                    ->toArray();

                if (!$cart)
                {
                    $cart = Cart::create([
                        //   'type' => 'product',
                        'product_id' => $product->id,
                        'cutomeid' => '1',
                        'session_id' => $request->session_id,
                        'price' => $price,
                        'stock' => '1',
                        'varient1' => $request->varient1,
                        'attribute1' => $request->attribute1,
                        'varient2' => $request->varient2,
                        'attribute2' => $request->attribute2,
                        'varient3' => $request->varient3,
                        'attribute3' => $request->attribute3,
                        'varient4' => $request->varient4,
                        'height' => $request->height,
                        'width' => $request->width,
                       // 'product_detail' => $product_detail,
                       // 'media_product' => $media_product
                    ]);
                    $cartcount = Cart::where('session_id', $request->session_id)->count();
                    return response()
                        ->json(['message' => 'Added Record', 'success' => true, 'cartcount' => $cartcount,'cart' => $cart, ]);
                }
              //  dd($cart['product_id'])
                else if ($cart['product_id'])
                {

                    $cart['product_id'] = Cart::where('id', $cart->id)
                        ->update(['stock' => ($cart->stock+$request->stock)]);
                    return response()
                        ->json(['message' => 'Updated Record', 'success' => true, 'cart' => $cart,
                    ]);
                    // $cart[$product->id]['stock']++;
                    //  session()->put('cart', $cart);
                    //  $this->emitTo('header','getCart');
                }
                else
                {
                    // dd($cart);
                    // if item not exist in cart then add to cart with quantity = 1
                    $cart['product_id'] = Cart::create([
                       // 'type' => 'product',
                        'product_id' => $product->id,
                        'cutomeid' => '1',
                        'session_id' => $request->session_id,
                        'price' => $price,
                        'stock' => '1',
                        'varient1' => $request->varient1,
                        'attribute1' => $request->attribute1,
                        'varient2' => $request->varient2,
                        'attribute2' => $request->attribute2,
                        'varient3' => $request->varient3,
                        'attribute3' => $request->attribute3,
                        'varient4' => $request->varient4,
                        'height' => $request->height,
                        'width' => $request->width,
                    ]);
                    $cartcount = Cart::where('session_id', $request->session_id)->count();
                    return response()->json(['message' => 'Updated Record', 'success' => true,'cartcount' => $cartcount ,'cart' => $cart,
                    ]);
                    //  session()->put('cart', $cart);
                    //    $this->emitTo('header','getCart');
                }
            }

    }
}