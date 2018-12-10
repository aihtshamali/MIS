<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripTriplocation extends Model
{
   public function PlantripCityTo()
   {
       return $this->belongsTo('App\PlantripCity','plantrip_city_to');
   }  
   public function PlantripCityFrom()
   {
      return $this->belongsTo('App\PlantripCity','plantrip_city_from');
   }  
   public function PlantripPurpose()
   {
      return $this->belongsTo('App\PlantripPurpose');
   }  
}
