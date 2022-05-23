<?php

namespace App\Http\Controllers\Api;

use Livewire\Component; 

use Laravel\Fortify\Fortify;

use Illuminate\Contracts\Support\Responsable;

use App\Models\Orders;

use Illuminate\Http\Request;

use App\Models\order_item;

use App\Models\CustomerAddress;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Password;

use Laravel\Fortify\Contracts\FailedPasswordResetLinkRequestResponse;

use Illuminate\Contracts\Auth\PasswordBroker;

use Laravel\Fortify\Contracts\SuccessfulPasswordResetLinkRequestResponse;

use Laravel\Fortify\Contracts\ResetPasswordViewResponse;

use App\Notifications\ResetPassword;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use Carbon\Carbon;

use App\Models\CustomerComment;

use App\Actions\Fortify\PasswordValidationRules;

use Illuminate\Auth\Events\PasswordReset;

use Illuminate\Auth\Passwords\DatabaseTokenRepository;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator; // For Validation

use App\Models\Cart;



class GuestCheckout extends Component
{
    public function GuestUserSave(Request $request)
    {
      
        if($request->account_type==1){
           
            $validation = Validator::make($request->all() ,[

                'g_email' => 'required|email',
                'g_first_name' => 'required',
                'g_last_name' => 'required',
                'g_mobile_number' => 'required',
                'password' =>  ['required', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/'],
            ]);
            if($validation->fails()) {
                return response()->json(['message' => $validation->errors(), 'success' => false]);
            }
            $user = User::where('email', $request->g_email)->first();
            
            if($user) {
                return response()->json(['message' => 'Email already exist!', 'success' => false]);
            }
           
            $user = User::create([
                'first_name' => $request->g_first_name,
                'last_name' => $request->g_last_name,
                'email' => $request->g_email,
                'mobile_number' => $request->g_mobile_number,
                'password' => Hash::make($request->password),
                'account_type' => '2',
                // 'session_id' =>
                
            ]);
        
            $user['token'] = $user->createToken('appToken')->accessToken;
            $payment = Cart::where('session_id', $request->session_id)->update(['user_id' => $user->id,'session_id' => '']);
            $payment = CustomerAddress::where('session_id', $request->session_id)->update(['user_id' => $user->id,'session_id' => '']);

            return response()->json(['message' => 'Record Created!!', 'success' => true, 'user'=>$user ]);

        
        }
        else{
           
                $request->validate([
                    'g_email' => 'required|email',
                    'g_first_name' => 'required',
                    'g_last_name' => 'required',
                    'g_mobile_number' => 'required',
                ]);
    
                $user = User::where('email', $request->g_email)->first();
                if($user) {
                    return response()->json(['message' => 'Email already exist!', 'success' => false]);
                }
        
                $user = User::create([
                    'first_name' => $request->g_first_name,
                    'last_name' => $request->g_last_name,
                    'email' => $request->g_email,
                    'mobile_number' => $request->g_mobile_number,
                    'account_type' => 1,
                    'session_id' => $request->session_id
                ]);
    
                return response()->json(['message' => 'Record Created!!', 'success' => true, 'user'=>$user ]);
    
            
        }
       
    }

}