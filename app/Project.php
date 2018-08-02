<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user(){
        return $this->belongsTo('App/User');
    }
    public function projectAssigned(){
        return $this->belongsTo('App/ProjectAssigned');
    }
    public function projectDetails(){
        return $this->hasOne('App/ProjectDetail');
    }
    public function ProjectType(){
      return $this->belongsTo('App\ProjectType');
    }
    public function EvaluationType(){
        return $this->belongsTo('App\EvaluationType');
      }
    public function getProjectType($id){
        return ProjectType::where('id',$id)->first();
    }
    public function getSponsoringAgency($id){
        return SponsoringAgency::where('id',$id)->first();
    }
    public function getExecutingAgency($id){
        return ExecutingAgency::where('id',$id)->first();
    }
    public function getEvaluationType($id){
        return EvaluationType::where('id',$id)->first();
    }
}
