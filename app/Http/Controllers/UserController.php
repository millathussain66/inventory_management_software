<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Avatar;
class UserController extends Controller
{
    protected $avatar;
    function __construct()
    {
        $this->avatar = new Avatar();
    }

    public function register_view(){
        return view('login_register.register');
    }

    public function register_submit(Request $request) {

           $validatedData = $request->validate([
                'user_name' => 'required|string|max:255|regex:/^[A-Za-z0-9]+$/',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required|string|min:8',
                'terms' => 'accepted',
            ]);
            if($validatedData==true){
                $usr_row = User::register_submit($request);
                session(['registration_success' => true]);
                session([
                    'first_name' => $usr_row->first_name,
                    'last_name' => $usr_row->last_name,
                    'email' => $usr_row->email,
                    'user_name' => $usr_row->user_name,
                    'phone' => $usr_row->phone,
                    'password' => $request->password,
                ]);
                return redirect()->route('dashboard')->with(['status' => 'Registration successful!']);
            }else{
                return redirect()->route('user.register')->with('status', 'Registration not successful!');
            }
    }

    public function login(Request $request){

    }


    public function profile(){
        return view('profile.grid');
    }

    public function update_profile(Request $request){
            $validatedData = $request->validate([
                'first_name'    => 'required|string|max:255',
                'last_name'     => 'required|string|max:255',
                'user_name'     => 'required|string|max:255|regex:/^[A-Za-z0-9]+$/',
                'email'         => 'required|email|unique:users',
                'password'      => 'required|string|min:8',
                'phone'         => 'required|numeric|min:8|regex:/^\d{11}$/',
            ]);
            if($validatedData==true){
                $usr_row = User::update_profile($request);
            }



    }





    public function log_out(){

        Session::flush();
        Session::regenerate();
        session(['registration_success' => false]);
        return redirect('/login')->with('message', 'Successfully logged out!');

    }
}
