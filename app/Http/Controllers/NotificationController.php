<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
class NotificationController extends Controller
{
    public function index(){
        return response()->json(Notification::all());
    }
    public function store(Request $request){

    }
}
