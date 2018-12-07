<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripTriplocationLog extends Model
{
   public function PlantripCityTo()
   {
       return $this->belongsTo('App\PlantripCity','plantrip_city_to');
   }  
   public function PlantripCityFrom()
   {
      return $this->belongsTo('App\PlantripCity','plantrip_city_from');
   }  
   public function PlantripPurposeLog()
   {
      return $this->belongsTo('App\PlantripPurposeLog');
   }  
   public function PlantripTriprequest()
   {
      return $this->belongsTo('App\PlantripTriprequest');
   }  
   
}
