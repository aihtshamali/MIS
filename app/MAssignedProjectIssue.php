<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAssignedProjectIssue extends Model
{
    public function MIssue(){
      return $this->belongsTo('App\MIssue');
    }
    public function MSeverity(){
      return $this->belongsTo('App\MSeverity');
    }
    public function AssignedProject(){
      return $this->belongsTo('App\AssignedProject');
    }
}
