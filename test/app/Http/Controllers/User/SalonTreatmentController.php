<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalonTreatment;
use App\TreatmentCategory;
use Auth;

class SalonTreatmentController extends Controller
{
    public function index()
    {
        $get_treatments = SalonTreatment::where('status',1)->get(['*']);
        
        return view('user-view.listing-salon-treatment',['get_treatments_data'=> $get_treatments]);
    }

    public function treatment_add()
    {
        $get_categories = TreatmentCategory::get(['*']);

        return view('user-view.add-salon-treatment',['get_categories_data'=>$get_categories]);
    }
    
    public function insert_treatment(Request $request)
    {
        $validatedData = $request->validate([
            'treatment_category' => 'required',
            'treatment_name' => 'required',
            'treatment_rate' => 'required',
            'treatment_time' => 'required'
        ]);

        $treatment_insert = new SalonTreatment;
        $treatment_insert->salon_id = $request->input('salon_id');
        $treatment_insert->treatment_category = $request->input('treatment_category');
        $treatment_insert->treatment_name = $request->input('treatment_name');
        $treatment_insert->treatment_rate = $request->input('treatment_rate');
        $treatment_insert->treatment_time = $request->input('treatment_time');
        $treatment_insert->status = 1;
        $treatment_insert->save();

        return redirect('/treatment-list');
    }

    public function treatment_edit($id)
    {
        $get_categories = TreatmentCategory::get(['*']);

        $get_treatment_detail = SalonTreatment::where('id','=',$id)->get(['*']);
                
        return view('user-view.edit-salon-treatment',['get_categories_data'=>$get_categories,'get_treatments_detail_data'=>$get_treatment_detail]);
    }


    public function update_treatment(Request $request, $id)
    {

        $validatedData = $request->validate([
            'treatment_category' => 'required',
            'treatment_name' => 'required',
            'treatment_rate' => 'required',
            'treatment_time' => 'required'
        ]);



        SalonTreatment::where('id', $id)
        ->update([

            'salon_id' => $request->input('salon_id'),
            'treatment_category' =>$request->input('treatment_category'),
            'treatment_name' => $request->input('treatment_name'),
            'treatment_rate' => $request->input('treatment_rate'),
            'treatment_time' => $request->input('treatment_time'),
            'status' => $request->input('status'),
        ]);
        
        return redirect('/treatment-list')->with('status',"Update successfully");

    }


    public function delete_treatment(Request $request, $id)
    {                         
        SalonTreatment::where('id', $id)->update([
            
            'status' => 0,
            
        ]);
        return redirect('/treatment-list')->with('status',"Delete successfully");

    }
    
    
    public function add_treatment_category(Request $request)
    {
                $saloon_id = Auth::user()->id;
                
                
         
                $salooncategory = $request->input('salooncategory');
                $saloon_treatment = $request->input('saloon_treatment');
                $price = $request->input('price');
                $set_hours = $request->input('set_hours');
                $set_minute = $request->input('set_minute');
                
                $treatment_insert = new SalonTreatment;
                $treatment_insert->salon_id = $saloon_id;
                $treatment_insert->treatment_category = $salooncategory;
                $treatment_insert->treatment_name = $saloon_treatment;
                $treatment_insert->treatment_rate = $price;
                $treatment_insert->treatment_hours = $set_hours;
                $treatment_insert->treatment_minute = $set_minute;
                $treatment_insert->status = 1;
                $treatment_insert->save();
                
                if($treatment_insert=true) {
                    
                    return 1;
                } else {
                    return 0;
                }
         
    }
    
    public function udpate_treatment_category(Request $request)
    {
        
            
        $current_id = $request->input('current_id');
    
            
            
          $updated_treatment = SalonTreatment::where('id', $current_id)
        ->update([

            'treatment_name' => $request->input('treatment_name'), 
            'treatment_category' =>$request->input('salooncategory'),
            'treatment_rate' => $request->input('treatment_rate'),
            'treatment_hours' => $request->input('treatment_hours'),
            'treatment_minute' => $request->input('treatment_minute')
        ]);
        
        if($updated_treatment=true) {
            
            return $current_id;
        } else {
            
            return 0;
        }
        
        
    }
}
