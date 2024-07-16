<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static function register_submit($request)
    {
        $data = [
            'user_name'       => $request->input('user_name'),
            'email'           => $request->input('email'),
            // 'password'        => Hash::make($request->input('password')),
            'password'         => Crypt::encryptString($request->input('password')),
            'terms'           => ($request->input('terms') == 'on') ? 1 : 0,
            'created_at'      => now(),
        ];
        $id = DB::table('users')->insertGetId($data);
        return DB::table('users')->where('id', $id)->first();
    }

    public static function update_profile($request)
    {
        $data = [
            'first_name'       => $request->input('first_name'),
            'last_name'        => $request->input('last_name'),
            'phone'            => $request->input('phone'),
            'user_name'        => $request->input('user_name'),
            'email'            => $request->input('email'),
            // 'password'         => Hash::make($request->input('password')),
            'password'         => Crypt::encryptString($request->input('password')),
            'update_at'       => now(),
            'update_by'       => session('id')
        ];
        DB::table('users')->where('id',session('id'))->update($data);
        return DB::table('users')->where('id', session('id'))->first();
    }
}
