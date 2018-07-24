<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSector extends Model
{
  public function sector()
  {
    return $this->belongsTo('App\Sector');
  }
}
