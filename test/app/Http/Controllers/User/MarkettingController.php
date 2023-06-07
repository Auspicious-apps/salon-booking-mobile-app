<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\FacebookMarketing;
use PDF;

class MarkettingController extends Controller
{
    
    public function index(Request $request) {
        
        $user_id = Auth::user()->id;
        $get_marketing_data = FacebookMarketing::where('salon_id',$user_id)
              ->get();

              
        return view('user-view/user-marketting-view',['get_marketing_data'=>$get_marketing_data]);
        
    }
    
    public function marketting_pdf_download($userid) {
        
           
        $user_id = Auth::user()->id;
         $getMarkettingSingleDAta = FacebookMarketing::where('salon_id',$user_id)
        ->first();
    
    
        $pdf = PDF::loadView('pdf', compact('getMarkettingSingleDAta'));
        
        return $pdf->download('pdf_file.pdf');
        
    }
    
     public function add_facebook_marketing(Request $request) {
        
            
       return view('user-view/user-facebook-marketting-view');
        
    }
    
     public function send_add_facebook_data(Request $request) {
     
        request()->validate([
            'title' =>'required',
            'dimension' =>'required',
            'description' =>'required',
            'choseimage' =>'required',
            'marketing' =>'required'
        ]);
        
        $user_id = Auth::user()->id;
        
        $title = $request->input('title');
        $dimension = $request->input('dimension');
        $description = $request->input('description');
        
        $get_facebook_img = $request->file('choseimage');
        $facebook_img_name = microtime(true).$get_facebook_img->extension();
        $facebook_path = $get_facebook_img->move(public_path('facebook_marketting_images'), $facebook_img_name);
        
        $marketing_title = $request->input('marketing');
        
        
        try {
            
            $Add_salon = new FacebookMarketing;
            $Add_salon->title = $title;
            $Add_salon->dimension = $dimension;
            $Add_salon->description = $description;
            $Add_salon->facebook_image = $facebook_img_name;
            $Add_salon->salon_id = $user_id;
            $Add_salon->marketingtitle = $marketing_title;
            
            $Add_salon->save();
            return redirect('user-marketing')->with('facebook_marketing_Status',"Added Successfully!");
            
        } 
        catch(Exception $e) {
    			return redirect('user-marketing')->with('facebook_marketing_status',"operation failed");
    	}
       
       
    }
}
