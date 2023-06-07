<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'id','expenses_date','expense_type','amount','salon_id',
    ];
}
