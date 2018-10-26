<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public function user(){
      return $this->hasMany('App\UserDetail');
    }
    public function subsectors()
    {
      return $this->hasMany('App\SubSector');
    }

    public function MKpi(){
      return $this->hasMany('App\MKpi');
    }
}
