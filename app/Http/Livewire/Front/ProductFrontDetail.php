<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

use App\Models\Product;

use Illuminate\Support\Facades\Auth;

use App\Models\ProductMedia;

use App\Models\ProductVariant;

use App\Models\VariantTag;

use App\Models\Cart;

use App\Models\review;

use App\Models\favorite;

use Illuminate\Http\Request;


class ProductFrontDetail extends Component
{

    protected $listeners = ['getProduct'];

    public $Productmedia, $varianttag, $slug, $CartItem, $productrelated, $productid, $varientid, $getpriceinput, $stock, $user_id, $Productvariant, $reviewget, $stockitem, $product, $favoritevalue;

    protected $rules = [

        'productid' => '',
        'varientid' => '',
        'getpriceinput' => '',
        'stock' => '',
        'stockitem' => '',

    ];

    public function mount($slug) {

        $this->slug = $slug;
        $this->varianttag = VariantTag::all()->groupBy('id')->toArray();
        $this->getProduct();
        $this->Productmedia = ProductMedia::where('product_id',$this->product->id)->get();

    }

    public function render()
    {
  
        return view('livewire.front.product-front-detail');
    }

    public function dehydrate()
    {
      
        $this->favoritevalue  = null;
        $this->getProduct();
    }

    public function hydrate()
    {
        $this->favoritevalue  = null;
        $this->getProduct();

    }

    public function getProduct() {


        $this->product  = Product::with('variants')->where('seo_utl',$this->slug)->first();
        if(Auth::check()) {
             $this->user_id = Auth::user()->id;
            $this->favoritevalue  = favorite::where('user_id',Auth::user()->id)->where('product_id',$this->product->id)->first();
        }     
        $this->reviewget = review::where('product_id',$this->product->id)->get();
        $this->productrelated = Product::with('productmediaget')->with('favoriteget')->get();


        return Product::with('variants')->where('seo_utl',$this->slug)->first();

    }

    public function fetchPrice(Request $request)
    {

        $productvariants = ProductVariant::with(['variant_stock' => function($q) {
            $q->where('location_id', 1);
        }])->get();


        if(!empty($productvariants) && count($productvariants) > 0) {
           
        

            foreach ($productvariants as $variant) {
                if(($variant->attribute1 == $request->text1) && ($variant->attribute2 == $request->text2) && ($variant->attribute3 == $request->text3)) {
                    $productvariant = $variant;
                    break;     
                }
            }
            if(empty($productvariant)) {


            foreach ($productvariants as $variant) {
                if($variant->attribute1 == $request->text1 && $variant->attribute2 == $request->text2) {
                    $productvariant = $variant;
                    break;     
                }else if($variant->attribute1 == $request->text1 && $variant->attribute3 == $request->text3) {
                    $productvariant = $variant;
                    break;     
                }else if($variant->attribute2 == $request->text2 && $variant->attribute3 == $request->text3) {
                    $productvariant = $variant;
                    break;     
                }
            }
        }
         if(empty($productvariant)) {
            foreach ($productvariants as $variant) {
                if(($variant->attribute1 == $request->text1) || ($variant->attribute2 == $request->text2) || ($variant->attribute3 == $request->text3)) {
                    $productvariant = $variant;
                    break;     
                }
            }
        }
        if(empty($productvariant)) { $productvariant = $productvariants[0];}
                    $this->Productvariant = $productvariant;

        }

        $price = number_format($this->Productvariant->price,2,'.',',');
         return response()->json(array('variant' => $this->Productvariant, 'price' => $price));

    }


    public function addFavorite()
    {
        
        if(!Auth::check()) {
                   session()->flash('message', 'Post successfully updated.');

        } else {


            $favorite  = favorite::where('user_id',Auth::user()->id)->where('product_id',$this->product->id)->first();

            if(!$favorite){

                $favorite_arr = [
                        
                        'product_id' => $this->product->id,

                        'user_id' => Auth::user()->id,

                        'status' => '1',
                    ];

                favorite::create($favorite_arr);

            }else{

                if($favorite->status == 0){
                $favorite_arr = favorite::where('id', $favorite->id)->update(['status'  => '1']);
                }else{
                   $favorite_arr = favorite::where('id', $favorite->id)->update(['status'  => '0']); 
                }

            }
        }

    }

    public function UpdateWish($value, $product_id) {

        if(!Auth::check()) {

             session()->flash('alert', 'You need to login');

        } else {
           
            if(!$value) {

                $favorite = favorite($product_id);
               
                favorite::where('id',$favorite->id)->delete();
                session()->flash('message', 'Item removed from WishList !!');

            } else {

                 $favorite_arr = [
                        
                    'product_id' => $product_id,

                    'user_id' => Auth::user()->id,

                    'status' => 1,
                    
                    ];

                favorite::create($favorite_arr);
                session()->flash('message', 'Item added in Wishlist');

            }

            $this->getProduct();
            $this->emitTo('header', 'getCart');

        }
       
    }

   
    public function UpdateReview($id)
    {
        if(!Auth::check()) {
            session()->flash('alert', 'You need to login');
        } else {

        return view('livewire.front.product-reviews');
    }
    }


