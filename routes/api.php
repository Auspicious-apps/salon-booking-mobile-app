<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichkjhg
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'API\LoginController@login');
    Route::post('signup', 'API\LoginController@signup');
    
    
    //Route::get('/home', 'HomeController@index')->name('home');
});

// Route::get('/login/{provider}', 'FacebookController@redirectToProvider');
// Route::get('/login/{provider}/callback', 'FacebookController@handleProviderCallback');

// Route::group([
//     'prefix' => 'auth',
//     'middleware' => 'auth:api'
// ], function () {
//          Route::get('forgot-password', 'API\ForgotPasswordController@index');
  
// }); 


 
Route::group([
    'prefix' => 'auth'
], function () {
     Route::post('forgot-password', 'API\ForgotPasswordController@index')->name('forgot-password');
     Route::post('varification-otp', 'API\ForgotPasswordController@varification_otp')->name('varification-otp');
     Route::post('change-password', 'API\ForgotPasswordController@change_password')->name('change-password');
});

Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'API\LoginController@logout');
        Route::get('user', 'API\LoginController@user');
         Route::post('delete', 'API\LoginController@delete_user');
        
  //  Route::get('edit-profile', 'API\EditProfileController@index')->name('edit-profile');
  
   Route::post('edit-profile', 'API\EditProfileController@index')->name('edit-profile');
   
  
        
        
Route::get('user/{id}', 'API\SalonController@get_user_detail');
   
 Route::post('home', 'API\HomeController@index')->name('home');
 Route::post('saloon-profile', 'API\HomeController@saloonProfile')->name('saloon-profile');
 
 Route::get('saloon-barber', 'API\HomeController@saloon_barber')->name('saloon-barber');
 
 Route::get('salon-type', 'API\SalonController@get_salon_types')->name('salon-type');
 Route::get('salon-list', 'API\SalonController@get_salons')->name('salon-list');
 Route::get('salons/{id}', 'API\SalonController@get_salon_by_type')->name('salons');
 Route::get('salons', 'API\SalonController@get_salon_by_multitype')->name('salons');
 Route::get('salon/{id}', 'API\SalonController@get_salon_detail')->name('salon');
 Route::get('staff/{id}', 'API\SalonController@get_salon_by_staff')->name('staff');
 Route::get('treatment-staff', 'API\SalonController@get_salon_treatment_staff')->name('treatment-staff');
 
 
 Route::post('appointment', 'API\AppointmentController@create_appointment')->name('appointment');
 Route::get('appointments/{id}', 'API\AppointmentController@get_appointments')->name('appointments');
 Route::post('appointment-cancel/{id}', 'API\AppointmentController@cancel_appointment')->name('appointment-cancel');
 Route::get('appointment-detail/{id}', 'API\AppointmentController@appointment_detail')->name('appointment-detail');
 
 Route::post('review', 'API\ReviewController@insert_review')->name('review');
 
 Route::post('favourite', 'API\WishlistController@add_favourite')->name('favourite');
 Route::get('favourites/{id}', 'API\WishlistController@get_favourites')->name('favourites');
 
 Route::post('slot-booking', 'API\SlotController@slots')->name('slot-booking');
 
 

});

 Route::post('facebook-detail', 'API\EditProfileController@store_facebook_detail')->name('facebook-detail');


