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

class SubCategory extends Model
{
    use HasFactory;
    protected $app_session;
    protected static $app_session_static;
    protected $table = 'sub_categories';
    protected $fillable = [
        "id",
        "categorie_id",
        "name",
        "code",
        "description",
        "e_by",
        "e_at",
        "u_at",
        "u_by",
        "d_by",
        "d_at",
        "status"
     ];
    public function __construct() 
    {
        $this->app_session = config('app_session_settings.session_config.app_session');
    }
    // session data static function for get from static method 
    public static function initialize()
    {
        self::$app_session_static = config('app_session_settings.session_config.app_session');
    }

    

}
