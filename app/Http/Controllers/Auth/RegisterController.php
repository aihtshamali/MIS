<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\RoleUser;
use App\UserDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use jeremykenedy\LaravelRoles\Models\Role;
use Auth;
use App\Sector;
use App\UserSector;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      // dd($data);
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'cnic' => 'required|max:13',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function showRegistrationForm()
    {
        $roles=Role::all();
        $sectors=Sector::where('status',1)->get();

        return view('auth.register',['roles'=>$roles,'sectors'=>$sectors]);
    }
    protected function create(array $data)
    {

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'admin_password'=> 'JzsrFyKoFpSE5Sg1ScQBskDl6d53a1ehEwYIaALQI3WOmTITn5Ko7y6WqLYe',
            'api_token'=> str_random(60)
        ]);
        $role_name = Role::find($data['role_id']); 
        $user_detail = new UserDetail();
        $user_detail->cnic=$data['cnic'];
        $user_detail->father_name=$data['father_name'];
        if($role_name->slug == 'member')
        foreach ($data['sector_id'] as $sector) {
            $usersectors = new UserSector();
            $usersectors->role_id = $role_name->id;
            $usersectors->user_id = $user->id;
            $usersectors->sector_id  = $sector;
            $usersectors->save();
        }
        else
            $user_detail->sector_id=$data['sector_id'][0];
        $user_detail->user_id=$user->id;
        $user_detail->save();

        $user_role=new RoleUser();
        $user_role->role_id=$data['role_id'];
        $user_role->user_id=$user->id;
        $user_role->save();
        return $user;

    }
}
