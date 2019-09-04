<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function District(){
        return $this->hasOne('App\District');
    }
}
