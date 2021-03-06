<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MChairmanPendingProject extends Model
{
    public function AssignedBy(){
        return $this->belongsTo('App\User','assigned_by');
    }
    public function MProjectProgress(){
        return $this->belongsTo('App\User','MProjectProgress');
    }
    public function Project(){
        return $this->belongsTo('App\Project');
    }
    public function MAssignedChairmanProject(){
        return $this->hasOne('App\MAssignedChairmanProject');
    }
    public function MChairmanProject(){
        return $this->belongsTo('App\MChairmanProject');
    }
    public function AssignedSubSectors(){
        return $this->hasMany('App\MChairmanProjectSubSector');
    }
    public function AssignedDistricts(){
        return $this->hasMany('App\MChairmanProjectDistrict');
    }
}
