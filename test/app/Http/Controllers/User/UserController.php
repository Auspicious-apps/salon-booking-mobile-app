<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Staff;
use App\Appointment;
use DB;


class UserController extends Controller
{
    public function index()
    {   
        
        
        $userid = Auth::user()->id;
        
        $result = DB::table('users')
        ->join('appointments', 'users.id', '=', 'appointments.salon_id')
         ->join('salon_treatments', 'salon_treatments.id', '=', 'appointments.services_taken')
         
        ->select('users.saloon_name','appointments.start_time', 'appointments.end_time','users.saloon_name','appointments.total_cost','appointments.email','appointments.phone','salon_treatments.treatment_name','appointments.customer_id')
        ->Where('users.id',$userid)
        ->get();
        //   echo "<pre>";
        // print_r($result);
        // die;
            
       
            
            
        // $result = Appointment::where('salon_id',$userid)->get(['id','date','salon_id','staff_id','start_time','end_time','services_taken','total_cost','customer_note']);
        
        // echo "<pre>";
        // print_r($result);
        // die;
        // $current_Date = date("Y-m-d");
        // $userid = Auth::user()->id;
        
          $getStaffMember = Staff::where('salon_id',$userid)
             ->get();
        
        //  $getSalon_Name= User::where('id',$userid)
        // ->first();
        
        // $getappointeddata = Appointment::where('salon_id',$userid)
        // ->Where('date',$current_Date)
        // ->get();
       
        return view('user-view/dashboard',['getStaffMember'=>$getStaffMember,'result'=>$result]);

    }
}
