<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MGeneralFeedBack extends Model
{
    public function MAssignedProjectFeedBack(){
        return $this->hasOne('App\MAssignedProjectFeedBack');
      }
}
