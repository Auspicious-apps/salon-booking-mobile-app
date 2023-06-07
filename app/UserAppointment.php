<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model
{
	protected $table = 'appointments';

    protected $fillable = [
        'date','salon_id','customer_id','staff_id','start_time','end_time','services_taken','total_cost','email','phone','cutomer_note','status','booking_date','booking_time','first_name','last_name','created_at',
    ];
}

