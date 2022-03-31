<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use DB;

class Dashboard extends Component
{
    public $product, $User, $order, $mostsellingproduct;

    public function mount()
    {
        $this->product = Product::count();
        $this->User = User::count();
        $this->order = Orders::where('transactionid','!=','0' )->count();
        $this->mostsellingproduct = DB::table('product')->JOIN('order_items', 'product.id', '=', 'order_items.product_id')
            ->JOIN('product_media', 'product_media.product_id', '=', 'product.id')
            ->selectRaw('product.*,product_media.image')
            ->groupBy('product.id')
            ->orderBy('product.id','desc')
            ->take(10)
            ->get();
        
        /* $mostsellingproduct = DB::table('bdtdc_product_description')->JOIN('bdtdc_order_details', 'bdtdc_product_description.product_id', '=', 'bdtdc_order_details.product_id')
            ->JOIN('bdtdc_product_images', 'bdtdc_product_images.product_id', '=', 'bdtdc_product_description.product_id')
            ->JOIN('bdtdc_product_prices', 'bdtdc_product_prices.product_id', '=', 'bdtdc_product_description.product_id')
            ->selectRaw('bdtdc_product_description.*,bdtdc_product_images.image,bdtdc_product_prices.product_MOQ,bdtdc_product_prices.product_FOB')
            ->groupBy('bdtdc_product_description.product_id')
            ->orderBy('bdtdc_product_description.product_id','desc')
            ->take(10)
            ->get();

        $mostsellingcategory = DB::table('bdtdc_product_description')->JOIN('bdtdc_order_details', 'bdtdc_product_description.product_id', '=', 'bdtdc_order_details.product_id')
            ->JOIN('bdtdc_product_to_category', 'bdtdc_product_to_category.product_id', '=', 'bdtdc_product_description.product_id')
            ->JOIN('bdtdc_category_description', 'bdtdc_category_description.category_id', '=', 'bdtdc_product_to_category.category_id')
            ->selectRaw('bdtdc_product_description.*')
            ->selectRaw('count(bdtdc_order_details.product_id) as total')
            ->groupBy('bdtdc_product_description.name')
            ->orderBy('total','desc')
            ->take(13)
            ->get();*/
        // if(!Auth::check()) {
        //     return view('livewire.admin.login');
        // } 
        // if (Auth::check() && !Auth::user()->hasRole('admin')) {
        //     return redirect('/');
        // } 
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
    public function checkLogin()
    {
    	if(!Auth::check()) {
    		return view('livewire.admin.login');
    	} elseif (!Auth::user()->hasRole('admin')) {
    		return redirect('/');
    	} else {
    		$this->render();
    	}
        
    }
}
