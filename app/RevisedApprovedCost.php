<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevisedApprovedCost extends Model
{
    public function Project()
    {
      return $this->belongsTo('App\Project');
    }
}
