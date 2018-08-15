<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssigningForumSubList extends Model
{
  public function AssigningForum(){
    return $this->belongsTo('App\AssigningForum');
  }
  public function Project(){
    return $this->hasOne('App\Project');
  }
}
