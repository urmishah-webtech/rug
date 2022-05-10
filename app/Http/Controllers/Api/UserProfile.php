<?php

namespace App\Http\Controllers\Api;

use Livewire\Component;

use App\Models\Orders;

use Illuminate\Http\Request;

use App\Models\order_item;

use App\Models\CustomerAddress;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserProfile extends Component
{

    public function Profileget($userid)
    {
        $User = User::where('id',$userid)->get();
        $CustomerAddress = CustomerAddress::where('user_id',$userid)->get();
        $billing_address = CustomerAddress::where('user_id',$userid)->where('address_type', 'billing_address')->count();
        $shipping_address = CustomerAddress::where('user_id',$userid)->where('address_type', 'shipping_address')->count();



        return response()->json(['message' => 'success', 'user' => $User, 'customeraddress' => $CustomerAddress, 'success' => true, 'billingaddress'=> $billing_address , 'shippingaddress'=> $shipping_address]);
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

    public function PasswordUpdate(Request $request)
    {
        $UserDetail = User::where('id', $request->user_id)->first();

        if(Hash::check($request->currpassword, $UserDetail->password))
        {
            if($request->newpassword == $request->repassword){

                $hashedPassword = Hash::make($request->newpassword);
                User::where('id',$request->user_id)->update(['password' => $hashedPassword]);
                
                return response()->json(['message' => 'Record Updated!!', 'success' => true ]);
            }else{
                return response()->json(['message' => 'Not Same Password !!', 'fail' => false ]);
            }
                
        }else{
            return response()->json(['message' => 'Old Password Not Match !!', 'fail' => false ]);
        }
    }

    public function getOrder($userid)
    {
        $Order = Orders::where('user_id',$userid)->get();
        $OrderItem = order_item::where('user_id',$userid)->get();
        $showItem = order_item::with('order_product')->with('media_product')->where('user_id',$userid)->get();

        return response()->json(['message' => 'success', 'order' => $Order, 'showItem' => $showItem, 'orderItem' => $OrderItem, 'success' => true ]);
    }
}
