<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\User;
use Validator;
use DB;
use Hash;

class EditProfileController extends Controller
{
     public function index(Request $request) {
    
       
        $validator = Validator::make($request->all(),[
            'password'=>'required',
            'confirm_password'=>'required|same:password',
        ]);
        
        
         if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);

            } else {
                
                $first_name  = $request->get('first_name');
                $last_name  = $request->get('last_name');
                $email  = $request->get('email');
                $phone_number  = $request->get('phone_number');
                $password  = $request->get('password');
                
                
            $check_userexits = DB::table('users')->where('email', $email)->first(); 
                
                if(!empty($check_userexits)) {
                    
                    
                    $updateUserProfilePassword = DB::table('users')
                                ->where('email',$email)
                                ->update(['first_name'=>$first_name,'last_name'=>$last_name,'phone'=>$phone_number,'password' => bcrypt($password)]);
                                
                     if($updateUserProfilePassword=true) {
                            
                            $message ="User Profile Updated Successfully!";
                            
                            $response = ['data'=>'true','message' => $message];
                            return response($response, 200);
                                
                            
                        } else {
                            
                            $message ="something went wrong!";
                            
                            $response = ['status'=>'false','message' => $message];
                                return response($response, 400);
                        }
                                
                    
                } else {
                            
                    $message ="user email not found!";
                            $response = ['data'=>'false','status' => $message];
                                return response($response, 400);
                        
                    }

            }
    
    }
    
    
    public function store_facebook_detail(Request $request)
    {
        $email = $request->input('email');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $id = $request->input('id');
        $fb_token = $request->input('token');
        
        
        
        $user_status = User::where('email',$email)->count();
        
        
        if($user_status > 0)
        {
            $result = User::where('email',$email)->update([
                
                'first_name' => $first_name,
                'last_name'  =>  $last_name,
                'facebook_id'    =>  $id,
                'facebook_token'    =>  $fb_token
            ]);
            
            
            $password = 'misalon';
            
            
            if(!Auth::attempt([
                'email' => $email, 
                'password' => $password
            ]))
             return response()->json([
                'message' => 'Unauthorized'
            ], 401);
            
            $user = $request->user();
    
            $tokenResult = $user->createToken('Personal Access Token');
        
            $token = $tokenResult->token;
            
            $token->expires_at = Carbon::now()->addHours(24);
            $token->save();
            
            $access_token = $tokenResult->accessToken;
            
            
            if($result > 0)
            {
                $data['status_code']    =   1;
                $data['status_text']    =   'Success';             
                $data['message']        =   'Facebook data has been updated successfully';
                $data['access_token']          =   $access_token;
            }
            else
            {
                $data['status_code']    =   0;
                $data['status_text']    =   'Failed';             
                $data['message']        =   'Facebook data has not been updated successfully';
                $data['access_token']          =   '';
            }
            
            return $data;
            
        }
        else
        {
            
            $password = Hash::make('misalon');
            
            
            $insert_fb_detail = new User;
            $insert_fb_detail->email = $email;
            $insert_fb_detail->first_name = $first_name;
            $insert_fb_detail->last_name = $last_name;
            $insert_fb_detail->facebook_id = $id;
            $insert_fb_detail->facebook_token= $fb_token;
            $insert_fb_detail->user_type= 3;
            $insert_fb_detail->password= $password;
            $insert_fb_detail->save();
            
            $npassword = 'misalon';
            
            $credentials = request([$email, $password]);
             
              if(!Auth::attempt($credentials))
             return response()->json([
                'message' => 'Unauthorized'
            ], 401);
            
            $user = $request->user();
    
            $tokenResult = $user->createToken('Personal Access Token');
        
            $token = $tokenResult->token;
            
            $token->expires_at = Carbon::now()->addHours(24);
            $token->save();
            
            $access_token = $tokenResult->accessToken;
           
            
            if($insert_fb_detail)
            {
                $data['status_code']    =   1;
                $data['status_text']    =   'Success';             
                $data['message']        =   'Facebook data has been stored successfully';
                $data['access_token']          =   $access_token;
            }
            else
            {
                $data['status_code']    =   0;
                $data['status_text']    =   'Failed';             
                $data['message']        =   'Facebook data has not been stored successfully';
                 $data['access_token']          =   '';
            }
            
            return $data;
        }
        
    }
}
?>