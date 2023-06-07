<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\User;
use Auth;
use App\Salon;
use DB;
use App\Staff;
use App\FacebookMarketing;
use Illuminate\Support\Str;

class SalonController extends Controller
{
    public function index(Request $request) {
        
        $getSaloon_Data = User::where('identify','saloon')
        ->get();
       //die($getSaloon_Data);
        return view('admin-view/Requested-salon-view',['getSaloon_Data'=>$getSaloon_Data]);        
    }


       //sameer
    public function saloon_id($saloon_id) {

        $userid = $saloon_id;

        $result = DB::table('users')
        ->join('appointments', 'users.id', '=', 'appointments.salon_id')
        ->join('salon_treatments', 'salon_treatments.id', '=', 'appointments.services_taken')

        ->select('users.saloon_name','appointments.start_time', 'appointments.end_time','users.saloon_name','appointments.total_cost','appointments.email','appointments.phone','salon_treatments.treatment_name','appointments.customer_id')
        ->Where('users.id',$saloon_id)
        ->get();
        //die($result);
        $getStaffMember = Staff::where('salon_id',$userid)
        ->get();
       // die($getStaffMember);
        return view('admin-view/dashboard',['getStaffMember'=>$getStaffMember,'result'=>$result,'send_saloon_id'=>$userid]);
    }
    //sameer
    
    public function admin_Saloon_accepted(Request $request) {
            
             
            $accepted_saloon_id = $request->input('accepted_saloon_id');
            // die( $accepted_saloon_id);
            $final_password = $request->input('password');
            $affected_row_User = DB::table('users')
              ->where('id', $accepted_saloon_id)
              ->update(['password' => bcrypt($final_password),'saloon_status'=>1,'user_type'=>2]);

              $affected_row_salon = DB::table('salons')
              ->where('salon_id', $accepted_saloon_id)
              ->update(['status'=>1]);
              
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

      
      // $getAcceptedSaloon_Data = DB::table('users')
      // ->join('salons', 'users.id', '=', 'salons.salon_id')
      // ->get();

      // echo "<pre>";
      // print_r($getAcceptedSaloon_Data);
      // die;


        return view('admin-view/RequestedAccepted-salon-view',['getAcceptedSaloon_Data'=>$getAcceptedSaloon_Data]);
    }


    /* 
     * changed approved status to  rejected
     *
    */
      
      public function changed_request_ApprovedStatus(Request $request) {
        

          $changedApprovedStatus_id = $request->input('changed_approved_status');


          $affected_changedApprovedStatus_id = DB::table('users')
              ->where('id', $changedApprovedStatus_id)
              ->update(['saloon_status'=>2]);

          $changedApprovedStatus = DB::table('salons')
              ->where('salon_id', $changedApprovedStatus_id)
              ->update(['status'=>0]);


            if($affected_changedApprovedStatus_id=true) {
                  
                   return 1;

                } else {
                  
                  return 0;
            }  



            
      }

    
      public function rejected_request(Request $request) {
        
        
        $getRejectedSaloon_Data = User::where('identify','saloon')
        ->get();
        return view('admin-view/RequestedRejected-salon-view',['getRejectedSaloon_Data'=>$getRejectedSaloon_Data]);
    }


     /* 
     * changed rejected status to  approved status
     *
    */
      
