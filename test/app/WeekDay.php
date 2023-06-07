<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    protected $table = 'weekdays';
    
     protected $fillable = [
        'id','saloon_id','week_days','status','created_at','updated_at',
    ];
}
