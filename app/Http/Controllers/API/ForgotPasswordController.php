<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;


class ForgotPasswordController extends Controller
{
    protected  function index(Request $request) {
    
        $email  = $request->input('email');
        
        $validator = Validator::make($request->all(),[
            'email' => "email:rfc,dns"
        ]);
        
       
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        } else {
            
              $users = DB::table('users')->where('email', $email)->first();
                
              if(!empty($users)) {
                    
                    $email  =  $users->email;
                    
                    $pin = mt_rand(100, 999)
                        . mt_rand(100, 999);
                    
                    $pin_generate = str_shuffle($pin);
                    
                    $OTP_details = [
                        'title' => 'Your  OTP is',
                        'body' => $pin_generate
                    ];
                    
                    
                    /*
                     * Mail sent
                     *
                    */
                   
                    $check_email = \Mail::to($email)->send(new \App\Mail\OTPSent($OTP_details));
                    
                    if($check_email=true) {
                        
                        $updateOtpData = DB::table('users')
                                ->where('email', $email)
                                ->update(['OTP_number' => $pin_generate]);
                        $message ="OTP has been sent successfully in your Email!";
                                
                        $response = ['data'=>'','message' => $message,'data'=>$email];
                                return response($response, 200);
                                
                    } else {
                        
                        $message ="404 not found!";
                                
                        $response = ['status'=>'true','message' => $message];
                                return response($response, 400);
                    }
            
                    /*
                     * Mail sent
                     *
                    */
                       
                  
              } else {
                  
                  return response(['errors'=>'Email not exists'], 422);
              }
            
        }
    }
    
    public function varification_otp(Request $request) {
        
        
        $validator = Validator::make($request->all(), [ 
                'otp'   =>'required'
            ]);

            if($validator->fails()){
                return response()->json(['error'=>$validator->errors()], 401);

            } else {
                    $email  = $request->get('email');
                    $otpSent  = $request->get('otp');
                    $check_otpUser = DB::table('users')->where('email', $email)->first(); 
                    
                    if(!empty($check_otpUser)) {
                        
                       $otp_db = $check_otpUser->OTP_number;
                      
                       
                       if(!empty($otp_db)) {
                            
                            if($otp_db == $otpSent ) {
                                $message ="OTP is valid!";
                                    $response = ['data'=>'true','status' => $message];
                                    return response($response, 200);
                        
                            } else {
                                
                                 $message ="NOT A VALID OTP!";
                                    $response = ['data'=>'false','status' => $message];
                                        return response($response, 400);
                                
                            }
                           
                       } else {
                           
                           $message ="404 error found!";
                                    $response = ['data'=>'false','status' => $message];
                                        return response($response, 400);
                       }
                        
                    } else {
                            
                            $message ="user email not found!";
                                    $response = ['data'=>'false','status' => $message];
                                        return response($response, 400);
                        
                    }
            }
        
    }
    
    
    /*
     *  change user password
     * 
    */
    
    public function change_password(Request $request) {
        
        $validator = Validator::make($request->all(), [ 
               'password' => 'required|string|confirmed',
               'password_confirmation' => 'required|string',
            ]);
            
         if ($validator->fails()) {
			    return response(['errors'=>$validator->errors()->all()], 422);
            } else {
                    
                $email  = $request->get('email');
                 
                $checkusersChangedPassword = DB::table('users')->where('email', $email)->first();
               
                if(!empty($checkusersChangedPassword)) {
                        
                    $getPassword = $request["password"];
                    
                        
                     $updateOtpData = DB::table('users')
                                ->where('email', $checkusersChangedPassword->email)
                                ->update(['password' => bcrypt($getPassword)]); 
        
                        if($updateOtpData=true) {
                            
                            $message ="Password has been changed successfully!";
                            
                            $response = ['data'=>'true','message' => $message];
                            return response($response, 200);
                                
                            
                        } else {
                            
                            $message ="something went wrong!";
                            
                            $response = ['status'=>'false','message' => $message];
                                return response($response, 400);
                        }
                        
                            
            } else {
                    
                    $message ="User email not exists!";
                    
                    $response = ['status'=>'false','message' => $message];
                        return response($response, 400); 
            }
            
        }
        
    }
}
