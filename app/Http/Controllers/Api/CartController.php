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
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{

    public function CartSave(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'stock' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }

        $cartData = ['stock' => $request->stock];
        $cartcount = 0;
        $product = Product::where('seo_utl', $request->product_id)->first(['id','compare_selling_price', 'price']);

        if(empty($product)) {
            return response()->json(["success"=> false, "message" => "Product not found"]);
        }

        $exist = Cart::where('product_id', $product->id);

        if(isset($request->user_id)) {
            $cartData['user_id'] = $request->user_id;

            $cartcount = Cart::where('user_id', $request->user_id)->count();

            $exist->where('user_id', $request->user_id);

        } else if(isset($request->session_id)) {
            $cartData['session_id'] = $request->session_id;

            $cartcount = Cart::where('session_id', $request->session_id)->count();

            $exist->where('session_id', $request->session_id);
        }

        $product_exist = clone $exist;

        $exist = $exist->where('varientid', $request->variation)->first(['stock', 'id']);

        $variant = ProductVariant::select(['product_id', 'selling_price','price'])->find($request->variation);

        // update quantity if exist already

        if(!empty($exist) && !empty($variant)) {
            $exist->stock = $request->stock;
            $exist->save();
            
            return response()->json([ 'success' => true, 'message' => 'Record Updated' ]);
        }

        if(!empty($variant)) {
            $cartData['varientid'] = $request->variation;

            if (isset($variant->selling_price)) {
                $price = $variant->selling_price;
            } else {
                $price = $variant->price;
            }
        } else {

            if(empty($exist)) {

                $product_exist = $product_exist->whereNull('varientid')->first(['stock', 'id']);
            }

            if(isset($product_exist) && !empty($product_exist)) {
                $product_exist->stock = $request->stock;
                $product_exist->save();
                
                return response()->json([ 'success' => true, 'message' => 'Record Updated' ]);
            }



            if (isset($product->compare_selling_price)) {

                $price = $product->compare_selling_price;
            } else {

                $price = $product->price;
            }
        }

        $cartData['price'] = $price;
        $cartData['product_id'] = $product->id;


        $cart = Cart::create($cartData);

        return response()->json(['success' => true, 'message' => 'Item added to Cart!', 'cartcount' => $cartcount ,'cart' => $cart,
        ]);

    }
    public function DeleteCartProduct($id)
    {
        Cart::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Item removed from Cart']);
    }

    public function UpdateCartProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cartid' => 'required',
            'stock' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }

        Cart::where('id', $request->cartid)->update(['stock' => $request->stock]);
        return response()->json(['success' => true, 'message' => 'Cart Updated!']);
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


    public function getshipping(Request $request) {

        $country = Country::where('name',$request->country)->first(['code']);
        $code = (!empty($country)) ? $country->code : 'all';
        $get_zone_ids = ShippingZoneCountry::select('zone')->where('country_code', $code)->get();

        if (empty($get_zone_ids)) {
             return response()->json([
                'cost' => 0, 'success' => true,
            ]);
        }

        $get_zone = ShippingZone::whereIn('id', $get_zone_ids)->where('start','<=',$request->amount)->where('end','>=',$request->amount)->orderBy('price', 'DESC')->first();

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

        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'stock' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }

        $product = Product::where('seo_utl', $request->product_id)->first();
        if(empty($product)) {
                return response()->json(["message" => "Product not found"], 404);
        }

        $cartcount = 0;
        $price = $request->price;
        $cartData = [
            'cutomeid' => '1',
            'product_id' => $product->id,
            'varient1' => $request->varient1,
            'attribute1' => $request->attribute1,
            'varient2' => $request->varient2,
            'attribute2' => $request->attribute2,
            'varient3' => $request->varient3,
            'attribute3' => $request->attribute3,
            'varient4' => $request->varient4,
            'height' => $request->height,
            'width' => $request->width,
        ];

        $exist = Cart::where($cartData);
        
        if(isset($request->user_id) && !empty($request->user_id)) {

            $cartData['user_id'] = $request->user_id;
            $cartcount = Cart::where('user_id', $request->user_id)->count();

            $exist->where('user_id', $request->user_id);

        } else if(isset($request->session_id) && !empty($request->session_id)) {

            $cartData['session_id'] = $request->session_id;
            $cartcount = Cart::where('session_id', $request->session_id)->count();

            $exist->where('session_id', $request->session_id);
        }
            
        $exist = $exist->first(['id', 'stock']);

        if (!empty($exist)) {
            $cart = Cart::where('id', $exist->id)->update(['stock' => ($exist->stock+$request->stock)]);
            return response()
                ->json(['success' => true, 'message' => 'Cart updated!', 'cart' => $cart
            ]);
        }

        $cartData['stock'] = $request->stock;
        $cartData['price'] = $price;

        $cart = Cart::create($cartData);

        return response()
            ->json(['message' => 'Cart Added', 'success' => true, 'cartcount' => $cartcount, 'cart' => $cart
        ]);

    }
}