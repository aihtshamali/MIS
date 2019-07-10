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
    public function AssignedProjectTeamLog(){
      return $this->hasMany('App\AssignedProjectTeamLog');
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

    public function MFinancialData(){
      return $this->hasMany('App\MFinancialData');
    }
    public function MPhysicalActivity(){
      return $this->hasMany('App\MPhysicalActivity');
    }
    public function MQualityAssesment(){
      return $this->hasMany('App\MQualityAssesment');
    }
    public function MStakeHolder(){
      return $this->hasMany('App\MStakeHolder');
    }
    public function MAssignedProjectIssue(){
      return $this->hasMany('App\MAssignedProjectIssue');
    }
    public function MRiskCategory(){
      return $this->hasMany('App\MRiskCategory');
    }
    public function MBeforeMitigation(){
      return $this->hasMany('App\MBeforeMitigation');
    }
    public function MAssignedProjectHealthSafety(){
      return $this->hasMany('App\MAssignedProjectHealthSafety');
    }
    public function MSubsequent(){
      return $this->hasMany('App\MSubsequent');
    }
    public function PlantripVisitedproject(){
      return $this->belongsTo('App\PlantripVisitedproject');
    }
    public function MProjectProgress()
    {
      return $this->hasMany('App\MProjectProgress');
    }
    public function StoppedProject()
    {
      return $this->hasOne('App\StoppedProject');
    }
    public function PostSne()
    {
      return $this->hasMany('App\PostSne');
    }
    

}
