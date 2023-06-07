<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalonType;
use App\Salon;
use App\Staff;
use App\SalonTreatment;
use App\User;
use DB;


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

       $salons = Salon::where('status',1)->get(['*']);            
      
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
        
        $result = Salon::where('status',1)->where('salon_type','LIKE', "%$id%")->get(['*']);
        
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
    
    
    public function get_salon_by_multitype(Request $request)
    {
        $query = $request->input('query');
        
        $query = explode(',',$query);
        
        $ids_array = [];
        
        $salon_type = [];
        
        
        for($i=0;$i<count($query);$i++)
        {

            $salon_status = DB::table('salons')
                             ->where('status',1)
                             ->where('salon_type','LIKE',"%$query[$i]%")->count();
            
            if($salon_status > 0)
            {    

                $ids = Salon::where('status',1)
                          ->where('salon_type','LIKE',"%$query[$i]%")
                          ->get(['salon_id']);
                
                for($j=0;$j<count($ids);$j++)
                {
                    $idsal = $ids[$j]->salon_id;
                    $ids_array[] = $idsal;
                }
            }
        }
        

        $result = Salon::where('status',1)->whereIn('salon_id', $ids_array)->get(['*']);
        
        $salon_types = SalonType::whereIn('id',$query)->get(['title']);
        
        for($k=0;$k<count($query);$k++)
        {
            $s_type = $salon_types[$k]->title;
            
            $salon_type[] = $s_type;
        }
        
        $salon_type = implode(',',$salon_type);
        
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
            //$data['salon_type']     =   $salon_type;
            $data['data']           =   [];  
    	}
        return $data;
        
    }
    
    
    public function get_salon_detail(Request $request, $id)
    {
        $result = Salon::where('status',1)->where('salon_id',$id)->get(['*']);

        
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

    public function get_salon_treatment_staff(Request $request)
    {
        
        $salon_id = $request->input('salon_id');
        $treatment_id = $request->input('treatment_id');


        $result = SalonTreatment::where('salon_id',$salon_id)->where('id',$treatment_id)->get(['staff_member_id']);
        
        if(sizeof($result)>0)
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
    
    
    
    
    
}
