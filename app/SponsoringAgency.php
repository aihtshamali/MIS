<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsoringAgency extends Model
{
    public function subsector()
    {
      return $this->belongsTo('App\SubSector');
    }
}
