<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function evaluation_index(){
      return view('executive.evaluation.consultant_assign');
    }

    public function evaluation_assignedprojects(){
      return view('executive.evaluation.assigned');
    }
    public function evaluation_completedprojects(){
      return view('executive.evaluation.completed');
    }

   

}
