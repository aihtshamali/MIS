<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedSponsoringAgency extends Model
{
    public function ProjectDetail(){
        return $this->belongsTo('App\ProjectDetail');
      }
      public function project(){
        return $this->belongsTo('App\Project');
      }
      public function SponsoringAgency(){
        return $this->belongsTo('App\SponsoringAgency');
      }
     
      public function MSponsoringStakeholder(){
        return $this->hasMany('App\MSponsoringStakeholder');
      } 
    

}
