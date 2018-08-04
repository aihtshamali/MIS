<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectLog extends Model
{
    public function EvaluationType(){
        return $this->belongsTo('App\EvaluationType');
    }

    public function user(){
        return $this->belongsTo('App/User');
    }

    public function AssignedProject(){
        return $this->belongsTo('App\AssignedProject');
    }

    public function AssigningForum(){
      return $this->belongsTo('App\AssigningForum');
    }

    public function ApprovingForum()
    {
      return $this->belongsTo('App\ApprovingForum');
    }
}
