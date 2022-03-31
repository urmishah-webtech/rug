<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Product;

use App\Models\ProductMedia;

use App\Models\VariantStock;

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

    public $getproduct,$VariantStock, $productVariant ,$variationValue,$Productmediass,$date_of_order, $date_added_as_customer, $abandoned_checkout, $customer_language, $location, $countries, $save_filter,$filter_product,$user_id,

        $filter_tabs, $active_tab, $sort_by, $export, $export_as, $selected_file;

    public $filter = [], $languages = [], $selectedproducts = [];

    public $perPage = 10;

    public $selectall = false;
  
    public $bulkDisabled = true;

    public function mount()
    {
        $this->selectedproducts = collect();
        $this->user_id = Auth::user()->role;
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

    public function getProductpaginateProperty(){
        $this->getProduct();
         $items = $this->getproduct->forPage($this->page, $this->perPage);

        return  new LengthAwarePaginator($items, $this->getproduct->count(), $this->perPage, $this->page);
      
    }

    public function deleteselected(){

        Product::where('id',$this->selectedproducts)->delete();

        CollectionProduct::where('product_id',$this->selectedproducts)->delete();

        ProductMedia::where('product_id',$this->selectedproducts)->delete();

        ProductVariant::where('product_id',$this->selectedproducts)->delete();
        
        VariantStock::where('product_id',$this->selectedproducts)->delete();

        
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

    public function updatedselectedproducts(){
         $this->selectall = false;
    }

    public function isselectedproducts($product_id){
        return in_array($product_id, $this->selectedproducts);
    }

    public function store($flag = "")
    {
           
        if($flag == 'active'){
      
            foreach ($this->selectedproducts as $key => $value) {
     
                Product::where('id', $value)->update(['status' => 'active']);
                    
            }
        }
        if($flag == 'draft'){
      
            foreach ($this->selectedproducts as $key => $value) {
     
                Product::where('id', $value)->update(['status' => 'invited']);
                    
            }
        }
        if($flag == 'archive'){
      
            foreach ($this->selectedproducts as $key => $value) {
     
                Product::where('id', $value)->update(['status' => 'disabled']);
                    
            }
        }
        if($flag == 'delete'){
      
            foreach ($this->selectedproducts as $key => $value) {
     
                Product::where('id', $value)->delete();
                    
            }
        }

        $this->updateMode = false;               
         $this->getProduct();
    }

    public function getProduct()
    {
        $this->filter = [];

        $this->Productmediass = ProductMedia::all()->groupBy('product_id')->toArray();
        
        $this->VariantStock = VariantStock::All();
        
        $this->productVariant = ProductVariant::All();
        
        $this->getproduct = Product::when($this->filter_product, function ($query, $filter_product) {

            $query->where('title', 'LIKE', '%' . $filter_product . '%');

            })->get();
    } 
}
