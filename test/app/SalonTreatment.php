<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonTreatment extends Model
{
   protected $fillable = [
        'id','salon_id','treatment_category','treatment_name','treatment_rate','treatment_hours','treatment_minute','status',
    ];
    
    
    public function getFormattedCategoryAttribute() {

        $category = TreatmentCategory::find($this->treatment_category);

        $category_title = $category->title;

        return $category_title;
    }
    
    public function getFormattedSalonAttribute() {

        $salon = Salon::find($this->salon_id);

        $salon_name = $salon->salon_name;

        return $salon_name;
    }
}
