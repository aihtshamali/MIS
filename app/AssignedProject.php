<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedProject extends Model
{
    protected $table="assigned_projects";

    public function user(){
        return $this->belongsTo('App\User','assigned_by');
    }
    public function project(){
        return $this->belongsTo('App\Project');
    }
    public function ProjectLog(){
        return $this->hasOne('App\ProjectLog');
    }
    public function AssignedProjectTeam(){
      return $this->hasMany('App\AssignedProjectTeam');
    }
    public function AssignedProjectManager(){
        return $this->hasOne('App\AssignedProjectManager');
      }
      public function AssignedProjectActivity()
      {
        return $this->hasMany('App\AssignedProjectActivity','project_id');
      }
    // public function getProject($id){
    //     return Project::where('id',$id)->first();
    // }
    public function getassignedperson($id){
        return User::where('id',$id)->first();
    }

}
