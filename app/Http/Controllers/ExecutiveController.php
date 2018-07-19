<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExecutiveController extends Controller
{
    public function index(){
      return view('executive.home.index');
    }


    public function evaluation_index(){
      return view('executive.evaluation.consultant_assign');
    }

    public function pems_index(){
      return view('executive.home.pems_tab');
    }

}
