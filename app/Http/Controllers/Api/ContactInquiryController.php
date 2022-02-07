<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Models\ContactInq;
use App\Models\General;

class ContactInquiryController extends Controller
{
    public function contactInquiry(Request $request){

    	$input = $request->all(); 
    	$validator = Validator::make($input,[
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'email' => 'required|email',
    		'phone' => 'required',
    		'message' => 'required'
    	]);
    	if ($validator->fails()) {
    		return response()->json(['status' =>false, 'message' =>$validator->errors()->first()]);
    	}else{
    		try {

                $admin = General::first(); 
                if($admin->contact_email!=" "){
                    $adminEmail=$admin->contact_email;
                }else{
                    $adminEmail='sagarparmar2650@gmail.com';
                }
              
    			Mail::send('mail.contact_inquiry', [
    				'first' => $request->first_name,
    				'last' => $request->last_name,
    				'email' => $request->email,
    				'phone' => $request->phone,
    				'msg' => $request->message
    			], function ($message) use ($request ,$adminEmail) {
    				$message->to($adminEmail)->subject("Contact Inquiry");
    			});
			 
    		} catch (Exception $ex) {
    			return response()->json('error', $ex->getMessage());
    		}
    		if (Mail::failures()) {
    			return response()->json('error', "Can't send Mail, Somthing wrong with your Mail Service");
    		} else {     
    			$data = array(   
    				'first_name' => $request->first_name,
    				'last_name' => $request->last_name,
    				'email' => $request->email,
    				'phone' => $request->phone,
    				'messages' => $request->message, 
    			);
    			$addInq = ContactInq::create($data);
    			if (!is_null($addInq)) { 
    				return response()->json(["message" => "Message sent successfully.",'status'=>true], 404);
    			} else {       
    				return response()->json(["message" => "Something wrong, Please try again.",'status'=>false], 404); 
    			}
    		}
    	}
    }
}
