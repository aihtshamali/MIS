<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisVehicleDetails extends Model
{
    protected $table = 'vmis_vehicledetails';
    
    public function VmisVehicle()
    {   
        return $this->belongsTo('App\VmisVehicle');
    }

}
