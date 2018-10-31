<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityDocument extends Model
{
    public function AssignedActivityDocument(){
      $this->hasMany('App\AssignedActivityDocument');
    }
    public function User(){
      return $this->belongsTo('App\User','created_by');
    }
}
