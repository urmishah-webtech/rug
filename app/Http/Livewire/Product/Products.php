<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Product;

use App\Models\ProductMedia;

use App\Models\ProductVariant;

use Carbon\Carbon;

use Carbon\Language;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;

use Livewire\WithPagination;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Pagination\LengthAwarePaginator;


class Products extends Component
{
    use WithFileUploads, WithPagination;

    public $products, $productVariant ,$variationValue,$date_of_order, $date_added_as_customer, $abandoned_checkout, $customer_language, $location, $countries, $save_filter,$filter_product,$user_id,

        $filter_tabs, $active_tab, $sort_by, $export, $export_as, $selected_file;

    public $filter = [], $languages = [], $selectedproducts = [];

    public $perPage = 10;

    public $selectall = false;
  
    public $bulkDisabled = true;

    public function mount()
    {
        $this->getProduct();
    }


    public function render()
    {

        $this->bulkDisabled = count($this->selectedproducts) < 1;
        $filter_clone = $this->filter;

        if ($filter_clone != $this->filter) {
           $this->resetPage();
        }

        return view('livewire.product.products', ['product'=> $this->Productpaginate]);
    } 

    public function getProduct()
    {
        $this->products = Product::when($this->filter_product, function ($query, $filter_product) {
            $query->where('title', 'LIKE', '%' . $filter_product . '%');
        })->with('productmediafirst')->with('variants')->withCount('variants')->orderBy('id', 'DESC')->get();

    } 

    public function getProductpaginateProperty(){

        $this->getProduct();
        $items = $this->products->forPage($this->page, $this->perPage);
        return  new LengthAwarePaginator($items, $this->products->count(), $this->perPage, $this->page);
    }

    public function deleteselected(){

        Product::whereIn('id',$this->selectedproducts)->delete();
        ProductMedia::where('product_id',$this->selectedproducts)->delete();
        ProductVariant::where('product_id',$this->selectedproducts)->delete();
        
        $this->selectedproducts = [];
        $this->selectall = false;
    }

    public function updatedSelectAll($value){
        if($value){
            $this->selectedproducts = $this->Productpaginate->pluck('id')->toArray();
        
        }else{
            $this->selectedproducts = [];
        }
    }
 
}
