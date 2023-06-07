<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SalonType;
use App\Saloon;
header('Content-type:application/json;charset=utf-8');
use App\SelectBarder;
class HomeController extends Controller
{
    /*
     * Get all saloon  Data
     *
    */
    
    public function index(Request $request) {
        
        //$type =  $request->type;
        $type_id =  $request->id;
          
        $selectsaloonType  = DB::table('saloons')->whereRaw("find_in_set($type_id,type)")->get();
        
        // print_r(count($selectsaloonType));
        // die;
        
       if (count($selectsaloonType) != 0) { 
    
            //  $name  =  $selectsaloonType[0]->name;
            // print_r($selectsaloonType);
            // die;
            
        $getsaloon = array();
        $response = array();
        for($i=0;$i<count($selectsaloonType);$i++) {
            
            
            // $getSaloon = $selectsaloonType[$i]->id;
            // $getSaloon[]  =    $selectsaloonType[$i]->name; 
            // $getSaloon[]  =    $selectsaloonType[$i]->address;
            // $getSaloon[]  =    $selectsaloonType[$i]->rating; 
            // $getSaloon[]  =    $selectsaloonType[$i]->reviews;
            // $getSaloon[]  =    $selectsaloonType[$i]->distance; 
            
            $response[] = [
            	  "id" => $selectsaloonType[$i]->id,
            	  "name" => $selectsaloonType[$i]->name,
            	  "address" => $selectsaloonType[$i]->address,
            	  "rating" => $selectsaloonType[$i]->rating,
            	  "reviews" =>$selectsaloonType[$i]->reviews,
            	  "distance" =>$selectsaloonType[$i]->distance,
                
            	];
            
        }
        
        $saloon_type = DB::table('salon_types')->where('id',1)->first();
      
        
        $final_response = $response;
        
         echo $json = json_encode(array(
                 
                "type" =>$saloon_type->name,
                    "data"=>$final_response
            ));
        
            
            
        } else {
            
        echo $json = json_encode(array(
            
            "status" =>"200",
            "type" =>"ok",
                "data"=>"Data Not Found!"
        ));
                
                
      }
    
    
    }
    
    /*
     * saloon profile data
     *
    */


    public function saloonProfile(Request $request) {
        
        $saloonId =  $request->id;
        
        
        //     $categories = DB::table('services')->where('saloon_id', '=', $saloonId)->distinct('category')->pluck('category');
        
        //   echo $json = json_encode(array("data" =>$categories));
        //     die;
        
        
        
        $saloonData  =  Saloon::where('id',$saloonId)->get(['id','name','address','rating','reviews','phone_number','description','image','is_favourite']);
        echo $json = json_encode(array("data" =>$saloonData));
                     
        
    //   $getsaloonProfileRecord = DB::table('saloons')
    //     ->join('services', 'services.saloon_id', '=', 'saloons.id')
    //     ->join('service_categories', 'service_categories.id', '=', 'services.category')
    //     ->where('saloons.id', '=', $saloonId)
    //     ->get();
        
        
    //     $saloonProfile = array();
    //     $saloonCategory = array();
    //     for($i=0;$i<count($getsaloonProfileRecord);$i++) {
            
    //         if($i==0) {
                
    //             $saloonProfile[] = [
    //         	  "id" => $getsaloonProfileRecord[$i]->id,
    //         	  "saloon_name" => $getsaloonProfileRecord[$i]->saloon_name,
    //         	  "address" => $getsaloonProfileRecord[$i]->address,
    //         	  "rating" => $getsaloonProfileRecord[$i]->rating,
    //         	  "reviews" =>$getsaloonProfileRecord[$i]->reviews,
    //         	  "phone_number" =>$getsaloonProfileRecord[$i]->phone_number,
    //         	  "description" =>$getsaloonProfileRecord[$i]->description,
                
    //         	];

                
    //         }
    //         echo $json = json_encode(array("data" =>$saloonProfile));
    //         die;
            
            
            
          // $categories = DB::table('services')->where('saloon_id', '=', $saloonId)->distinct('category')->pluck('category');
           
    
        //   $services =array();
        //   for($i=0;$i<count($categories);$i++) {
               
                  
        //           if( $getsaloonProfileRecord[$i]->category == $getsaloonProfileRecord[$i]->category) {
                      
        //             $services[]  =   $getsaloonProfileRecord[$i]->service_type;
                        
        //           }
                     
                  
               
        //   }
            // echo $json = json_encode(array("data" =>$services));
            // die;
           
             
            //die;
                
            
            
            //  $saloonCategory[] = [
            // 	  "id" => $getsaloonProfileRecord[$i]->id,
            // 	  "saloon_name" => $getsaloonProfileRecord[$i]->saloon_name,
            // 	  "address" => $getsaloonProfileRecord[$i]->address,
            // 	  "rating" => $getsaloonProfileRecord[$i]->rating,
            // 	  "reviews" =>$getsaloonProfileRecord[$i]->reviews,
            // 	  "phone_number" =>$getsaloonProfileRecord[$i]->phone_number,
            // 	  "description" =>$getsaloonProfileRecord[$i]->description,
                
            // 	];
            
            
            
            
        // }
        
        // echo $json = json_encode(array("data" =>$saloonProfile));
        
        // die;
      
        //   echo $json = json_encode(array("data" =>$getsaloonProfileRecord));
        //   die;
        
        
        // $getsaloonProfile = array();
        // for($i=0;$i<count($getsaloonProfileRecord);$i++) {
            
            
        //     $getsaloonProfile[] = [
        //     	  "id" => $getsaloonProfileRecord[$i]->id,
        //     	  "saloon_name" => $getsaloonProfileRecord[$i]->saloon_name,
        //     	  "address" => $getsaloonProfileRecord[$i]->address,
        //     	  "rating" => $getsaloonProfileRecord[$i]->rating,
        //     	  "phone_number" =>$getsaloonProfileRecord[$i]->phone_number,
        //     	  "description" =>$getsaloonProfileRecord[$i]->description,
        //     	];
            
    
        // }
        
        // echo $json = json_encode(array("data" =>$getsaloonProfile));

    }
   
    /*
     * select barber 
     * 
    */

    public function saloon_barber(Request $request) {
        
        echo "testing";
          
    }
   
   
}
