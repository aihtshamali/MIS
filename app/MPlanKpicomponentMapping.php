<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPlanKpicomponentMapping extends Model
{
    
    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
      }
      public function GeneralKpi(){
        return $this->belongsTo('App\GeneralKpi');
      }
      public function MPlanComponent(){
        return $this->belongsTo('App\MPlanComponent');
      }
}
