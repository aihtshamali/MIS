<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedSponsoringAgency extends Model
{
    public function ProjectDetail(){
        return $this->belongsTo('App\ProjectDetail');
      }
      public function SponsoringAgency(){
        return $this->belongsTo('App\SponsoringAgency');
      }
     
}
