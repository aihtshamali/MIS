<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisRequestToTransportOfficer extends Model
{
    public function PlantripTriprequest()
    {   
        return $this->belongsTo('App\PlantripTriprequest');
    }
    public function VmisVehicle()
    {   
        return $this->belongsTo('App\VmisVehicle');
    }
    public function VmisDriver()
    {   
        return $this->belongsTo('App\VmisDriver');
    }
    public function User()
    {   
        return $this->belongsTo('App\User');
    }
    public function VmisAssignedVehicle()
    {   
        return $this->hasMany('App\VmisAssignedVehicle');
    }
    public function VmisAssignedDriver()
    {   
        return $this->hasMany('App\VmisAssignedDriver');
    }
}
