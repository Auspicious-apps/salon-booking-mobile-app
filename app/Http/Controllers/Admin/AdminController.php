<?php

namespace App\Http\Controllers\Admin;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Staff;
use DB;
use App\Salon;

class AdminController extends Controller
{
    
    /*
     * get admin dashboard
     *
    */
    public function index(Request $request)
    {

    	$get_all_saloon = Salon::get();
    	// echo "<pre>";

    	// print_r($get_all_saloon);
    	// die;
	
	return view('admin-view/admin-all-saloon',['get_all_saloon'=>$get_all_saloon]);

    }
    
}
