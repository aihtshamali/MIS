<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisAssignedDriver extends Model
{
    public function VmisRequestToTransportOfficer()
    {   
        return $this->belongsTo('App\VmisRequestToTransportOfficer');
    }
   
    public function VmisDriver()
    {   
        return $this->belongsTo('App\VmisDriver');
    }
}
