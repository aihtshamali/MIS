<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovingForum extends Model
{
   public function ProjectDetail()
   {
     return $this->hasOne('App\ProjectDetail');
   }
}
