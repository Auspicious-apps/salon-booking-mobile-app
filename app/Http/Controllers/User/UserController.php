<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Staff;
use App\Appointment;
use DB;
use App\StaffService;
use DateTime;
use App\Salon;
use Carbon\Carbon;


class UserController extends Controller
{
    public function index(Request $request)
    {   
     
        $userid = Auth::user()->id;
        $result = DB::table('users')
        ->join('appointments', 'users.id', '=', 'appointments.salon_id')
        ->join('salon_treatments', 'salon_treatments.id', '=', 'appointments.services_taken')

        ->select('users.saloon_name','appointments.start_time', 'appointments.end_time','users.saloon_name','appointments.total_cost','appointments.email','appointments.phone','salon_treatments.treatment_name','appointments.customer_id')
        ->Where('users.id',$userid)
        ->get();
        //echo "<pre>";
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
          $getSalon = Salon::where('salon_id',$userid)
        ->get();
        //echo "<pre>";
        // print_r($result);
        // die;
        
        //  $getSalon_Name= User::where('id',$userid)
        // ->first();
        
        // $getappointeddata = Appointment::where('salon_id',$userid)
        // ->Where('date',$current_Date)
        // ->get();
        //echo "<pre>";
        // print_r($result);
        // die;
        return view('user-view/dashboard',['getStaffMember'=>$getStaffMember,'result'=>$getSalon]);

    }


        /* sameer */
    public function saloon_date($date) {

        $date = date("Y-m-d", strtotime($date));
        
        $userid = Auth::user()->id;
        
        $result = DB::table('users')
        ->join('appointments', 'users.id', '=', 'appointments.salon_id')
        ->join('salon_treatments', 'salon_treatments.id', '=', 'appointments.services_taken')
         
        ->select('users.saloon_name','appointments.start_time', 'appointments.end_time','users.saloon_name','appointments.total_cost','appointments.email','appointments.phone','salon_treatments.treatment_name','appointments.customer_id')
        ->Where('users.id',$userid)
        ->get();


        $getStaffMember = Staff::where('salon_id',$userid)
             ->get();

               $getMember = Salon::where('salon_id',$userid)
             ->get();

        return view('user-view/user-view-date',['getStaffMember'=>$getStaffMember,'result'=>$getMember,'date'=>$date]);
    }

    /*
     * user setting changed password 
     *
    */

    public function user_setting(Request $request) {

            // $userid = Auth::user()->id;

            //  $validatedData = $request->validate([
            //     'current-password' => 'required',
            //     'new-password' => 'required|string|min:8|confirmed',
            // ]);
            
            // $updateUserSetting = DB::table('users')
            //   ->where('id', $userid)
            //   ->update(['password' => bcrypt($request->get('new-password')));


        //   $getUserId = User::where('id',$userid)
        //      ->first();
        //  print_r($getUserId->password);
        //  die;
        return view('user-view/usersetting-changed-password');     

    }

    public function sendchangedpassword_user_setting(Request $request) {


            $userid = Auth::user()->id;

            $get_changed_password = $request->get('new-password');

            $validatedData = $request->validate([
                'new-password' => 'required|string|min:8|confirmed',
            ]);
            
            $updateUserSetting = DB::table('users')
              ->where('id', $userid)
              ->update(['password' => bcrypt($get_changed_password)]);

            /*
             * confirmation email sent 
             *
            */

            $getuserseEmail = DB::table('users')
              ->where('id', $userid)
              ->first();


            $send_confirmpassword = [
                'title' => 'Information of changed password',
                'body' => 'Your password is:'.$get_changed_password
                ];
                
            \Mail::to($getuserseEmail->email)->send(new \App\Mail\Sentchangedpassworduser($send_confirmpassword));

            /*
             * end
             * 
            */

        return redirect()->back()->with("success","Password successfully changed! The password is also sent to your email!");


    }

    /*
     * new appointment
     *
    */ 

    public function salon_new_appointment(Request $request) {

        $userid = Auth::user()->id;

        $getservice_appointment = StaffService::where('salon_id',$userid)
             ->get();

        $getstaff_appointment = Staff::where('salon_id',$userid)
             ->get();

        return view('user-view/user-new-appointment-view',['getservice_appointment'=>$getservice_appointment,'getstaff_appointment'=>$getstaff_appointment]);   
    
    }


