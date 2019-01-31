<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MExecutingStakeholder extends Model
{
    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
    }
    public function User(){
        return $this->belongsTo('App\User');
      }
      public function AssignedExecutingAgency(){
        return $this->belongsTo('App\AssignedExecutingAgency');
      }
}
