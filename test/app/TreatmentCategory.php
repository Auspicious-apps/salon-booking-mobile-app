<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentCategory extends Model
{
    protected $fillable = [
        'title','identifier','status'
    ];
}
