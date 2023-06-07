<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wishlist;

class WishlistController extends Controller
{
    public function add_favourite(Request $request)
    {
        
        $salon_id = $request->input('salon_id');
        $user_id = $request->input('user_id');
        
        $favourite_status = Wishlist::where('user_id',$user_id)->where('salon_id',$salon_id)->count();
        
        if($favourite_status > 0)
        {
            $result = Wishlist::where('user_id',$user_id)->where('salon_id',$salon_id)->delete();
            
           
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Salon has been removed from favourites';
            return $data;
        }
        else
        {
            $insert_favourite = new Wishlist;
        
            $insert_favourite->salon_id = $salon_id;
            $insert_favourite->user_id = $user_id;
            $insert_favourite->status = 1;
            $insert_favourite->save();
            
            if($insert_favourite)
            {
                $data['status_code']    =   1;
                $data['status_text']    =   'Success';             
                $data['message']        =   'Salon has been added in favourites';
            }
           
           return $data; 
            
        }
    }
    
    
    public function get_favourites(Request $request, $id)
    {
        
        $result = Wishlist::where('user_id',$id)->get(['id','salon_id','user_id']);
        
        if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Favourites Data Fetched';
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
