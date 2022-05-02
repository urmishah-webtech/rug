<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Orders;

use App\Models\order_item;


class Products extends Component
{
    public function getOrder()
    {
        $order = Orders::where('transactionid','!=','0' )->where('user_id',$this->user_id)->get();
        $OrderItem = order_item::where('user_id',$this->user_id)->get();
        $showItem = order_item::with('order_product')->with('media_product')->where('user_id',$this->user_id)->get();

        foreach ($CollectionItem as $key => $row) {
            
            $data[$i]['id'] = $row->id;
            $data[$i]['title'] = $row->title;
            $data[$i]['descripation'] = $row->description;
            $data[$i]['image'] = $image_path . $row->image;
            $i++;
        }

        return response()->json(['message' => 'success', 'collectionitem' => $data, 'success' => true, ]);
    }
}
