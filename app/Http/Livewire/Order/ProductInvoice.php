<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

use App\Models\Product;

use App\Models\Orders;

use App\Models\tax;

use App\Models\order_item;

use App\Models\VariantStock;

use App\Models\ProductComment;

use App\Models\ProductVariant;

use App\Models\General;

use PDF;


class ProductInvoice extends Component
{
	public function generateProductPDF($id)
    {
    	 $order = Orders::with('user')->Where('id', $id)->first();

        $companydetail = General::where('id','1')->first();
      
        $Taxes = tax::where('country_name',$order->country)->first();

        $OrderItem = order_item::with('order_product')->with('media_product')->where('order_id',$id)->get();

        //return view('livewire.order.product-invoice', compact('order','companydetail','Taxes','OrderItem'));

	    $pdf = PDF::loadView('livewire.order.product-invoice', compact('order','companydetail','Taxes','OrderItem'));

	    return $pdf->stream('invoice.pdf');
    }

    public function render()
    {
        return view('livewire.order.product-invoice');
    } 
}
