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
  public function AssignedSubSectors()
  {
    return $this->hasMany('App\AssignedSubSector');
  }
  public function MChairmanProjectSubSector(){
    return $this->hasMany('App\MChairmanProjectSubSector');
  }
  public function UserSector()
  {
    return $this->hasMany('App\UserSector');
  }
}
