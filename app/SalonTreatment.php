<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonTreatment extends Model
{
   protected $fillable = [
        'id','salon_id','treatment_category','treatment_name','staff_member_id','treatment_rate','treatment_hours','treatment_minute','status',
    ];
    
    
    // public function getFormattedCategoryAttribute() {

    //     $category = TreatmentCategory::find($this->treatment_category);

    //     $category_title = $category->title;

    //     return $category_title;
    // }
    
    // public function getFormattedSalonAttribute() {

    //     $salon = Salon::find($this->salon_id);

    //     $salon_name = $salon->salon_name;

    //     return $salon_name;
    // }

    public function getStaffAttribute() {

        $staff = Staff::where('id',$this->staff_member_id)->get(['id','salon_id','first_name','image']);   
        return $staff;
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
