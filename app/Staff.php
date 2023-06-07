<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'salon_id','first_name','last_name','gender','date_of_birth','position','description','email','contact_number','street_address','city','state','country','hourly_rate','color','image','vacation','services_provided','status'
    ];
    
    
    
    public function getImageUrlAttribute()
    {
        $img_url = 'https://www.mi-salon.es/public/staff_images/'.$this->image;
        return $img_url;
    }
    
    
    public function toArray()
    {
        $array = parent::toArray();
        foreach ($this->getMutatedAttributes() as $key)
        {
            if ( ! array_key_exists($key, $array)) {
                $array[$key] = $this->{$key};   
            }
        }
        return $array;
    }
}
