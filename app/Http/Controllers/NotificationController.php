<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\AssignedProjectTeam;
use App\AssignedProject;
use App\AssignedProjectManager;

class NotificationController extends Controller
{
    public function index($user){
        $notification1=Notification::select('notifications.*','assigned_projects.id','assigned_project_teams.user_id as assigned_user')
        ->leftJoin('assigned_projects','assigned_projects.id','notifications.table_id')
        ->leftJoin('assigned_project_teams','assigned_project_teams.assigned_project_id','assigned_projects.id')
        ->where('table_name','assigned_projects')
        ->where('notifications.status',1)
        ->where('assigned_project_teams.user_id',$user)
        ->where('notifications.user_id','!=',$user)
        ->get()->toArray();

        $notifications=Notification::select('notifications.*','assigned_project_managers.user_id as assigned_user')
        ->leftJoin('assigned_project_managers','assigned_project_managers.id','notifications.table_id')
        ->where('table_name','assigned_project_managers')
        ->where('notifications.status',1)
        ->where('assigned_project_managers.user_id',$user)
        ->where('notifications.user_id','!=',$user)
        ->get()->toArray();

            // $notifications->push($notification1);
        //   }
        // else{
        //   $notifications=$notification1;
        // }
        // return response()->json($notifications);
        if($notifications!=NULL)
            return response()->json(array($notifications,'officer'));
        else{
            return response()->json(array($notification1,'executive'));
        }
    }
    public function store(Request $request){

    }
}
