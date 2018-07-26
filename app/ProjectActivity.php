<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectActivity extends Model
{
    protected $table="project_activities";
    
    public function getProject($id){
        return Project::where('id',$id)->first();
    }
   
}
