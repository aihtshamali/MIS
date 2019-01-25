<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignedProject;
use App\User;
use Auth;
use App\Http\Resources\AssignedProject as AssignedResource;
use App\Http\Resources\User as UserResource;

class DataController extends Controller
{
        public function open()
        {
            $data = "This data is open and can be accessed without the client being authenticated";
            return response()->json(compact('data'),200);
        }

        public function closed()
        {
            $data = "Only authorized users can see this";
            return response()->json(compact('data'),200);
        }

        public function getAssignedProject(){
          return response()->json(new UserResource(User::find(Auth::id())));
          return AssignedResource::collection(Auth::user()->AssignedProjectTeam);
        }
}