    /*
     * change categories on based  on gender 
     *
    */

    public function get_selectedCategoriesGender(Request $request) { 


            $checkselectedvalue= $request->get('checkselectedvalue');

              $userid = Auth::user()->id;


                $getservcies  = DB::table('salon_treatments')
              ->where('salon_id', $userid)
               ->where('treatment_category', $checkselectedvalue)
              ->get(['treatment_name','treatment_rate','id']);


                    return response()->json([
                    'getservcies' => $getservcies
                    ]);
        }


        /*
     * change categories on based  on price
     *
    */

    public function get_selectedCategoriesPrice(Request $request) { 


            $checkselectedeprice= $request->get('checkselectedeprice');

                $getservciesprice  = DB::table('salon_treatments')
              ->where('id', $checkselectedeprice)
              ->get(['treatment_rate']);


                return response()->json([
                'getservciesPrice' => $getservciesprice
                ]);
        }


    /*
    *  post appointment data
    *
    */

    public function post_newAppointment(Request $request) {


         $request->validate([
              //  'newappointment_calender' => 'required',
                'hidden_selected_appointment_time' =>'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'contact_number' => 'required',
                'email' => 'required|email:rfc,dns',
                'selectServiceCategories' =>'required',
                'post_price' =>'required',
                'selectedstaffMember' =>'required',
            ]);


            $userid = Auth::user()->id;

            $newappointment_calender= $request->get('appointment_calender');
           // $appointment_time= preg_replace('/\s*:\s*/', ':', $request->get('appointment_time'));

             $new_appointment_time = $request->get('hidden_selected_appointment_time');
       
           
            
            //$new_appointment_time = date("H:i:s", strtotime($appointment_time));


            $selectedstaffMember = $request->get('selectedstaffMember');

            $appointment_service_taken = $request->get('appointment_service');

            $price = $request->get('post_price');

            $email = $request->get('email');

            $contact_number = $request->get('contact_number');

            $first_name = $request->get('first_name');

            $last_name = $request->get('last_name');

            

                
        $data = array('date'=>$newappointment_calender,"salon_id"=>$userid,'staff_id'=>$selectedstaffMember,'start_time'=>$new_appointment_time,'services_taken'=>$appointment_service_taken,'total_cost'=>$price,'email'=>$email,'phone'=>$contact_number,'first_name'=>$first_name,'last_name'=>$last_name);

            DB::table('appointments')->insert($data);

            if($data=true) {


                    return redirect('salon-new-appointment')->with('new_appointment_saved', 'New Appointment is saved successfully!!');

            


            } else {

            echo "error";
            }


    }



    /*
     * new appointment slot booking
     *
    */

    public function get_slot_booking(Request $request) {

        $saloon_id = Auth::user()->id;        
        $date = $request->get('get_calender_Date');

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
            
          $slots = $this->getTimeSlot(30, $open_time, $close_time,$booked_time);
          $data= $slots; 
          //$data[1]['booked_slots'] = $booked_time; 
          return response()->json(['payload'=>$data,'date'=>$date]);
        }else{
          return "Saloon not working on ".$day;
        }


    }


    function getTimeSlot($sometimeOut, $start, $end,$booked_time)
    {
        $start = new DateTime($start);
        $end = new DateTime($end);
        $BeginTimeStemp = $start->format('H:i:s'); // Get time Format in Hour and minutes
        $lastTimeStemp = $end->format('H:i:s');
        $i=0;
        $data = '';
        $all_slots = array();
        while(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)) {
            $start = $BeginTimeStemp;
            $end = date('H:i:s',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
            $BeginTimeStemp = date('H:i:s',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
            $i++;
            if(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)) {
                if (!in_array($start, $booked_time)) {
                    
                    
                 $time['start_time'] = $start;
                 $time['end_time'] = $end;
                 $time['is_booked'] =false;
                 $finaltime = date("g:i a", strtotime($start));
                 array_push($all_slots,$time);
                } else {
                    
                        
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
}
