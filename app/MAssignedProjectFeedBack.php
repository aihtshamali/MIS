<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedProjectFeedBack extends Model
{
    public function MProjectProgress(){
        return $this->belongsTo('App\MProjectProgress');
      }
      public function MGeneralFeedBack(){
        return $this->belongsTo('App\MGeneralFeedBack');
      }
     
}
