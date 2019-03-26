<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedKpi extends Model
{
    public function MProjectProgress(){
      return $this->belongsTo('App\MProjectProgress');
    }

    public function User(){
      return $this->belongsTo('App\User');
    }
    public function MAssignedUserKpi(){
      return $this->belongsTo('App\MAssignedUserKpi');
    }

    public function MAssignedKpiLevel1(){
      return $this->hasMany('App\MAssignedKpiLevel1');
    }
}
