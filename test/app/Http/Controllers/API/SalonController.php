<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalonType;
use App\Salon;
use App\Staff;
use App\User;


class SalonController extends Controller
{
    
    public function get_salon_types(Request $request)
    {
        
        $result = SalonType::get(['id','title']);    
        
        if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Salon Type Fetched';
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
    
    
    public function get_salons(Request $request)
    {
       $query = $request->input('query');
       
       $salons = Salon::get(['*']);
        
        if(isset($query) && $query != null && $query != '')
        {
           $salons = Salon::where('salon_name', 'LIKE', "%$query%") 
            ->orWhere('city', 'LIKE', "%$query%")->get(['*']); 
        }
        
        $result = $salons;
           
        if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Salon Data Fetched';
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
    
    public function get_salon_by_type(Request $request, $id)
    {
        $result = Salon::where('salon_type','LIKE', "%$id%")->get(['*']);
        
        $salon_type = SalonType::where('id',$id)->get(['title']);
        
        $salon_type = $salon_type[0]->title;
        
        if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Salon Data Fetched';
            $data['salon_type']     =   $salon_type;
            $data['data']           =   $result;  
        }
    	else
    	{
    		$data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'No Data Found';
            $data['salon_type']     =   $salon_type;
            $data['data']           =   [];  
    	}
        return $data;
        
    }
    
    
    public function get_salon_detail(Request $request, $id)
    {
        $result = Salon::where('salon_id',$id)->get(['*']);
        
        if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Salon Data Fetched';
            $data['data']           =   $result;  
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
    
    
    public function get_salon_by_staff(Request $request, $id)
    {
        $result = Staff::where('salon_id',$id)->get(['id','first_name','last_name','image']);
        
        if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Barbers Fetched';
            $data['data']           =   $result;  
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
    
    public function get_user_detail(Request $request, $id)
    {
        $result = User::where('id',$id)->get(['*']);
        
        if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'User Data Fetched';
            $data['data']           =   $result;  
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
