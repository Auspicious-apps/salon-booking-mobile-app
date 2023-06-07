<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController extends Controller
{
    public function create_appointment(Request $request)
    {
        
        $date = $request->input('date');
        $salon_id = $request->input('salon_id');
        $customer_id = $request->input('customer_id');
        $staff_id = $request->input('staff_id');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $services_taken = $request->input('services_taken');
        $total_cost = $request->input('total_cost');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $customer_note = $request->input('customer_note');
        
        
        $insert_appointment = new Appointment;
        $insert_appointment->date = $date;
        $insert_appointment->salon_id = $salon_id;
        $insert_appointment->customer_id = $customer_id;
        $insert_appointment->staff_id = $staff_id;
        $insert_appointment->start_time = $start_time;
        $insert_appointment->end_time = $end_time;
        $insert_appointment->services_taken = $services_taken;
        $insert_appointment->total_cost = $total_cost;
        $insert_appointment->email = $email;
        $insert_appointment->phone = $phone;
        $insert_appointment->customer_note = $customer_note;
        $insert_appointment->status = 1;
        $insert_appointment->save();
        
        if($insert_appointment)
        {
            $data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Your booking has been confirmed';
        }
        else
        {
            $data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'Your booking has not confirmed';
        }
        return $data;
    }
    
    
    public function get_appointments(Request $request,$id)
    {
         $query = $request->input('query');
        
        if(isset($query) && $query != null && $query != '')
        {
          
            if($query == 'upcoming')
            {
               
               $appointments = Appointment::where('date', '>', date('Y-m-d'))->where('customer_id',$id)->where('status',1)->get(['id','date','salon_id','start_time','end_time','services_taken','total_cost']);
               
            }
            
            if($query == 'previous')
            {
               
               $appointments = Appointment::where('date', '<', date('Y-m-d'))->where('customer_id',$id)->where('status',1)->get(['id','date','salon_id','start_time','end_time','services_taken','total_cost']);
               
            }
           
        }
        else
        {
              $appointments = Appointment::where('date', '=', date('Y-m-d'))->where('customer_id',$id)->where('status',1)->get(['id','date','salon_id','start_time','end_time','services_taken','total_cost']);
    
        }
        
        $result = $appointments;
           
        if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Appointment Data Fetched';
            $data['data']      =         $result;  
        }
    	else
    	{
    		$data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'No Data Found';
            $data['data']           =   [];  
    	}
        return $data;
    }
    
    
    public function cancel_appointment(Request $request, $id)
    {
        
        $appointment = Appointment::where('id',$id)->delete();
        
        if($appointment)
        {
            $data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Your booking has been cancelled';
        }
        else
        {
            $data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'Your booking has not cancelled';
        }
        return $data;
        
    }
    
    public function appointment_detail(Request $request, $id)
    {
        
        $result = Appointment::where('id',$id)->get(['id','date','salon_id','staff_id','start_time','end_time','services_taken','total_cost','customer_note']);
        
        if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Appointment Data Fetched';
            $data['data']      =         $result;  
        }
    	else
    	{
    		$data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'No Data Found';
            $data['data']           =   [];  
    	}
        return $data;
        
    }
}
