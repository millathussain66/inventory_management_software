<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class SubSubCategory extends Model
{
    use HasFactory,HasRoles;
    protected $app_session;
    protected static $app_session_static;
    protected $table = 'sub_sub_categories';
    public $timestamps = false;
    protected $fillable = [
        "id",
        "sub_category_id",
        "name",
        "created_by",
        "created_at",
        "update_by",
        "update_at",
        "delete_by",
        "delete_at",
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
