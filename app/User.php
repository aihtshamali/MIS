<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Database\Eloquent\Model;
use Auth;
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
    public function AssignedProject()
    {
      return $this->hasMany('App\AssignedProject');
    }
    public function ProjectRemarks()
    {
      return $this->hasMany('App\ProjectRemarks');
    }
    public function AssignedProjectTeam()
    {
      return $this->hasMany('App\AssignedProjectTeam');
    }
    public function AssignedProjectManager()
    {
      return $this->hasMany('App\AssignedProjectManager');
    }
    public function sector(){
      return $this->belongsTo('App\Sector');
    }
    public function UserDetail()
    {
      return $this->hasOne('App\UserDetail');
    }
    public function User()
    {
      return $this->hasOne('App\User');
    }
    public function ProblematicRemarks(){
      return $this->hasMany('App\ProblematicRemarks');
    }
    public function Notifications(){
      return $this->hasMany('App\Notification');
    }
    public function isManager(){
      if(Auth::user()->hasRole('manager'))
        return true;

      return false;
    }
}
