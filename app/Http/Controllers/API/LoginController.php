<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\User;
use Validator;

class LoginController extends Controller
{
   
    /** 
     *  login of user
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function login(Request $request) { 
        
        
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);


         $credentials = request(['email','password']);
     
          if(!Auth::attempt($credentials))
             return response()->json([
                'message' => 'Unauthorized'
        ], 401);
        
        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
    
        $token = $tokenResult->token;

          if ($request->remember_me)
            $token->expires_at = Carbon::now()->addHours(24);
            $token->save();
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);


    }

    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
        public function signup(Request $request) 
        { 
            $validator = Validator::make($request->all(), [ 
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|string|unique:users',
                'phone_number' => 'required',
                'password' => 'required|string',
                'password_confirmation' => 'required|same:password',
            ]);

            if($validator->fails()){
                return response()->json(['error'=>$validator->errors()], 401);

            } else {

            $user = new User([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone_number,
                'password' => bcrypt($request->password),
                'user_type' => 3
            ]);

            $user->save();
            
                return response()->json([
                    'message' => 'Successfully created user!'
                ], 201); 
        }
    }


    /** 
     * logout to customer
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function logout(Request $request) {
        $request->user()->token()->revoke();
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
    }

    /** 
     *  show details of users
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function user(Request $request) {
        return response()->json($request->user());
    }

    public function delete_user(Request $request)
    {   
        $id = Auth::user()->id;
        $user = User::Where('id',$id)->delete();
       return response()->json([
                    'message' => 'You have been successfully deleted your account!'
                ], 201); 
        
    }

}
