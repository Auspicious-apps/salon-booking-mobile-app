<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Our-App', function () {
    return view('our-app');
})->name('Our-App');


Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');


Route::get('/package', function () {
    return view('package-view');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {
    
Route::get('/admin', 'Admin\AdminController@index')->name('admin'); 
Route::get('/requested-salon', 'Admin\SalonController@index')->name('requested-salon');
Route::get('/accepted-request', 'Admin\SalonController@accepted_request')->name('accepted-request');
Route::get('/rejected-request', 'Admin\SalonController@rejected_request')->name('rejected-request');
Route::post('/admin-Saloon-accepted', 'Admin\SalonController@admin_Saloon_accepted')->name('admin-Saloon-accepted');
Route::post('/admin-Saloon-rejected', 'Admin\SalonController@admin_saloon_rejected')->name('admin-Saloon-rejected');
Route::get('/admin-my-account', 'Admin\SalonController@admin_my_account')->name('admin-my-account');
Route::get('/admin-edit-myaccount', 'Admin\SalonController@admin_edit_myaccount')->name('admin-edit-myaccount');

Route::post('/edit-adminAccountDetails', 'Admin\SalonController@edit_adminAccountDetails')->name('edit-adminAccountDetails');


    
});

Route::group(['middleware' => 'user'], function () {

Route::get('/user', 'User\UserController@index')->name('user');
 

/*
 * saloon route
 *
*/
Route::get('/get-salon', 'User\AddsalonController@get_salon')->name('get-salon');
Route::get('/add-salon', 'User\AddsalonController@add_salon')->name('add-salon');
Route::post('/send-salonData', 'User\AddsalonController@send_salonData')->name('send-salonData');

/*
 * saloon route end
 *
*/


/*
 * staff route
 *
*/
Route::get('/get-staff', 'User\StaffMemberController@getAll_staff')->name('get-staff');
Route::get('/get-staff', 'User\StaffMemberController@getAll_staff')->name('get-staff');
Route::get('/add-staff', 'User\StaffMemberController@add_staff')->name('add-staff');
Route::post('/send-staff', 'User\StaffMemberController@send_staffData')->name('send-staff');
Route::get('/single-staff/{id}', 'User\StaffMemberController@single_staff')->name('single-staff');
Route::post('/update-staff/{id}', 'User\StaffMemberController@update_staff')->name('update-staff');
Route::post('/delete-staff', 'User\StaffMemberController@delete_staff')->name('delete-staff');
Route::get('/edit-staff/{id}', 'User\StaffMemberController@edit_staff')->name('edit-staff');




/*
 *
 * staff route end
*/

Route::get('/get-overview', 'User\OverviewController@index')->name('get-overview');
/***********income-start*****************/ 
Route::get('/get-overview-income', 'User\OverviewController@income')->name('get-overview-income');
Route::post('/overview-add-income', 'User\OverviewController@overview_add_income')->name('overview-add-income');
Route::post('/overview-filerdata-income', 'User\OverviewController@overview_filerdata_income')->name('overview-filerdata-income');


Route::post('/overview-customerfilerdata', 'User\OverviewController@overview_customerfilerdata')->name('overview-customerfilerdata');


/***********income-end*****************/ 
/***********expenses-start*****************/ 
Route::get('/get-overview-expenses', 'User\OverviewController@expenses')->name('get-overview-expenses');
Route::post('/overview-add-expenses', 'User\OverviewController@overview_add_expenses')->name('overview-add-expenses');
Route::post('/overview-filerdata-expenses', 'User\OverviewController@overview_filerdata_expenses')->name('overview-filerdata-expenses');
/***********expenses-end*****************/ 
Route::get('/get-overview-balance', 'User\OverviewController@balance')->name('get-overview-balance');


Route::post('/add-treatment-category', 'User\SalonTreatmentController@add_treatment_category')->name('add-treatment-category');

Route::post('/udpate-treatment-category', 'User\SalonTreatmentController@udpate_treatment_category')->name('udpate-treatment-category');


Route::get('/treatment-add', 'User\SalonTreatmentController@treatment_add');
Route::post('/treatment-add', 'User\SalonTreatmentController@insert_treatment');
Route::get('/treatment-list', 'User\SalonTreatmentController@index')->name('treatmentList');
Route::get('/treatment-edit/{id}', 'User\SalonTreatmentController@treatment_edit');
Route::post('/treatment-update/{id}', 'User\SalonTreatmentController@update_treatment');
Route::get('/treatment-delete/{id}', 'User\SalonTreatmentController@delete_treatment');


Route::get('/service-list', 'User\StaffServiceController@index')->name('admin');
Route::post('/service-add', 'User\StaffServiceController@insert_service');
Route::get('/service-update/{id}', 'User\StaffServiceController@update_service');
Route::get('/service-edit/{id}', 'User\StaffServiceController@get_service');
Route::get('/service-delete/{id}', 'User\StaffServiceController@delete_service');

//user marketing
Route::get('/user-marketing', 'User\MarkettingController@index')->name('user-marketing');

Route::get('/add-facebook-marketing', 'User\MarkettingController@add_facebook_marketing')->name('add-facebook-marketing');
Route::post('/send-add-facebook-data', 'User\MarkettingController@send_add_facebook_data')->name('send-add-facebook-data');


Route::get('/marketting-pdf-download/{id}', 'User\MarkettingController@marketting_pdf_download')->name('marketting-pdf-download');

});
