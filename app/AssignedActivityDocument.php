<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedActivityDocument extends Model
{
    public function ActivityDocument(){
      return $this->belongsTo('App\ActivityDocument');
    }
    public function AssignedProjectActivity(){
      return $this->belongsTo('App\AssignedProjectActivity');
    }
    public function AssignedActivityAttachment(){
      return $this->hasOne('App\AssignedActivityAttachment');
    }
}
