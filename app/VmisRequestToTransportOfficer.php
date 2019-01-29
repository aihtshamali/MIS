<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisRequestToTransportOfficer extends Model
{
    public function PlantripTriprequest()
    {   
        return $this->belongsTo('App\PlantripTriprequest','plantrip_triprequest_id');
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
    public function TransportOfficerUser()
    {   
        return $this->belongsTo('App\User','transportOfficer_user_id');
    }
    public function RecommendedByUser()
    {   
        return $this->belongsTo('App\User','recommendedby_user_id');
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
