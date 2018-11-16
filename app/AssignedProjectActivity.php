<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedProjectActivity extends Model
{
    // public function Project()
    // {
    //   return $this->belongsTo('App\Project');
    // }
    public function AssignedProject()
    {
      return $this->belongsTo('App\AssignedProject','project_id');
    }
    public function ProjectActivity()
    {
      return $this->belongsTo('App\ProjectActivity');
    }
    public function AssignedActivityAttachments(){
      return $this->hasMany('App\AssignedActivityAttachment');
    }
    public function ProblematicRemarks(){
      return $this->hasMany('App\ProblematicRemarks');
    }
    public function AssignedProjectActivityProgressLog()
    {
      return $this->hasMany('App\AssignedProjectActivityProgressLog','assigned_project_activities_id');
    }
    public function AssignedActivityDocument(){
      $this->hasMany('App\AssignedActivityDocument');
    }
}
