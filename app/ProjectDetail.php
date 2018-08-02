<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{

    public function project(){
        return $this->belongsTo('App/Project');
    }

    public function AssigningForum(){
        return $this->belongsTo('App/AssigningForum');
    }
   
    public function District(){
        return $this->belongsTo('App/District');
    }

    public function getDistrict($id){
        return District::where('id',$id)->first();
    }

    public function getAssigningForum($id){
        return AssigningForum::where('id',$id)->first();
    }
}
