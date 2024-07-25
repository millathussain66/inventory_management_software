<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



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



class CommonModel extends Model
{
    use HasFactory;
    protected $app_session;
    protected static $app_session_static;
    public function __construct() 
    {
        $this->app_session = config('app_session_settings.session_config.app_session');
    }
    // session data static function for get from static method 
    public static function initialize()
    {
        self::$app_session_static = config('app_session_settings.session_config.app_session');
    }


    
	public static function user_activities($action_name,$table_name,$table_row_id,$remarks)
	{
		$ip_address = request()->ip();
		if ($ip_address == '0.0.0.0') {
			$ip_address = $_SERVER['REMOTE_ADDR'];
		}
		try {
			DB::table('user_activity')->insert([
				'action_name' => $action_name,
				'table_name' => $table_name,
				'table_row_id' => $table_row_id,
				'e_dt' => now(),
				'ip_address' => $ip_address,
				'remarks' => $remarks,
			]);
			return 1;
		} catch (\Exception $e) {
			return 0;
		}
	}


    public static function login_history($userid,$login_datetime,$logout_datetime,$status)
	{
        $ip_address = request()->ip();
		if ($ip_address == '0.0.0.0') {
			$ip_address = $_SERVER['REMOTE_ADDR'];
		}
		try {
			DB::table('user_log_history')
				->insert([
					'ip_address' 		=> $ip_address,
					'user_id' 			=> $userid,
					'login_datetime' 	=> $login_datetime,
					'logout_datetime' 	=> $logout_datetime,
					'status' 			=> $status
				]);
			return 1;
		} catch (\Exception $e) {
			return 0;
		}
	}



}
