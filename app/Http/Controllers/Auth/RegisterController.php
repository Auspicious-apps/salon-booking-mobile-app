<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

      public function redirectTo()
    {
        switch(Auth::user()->user_type) {
    
            case 1:
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = '/user';
                return $this->redirectTo;
                break;
            default:
               session()->flash('success', 'You have Successfully Registered!Our Team member will contact you soon!'); 
              
               
               
                $this->redirectTo = '/register';
                return $this->redirectTo;
        }
         
        // return $next($request);
    } 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'Username' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'saloon_name' => ['required', 'string', 'max:255'],
            'refered_by' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
         
           $confirmationEmail =  [
                "title" =>"Thanks",
                "body" =>"Thanks! You have Successfully Registered! Our Team member will contact you soon!",
               ];
           
           
           
            \Mail::to($data['email'])->send(new \App\Mail\ConfirmationSentEmail($confirmationEmail));
                
                
            return  User::create([
            'first_name' => $data['first_name'],
            'Username' => $data['Username'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'saloon_name' => $data['saloon_name'],
            'refered_by' => $data['refered_by'],
            'email' => $data['email'],
            'identify' =>'saloon',
            'saloon_status' =>0,
        ]);
        
        
        
    
    }
}
