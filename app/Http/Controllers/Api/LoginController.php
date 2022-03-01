<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
use App\Models\CustomerDetail;
use App\Models\CustomerComment;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */

    public function signup(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/',
        ]);
        if ($validator->fails()) {
          return response()->json([
            'success' => false,
            'message' => $validator->errors(),
          ], 401);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user['token'] = $user->createToken('appToken')->accessToken;
        $payment = Cart::where('session_id', $request->session_id)->update(['user_id' => $user->id,'session_id' => '']);

        return response()->json([
          'success' => true,
          //'token' => $success,
          'user' => $user
      ]);
    }
    /*public function signup(Request $request)
    {

      date_default_timezone_set("Europe/Amsterdam");

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/',
        ]);

        $user = User::create([

                'first_name' => $request['first_name'],

                'last_name' => $request['last_name'],

                'email' => $request['email'],

                'password' => Hash::make($request['password']),

            ]);

        CustomerDetail::create([
                'user_id' => $user->id,
            ]);


          //  $user->assignRole('customer');
            $Comment_arr1 = [

                    'user_id' => $user->id,
                    
                    'message' => 'Customer was created.',
                ];


            CustomerComment::create($Comment_arr1);
            $Comment_arr2 = [

                    'user_id' => $user->id,
                    
                    'message' => 'verification Meessage Send.',
                ];


            CustomerComment::create($Comment_arr2);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }*/
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */ 
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
          //  'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $payment = Cart::where('session_id', $request->session_id)->update(['user_id' => $user->id,'session_id' => '']);
      //  $token = $tokenResult->remember_me;
        /*if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();*/
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'user' => $user,
            'token_type' => 'Bearer',
            'token_type' => 'Bearer',
            'success' => true,
            'expires_at' => Carbon::parse(
             //   $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }


    
    public function storeNewPassword(Request $request)

    {

        date_default_timezone_set("Europe/Amsterdam");

         $request->validate([

            'email' => 'required|email',

            'password' =>  'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/',

        ]);



        $user = User::where('email', $request->email)->first();



        if(empty($user)) {

          return response()->json([
              'message' => 'Email not exist!'
          ], 401);

        }



        // $token = DB::table('password_resets')->where('email', $request->email)->first();



         $user->forceFill([

            'password' => Hash::make($request->password),

        ])->save();



      //  $user->setRememberToken(Str::random(60));



        $user->save();

     //   DB::table('password_resets')->where('email', $request->email)->delete();



       // event(new PasswordReset($user));

        $Comment_arr = [

                    'user_id' => $user->id,
                    
                    'message' => 'Your password has been reset',
                ];


        CustomerComment::create($Comment_arr);

        return response()->json([
              'message' => 'Your password has been reset!'
          ], 201);
       

        


    }     
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
