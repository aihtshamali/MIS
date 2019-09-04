<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    public function Project(){
        return $this->hasMany('App\Project');
    }
    public function Division(){
        return $this->belongsTo('App\Division');
    }
    public function ProjectDetail(){
        return $this->hasMany('App\ProjectDetail');
    }
    public function AssignedDistricts(){
        return $this->hasMany('App\AssignedDistrict');
    }
    public function City(){
        return $this->hasMany('App\PlantripCity');
    }
    public function MAssignedUserLocation(){
        return $this->hasMany('App\MAssignedUserLocation');
    }
    public function MChairmanProjectDistrict(){
        return $this->hasOne('App\MChairmanProjectDistrict');
    }
}
