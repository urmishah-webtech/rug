<?php

namespace App\Http\Controllers\Api;

use Livewire\Component;

use App\Models\Orders;

use Illuminate\Http\Request;

use App\Models\order_item;

use App\Models\CustomerAddress;

use App\Models\User;


class UserProfile extends Component
{

    public function Profileget($userid)
    {
        $User = User::where('id',$userid)->get();
        $CustomerAddress = CustomerAddress::where('user_id',$userid)->get();

        return response()->json(['message' => 'success', 'user' => $User, 'customeraddress' => $CustomerAddress, 'success' => true ]);
    }

    public function ProfileEdit(Request $request)
    {
        User::where('id',$request->userid)->update([

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,

        ]);

        return response()->json(['message' => 'Record Updated!!', 'success' => true ]);
    }

    public function getOrder($userid)
    {
        $Order = Orders::where('user_id',$userid)->get();
        $OrderItem = order_item::where('user_id',$userid)->get();
        $showItem = order_item::with('order_product')->with('media_product')->where('user_id',$userid)->get();

        return response()->json(['message' => 'success', 'order' => $Order, 'showItem' => $showItem, 'orderItem' => $OrderItem, 'success' => true ]);
    }
}
