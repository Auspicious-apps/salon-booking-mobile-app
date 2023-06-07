<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserAppointment;
use Auth;
use App\User;
use App\Staff;
use App\StaffService;
use DateTime;
use DB;
use Carbon\Carbon;
use App\Salon;

class AppointmentController extends Controller
{
    public function  index(Request $request) {

    	$userId = Auth::user()->id;
	   
		$getApointmentUserDetails = UserAppointment::where('salon_id',$userId)->where('status',1)->orderBy('date', 'DESC')
        ->get();
        
        return view('user-view/appointment-view',['getApointmentUserDetails'=>$getApointmentUserDetails]);

    }


    /*
     * edit dashbaord appointment listing
     *
    */

    public function dashboard_appointment(Request $request, $id) {


        $saloon_id = Auth::user()->id;

        $editApointmentUserDetails = UserAppointment::where('id',$id)
        ->first();

        /* get booking timing */

        $date = $editApointmentUserDetails->start_time;

        $db_date = $editApointmentUserDetails->date;
        
        $day = Carbon::parse($date)->format('l');
        $getmydata = Salon::where('salon_id',$saloon_id)->first();
        $myworking_days = explode(',',$getmydata->week_day);

        $data = array();

         $booked_slot= DB::table('appointments')->where('date',$date)
        ->where('salon_id',$saloon_id)
        ->get(['start_time']);

         
         $booked_time=array();

         if($booked_slot) {
                foreach($booked_slot as $booked_slots) {
                    array_push($booked_time, $booked_slots->start_time);
                }
            }

        if (in_array($day, $myworking_days)){
            $open_time   = $getmydata->opening_timing;
         
            $close_time  = $getmydata->closing_timing;
            
             $break_start_time   = $getmydata->break_start_time;
         
            $break_end_time  = $getmydata->break_close_time;

              $slots = $this->getTimeSlot(30, $open_time, $close_time,$break_start_time,$break_end_time,$booked_time);

              $time_slot_data = $slots; 
             // print_r($time_slot_data);
             // die;

        }else {

            $data = "Saloon not working on ".$day;
        }


        /*  end */

    	return view('user-view/edit-dashbaord-appointment-view',['editApointmentUserDetails'=>$editApointmentUserDetails,'time_slot_data'=>$time_slot_data,'selected_date'=>$date,'db_date'=>$db_date]);

    }

    /*
     * edit app appointment listing
     *
    */

    public function edit_app_appointment(Request $request,$userid,$appointment_id) {

        $edit_app_UserDetails = User::where('id',$userid)
        ->first();
        // echo "<pre>";
        // print_r($edit_app_UserDetails->first_name);
        // die;

        $edit_appointment_details = UserAppointment::where('id',$appointment_id)
        ->first();

        $saloon_id = Auth::user()->id;


        /* get booking timing */

        $date = $edit_appointment_details->start_time;

        $db_date = $edit_appointment_details->date;



        // echo "<pre>";
        // print_r($db_date);
        // die;
        
        $day = Carbon::parse($date)->format('l');
        $getmydata = Salon::where('salon_id',$saloon_id)->first();
        $myworking_days = explode(',',$getmydata->week_day);

        $data = array();

         $booked_slot = DB::table('appointments')->where('date',$date)
        ->where('salon_id',$saloon_id)
        ->get(['start_time']);

         
         $booked_time=array();

         if($booked_slot) {
                foreach($booked_slot as $booked_slots) {
                    array_push($booked_time, $booked_slots->start_time);
                }
            }

        if (in_array($day, $myworking_days)) {
            $open_time   = $getmydata->opening_timing;
         
            $close_time  = $getmydata->closing_timing;

            $break_start_time   = $getmydata->break_start_time;
         
            $break_end_time  = $getmydata->break_close_time;
            
              $slots = $this->getTimeSlot(30, $open_time, $close_time,$break_start_time,
                $break_end_time,$booked_time);
              $time_slot_data = $slots; 

        } else {

            $data = "Saloon not working on ".$day;
        }


        /*  end */
            
            return view('user-view/edit-app-appointment-view',['edit_app_UserDetails'=>$edit_app_UserDetails,'edit_appointment_details'=>$edit_appointment_details,'time_slot_data'=>$time_slot_data,'selected_date'=>$date,'db_date'=>$db_date]);

    }


