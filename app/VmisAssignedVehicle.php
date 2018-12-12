<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisAssignedVehicle extends Model
{
    public function VmisRequestToTransportOfficer()
    {   
        return $this->belongsTo('App\VmisRequestToTransportOfficer');
    }
   
    public function VmisVehicle()
    {   
        return $this->belongsTo('App\VmisVehicle');
    }
}
