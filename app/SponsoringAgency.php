<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsoringAgency extends Model
{
    public function AssignedSponsoringAgency(){
        return $this->hasMany('App\AssignedSponsoringAgency');
    }    

}
