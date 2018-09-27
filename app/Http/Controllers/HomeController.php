<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\AssignedProject;
use App\AssignedProjectActivity;
use Auth;
use Illuminate\Support\Facades\Schema;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $project = AssignedProject::find($assigned_project_activity->project_id);
      // $percentage_array = [15.26,8.26,10.05,6.99,8.03,8.16,14.79,8.23,2.77,9.35,4.17,3.94];
      // $projects = AssignedProject::all();
      // $i = 0;
      // foreach ($projects as $pro) {
      //   $i=0;
      //   $total_progress = 0;
      //   foreach ($pro->AssignedProjectActivity as $activity) {
      //     $total_progress = ($total_progress  +  ( ($activity->progress/100.0) * $percentage_array[$i] ));
      //     $i+=1;
      //   }
      //   $pro->progress = $total_progress;
      //   $pro->save();
      // }
      // $project_activities = $project->AssignedProjectActivity;
      // return $project_activities;
      // foreach($project_activities as $pa){

        // print_r( ($pa->progress/100.0) * $percentage_array[$i].' ');
      //   $i += 1;
      //
      // }
      // return $total_progress;


      return view('home');
    }

    public function reset_password()
    {
      return view('profile.reset');
    }
    public function reset_store(Request $request)
    {
      // dd($request->all());
      $result = $request->validate([
             'password' => 'required|string|min:6|confirmed',
         ]);
      $user=Auth::user();
      $user->password=bcrypt($request->password);
      // dd($user);
      $user->save();

      return redirect('/dashboard');
    }
}
