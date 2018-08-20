<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedProjectActivity extends Model
{
    public function Project()
    {
      return $this->belongsTo('App\Project');
    }

    public function ProjectActivity()
    {
      return $this->belongsTo('App\ProjectActivity');
    }
<<<<<<< HEAD
    public function AssignedActivityAttachments(){
      return $this->hasMany('App\AssignedActivityAttachment');
=======
    public function ProblematicRemarks(){
      return $this->hasMany('App\ProblematicRemarks');
>>>>>>> 68395ee59cce49eae68c11148c19f7442068276b
    }
    public function AssignedProjectActivityProgressLog()
    {
      return $this->hasOne('App\AssignedProjectActivityProgressLog');
    }
}
