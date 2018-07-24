<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public function subsectors()
    {
      return $this->hasMany('App\SubSector');
    }
}
