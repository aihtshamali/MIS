<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChairmanController extends Controller
{
    public function assignToDC(Request $request){
        dd($request->all());
    }
}
