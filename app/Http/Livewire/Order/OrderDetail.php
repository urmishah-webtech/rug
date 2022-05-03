<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

use App\Models\Product;

use App\Models\Orders;

use App\Models\order_item;

use App\Models\VariantStock;

use App\Models\ProductComment;

use App\Models\ProductVariant;

use App\Models\tax;
use Illuminate\Support\Facades\Validator;

class OrderDetail extends Component
{
    public $order,$OrderItem,$Taxes,$messagetext,$commentget,$allorder;

    protected $rules = [
        'order.paymentstatus' => 'required',
    ];
    public function mount($id) {

       $this->order = Orders::with('user')->Where('id', $id)->first();
      
       $this->allorder = Orders::where('user_id',$this->order['user'][0]['id'])->get();

       $this->commentget = ProductComment::where('order_id',$this->order['id'])->orderBy('id', 'DESC')->get()->groupBy(function($data) {
            return $data->updated_at->format('Y-m-d');
        })->toArray();

       $this->Taxes = tax::where('country_name',$this->order->country)->first();

       $this->OrderItem = order_item::with('order_product')->with('media_product')->where('order_id',$id)->get();


    }

    public function OrderUpdate()
    {
        if($this->order['paymentstatus']){
        Orders::where('id', $this->order['id'])->update(['paymentstatus'  => $this->order['paymentstatus']]);
        $this->order = Orders::with('user')->Where('id', $this->order['id'])->first();
        session()->flash('message', 'Status Updated Successfully.');
        }
    }
    public function ordercommentpost()
    {

        date_default_timezone_set("Europe/Amsterdam");

        $this->validate([
            'messagetext' => ['required'],

        ]);

        $Comment_arr = [

            'order_id' => $this->order['id'],
            
            'message' => $this->messagetext,
        ];


        ProductComment::create($Comment_arr);

        $this->messagetext = '';

        session()->flash('message', 'Post Created.');

    }
    

    public function render()
    {
        return view('livewire.order.order-detail');
    }
}
