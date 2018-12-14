<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisRequestToTransportOfficerLog extends Model
{
    public function PlantripTriprequestLog()
    {   
        return $this->belongsTo('App\PlantripTriprequestLog');
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
        return $this->belongsTo('App\User','approvedby_user_id');
    }
    public function VmisAssignedVehicleLog()
    {   
        return $this->hasMany('App\VmisAssignedVehicleLog');
    }
    public function VmisAssignedDriverLog()
    {   
        return $this->hasMany('App\VmisAssignedDriverLog');
    }
}
