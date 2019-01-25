<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralKpi extends Model
{
    public function MPlanKpicomponentMapping(){
        return $this->hasMany('App\MPlanKpicomponentMapping');
      } 
}
