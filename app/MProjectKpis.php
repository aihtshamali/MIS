<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProjectKpis extends Model
{
  public function Sector()
  {
    return $this->belongsTo('App\Sector');
  }
}
