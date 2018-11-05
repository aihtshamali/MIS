<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssesment extends Model
{
    public function MPhysicalActivity(){
      return $this->hasMany('App\MPhysicalActivity');
    }
}
