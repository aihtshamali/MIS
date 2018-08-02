<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedDistrict extends Model
{
  public function Project(){
    return $this->belongsTo('App\Project');
  }
  public function District(){
    return $this->belongsTo('App\District');
  }
}
