<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

use App\Models\Orders;

use App\Models\order_item;

use Livewire\WithPagination;

use App\Models\Payment;

use Illuminate\Pagination\LengthAwarePaginator;



class Order extends Component
{

	use WithPagination;

    public $OrderItem, $filter_order;

    public $selecteorder = [];

    public $selectall = false;
  
    public $bulkDisabled = true;

    public $perPage = 10;
  
  


    public function mount() {


       $this->selecteorder = collect();
       $this->OrderItem = order_item::get();

    }

    public function render()
    {
    	
        $this->bulkDisabled = count($this->selecteorder) < 1;

		
        
        return view('livewire.order.order', ['order' => $this->Orderpaginate]);
    }

    public function deleteselected(){
        $order = Orders::query()
                  ->whereIn('id', $this->selecteorder)
                  ->delete();
        if($order){
                order_item::query()
                  ->whereIn('order_id', $this->selecteorder)
                  ->delete();
                Payment::query()
                  ->whereIn('order_id', $this->selecteorder)
                  ->delete();
        }
        $this->selecteorder = [];
        $this->selectall = false;
    }

    public function getOrderpaginateProperty(){
        $orders = Orders::with('user')->where('transactionid','!=','0' )->when($this->filter_order, function ($query, $filter_order) {

            $query->Where('first_name', 'LIKE', '%' . $filter_order . '%');
            $query->orWhere('id', 'LIKE', '%' . $filter_order . '%');

            })->get();
        $items = $orders->forPage($this->page, $this->perPage);
        return new LengthAwarePaginator($items, $orders->count(), $this->perPage, $this->page);
    }

    public function updatedSelectAll($value){

        if($value){
            $this->selecteorder = $this->Orderpaginate->pluck('id')->toArray();
        
        }else{
            $this->selecteorder = [];
        }
    }

    public function updatedSelecteorder(){
         $this->selectall = false;
    }

    public function isSelecteorder($order_id){
        return in_array($order_id, $this->selecteorder);
    }
}
