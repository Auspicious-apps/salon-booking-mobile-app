<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\User;
use Auth;
use App\Salon;
use DB;

class SalonController extends Controller
{
    public function index(Request $request) {
        
        $getSaloon_Data = User::where('identify','saloon')
        ->get();
        return view('admin-view/Requested-salon-view',['getSaloon_Data'=>$getSaloon_Data]);        
    }
    
    public function admin_Saloon_accepted(Request $request) {
            
             
            $accepted_saloon_id = $request->input('accepted_saloon_id');
    
            $final_password = $request->input('password');
            $affected_row_User = DB::table('users')
              ->where('id', $accepted_saloon_id)
              ->update(['password' => bcrypt($final_password),'saloon_status'=>1,'user_type'=>2]);
              
              if($affected_row_User=true) {
                    
                // Approved mail sent to the saloon owner
                
                $getuserseEmail = DB::table('users')
              ->where('id', $accepted_saloon_id)
              ->first();
        
                        
                $details = [
                'title' => 'Information of Approved Account',
                'body' => 'Your Account has been approved'.'you can Login with these details-'.' '.'Email is :'.$getuserseEmail->email.' '.'password is:'.$final_password
                ];
                
                \Mail::to($getuserseEmail->email)->send(new \App\Mail\SentApprovedUser($details));
                
                
                // end 
                   return 1;
              } else {
                  
                  return 0;
              }
           
    }
    
    public function accepted_request(Request $request) {
        
        
        $getAcceptedSaloon_Data = User::where('identify','saloon')
        ->get();
        return view('admin-view/RequestedAccepted-salon-view',['getAcceptedSaloon_Data'=>$getAcceptedSaloon_Data]);
    }
    
      public function rejected_request(Request $request) {
        
        
        $getRejectedSaloon_Data = User::where('identify','saloon')
        ->get();
        return view('admin-view/RequestedRejected-salon-view',['getRejectedSaloon_Data'=>$getRejectedSaloon_Data]);
    }
    
    public function admin_saloon_rejected(Request $request) {
        
        $rejected_saloon_id = $request->input('rejected_saloon_id');
    

            $affected_row_User = DB::table('users')
              ->where('id', $rejected_saloon_id)
              ->update(['saloon_status'=>2]);
              
                if($affected_row_User=true) {
                  
                   return 1;
                } else {
                  
                  return 0;
            }  
      
    }
    
    public function admin_my_account(Request $request) {
        
        $userID = auth()->user()->id;
        $getAdmin_Data = User::where('id',$userID)
        ->first();
        return view('admin-view/admin-myaccount-view',['getAdmin_Data'=>$getAdmin_Data]);
    }
    
    public function admin_edit_myaccount(Request $request) {
        
        $userID = auth()->user()->id;
        $edit_getAdmin_Data = User::where('id',$userID)
        ->first();
        return view('admin-view/edit-admin-myaccount-view',['editgetAdmin_Data'=>$edit_getAdmin_Data]);
    }
    
      public function edit_adminAccountDetails(Request $request) {
          
          
        request()->validate([
            'first_name' =>'required',
            'last_name' =>'required',
            'city' =>'required',
            'state' =>'required',
            'street_address' =>'required',
            'pincode' =>'required',
            'username' =>'required',
            'phone' =>'required',
  
        
        ]);
        
            $admin_edit_id = Auth::user()->id;
        
              if(!empty($request->hasfile('edit_adminImage'))) {
                  
                $edit_adminImage = $request->file('edit_adminImage');
                $admin_name = microtime(true).$edit_adminImage->extension();
                $edit_adminImage->move(public_path('admin_images'), $admin_name);
                
              } else {
       
                $admin_name  = $request->input('old_adminEdit_image');
        
              }
              
              
              $first_name  = $request->input('first_name');
              $last_name  = $request->input('last_name');
              $city  = $request->input('city');
              $state  = $request->input('state');
              $street_address  = $request->input('street_address');
              $pincode  = $request->input('pincode');
              $username  = $request->input('username');
              $phone  = $request->input('phone');
              
                User::where('id', $admin_edit_id)
                        ->update([  
                        'first_name' => $first_name,
                        'last_name' =>$last_name,
                        'city' =>$city,
                        'state' => $state,
                        'street_address' => $street_address,
                        'zipcode' => $pincode,
                        'user_name' => $username,
                        'phone' => $phone,
                        'image' =>$admin_name
                ]);
    
            return redirect('admin-my-account')->with('admin-edit-myaccount-status',"Profile Updated successfully");
    }
    
}
