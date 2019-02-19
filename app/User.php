<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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
    public function ActivityDocument(){
      return $this->hasMany('App\ActivityDocument');
    }
    public function plantrip_triprequest(){
      return $this->hasMany('App\plantrip_triprequest');
    }
    public function PlantripMember(){
      return $this->hasMany('App\PlantripMember');
    }
    public function OfficerPositionLog(){
      return $this->hasMany('App\OfficerPositionLog');
    }
    public function VmisDriver(){
      return $this->hasOne('App\VmisDriver');
  }
  public function VmisRequestToTransportOfficer(){
      return $this->hasOne('App\VmisRequestToTransportOfficer','approvedby_user_id');
  }

  //API JWT TOKEN
  public function getJWTIdentifier(){
      return $this->getKey();
  }
  public function getJWTCustomClaims(){
      return [];
  }

  public function TransportOfficerUser(){
    return $this->hasOne('App\VmisRequestToTransportOfficer','transportOfficer_user_id');
  }
  public function RecommendedByUser(){
    return $this->hasOne('App\VmisRequestToTransportOfficer','recommendedby_user_id');
  }
  public function RemarksByUser(){
    return $this->hasOne('App\PlantripRemark','remarksby_user_id');
  }
  public function MConductQualityassesment(){
    return $this->hasMany('App\MConductQualityassesment');
  } 
  public function MBeneficiaryStakeholder(){
    return $this->hasMany('App\MBeneficiaryStakeholder');
  } 
  public function MSponsoringStakeholder(){
    return $this->hasMany('App\MSponsoringStakeholder');
  } 
  public function MExecutingStakeholder(){
    return $this->hasMany('App\MExecutingStakeholder');
  } 
  public function MUserVisitlocation(){
    return $this->hasMany('App\MUserVisitlocation');
}
public function MProjectAttachment(){
  return $this->hasMany('App\MProjectAttachment');
}
}
