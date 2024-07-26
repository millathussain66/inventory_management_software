<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


// Common Use
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isNull;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $app_session;
    protected static $app_session_static;
    public $timestamps = false;
    public function __construct()
    {
        $this->app_session = config('app_session_settings.session_config.app_session');
    }
    // session data static function for get from static method 
    public static function initialize()
    {
        self::$app_session_static = config('app_session_settings.session_config.app_session');
    }

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
        DB::table('users')->where('id', $id)->update(['session_user_have'=>1]);
        CommonModel::login_history( $id , now() , null , "Register");
        return DB::table('users')->where('id', $id)->first();
    }

    public static function login_submit($request)
    {
        $data =  DB::table('users')->where('user_name', $request->user_name)->orWhere('email', $request->user_name)->first();
        if (!empty($data)) {
            $data_pass =  DB::table('users')->where('user_name', $request->user_name)->orWhere('email', $request->user_name)->first();
            $decryptedPassword_db = Crypt::decryptString($data_pass->password);
            if ($decryptedPassword_db==$request->password) {
                if($data_pass->session_user_have==0){
                    DB::table('users')->where('id', $data->id)->update(['session_user_have'=>1]);
                    CommonModel::login_history( $data_pass->id , now() , null ,"Login");
                    return $data;
                }else{
                    CommonModel::login_history( $data_pass->id , now() , null ,"Try to login existing user");
                    return 404;
                }
            }else{
                    return 1;
            }
        } else {
                    return 0;
        }
    }

    public static function update_profile($request)
    {
        $data = [
            'first_name'       => $request->input('first_name'),
            'last_name'        => $request->input('last_name'),
            'phone'            => $request->input('phone'),
            // 'user_name'        => $request->input('user_name'),
            // 'email'            => $request->input('email'),
            // 'password'         => Hash::make($request->input('password')),
            'password'         => Crypt::encryptString($request->input('password')),
            'update_at'       => now(),
            'update_by'       => session('id')
        ];
        DB::table('users')->where('id', session('id'))->update($data);
        return DB::table('users')->where('id', session('id'))->first();
    }
}
