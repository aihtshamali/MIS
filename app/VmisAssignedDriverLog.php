<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisAssignedDriverLog extends Model
{
    public function VmisRequestToTransportOfficerLog()
    {   
        return $this->belongsTo('App\VmisRequestToTransportOfficerLog');
    }
   
    public function VmisDriver()
    {   
        return $this->belongsTo('App\VmisDriver');
    }
}
