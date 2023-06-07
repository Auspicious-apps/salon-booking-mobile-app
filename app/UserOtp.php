<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model
{
    protected $fillable = [
        'email','otp'
    ];
}