    public function addCart($variantID)
    {
        $variant = ProductVariant::select(['product_id','price'])->find($variantID);

        if(!empty($variant)) {


            if(isset($variant->selling_price)) {
                $price = $variant->selling_price;
            } else {
                $price = $variant->price;
            }

            if(Auth::check()) {
                $user_id = Auth::user()->id;

                $exist = Cart::where('product_id', $variant->product_id)->where('varientid', $variantID)->where('user_id', $user_id)->first(['stock', 'id']);

                if(empty($exist)) {


                    Cart::create([
                        
                        'product_id' => $variant->product_id,

                        'user_id' => $user_id,

                        'varientid' => $variantID,

                        'price' => $price,

                        'stock' => 1,

                        'locationid' => 1

                    ]);
                      $this->emitTo('header','getCart');

                } else {
                    $exist->stock++;
                    $exist->save();
                    $this->emitTo('header','getCart');
                }

            } else {
                $cart = session()->get('cart');
                $product_detail = Product::find($this->product->id)->toArray();
                $media_product = ProductMedia::where('product_id', $this->product->id)->get()->toArray();
                // if cart is empty then this the first product
                if(empty($cart)) {

                    $cart = [
                            $variantID => [

                                'type' => 'variant',

                                'product_id' => $this->product->id,

                                'varientid' => $variantID,

                                'price' => $price,

                                'stock' => 1,

                                'locationid' => 1,

                                'product_detail' => $product_detail,

                                'media_product' => $media_product
                            ]
                    ];

                    session()->put('cart', $cart);
                     $this->emitTo('header','getCart');

                } else if(isset($cart[$variantID]) && $cart[$variantID]['type'] == 'variant') {

                    $cart[$variantID]['stock']++;

                    session()->put('cart', $cart);
                     $this->emitTo('header','getCart');



                } else {
                     $cart[$variantID] = [

                                        'type' => 'variant',

                                        'product_id' => $this->product->id,

                                        'varientid' => $variantID,

                                        'price' => $price,

                                        'stock' => 1,

                                        'locationid' => 1,

                                        'product_detail' => $product_detail,

                                        'media_product' => $media_product
                                    ];

                                    session()->put('cart', $cart);
                                   $this->emitTo('header','getCart');
                }

               

            }  

        } else {

                if($this->product->compare_selling_price){
                   $price = $this->product['compare_selling_price'];
                }else{
                   $price = $this->product['price'];
                }

                if(Auth::check()) {
                    $exist = Cart::where('product_id', $this->product->id)->where('user_id', Auth::user()->id)->first(['id','stock']);

                    if(empty($exist)) {

                        Cart::create([
                            
                            'product_id' => $this->product->id,

                            'user_id' => Auth::user()->id,

                            'price' => $price,

                            'stock' => 1,

                            'locationid' => 1

                        ]);
                         $this->emitTo('header','getCart');

                    } else {
                        $exist->stock++;
                        $exist->save();

                         $this->emitTo('header','getCart');
                    }   
                } else {

                    $cart = session()->get('cart');
                    $product_detail = Product::find($this->product->id)->toArray();
                    $media_product = ProductMedia::where('product_id', $this->product->id)->get()->toArray();

                    if(!$cart) {

                        $cart = [
                                $this->product->id => [

                                    'type' => 'product',

                                    'product_id' => $this->product->id,

                                    'price' => $price,

                                    'stock' => 1,

                                    'locationid' => 1, 

                                    'product_detail' => $product_detail,

                                    'media_product' => $media_product
                                ]
                        ];

                        session()->put('cart', $cart);
                        $this->emitTo('header','getCart');

                    } else if(isset($cart[$this->product->id])) {

                        $cart[$this->product->id]['stock']++;

                        session()->put('cart', $cart);
                        $this->emitTo('header','getCart');


                    } else {
                        // if item not exist in cart then add to cart with quantity = 1
                        $cart[$this->product->id] = [
                            'type' => 'product',

                            'product_id' => $this->product->id,

                            'price' => $price,

                            'stock' => 1,

                            'locationid' => 1,

                            'product_detail' => $product_detail,

                            'media_product' => $media_product
                        ];



                        session()->put('cart', $cart);
                       $this->emitTo('header','getCart');
                    }

                    

                }

                
            
            }  
        
        }





}
