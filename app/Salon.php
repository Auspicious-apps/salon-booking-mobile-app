<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Salon extends Model
{
    protected $fillable = [
        'id','salon_name','salon_type','description','city','address','zipcode','opening_timing','closing_timing','break_start_time','break_close_time','latitude','longitude','email','phone','image','status'
    ];
    
    
    public function getTreatmentsAttribute()
    {
        
        $treatment_categories = SalonTreatment::DISTINCT('treatment_category')->get(['treatment_category']);
        
        $salon_treatments = array();
        
        for($i=0;$i<sizeof($treatment_categories);$i++)
        {
            $treatment = array();
            
            $treatment['category'] = $treatment_categories[$i]->treatment_category;
            $treatment['treatments'] = SalonTreatment::where('salon_id',$this->salon_id)->where('treatment_category',$treatment_categories[$i]->treatment_category)->get(['id','treatment_name','treatment_rate','treatment_hours','treatment_minute']);
            
            $salon_treatments[] = $treatment;
            
        }
        
        
        return $salon_treatments;
        
        
    }
    
    
    public function getImageUrlAttribute()
    {
        $salon_images = explode(',',$this->image);
        
        $size= count($salon_images);
        
        $images_array = [];
        
        if( $size > 0)
        {
            for($i=0;$i<$size;$i++)
            {
                $salon_image = $salon_images[$i];
                $salon_image = 'https://www.mi-salon.es/public/salon_images/saloon_imagesAll/'.$salon_image;
                $images_array[] = $salon_image;
            }
            
        }
        else
        {
            $images_array = [];
        }
       
        
        return $images_array;
    }
    
    
    public function getIsFavouriteAttribute()
    {
        
        $user = Auth::user();
        
        $user_id = $user->id;
        
        $favourite_status = Wishlist::where('user_id',$user_id)->where('salon_id',$this->salon_id)->count();
        
        if( $favourite_status > 0)
        {
            $data = 'true';
            
        }
        else
        {
            $data = 'false';
        }
       
        
        return $data;
    }
    
   
        public function getRatingAttribute()
    {
        
        $review_count = Review::where('salon_id',$this->salon_id)->count();
        
        $rating_count = Review::where('salon_id',$this->salon_id)->sum('rating');
        
        if($review_count > 0 && $rating_count > 0)
        {
            $avg_rating = $rating_count / $review_count;
            
        }
        else
        {
            
            $avg_rating = 0;
            
        }
        
        return round($avg_rating);
    }
    
    public function getReviewCountAttribute()
    {
        
        $review_count = Review::where('salon_id',$this->salon_id)->count();
        
        return $review_count;
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
