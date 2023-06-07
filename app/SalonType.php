<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonType extends Model
{
    protected $fillable = [
        'title','identifier','status'
    ];
}
