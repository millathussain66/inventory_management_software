<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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


                // Generate and save the avatar
                $imagePath = 'public/avatar-' . $usr_row->id . '.png'; // Adjust the file extension as needed
                Storage::put($imagePath, $this->avatar->create($usr_row->user_name));
                session(['registration_success' => true]);
                session([
                    'first_name' => $usr_row->first_name,
                    'last_name' => $usr_row->last_name,
                    'email' => $usr_row->email,
                    'user_name' => $usr_row->user_name,
                    'imagePath' => $imagePath, // Store the imagePath in session
                ]);
                return redirect()->route('dashboard')->with(['status' => 'Registration successful!']);
            }else{
                return redirect()->route('user.register')->with('status', 'Registration not successful!');
            }
    }
}
