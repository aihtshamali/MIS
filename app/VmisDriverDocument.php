<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmisDriverDocument extends Model
{
    public function VmisDriver()
    {   
        return $this->belongsTo('App\VmisDriver');
    }
   
}
