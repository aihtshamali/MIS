<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisDriver extends Model
{
    protected $table="vmis_drivers";
    public function VmisDocument()
    {   
        return $this->hasMany('App\VmisDriverDocument');
    }
    public function User()
    {   
        return $this->belongsTo('App\User');
    }
    public function VmisRequestToTransportOfficer()
    {   
        return $this->hasMany('App\VmisRequestToTransportOfficer');
    }
    public function VmisAssignedDriver()
    {   
        return $this->hasOne('App\VmisAssignedDriver');
    }
    
}