     /*
     * post edit field 
     *
    */

    public function post_edit_appointment_form(Request $request) {

            request()->validate([
                'first_name' =>'required',
                'last_name' =>'required',
                'appointment_date' =>'required',
                'total_cost' =>'required',
                'email' =>'email:rfc,dns',
                'phone' =>'required',    
            ]);

             $id  = $request->input('edit_appointment_id');
             $first_name =  $request->input('first_name');
             $last_name =  $request->input('last_name');
             $appointment_date =  $request->input('appointment_date');
             $appointment_time =  $request->input('hidden_selected_appointment_time');

             $total_cost =  $request->input('total_cost');
             $email =  $request->input('email');
             $phone =  $request->input('phone');

            $edit_appointment_Data  = DB::table('appointments')
              ->where('id', $id)
              ->update(['first_name' => $first_name,'last_name'=>$last_name,'date'=>$appointment_date,'start_time'=>$appointment_time,'total_cost'=>$total_cost,'email'=>$email,'phone'=>$phone]);

            return redirect('/view-appointment')->with('edit_status_appointment','Your data has been updated!');
   

    }


         /*
     * post edit field 
     *
    */

    public function post_edit_app_appointment_form(Request $request) {

            request()->validate([
                'first_name' =>'required',
                'last_name' =>'required',
                'app_appointment_date' =>'required',
                'total_cost' =>'required',
                'email' =>'email:rfc,dns',
                'phone' =>'required',    
            ]);


             $edit_userDetails_id  = $request->input('edit_userDetails_id');
             $edit_appointment_id  = $request->input('edit_appointment_id');



             $first_name =  $request->input('first_name');
             $last_name =  $request->input('last_name');



             $appointment_date =  $request->input('app_appointment_date');
             $appointment_time =  $request->input('hidden_selected_appointment_time');

             $total_cost =  $request->input('total_cost');
             $email =  $request->input('email');
             $phone =  $request->input('phone');


        $edit_appointment_Data  = DB::table('users')
          ->where('id', $edit_userDetails_id)
          ->update(['first_name' => $first_name,'last_name'=>$last_name]);


            $edit_appointment_Data  = DB::table('appointments')
          ->where('id', $edit_appointment_id)
          ->update(['start_time'=>$appointment_time,'date'=>$appointment_date,'total_cost'=>$total_cost,'email'=>$email,'phone'=>$phone]);


        return redirect('/view-appointment')->with('edit_app_status_appointment','Your data has been updated!');
   

    }






    /*
     * new appointment slot booking
     *
    */

    public function get_edit_dasbhoard_appointment_data(Request $request) {

        $saloon_id = Auth::user()->id;        
       $date = $request->get('get_edit_dashboard_appointment');

        $day = Carbon::parse($date)->format('l');


        $getmydata = Salon::where('salon_id',$saloon_id)->first();
        $myworking_days = explode(',',$getmydata->week_day);
      
        $data = array();
                        
        $booked_slot= DB::table('appointments')->where('date',$date)
        ->where('salon_id',$saloon_id)
        ->get(['start_time']);
        
        $booked_time=array();
            if($booked_slot){
                foreach($booked_slot as $booked_slots) {
                    array_push($booked_time, $booked_slots->start_time);
                }
            }
        
             
        if (in_array($day, $myworking_days)){
          $open_time   = $getmydata->opening_timing;
         
          $close_time  = $getmydata->closing_timing;

          $break_start_time   = $getmydata->break_start_time;
         
            $break_end_time  = $getmydata->break_close_time;
            
          $slots = $this->getTimeSlot(30, $open_time, $close_time,$break_start_time,
            $break_end_time,$booked_time);
          $data= $slots; 
          //$data[1]['booked_slots'] = $booked_time; 
          return response()->json(['payload'=>$data,'date'=>$date]);
        }else{
          return "Saloon not working on ".$day;
        }


    }


