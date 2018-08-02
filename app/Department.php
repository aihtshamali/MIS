<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function SubSector()
    {
      return $this->belongsTo('App\SubSector');
    }
    public function AssignedDepartments()
    {
      return $this->hasMany('App\AssignedDepartment');
    }
}
