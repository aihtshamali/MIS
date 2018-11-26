<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public function user(){
      return $this->hasMany('App\User');
    }
    public function subsectors()
    {
      return $this->hasMany('App\SubSector');
    }

    public function MProjectKpis(){
      return $this->hasMany('App\MProjectKpis');
    }
}
