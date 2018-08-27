<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedActivityAttachment extends Model
{
    public function AssignedProjectActivity(){
      return $this->belongsTo('App\AssignedProjectActivity');
    }
}
