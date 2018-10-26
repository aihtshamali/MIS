<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MRiskEvent extends Model
{
  public function MRiskCategory(){
    return $this->hasMany('App\MRiskCategory');
  }
}
