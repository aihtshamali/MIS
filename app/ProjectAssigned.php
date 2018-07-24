<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectAssigned extends Model
{
    protected $table="assigned_projects";
    
    public function user(){
        return $this->belongsTo('App/User');
    }
    public function project(){
        return $this->hasMany('App/Project');
    }
    public function getProject($id){
        return Project::where('id',$id)->first();
    }
    public function getUser($id){
        return User::where('id',$id)->first();
    }
}

