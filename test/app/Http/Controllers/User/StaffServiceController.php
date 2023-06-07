<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StaffService;

class StaffServiceController extends Controller
{
    
    public function index()
    {
        $get_staff_services = StaffService::where('status',1)->get(['*']);
                                                
        return view('user-view.listing-services',['get_staff_services_data'=> $get_staff_services]);
    }



    public function insert_service(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $title = $request->input('title');
        $identifier = str_replace(' ', '_', strtolower($title));
               
        $service_insert = new StaffService;
        $service_insert->title = $title;
        $service_insert->identifier = $identifier;
        $service_insert->save();
                           
        return redirect()->to('/service-list'); 

    }


    public function update_service(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $title = $request->title;
        $identifier = str_replace(' ', '_', strtolower($title));
               
        $service_edit = StaffService::where('id', $id)->update([

            'title' => $title,
            'identifier' => $identifier,
        ]);

        return response()->json([ 'success' => true ]);
    }


    public function get_service($id)
    {
    	$service = StaffService::find($id);

	    return response()->json([
	      'data' => $service
	    ]);
    }


    public function delete_service($id)
    {
    	$delete_service = StaffService::where('id', $id)->update([
    	    
    	        'status' => 0
    	    
    	    ]);

        return response()->json([ 'success' => true ]);
	   
    }
    
}
