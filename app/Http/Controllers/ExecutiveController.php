<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\AssignedProject;
use App\User;
class ExecutiveController extends Controller
{
  //  HOME FOLDER
    public function index(){
      return view('executive.home.index');
    }

    public function pems_index(){
      return view('executive.home.pems_tab');
    }

    public function pmms_index(){
      return view('executive.home.pmms_tab');
    }

    public function tpv_index(){
      return view('executive.home.tpv_tab');
    }

    public function specialassign_index(){
      return view('executive.home.specialassign_tab');
    }

    public function inquiry_index(){
      return view('executive.home.inquiry_tab');
    }

    public function other_index(){
      return view('executive.home.other_tab');
    }
// EVALUATION FOLDER
    // public function evaluation_index(){
    //   $managers=User::select('roles.*','role_user.*','users.*')
    //   ->leftJoin('role_user','role_user.user_id','users.id')
    //   ->leftJoin('roles','roles.id','role_user.role_id')
    //   ->where('roles.name','manager')
    //   ->get();
    //   $officers=User::select('roles.*','role_user.*','users.*')
    //   ->leftJoin('role_user','role_user.user_id','users.id')
    //   ->leftJoin('roles','roles.id','role_user.role_id')
    //   ->where('roles.name','officer')
    //   ->get();
    //   $projects = Project::select('projects.*')
    //   ->rightJoin('assigned_projects','assigned_projects.project_id','projects.id')
    //   ->get();
    //   dd($projects);
    //   $users = User::all();
    //   return view('project_assigned.index',['officers'=>$officers,'managers'=>$managers,'projects'=>$projects,'users'=>$users]);
    // }

    public function evaluation_assignedprojects(){
      $projects=AssignedProject::all();
      // dd($projects);
      return view('executive.evaluation.assigned',['projects'=>$projects]);
    }
    public function evaluation_completedprojects(){
      return view('executive.evaluation.completed');
    }



}
