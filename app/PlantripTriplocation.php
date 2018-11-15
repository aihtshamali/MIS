<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantripTriplocation extends Model
{
    public function plantrip_cities()
    {
       return $this->hasMany('App\PlantripCity');
   }  
   public function PlantripMember()
   {
      return $this->hasMany('App\PlantripMember');
  }  
}
