<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblematicRemarks extends Model
{
    protected $table = 'problematic_remarks';
    public function Project(){
      return $this->belongsTo('App\Project');
    }
    public function AssignedProjectActivity(){
      return $this->belongsTo('App\AssignedProjectActivity');
    }
    public function User(){
      return $this->belongsTo('App\User');
    }
    public function getUser($id){
      return User::find($id);
    }
}
