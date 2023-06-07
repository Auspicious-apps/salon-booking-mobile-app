<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookMarketing extends Model
{
    protected $table = 'facebook_marketings';

    protected $fillable = [
        'id','title','dimension','description','facebook_image','salon_id','marketingtitle','created_at','updated_at',
    ];
}
