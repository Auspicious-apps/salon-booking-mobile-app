<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'id','income_date','income_type','amount','salon_id','created_at','updated_at',
    ];
}