      public function changed_request_RejectedStatus(Request $request) {
        

          $changedRejectedStatus_id = $request->input('changed_rejected_status');
          
          $rejectedfinal_password = Str::random(30);        

          $affected_changedRejectedStatus_id = DB::table('users')
              ->where('id', $changedRejectedStatus_id)
              ->update(['saloon_status'=>1,'password' => bcrypt($rejectedfinal_password)]);

          $changedRejectedStatus = DB::table('salons')
              ->where('salon_id', $changedRejectedStatus_id)
              ->update(['status'=>1]);


            if($affected_changedRejectedStatus_id=true) {
              
              /*
               * gerneate password for user
               *
              */ 
              
              $getuserData = User::where('id',$changedRejectedStatus_id)->first();

              $approved_status_againEmail  = [
                'title' => 'Information of Approved Account',
                'body' => 'Your Account has been approved'.'you can Login with these details-'.' '.'Email is :'.$getuserData->email.' '.'password is:'.$rejectedfinal_password
                ];
                
              \Mail::to($getuserData->email)->send(new \App\Mail\ChangedSentRejectedUser($approved_status_againEmail));


                   return 1;
                   
                } else {
                  
                  return 0;
            }  



            
      }

    
    public function admin_saloon_rejected(Request $request) {
        
        $rejected_saloon_id = $request->input('rejected_saloon_id');
    

            $affected_row_User = DB::table('users')
              ->where('id', $rejected_saloon_id)
              ->update(['saloon_status'=>2]);

            $affected_row_salon = DB::table('salons')
              ->where('salon_id', $rejected_saloon_id)
              ->update(['status'=>0]);
              
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


        /* sameer */
    public function saloon_date($date,$saloon_id){

       
        $date = date("Y-m-d", strtotime($date));
        
        $userid = Auth::user()->id;
        
        $result = DB::table('users')
        ->join('appointments', 'users.id', '=', 'appointments.salon_id')
         ->join('salon_treatments', 'salon_treatments.id', '=', 'appointments.services_taken')
         
        ->select('users.saloon_name','appointments.start_time', 'appointments.end_time','users.saloon_name','appointments.total_cost','appointments.email','appointments.phone','salon_treatments.treatment_name','salon_treatments.treatment_hours','appointments.customer_id')
        ->Where('users.id',$saloon_id)
        ->get();
        
        $getStaffMember = Staff::where('salon_id',$saloon_id)
             ->get();

          
      return view('admin-view/admin-view-date',['getStaffMember'=>$getStaffMember,'result'=>$result,'send_saloon_id'=>$saloon_id,'date'=>$date]);
    }
    // public function index1(Request $request) {
        
    //     $user_id ='35';//Auth::user()->id;
    //     $get_marketing_data = FacebookMarketing::where('salon_id',$user_id)
    //           ->get();

              
    //     return view('admin-view/user-marketting-view');
        
    // }

     public function add_facebook_marketing(Request $request) {
        
           $result = DB::table('users')
        ->join('salons', 'users.id', '=', 'salons.salon_id')
       
        ->select('salons.*')
        ->Where('users.saloon_status','1')
        ->get();  
        //die($result);
       return view('admin-view/user-facebook-marketting-view',['result'=>$result]);
        
    }
     public function send_add_facebook_data(Request $request) {
     
        request()->validate([
          'salon_id' => 'required',
            'title' =>'required',
            'dimension' =>'required',
            'description' =>'required',
            'choseimage' =>'required',
            'marketing' =>'required'
        ]);
        
        $user_id = $request->input('salon_id');//Auth::user()->id;
        
        $title = $request->input('title');
        $dimension = $request->input('dimension');
        $description = $request->input('description');
        
        $get_facebook_img = $request->file('choseimage');
        $facebook_img_name = microtime(true).$get_facebook_img->extension();
        $facebook_path = $get_facebook_img->move(public_path('facebook_marketting_images'), $facebook_img_name);
        
        $marketing_title = $request->input('marketing');
        
        
        try {
            
            $Add_salon = new FacebookMarketing;
            $Add_salon->title = $title;
            $Add_salon->dimension = $dimension;
            $Add_salon->description = $description;
            $Add_salon->facebook_image = $facebook_img_name;
            $Add_salon->salon_id = $user_id;
            $Add_salon->marketingtitle = $marketing_title;
            
            $Add_salon->save();
            return redirect('/add-facebook-marketing')->with('facebook_marketing_Status',"Added Successfully!");
            
        } 
        catch(Exception $e) {
          return redirect('/add-facebook-marketing')->with('facebook_marketing_status',"operation failed");
      }
       
       
    }
    
}
