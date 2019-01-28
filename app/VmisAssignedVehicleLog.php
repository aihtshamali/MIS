<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisAssignedVehicleLog extends Model
{
    public function VmisRequestToTransportOfficerLog()
    {   
        return $this->belongsTo('App\VmisRequestToTransportOfficerLog');
    }
   
    public function VmisVehicle()
    {   
        return $this->belongsTo('App\VmisVehicle');
    }
}
