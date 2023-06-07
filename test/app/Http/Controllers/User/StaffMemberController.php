<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Staff;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class StaffMemberController extends Controller
{
    /*
     * get admin dashboard
     *
    */
    public function index(Request $request)
    {

        return view('user-view/dashboard');

    }
    
    /*
     * get all staff member
     *
    */
    public function getAll_staff(Request $request)
    {   
        $user_id  =  Auth::user()->id;
        $get_staff  = Staff::where('salon_id',$user_id)->get();
        return view('user-view/listing-staffMember',['getAll_staff'=>$get_staff]);
    }
    
    /*
     *  Add new staff member
     *
    */
    public function add_staff(Request $request)
    {   
        $get_staffService = DB::select('select * from staff_services');
        return view('user-view/add-staff',['getStaff_Service'=>$get_staffService]);
    }
    
    /*
     *  Send staff Data
     *
    */
    public function send_staffData(Request $request)
    {   
        
      
        
        $salon_user_id  =  Auth::user()->id;
        
        request()->validate([
            'staff_image_upload' => 'required|image|mimes:jpeg,png,jpg',
            'description' =>'required',
            'first_name' =>'required',
            'last_name' =>'required',
            'dob' =>'required',
            'gender' =>'required',
            'position' =>'required',
            'contact_number' =>'required',
            'email_address' =>'email:rfc,dns',
            'home_address' =>'required',
            'city' =>'required',
            'state' =>'required',
            'country'=>'required',
          //  'hourly_rate' =>'required',
            'vacationStaf_from' =>'required',
            'vacationStaff_To' =>'required',
            
        ]);
    
      
        
    
    
        $staff_image_upload = $request->file('staff_image_upload');
        $staff_image_upload_image = date('YmdHis') . "." .$staff_image_upload->getClientOriginalName();
        
        $staff_image_upload->move(public_path('staff_images'), $staff_image_upload_image);
 
        $description = $request->input('description');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $position = $request->input('position');
        $contact_number = $request->input('contact_number');
        $email_address = $request->input('email_address');
        $home_address = $request->input('home_address');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        //$hourly_rate = $request->input('hourly_rate');
        $vacationStaf_from = $request->input('vacationStaf_from');
        $vacationStaff_To = $request->input('vacationStaff_To');
        $staff_serviceCheckbox = implode(',',$request->input('staff_service'));
        $staff_avcolor = $request->input('get_staff_avcolor');
        

     
        
        try {
            
            $Add_staff = new Staff;
            $Add_staff->image = $staff_image_upload_image;
            $Add_staff->color = $staff_avcolor;
            $Add_staff->description = $description;
            $Add_staff->salon_id = $salon_user_id;
            $Add_staff->first_name = $first_name;
            $Add_staff->last_name = $last_name;
            $Add_staff->date_of_birth = $dob;
            $Add_staff->gender =$gender;
            $Add_staff->position = $position;
            $Add_staff->contact_number = $contact_number;
            $Add_staff->email = $email_address;
            $Add_staff->street_address = $home_address;
            $Add_staff->city = $city;
            $Add_staff->state = $state;
            $Add_staff->country = $country;
            //$Add_staff->hourly_rate = $hourly_rate;
            $Add_staff->vacation_from = $vacationStaf_from;
            $Add_staff->vacation_to = $vacationStaff_To;
            $Add_staff->services_provided = $staff_serviceCheckbox;

            $Add_staff->save();
            return redirect('get-staff')->with('staff_status',"Staff Added successfully");
			}
    	catch(Exception $e) {
    			return redirect('get-staff')->with('staff_status',"operation failed");
    	}
        
    }
    
    /*
     * get single staff member Details
     *
    */
    public function single_staff(Request $request,$id)
    {   
        $Single_staffDetails = Staff::findOrFail($id);
       
        
            return view('user-view/listing-single-staff',['Single_staffDetails'=>$Single_staffDetails]);
       
    }
     /*
     * edit single staff member Details
     *
    */
    public function edit_staff(Request $request,$id)
    {   
            
            $Edit_staffDetails = Staff::findOrFail($id);
        $get_singlestaffService = DB::select('select * from staff_services');
            
        return view('user-view/edit-single-staff',['edit_staffDetails'=>$Edit_staffDetails,'get_singlestaffService'=>$get_singlestaffService]);
       
    }
    
     /*
     * edit single staff member Details
     *
    */
    public function delete_staff(Request $request)
    {   
        
         $edit_id = $request->input('edit_id');
        
         $deleted_staffRecord =  DB::table('staff')->where('id', $edit_id)->delete();
         
         if($deleted_staffRecord =true) {
             
             return 1;
         }
    }
    
    /*
     *  update single staff member Details
     *
    */
    public function update_staff(Request $request,$id)
    {       
           request()->validate([
     
            'description' =>'required',
            'first_name' =>'required',
            'last_name' =>'required',
            'dob' =>'required',
            'gender' =>'required',
            'position' =>'required',
            'contact_number' =>'required',
            'email_address' =>'email:rfc,dns',
            'home_address' =>'required',
            'city' =>'required',
            'state' =>'required',
            'country'=>'required',
            //'hourly_rate' =>'required',
            
        ]);
        
            
            $staff_image_upload = $request->file('staff_image_upload');
            
            if(!empty($staff_image_upload)) {
                
                $staffUpdate_image_upload =  date('YmdHis') . "." .$staff_image_upload->getClientOriginalName();
                $staff_image_upload->move(public_path('staff_images'), $staffUpdate_image_upload);
              
                
            } else {
                
                 $staffUpdate_image_upload   = $request->input('old_staff_image_upload');
                
            }
            
            
            $description = $request->input('description');
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $dob = $request->input('dob');
            $gender = $request->input('gender');
            $position = $request->input('position');
            $contact_number = $request->input('contact_number');
            $email_address = $request->input('email_address');
            $home_address = $request->input('home_address');
            $city = $request->input('city');
            $state = $request->input('state');
            $country = $request->input('country');
           // $hourly_rate = $request->input('hourly_rate');
            $vacationStaf_from = $request->input('vacationStaf_from');
            $vacationStaff_To = $request->input('vacationStaff_To');
            $staff_serviceCheckbox = $request->input('staff_service');
            
            if(!empty($staff_serviceCheckbox)) {
                
                $staff_serviceupdateCheckbox = implode(',',$request->input('staff_service'));
                
            } else {
                $staff_serviceupdateCheckbox = '';
                
            }
            $staff_avcolor = $request->input('staff_avcolor');
       
            
            
              try {
            
                $updateStaff = Staff::find($id);
                $updateStaff->image = $staffUpdate_image_upload;
                $updateStaff->description = $description;
                $updateStaff->first_name = $first_name;
                $updateStaff->last_name = $last_name;
                $updateStaff->gender = $gender;
                $updateStaff->position = $position;
                $updateStaff->contact_number = $contact_number;
                $updateStaff->email = $email_address;
                $updateStaff->city = $city;
                $updateStaff->state = $state;
                $updateStaff->country = $country;
               // $updateStaff->hourly_rate = $hourly_rate;
                $updateStaff->vacation_from = $vacationStaf_from;
                $updateStaff->vacation_to = $vacationStaff_To;
                $updateStaff->services_provided = $staff_serviceupdateCheckbox;
                $updateStaff->color = $staff_avcolor;
                $updateStaff->update();
                
            return redirect('get-staff')->with('update_staff_status',"Staff Updated successfully");
			}
    	catch(Exception $e) {
    			return redirect('get-staff')->with('staff_status',"operation failed");
    	}

                    
    }
    
}
