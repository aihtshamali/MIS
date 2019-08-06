<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{

    public function project(){
        return $this->belongsTo('App/Project');
    }
    public function District(){
        return $this->belongsTo('App\District');
    }

    public function AssigningForum(){
      return $this->belongsTo('App\AssigningForum');
    }
    public function SubProjectType(){
      return $this->belongsTo('App\SubProjectType');
    }
    public function ApprovingForum()
    {
      return $this->belongsTo('App\ApprovingForum');
    }
}
