<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Appointment extends Model
{
    protected $fillable = [
        'date','salon_id','customer_id','staff_id','start_time','end_time','services_taken','total_cost','email','phone','cutomer_note','status','booking_date','booking_time','created_at',
    ];
    
    
    public function getFormattedDateAttribute()
    {
        $formatted_date = \Carbon\Carbon::parse($this->date)->format('F D d, Y');
        return $formatted_date;
    }
    
    public function getServiceNameAttribute()
    {
        $service_name = SalonTreatment::where('id',$this->services_taken)->get(['treatment_name']);
        
        if(count($service_name) > 0)
        {
            $service_name = $service_name[0]->treatment_name;
        }
        else
        {
            $service_name = '';
        }
        
        
        return $service_name;
    }
    
    public function getSalonNameAttribute()
    {
        $salon_name = Salon::where('salon_id',$this->salon_id)->get(['salon_name']);
        if(count($salon_name) > 0)
        {
            $salon_name = $salon_name[0]->salon_name;
        }
        else
        {
            $salon_name = '';
        }
        return $salon_name;
    }
    
    public function getSalonImageAttribute()
    {
        $salon_images = DB::table('salons')->where('salon_id',$this->salon_id)->get(['image']);
        
        $salon_images = explode(',',$salon_images[0]->image);
        
        $size= count($salon_images);
        
        $images_array = [];
        
        if( $size > 0)
        {
            for($i=0;$i<$size;$i++)
            {
                $salon_image = $salon_images[$i];
                $salon_image = 'https://rick.auspicioussoft.com/public/salon_images/saloon_imagesAll/'.$salon_image;
                $images_array[] = $salon_image;
            }
            
        }
        else
        {
            $images_array = [];
        }
       
        
        return $images_array;
        
    }
    
    public function getLocationAttribute()
    {
        $location = DB::table('salons')->where('salon_id',$this->salon_id)->get(['address','city','zipcode']);
        return $location;
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
