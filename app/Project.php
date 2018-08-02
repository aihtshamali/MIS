<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user(){
        return $this->belongsTo('App/User');
    }
    public function projectAssigned(){
        return $this->belongsTo('App\ProjectAssigned');
    }
<<<<<<< HEAD
    public function projectDetails(){
        return $this->hasOne('App/ProjectDetail');
=======
    public function project_details(){
        return $this->hasOne('App\ProjectDetail');
    }
    public function AssignedSponsoringAgencies(){
        return $this->hasMany('App\AssignedSponsoringAgency');
    }
    public function AssignedExecutingAgencies(){
        return $this->hasMany('App\AssignedExecutingAgency');
    }
    public function AssignedDistricts(){
        return $this->hasMany('App\AssignedDistrict');
    }
    public function AssignedDepartments(){
        return $this->hasMany('App\AssignedDepartment');
>>>>>>> 52ecd0652e76b3d11f63e3bdac40716060f690e1
    }
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

}
