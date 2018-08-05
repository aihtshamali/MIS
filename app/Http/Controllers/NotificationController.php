<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\AssignedProjectTeam;
use App\AssignedProject;
use App\AssignedProjectManager;
use Auth;
class NotificationController extends Controller
{

    public function index(Request $request){


        return response()->toJson($request->user);
    }
    public function store(Request $request){

    }
}
