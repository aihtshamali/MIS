<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MChairmanProject extends Model
{
    public function AssignedSubSectors()
    {
        return $this->hasMany('App\MChairmanProjectSubSector');
    }
    public function MChairmanPendingProject()
    {
        return $this->hasOne('App\MChairmanPendingProject');
    }
    public function AssignedDistricts()
    {
        return $this->hasMany('App\MChairmanProjectDistrict');
    }
}
