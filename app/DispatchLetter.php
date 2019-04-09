<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispatchLetter extends Model
{
    
    public function User()
    {
      return $this->belongsTo('App\User','sender_id');
    }
    public function DispatchLetterCc()
    {
      return $this->hasMany('App\DispatchLetterCc');
    }
    public function DispatchLetterDoctype()
    {
      return $this->belongsTo('App\DispatchLetterDoctype');
    }
    public function DispatchLetterPriority()
    {
      return $this->belongsTo('App\DispatchLetterPriority');
    }
    
}
