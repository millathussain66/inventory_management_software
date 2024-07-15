<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static function register_submit($request) {
        $data = [
            'user_name'       => $request->input('user_name'),
            'email'           => $request->input('email'),
            'password'        => Hash::make($request->input('password')),
            'terms'           => ($request->input('terms')=='on')?1:0,
            'created_at'      => now(),
        ];
        $id = DB::table('users')->insertGetId($data);
        return DB::table('users')->where('id', $id)->first();
    }
    

}
