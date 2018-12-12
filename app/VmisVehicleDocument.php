<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisVehicleDocument extends Model
{
    protected $table = 'vmis_vehicles_documents';
    public function VmisVehicle()
    {   
        return $this->belongsTo('App\VmisVehicle');
    }
}
