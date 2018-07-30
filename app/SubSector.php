<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSector extends Model
{
  public function sector()
  {
    return $this->belongsTo('App\Sector');
  }

  public function sponsoring_departments()
  {
    return $this->hasMany('App\SponsoringAgency');
  }
  public function departments()
  {
    return $this->hasMany('App\Department');
  }
}
