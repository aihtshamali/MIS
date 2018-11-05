<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPhysicalActivity extends Model
{
  public function AssignedProject(){
    return $this->belongsTo('App\AssignedProject');
  }
  public function MAssesment(){
    return $this->belongsTo('App\MAssesment');
  }
}
