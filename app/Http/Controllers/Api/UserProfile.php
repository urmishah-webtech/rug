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
        $UserDetail = User::where('id', $request->userid)->first();

        $hashedPassword = $UserDetail->password;
        if(!empty($request->currpassword) && !empty($request->newpassword) && !empty($request->repassword)) {
            if(Hash::check($request->currpassword, $UserDetail->password))
            {
                if($request->newpassword == $request->repassword){

                    $hashedPassword = Hash::make($request->newpassword);
                    
                }else{
                    return response()->json(['message' => 'Not Same Password !!', 'fail' => false ]);
                }
                    
            }else{
                return response()->json(['message' => 'Old Password Not Match !!', 'fail' => false ]);
            }
        }

        User::where('id',$request->userid)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'password' => $hashedPassword

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

    public function sendPasswordResetLink(Request $request)

    {

        date_default_timezone_set("Europe/Amsterdam");

        // session()->flash('screen', 'forgot-password');



        $request->validate(['email' => ['required']]);

        $user = DB::table('users')->where('email', $request->email)->first();

        //Check if the user exists

        if (empty($user)) {
            return response()->json(['message' => 'User not found!', 'success' => false ]);
        }



       // session()->forget('screen');



       $token  = Str::random(40);



        //Create Password Reset Token

        DB::table('password_resets')->insert([

            'email' => $request->email,

            'token' => $token,

            'created_at' => Carbon::now()

        ]);

        //Get the token just created above

        $tokenData = DB::table('password_resets')

            ->where('email', $request->email)->orderBy('created_at','desc')->first();



        if ($this->sendResetEmail($request->email, $token)) {

            // $Comment_arr = [

            //         'user_id' => $user->id,
                    
            //         'message' => 'User Requested Password reset',
            //     ];


            // CustomerComment::create($Comment_arr);

            return response()->json(['message' => 'A Reset link has been sent to your Email address.', 'success' => true]);

        } else {

            // $Comment_arr = [

            //         'user_id' => $user->id,
                    
            //         'message' => 'A Network Error occurred. Please try again',
            //     ];


            // CustomerComment::create($Comment_arr);


            return response()->json(['message' => 'A Network Error occurred. Please try again.', 'success' => false]);

        }

    }

     private function sendResetEmail($email, $token)

    {

        date_default_timezone_set("Europe/Amsterdam");

        //Retrieve the user from the database

        $user = User::where('email', $email)->first();

        // $user = DB::table('users')->where('email', $email)->select('first_name', 'email')->first();

        //Generate, the password reset link. The token generated is embedded in the link

         $link = env('BASE_PATH') . '/reset-password?token=' . $token . '&email=' . urlencode($user->email);



        try {



            $user->notify(new ResetPassword($token,  $link));

            // $Comment_arr = [

            //         'user_id' => $user->id,
                    
            //         'message' => 'Send Reset Email Link',
            //     ];


            //     CustomerComment::create($Comment_arr);

             return response()->json(['message' => 'success', 'success' => true]);

        } catch (\Exception $e) {

            return response()->json(['message' => 'failed', 'success' => true]);
        }

    }

     public function storeNewPassword(Request $request)

    {

        date_default_timezone_set("Europe/Amsterdam");

         $request->validate([

            'token' => 'required',

            'email' => 'required|email',

            'password' =>  ['required', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/'],

        ]);



        $user = User::where('email', $request->email)->first();



        if(empty($user)) {

            return response()->json(['message' => 'Email not exist!', 'success' => false]);
        }



         $token = DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->first();



         $user->forceFill([

            'password' => Hash::make($request->password),

        ])->save();



        $user->setRememberToken(Str::random(60));



        $user->save();

        DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->delete();



        event(new PasswordReset($user));

        // $Comment_arr = [

        //             'user_id' => $user->id,
                    
        //             'message' => 'Your password has been reset',
        //         ];


        // CustomerComment::create($Comment_arr);

        return response()->json(['message' => 'Your password has been reset!', 'success' => true]);
    }

    public function getOrder($userid)
    {
        $order = Orders::with(['order_items' => function($x) {
            return $x->with(['product' => function($y) {
                return $y->select('id','title');
            }])->select('id','price', 'order_id', 'product_id', 'stock');
        }])->where('user_id',$userid)->get(['id', 'uuid', 'netamout', 'shipping_cost', 'paymentstatus']);

        return response()->json(['order' => $order, 'success' => true ]);
    }

    public function OrderDetail($userid){

        $ordercheck = Orders::where('user_id',$userid)->count();
        $user_detail = User::where('id', $userid)->first();
        if($ordercheck != 0){
            $order = Orders::with('order_items')->where('user_id',$userid)->orderBy('id', 'DESC')->get();
            
            $order_item = order_item::with('order')->with('media_product')->with(['variant_product' => function($q) {
                return $q->with('variantmediafirst');
            }])->with('order_product')->orderBy('id', 'DESC')->get();


            $image_path= env('IMAGE_PATH');

            $finalamount = 0;
                $i=0;
                
               
            foreach ($order_item as $key => $result)
            {
                if(!$result->variant_product->isEmpty() && isset($result->variant_product[0]) && !empty($result->variant_product[0]->variantmediafirst) && !empty($result->variant_product[0]->variantmediafirst->image)) {
                    $order_item[$key]['image'] = $image_path.$result->variant_product[0]->variantmediafirst->image;
                } else {
                    $order_item[$key]['image'] = $image_path.$result['media_product'][0]['image'];
                }
               
                $order_item[$key]['title'] = $result['order_product'][0]['title'];
                $Totalamount = ($result->stock * $result->price);
                $finalamount += $Totalamount;
                
            }
            
            return response()->json(['status' => 0,'orders' => $order,'order_item' => $order_item,'image' => $order_item,'product_amount'=>$finalamount]);

        }else
        {
             return response()->json(['error' => 'Not avalible Order']);
        }
    }

}
