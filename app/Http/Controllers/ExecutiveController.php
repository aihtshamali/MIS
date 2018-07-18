<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExecutiveController extends Controller
{
    public function index(){
      return view('executive.home.index');
    }
}
