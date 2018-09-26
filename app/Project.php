<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function AssignedProject(){
        return $this->hasOne('App\AssignedProject');
    }
    public function ProjectDetail(){
        return $this->hasOne('App\ProjectDetail');
    }
    public function AssigningForumSubList(){
        return $this->belongsTo('App\AssigningForumSubList');
    }
    public function AssignedSponsoringAgencies(){
        return $this->hasMany('App\AssignedSponsoringAgency');
    }
    public function AssignedExecutingAgencies(){
        return $this->hasMany('App\AssignedExecutingAgency');
    }
    public function AssignedApprovingForum(){
        return $this->hasMany('App\ApprovingForum');
    }
    public function AssignedAssigningForum(){
        return $this->hasMany('App\AssigningForum');
    }

    public function AssignedDistricts(){
        return $this->hasMany('App\AssignedDistrict');
    }
    public function AssignedProjectManager(){
        return $this->hasMany('App\AssignedProjectManager');
    }
    public function AssignedSubSectors(){
        return $this->hasMany('App\AssignedSubSector');
    }
    // public function AssignedDepartments(){
    //     return $this->hasMany('App\AssignedDepartment');
    // }
    public function ProjectType(){
      return $this->belongsTo('App\ProjectType');
    }
    public function EvaluationType(){
        return $this->belongsTo('App\EvaluationType');
    }
    public function RevisedApprovedCost()
    {
      return $this->hasMany('App\RevisedApprovedCost');
    }
    public function RevisedEndDate()
    {
      return $this->hasMany('App\RevisedEndDate');
    }
    public function ProblematicRemarks()
    {
      return $this->hasMany('App\ProblematicRemarks');
    }


}
