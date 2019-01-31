<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSponsoringStakeholder extends Model
{ 
    public function MProjectProgress(){
    return $this->belongsTo('App\MProjectProgress');
}
public function User(){
    return $this->belongsTo('App\User');
  }
  public function AssignedSponsoringAgency(){
    return $this->belongsTo('App\AssignedSponsoringAgency');
  }
}
