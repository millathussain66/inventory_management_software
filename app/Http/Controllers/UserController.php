<?php

namespace App\Http\Controllers;

use App\Models\User;

use Laravolt\Avatar\Avatar;
use Illuminate\Validation\Rule;
use App\Models\CommonModel;


// Common Use
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Session;
use Illuminate\Support\Facades\Session;

use Config;
use Cookie;
use URL;
use File;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\Console\Input\Input;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $avatar;
    protected $CommonModel;
    protected $User;
    public function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->User = new User();
        $this->avatar = new Avatar();
        // $this->middleware('permission:view user', ['only' => ['index']]);
        // $this->middleware('permission:create user', ['only' => ['create','store']]);
        // $this->middleware('permission:update user', ['only' => ['update','edit']]);
        // $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }

    public function register_view()
    {
        return view('login_register.register');
    }

    public function register_submit(Request $request)
    {

        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255|unique:users|regex:/^[A-Za-z0-9]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'terms' => 'accepted',
        ]);
        if ($validatedData == true) {
            $usr_row = User::register_submit($request);
            session(['registration_success' => true]);
            session(['go_in_status' => 'Register']);
            session([
                'id' => $usr_row->id,
                'first_name' => $usr_row->first_name,
                'last_name' => $usr_row->last_name,
                'email' => $usr_row->email,
                'user_name' => $usr_row->user_name,
                'phone' => $usr_row->phone,
            ]);
            return redirect()->route('dashboard')->with(['status' => 'Registration successful!']);
        } else {
            return redirect()->route('user.register')->with('status', 'Registration not successful!');
        }
    }

    public function login_submit(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validatedData == true) {
            $usr_row = User::login_submit($request);
            if(!is_object($usr_row) && $usr_row==0){
                return redirect()->route('user.login')->with("user_name",'User name / email address not found');
            }else if(!is_object($usr_row) && $usr_row==1){
                return redirect()->route('user.login')->with("password",'Password not match this user name');
            }else if(!is_object($usr_row) && $usr_row==404){

                return redirect()->route('user.login')->with("exist_login",'Already login this user in another devices');

            }else{
                session(['registration_success' => true]);
                session(['go_in_status' => 'Login']);
                session([
                    'id'         => $usr_row->id,
                    'first_name' => $usr_row->first_name,
                    'last_name'  => $usr_row->last_name,
                    'email'      => $usr_row->email,
                    'user_name'  => $usr_row->user_name,
                    'phone'      => $usr_row->phone,
                ]);
                return redirect()->route('dashboard')->with(['status' => 'Login successful!']);
            }
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {

            return redirect()->route('dashboard')->with('success', 'Login successful.');
        } else {
            // Passwords do not match
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }
    }


    public function profile()
    {

        // $sql = "SELECT
        //         mg.menu_name,
        //         mlmc.menu_category_name,
        //         GROUP_CONCAT(mlmc.menu_link_name, '#') AS menu_link_name,
        //         GROUP_CONCAT(mlmc.menu_operation, '#') AS menu_operation
        //         FROM
        //         (
        //             SELECT
        //             mc.menu_category_name,
        //             ml.menu_group_id,
        //             ml.menu_link_name,
        //             ml.menu_operation
        //             FROM
        //             menu_link ml
        //             LEFT JOIN menu_category AS mc ON mc.id = ml.menu_category_id
        //         ) mlmc
        //         LEFT OUTER JOIN menu_group AS mg ON mlmc.menu_group_id = mg.id";


        //   $data = DB::select($sql);

        //   pad($data);





     
        $info = DB::table('users')->where("id", session('id'))->first();
        $decryptedPassword = Crypt::decryptString($info->password);
        return view('profile.grid', ['info' => $info, 'decryptedPassword' => $decryptedPassword]);
    }

    public function update_profile(Request $request)
    {
        $validatedData = $request->validate([
            'first_name'    => 'string|max:255',
            'last_name'     => 'string|max:255',
            // 'user_name' => [
            //     'required',
            //     'string',
            //     'max:255',
            //     'regex:/^[A-Za-z0-9]+$/',
            //     Rule::unique('users')->ignore(session('id')),
            // ],
            // 'email' => [
            //     'required',
            //     'email',
            //     Rule::unique('users')->ignore(session('id')),
            // ],
            'password'   => 'required|string|min:8',
            'phone' => [
                'numeric',
                'min:11',
                'regex:/^\d{11}$/',
                Rule::unique('users')->ignore(session('id')),
            ],
        ]);
        if ($validatedData == true) {
            $usr_row = User::update_profile($request);
            session([
                'first_name' => $usr_row->first_name,
                'last_name' => $usr_row->last_name,
                // 'email' => $usr_row->email,
                // 'user_name' => $usr_row->user_name,
                'phone' => $usr_row->phone,
            ]);

            return redirect()->route('profile.view')->with(['status' => 'User informaiton Updates successful!']);
        } else {
            return redirect()->route('profile.view')->with(['status' => 'User informaiton Updates no successful!']);
        }
    }

    public function log_out()
    {
        DB::table('users')->where('id', session('id'))->update(['session_user_have'=>0]);
        CommonModel::login_history(session('id') , null, now() , "Logout");
        Session::flush();
        Session::regenerate();
        session(['registration_success' => false]);
        return redirect('/login')->with('message', 'Successfully logged out!');
    }
    public function check_activity()
    {
        if(session('registration_success')!=false){
            $data = DB::table('users')->select('session_user_have')->where('id', session('id'))->first();
            echo json_encode($data->session_user_have);
        }else{
            echo json_encode(0);
        }
    }

    public function index()
    {
        $users = User::get();
        return view('role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('role-permission.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);

        $user->syncRoles($request->roles);

        return redirect('/users')->with('status','User created successfully with roles');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status','User Updated Successfully with roles');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect('/users')->with('status','User Delete Successfully');
    }
}