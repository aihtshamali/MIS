<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssigningForum extends Model
{
    public function Project(){
      return $this->hasOne('App\Project');
    }
    public function ProjectLog(){
      return $this->hasOne('App\Project');
    }
    public function AssigningForumSubList(){
      return $this->hasMany('App\AssigningForumSubList');
    }
    public function ProjectDetail(){
        return $this->hasOne('App\ProjectDetail');
      }

}
