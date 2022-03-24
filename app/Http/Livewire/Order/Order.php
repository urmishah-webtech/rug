<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

use App\Models\Orders;

use App\Models\order_item;

use Livewire\WithPagination;

use Illuminate\Pagination\LengthAwarePaginator;



class Order extends Component
{

	use WithPagination;

    public $OrderItem;

    public $perPage = 10;


    public function mount() {

       $this->OrderItem = order_item::get();

    }

    public function render()
    {
    	
		$orders = Orders::with('user')->where('transactionid','!=','0' )->get();
        $items = $orders->forPage($this->page, $this->perPage);
        $paginator = new LengthAwarePaginator($items, $orders->count(), $this->perPage, $this->page);
        
        return view('livewire.order.order', ['order' => $paginator]);
    }
}
