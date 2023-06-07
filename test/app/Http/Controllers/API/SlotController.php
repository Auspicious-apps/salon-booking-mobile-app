<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Salon;
use App\Appointment;
use DateTime;
use DB;

class SlotController extends Controller
{
    public function slots()
    {   
        $saloon_id = 12;
	    $date = "2022-07-04";
	    $day = Carbon::parse($date)->format('l');
	 
	    $getmydata = Salon::where('salon_id',$saloon_id)->first();
	    $myworking_days = explode(',',$getmydata->week_day);
	  
	    $data = array();
	                    
        $booked_slot= DB::table('appointments')->where('booking_date',$date)->where('status',1)->get(['booking_time']);
        
       
      
            $booked_time=array();
            if($booked_slot){
                foreach($booked_slot as $booked_slots){
                    array_push($booked_time, $booked_slots->booking_time);
                }
            }
        
             
	    if (in_array($day, $myworking_days)){
		  $open_time   = $getmydata->opening_timing;
		 
		  $close_time  = $getmydata->closing_timing;
            
		  $slots = $this->getTimeSlot(30, $open_time, $close_time,$booked_time);
		  $data[0]['slots'] = $slots; 
		  $data[1]['booked_slots'] = $booked_time; 
		  return response()->json(['status'=>true,'message'=>'Working time and booked slots.','payload'=>$data]);
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
        while(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)){
            $start = $BeginTimeStemp;
            $end = date('H:i:s',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
            $BeginTimeStemp = date('H:i:s',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
            $i++;
            if(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)){
                if (!in_array($start, $booked_time)){
                 $time[$i]['start'] = $start;
                 $finaltime = date("g:i a", strtotime($start));
                 array_push($all_slots, $start );
                }
                
                //$time[$i]['end'] = $end;
            }
        }
        return $all_slots;
    }
}
