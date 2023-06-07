<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Wishlist extends Model
{
    protected $fillable = [
    
        'salon_id','user_id','sataus'
    
    ];
    
    public function getSalonDetailAttribute()
    {
        $salon = DB::table('salons')->where('salon_id',$this->salon_id)->get(['*']);
        return $salon;
    }
    
    public function getImageUrlAttribute()
    {
        $salon_image = DB::table('salons')->where('salon_id',$this->salon_id)->get(['image']);
        
        $salon_image = $salon_image[0]->image;
        
        
        $salon_images = explode(',',$this->image);
        
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
