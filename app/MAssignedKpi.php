<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedKpi extends Model
{
    public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }

    public function MProjectKpi(){
      return $this->belongsTo('App\MProjectKpi');
    }

    public function MAssignedKpiLevel1(){
      return $this->hasMany('App\MAssignedKpiLevel1');
    }
}
