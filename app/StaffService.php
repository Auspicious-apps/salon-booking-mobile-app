<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffService extends Model
{
    protected $fillable = [
        'title','identifier','status'
    ];
}
