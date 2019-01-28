<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectLevel4Kpi extends Model
{

  public function MProjectLevel3Kpi(){
    return $this->belongsTo('App\MProjectLevel1Kpi');
  }

}
