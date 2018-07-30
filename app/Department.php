<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function subsector()
    {
      return $this->belongsTo('App\SubSector');
    }
}
