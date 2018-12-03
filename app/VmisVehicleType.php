<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisVehicleType extends Model
{
    protected $table='vmis_vehicletypes';
    public function VmisVehicle()
    {   
        return $this->hasOne('App\VmisVehicle','vmis_vehicletype_id');
    }
}
