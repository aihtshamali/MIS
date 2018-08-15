<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DirectorMonitoringController extends Controller
{
    public function index()
    {
        return view('Director.Monitoring.home.index');
  
    }
    public function pems_index(){
      
        return view('Director.Monitoring.home.pems_tab');
      }
  
      public function pmms_index(){
          
        return view('Director.Monitoring.home.pmms_tab');
      }
  
      public function tpv_index(){
        return view('Director.Monitoring.home.tpv_tab');
      }

      public function inquiry_index(){
        return view('Director.Monitoring.home.inquiry_tab');
      }
}
