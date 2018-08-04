<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedProject extends Model
{
    protected $table="assigned_projects";

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function project(){
        return $this->belongsTo('App\Project');
    }
    public function AssignedProjectTeam(){
      return $this->hasMany('App\AssignedProjectTeam');
    }
    // public function getProject($id){
    //     return Project::where('id',$id)->first();
    // }
    // public function getUser($id){
    //     return User::where('id',$id)->first();
    // }

}
