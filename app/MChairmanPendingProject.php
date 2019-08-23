<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MChairmanPendingProject extends Model
{
    public function AssignedBy(){
        return $this->belongsTo('App\User','assigned_by');
    }
    public function Project(){
        return $this->belongsTo('App\Project');
    }
    public function AssignedSubSectors(){
        return $this->hasMany('App\MChairmanProjectSubSector');
    }
    public function AssignedDistricts(){
        return $this->hasMany('App\MChairmanProjectDistrict');
    }
}
