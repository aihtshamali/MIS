<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MRiskCategory extends Model
{
  public function AssignedProject(){
    return $this->belongsTo('App\AssignedProject');
  }
  public function MRiskEvent(){
    return $this->belongsTo('App\MRiskEvent');
  }
}
