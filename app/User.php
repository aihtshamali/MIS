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
        'first_name','last_name','username', 'email', 'password','api_token','admin_password'
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
<<<<<<< HEAD
    public function AssignedProjectTeam()
    {
      return $this->hasMany('App\AssignedProjectTeam');
=======
    public function sector(){
      return $this->belongsTo('App\Sector');
>>>>>>> 17df0899a37d3c0fee0108d6b7db6c2607965dab
    }
}
