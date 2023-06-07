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
    public function slots(Request $request)
    {   
    
        $saloon_id = $request->input('salon_id');
	    $date = $request->input('date');

	    $day = Carbon::parse($date)->format('l');
	    
	    $getmydata = Salon::where('salon_id',$saloon_id)->first();
        
	    $myworking_days = explode(',',$getmydata->week_day);
	  
	    $data = array();
	                    
        $booked_slot= DB::table('appointments')->where('date',$date)
            ->where('salon_id',$saloon_id)->where('status',1)
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

              $slots = $this->getTimeSlot(30, $open_time, $close_time,$break_start_time,$break_end_time,$booked_time);

		  $data[0]['slots'] = $slots; 
          
		  //$data[1]['booked_slots'] = $booked_time; 
		  return response()->json(['status'=>true,'message'=>'Working time and booked slots.','payload'=>$data]);
		}else{
		  return "Saloon not working on ".$day;
		}
    }
    function getTimeSlot($sometimeOut, $start, $end,$break_start, $break_end,$booked_time)
    {
        $start = new DateTime($start);
        $end = new DateTime($end);

        $brk_start = new DateTime($break_start);
        $brk_end = new DateTime($break_end);


        $BeginTimeStemp = $start->format('H:i:s'); // Get time Format in Hour and minutes
        $lastTimeStemp = $end->format('H:i:s');

        $BeginBreakTimeStemp = $brk_start->format('H:i:s'); // Get time Format in Hour and minutes
        $lastBreakTimeStemp = $brk_end->format('H:i:s');

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
