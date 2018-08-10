<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

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
