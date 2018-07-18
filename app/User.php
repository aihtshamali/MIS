<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function chats()
    {
      return $this->hasMany('App\Chat');
    }
    public function project()
    {
      return $this->hasMany('App\Project');
    }
    public function ProjectAssigned()
    {
      return $this->hasMany('App\ProjectAssigned');
    }
    public function ProjectRemarks()
    {
      return $this->hasMany('App\ProjectRemarks');
    }
}
