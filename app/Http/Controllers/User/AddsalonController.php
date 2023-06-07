<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Salon;
use App\Staff;
use App\WeekDay;
use App\SalonTreatment;
use DB;
use App\SalonType;
class AddsalonController extends Controller
{
    
    /*
     *  Get Salon Details
     *
    */
    
    public function get_salon(Request $request)
    {   
        $userid = Auth::user()->id;
       
        $getDetailsUser = User::where('id',$userid)
        ->first();
        
        $getSalonUserDetails = Salon::where('salon_id',$userid)
        ->first();
        
        $getSalonTreatment = SalonTreatment::where('salon_id',$userid)
        ->get();
        // die($getSalonTreatment);
        $getStaffmember = Staff::where('salon_id',$userid)
        ->get();
        //die($getStaffmember);
        
        return view('user-view/view-saloon-Spa',['getDetailsUser'=>$getDetailsUser,'getSalonUserDetails'=>$getSalonUserDetails,'getSalonTreatment'=>$getSalonTreatment,'getStaffmember'=>$getStaffmember]);
    }
    
    
     public function add_salon(Request $request)
    {   
        $userid = Auth::user()->id;
        $editSaloon = User::where('id',$userid)
        ->first();
      
        
         $editSalonUserDetails = Salon::where('salon_id',$userid)
        ->first();
          //die($editSalonUserDetails);
         $salon_types = SalonType::get();
        
        return view('user-view/add-salon',['editSaloon'=>$editSaloon,'editSalonUserDetails'=>$editSalonUserDetails,'get_salon_types'=>$salon_types]);
    }
    
    /*
     *  Send Salon Data
     *
    */
    public function send_salonData(Request $request)
    {  
            
        request()->validate([
            'description' =>'required',
            'salon_name' =>'required',
            'address' =>'required',
            'city' =>'required',
            'zipcode' =>'required',
            'opening_time' =>'required',
            'closing_time' =>'required',
            // 'break_start_time' =>'required',
            // 'break_close_time' =>'required',
            'email' =>'email:rfc,dns',
            'latitude' =>'required',
            'longitude' =>'required',
            'phone' =>'required',
        
        ]);
        
        $saloontype_id = Auth::user()->id;
        
        
        $old_saloonImage = $request->input('old_saloonImage');
      
      
        if(!empty($old_saloonImage)) {
            
             $saloon_imagesAll  =  implode(",",$old_saloonImage);
            
        }  else {
            
            $saloon_imagesAll='';
        }
        
       
        
           if($request->hasfile('salon_image_upload')) {
                 $data =array();
                    foreach($request->file('salon_image_upload') as $file) {
                        $name = microtime(true).$file->extension();
                        $path = $file->move(public_path('salon_images/saloon_imagesAll'), $name);
                        $data[] = $name;  
                        
                          $finaldata = implode(",",$data);

            }

         } else {
             
             $finaldata  ='';
                
             
         }
         
          
        if(empty($saloon_imagesAll)) {
            
                $finalUpload_image  =$finaldata;
        } else if(empty($finaldata)) {
            
                $finalUpload_image = $saloon_imagesAll;
        } else {
            
                $finalUpload_image  = $saloon_imagesAll.','.$finaldata;
        }
    
       
        
        $udpateSaloonId = $request->input('saloon_update_id');
        
        $description = $request->input('description');
        $salon_name = $request->input('salon_name');
        
        $ALLsalon_type = implode(',',$request->input('ALLsalon_type'));
        
        $address = $request->input('address');
        $city = $request->input('city');
        $zipcode = $request->input('zipcode');
        $opening_timing = $request->input('opening_time');
        $closing_time = $request->input('closing_time');
         $break_start_time = $request->input('break_start_time');
        $break_close_time = $request->input('break_close_time');
        $weekendSaloon = implode(',',$request->input('weekendSaloon'));
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        
        $email = $request->input('email');
        $phone = $request->input('phone');
      
        
        try{
                
            $checkIdSaloon =  Salon::where('salon_id',$udpateSaloonId)->first();
                
              
            
          
                
                if(!empty($checkIdSaloon->id)) {
                
                $final_checked_id = $checkIdSaloon->id;
            
                        
            
                    Salon::where('salon_id', $udpateSaloonId)
                    ->update([  
                    'description' => $description,
                    'salon_name' =>$salon_name,
                    'salon_type' =>$ALLsalon_type,
                    'address' => $address,
                    'city' => $city,
                    'zipcode' => $zipcode,
                    'opening_timing' => $opening_timing,
                    'closing_timing' =>$closing_time,
                    'break_start_time' => $break_start_time,
                    'break_close_time' =>$break_close_time,
                    'week_day' => $weekendSaloon,
                    'latitude'=>$latitude,
                    'longitude'=>$longitude,
                    'email' => $email,
                    'phone' =>$phone,
                    'image' => $finalUpload_image,
                ]);
                
                
                 WeekDay::where('saloon_id', $udpateSaloonId)
                    ->update([  
                    'week_days' => $weekendSaloon
                ]);
    
            return redirect('add-salon')->with('salon_status',"Salon Added successfully");
            
                } else {
                    
                        
                      
                    $Add_salon = new Salon;
                    $Add_salon->description = $description;
                    $Add_salon->salon_id = $saloontype_id;
                    $Add_salon->salon_name = $salon_name;
                    $Add_salon->salon_type = $ALLsalon_type;
                    $Add_salon->address =$address;
                    $Add_salon->city = $city;
                    $Add_salon->zipcode = $zipcode;
                    $Add_salon->opening_timing = $opening_timing;
                    $Add_salon->closing_timing = $closing_time;
                     $Add_salon->break_start_time = $break_start_time;
                    $Add_salon->break_close_time = $break_close_time;
                    $Add_salon->week_day = $weekendSaloon;
                    $Add_salon->latitude = $latitude;
                    $Add_salon->longitude = $longitude;
                    $Add_salon->email = $email;
                    $Add_salon->phone = $phone;
                    $Add_salon->image = $finalUpload_image;
                    
                    $Add_salon->save();
                    
                    
                    $WeekDay = new WeekDay;
                    $WeekDay->saloon_id = $saloontype_id;
                    $WeekDay->week_days = $weekendSaloon;
                    $WeekDay->status = 0;
                    
                    $WeekDay->save();
                    
                    return redirect('add-salon')->with('salon_status',"Salon Added successfully");
                    
                }
            
			}
    	catch(Exception $e) {
    			return redirect('add-salon')->with('salon_status',"operation failed");
    	}
       
        
    }
    
}
