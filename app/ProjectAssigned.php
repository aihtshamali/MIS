<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectAssigned extends Model
{
<<<<<<< HEAD
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
=======
    protected $table='assigned_projects';
    public function user(){
      return $this->belongsTo('App\User');
>>>>>>> 17df0899a37d3c0fee0108d6b7db6c2607965dab
    }
}

