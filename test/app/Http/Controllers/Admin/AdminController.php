<?php

namespace App\Http\Controllers\Admin;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Staff;
use DB;

class AdminController extends Controller
{
    
    /*
     * get admin dashboard
     *
    */
    public function index(Request $request)
    {

        return view('admin-view/dashboard');

    }
    
}
