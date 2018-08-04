<?php

namespace App\Http\Controllers;
use App\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function import_file()
    {
        return view('districts.add_districts');
    }
    public function post_Import()
    {
        Excel::load(Input::file('file'), function($reader){
            $reader->each(function($sheet){
                 
                $dist= new District();
              dd($dist);  
                // $dist->districts_of_punjab=$sheet->districts_of_punjab;
               
                // $data->save();
               
               

            });
          
         
         });   
         return back();
    }
}