    function getTimeSlot($sometimeOut, $start, $end,$brk_start, $brk_end,$booked_time)
    {
        $start = new DateTime($start);
        $end = new DateTime($end);

        $bk_start = new DateTime($brk_start);
        $bk_end = new DateTime($brk_end);

        $BeginTimeStemp = $start->format('H:i:s'); // Get time Format in Hour and minutes
        $lastTimeStemp = $end->format('H:i:s');

        $BeginBreakTimeStemp = $bk_start->format('H:i:s'); // Get time Format in Hour and minutes
        $lastBreakTimeStemp = $bk_end->format('H:i:s');

        $break_slots = array();

        while(strtotime($BeginBreakTimeStemp) < strtotime($lastBreakTimeStemp)) {

            $bstart = $BeginBreakTimeStemp;
            $bend = date('H:i:s',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginBreakTimeStemp)));
            $BeginBreakTimeStemp = date('H:i:s',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginBreakTimeStemp)));
            array_push($break_slots,$bstart);
        }
         
         $i=0;
        $data = '';
        $all_slots = array();
        while(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)) {
            $start = $BeginTimeStemp;
            $end = date('H:i:s',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
            $BeginTimeStemp = date('H:i:s',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
            $i++;
           
            if(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)) {

                if (in_array($start, $break_slots)) 
                {
                    $time['start_time'] = $start;
                    $time['end_time'] = $end;
                    $time['is_booked'] =true;
                    $finaltime = date("g:i a", strtotime($start));
                    array_push($all_slots,$time);
                    
                }
                elseif (!in_array($start, $booked_time)) {
            
                    $time['start_time'] = $start;
                    $time['end_time'] = $end;
                    $time['is_booked'] =false;
                    $finaltime = date("g:i a", strtotime($start));
                    array_push($all_slots,$time);
                                 
                }                
                else {             
                        
                 $time['start_time'] = $start;
                 $time['end_time'] = $end;
                 $time['is_booked'] =true;
                 $finaltime = date("g:i a", strtotime($start));
                 array_push($all_slots,$time);
                }
                
                //$time[$i]['end'] = $end;
            }
        }
        return $all_slots;
    }

    /*
     * 
     * 
    */

    public function get_rejected_appointment(Request $request) {

            $userId = Auth::user()->id;

            $getRejectedApointmentUserDetails = UserAppointment::where('salon_id',$userId)->where('status',0)
            ->get();

            return view('user-view.rejected-view-appointment',['getApointmentUserDetails'=>$getRejectedApointmentUserDetails]);

    }

    /*
     * 
     *  cancel appointemt of dashboard recored
    */

    public function cancel_appointment_record(Request $request) {


        $dashbaord_appointment_id  = $request->input('dashbaord_appointment_id');

        
        $update_dasbhoard_appointment  = DB::table('appointments')
        ->where('id', $dashbaord_appointment_id)
        ->update(['status' => 0]);

        if($update_dasbhoard_appointment=true) {

            return 1;
        } else {

            return 0;
        }


    }


     /*
     * 
     *  cancel appointemt of app recored
    */

    public function cancel_appointment_app_record(Request $request) {


        $app_appointment_id  = $request->input('app_appointment_id');

        
        $update_app_appointment  = DB::table('appointments')
        ->where('id', $app_appointment_id)
        ->update(['status' => 0]);

        if($update_app_appointment=true) {

            return 1;
        } else {

            return 0;
        }


    }


}

