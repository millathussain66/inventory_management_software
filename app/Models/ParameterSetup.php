<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ParameterSetup extends Model
{
    use HasFactory;


    public function get_grid_data($filterscount, $sortdatafield, $sortorder, $limit, $offset)
    {
        $i = 0;
        if (isset($filterscount) && $filterscount > 0) {
            $where = "(";
            $tmpdatafield = "";
            $tmpfilteroperator = "";
            for ($i = 0; $i < $filterscount; $i++) {
                // get the filter's value.
                $filtervalue = str_replace('"', '""', str_replace("'", "''", Request()->input('filtervalue' . $i)));
                $filtercondition = Request()->input('filtercondition' . $i);
                // get the filter's column.
                $filterdatafield = Request()->input('filterdatafield' . $i);
                // get the filter's operator.
                $filteroperator = Request()->input('filteroperator' . $i);

                $filterdatafield = 'J0.' . $filterdatafield;
                if ($tmpdatafield == "") {
                    $tmpdatafield = $filterdatafield;
                } else if ($tmpdatafield <> $filterdatafield) {
                    $where .= ")AND(";
                } else if ($tmpdatafield == $filterdatafield) {
                    if ($tmpfilteroperator == 0) {
                        $where .= " AND ";
                    } else $where .= " OR ";
                }
                // build the "WHERE" clause depending on the filter's condition, value and datafield.
                switch ($filtercondition) {
                    case "CONTAINS":
                        $where .= " UPPER(" . $filterdatafield . ") LIKE '%" . strtoupper($filtervalue) . "%'";
                        break;
                    case "DOES_NOT_CONTAIN":
                        $where .= " UPPER(" . $filterdatafield . ") NOT LIKE '%" . strtoupper($filtervalue) . "%'";
                        break;
                    case "EQUAL":
                        $where .= " " . $filterdatafield . " = '" . $filtervalue . "'";
                        break;
                    case "NOT_EQUAL":
                        $where .= " " . $filterdatafield . " <> '" . $filtervalue . "'";
                        break;
                    case "GREATER_THAN":
                        $where .= " " . $filterdatafield . " > '" . $filtervalue . "'";
                        break;
                    case "LESS_THAN":
                        $where .= " " . $filterdatafield . " < '" . $filtervalue . "'";
                        break;
                    case "GREATER_THAN_OR_EQUAL":
                        $where .= " " . $filterdatafield . " >= '" . $filtervalue . "'";
                        break;
                    case "LESS_THAN_OR_EQUAL":
                        $where .= " " . $filterdatafield . " <= '" . $filtervalue . "'";
                        break;
                    case "STARTS_WITH":
                        $where .= " UPPER(" . $filterdatafield . ") LIKE '" . strtoupper($filtervalue) . "%'";
                        break;
                    case "ENDS_WITH":
                        $where .= " UPPER(" . $filterdatafield . ") LIKE '%" . strtoupper($filtervalue) . "'";
                        break;
                    case "EMPTY":
                        $where .= " " . $filterdatafield . "  = '' ";
                        break;
                    case "NOT_EMPTY":
                        $where .= " " . $filterdatafield . " != ''";
                        break;
                    case "NULL":
                        $where .= " " . $filterdatafield . " IS NULL ";
                        break;
                    case "NOT_NULL":
                        $where .= " " . $filterdatafield . " IS NOT NULL ";
                        break;
                }

                if ($i == $filterscount - 1) {
                    $where .= ")";
                }
                $tmpfilteroperator = $filteroperator;
                $tmpdatafield = $filterdatafield;
            }
        }

        if ($sortorder == '') {
            $sortdatafield = "CREATE_DATE_TIME";
            $sortorder = "asc";
        }
        $limit = 10;
        $offset = 0;

        $data = DB::table('information_schema.tables as j0')
            ->select(
                'j0.*',
                DB::raw("DATE_FORMAT(j0.CREATE_TIME, '%a %b %d %Y') as CREATE_DATE_TIME"),
                DB::raw("count(*) over() as total_row"),
                DB::raw("(SELECT COUNT(*) 
                    FROM information_schema.columns 
                    WHERE table_schema = 'inventory_management_software' 
                    AND table_name = j0.table_name) AS column_count")
            )
            ->where('j0.table_schema', 'inventory_management_software')
            ->orderBy($sortdatafield, $sortorder)
            ->offset($offset)
            ->limit($limit);
        $q = $data->get();
        if (count($q)  > 0) {
            $objCount = $q->toArray();
            $result["TotalRows"] = $objCount[0]->total_row;
            $result["Rows"] = $q;
        } else {
            $result["TotalRows"] = 0;
            $result["Rows"] = array();
        }
        return $result;
    }
    public function duplicate_check($request)
    {
        $DB_SELECT = "SELECT * 
            FROM information_schema.tables 
            WHERE table_schema = 'inventory_management_software' AND table_name = '$request->val';";
        return DB::select($DB_SELECT);
    }
    public function store($request)
    {
        if ($request->action_status == "add") {
            // Sanitize the table name to avoid SQL injection
            $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $request->table_name_hidden);
            $tableComment = addslashes($request->table_name);

            $DB_STATEMENT = "CREATE TABLE $tableName (
                id INT PRIMARY KEY
            ) COMMENT = '$tableComment'";
        } else {
            $oldTableName = preg_replace('/[^a-zA-Z0-9_]/', '', $request->hidden_old_table_name);
            $newTableName = preg_replace('/[^a-zA-Z0-9_]/', '', $request->table_name_hidden);
            $tableComment = addslashes($request->table_name);
            $DB_STATEMENT = "ALTER TABLE $oldTableName RENAME TO $newTableName";
        }

        try {
            $DB_RESULT = DB::statement($DB_STATEMENT);
            if ($DB_RESULT === true) {
                return 1;
            } else {
                return 0;
            }
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function get_edit_data($request)
    {
        return DB::table('information_schema.tables as j0')
            ->select(
                'j0.TABLE_COMMENT',
                'j0.TABLE_NAME',
            )
            ->where('j0.table_schema', 'inventory_management_software')
            ->where('j0.table_name', $request->val)
            ->first();
    }

    public function table_attributes($request)
    {
        $DB_SELECT = "SELECT *
                FROM information_schema.columns
                WHERE table_schema = 'inventory_management_software' AND table_name = '$request->val'";
        return DB::select($DB_SELECT);
    }
    public function store_all($request) {

        // dd($request);
        $counter = $request->table_attributes_length_count;

        for ($i=0; $i < $counter; $i++) {

            $data_attribute_value = [
                "TABLE_CATALOG"             => "def",
                "TABLE_SCHEMA"              => env('DB_DATABASE'),
                "TABLE_NAME"                => $request->input('table_name_att'),
                "COLUMN_NAME"               => $request->input('column_name_'.$i),
                "ORDINAL_POSITION"          => '',
                "COLUMN_DEFAULT"            => NULL,
                "IS_NULLABLE"               => $request->input('is_nullable_'.$i),
                "DATA_TYPE"                 => $request->input('data_type_'.$i),
                "CHARACTER_MAXIMUM_LENGTH"  => NULL,
                "CHARACTER_OCTET_LENGTH"    => intval(20),
                "NUMERIC_PRECISION"         => NULL,
                "NUMERIC_SCALE"             => NULL,
                "DATETIME_PRECISION"        => NULL,
                "CHARACTER_SET_NAME"        => config('database.connections.mysql.charset'),
                "COLLATION_NAME"            => config('database.connections.mysql.collation'),
                "COLUMN_TYPE"               => $request->input('column_type_'.$i),
                "COLUMN_KEY"                => "",
                "EXTRA"                     => "",
                "PRIVILEGES"                => "select,insert,update,references",
                "COLUMN_COMMENT"            => $request->input('column_comment_'.$i),
                "IS_GENERATED"              => "NEVER",
                "GENERATION_EXPRESSION"     => NULL
            ];

            // SELECT *
            // FROM information_schema.columns
            // WHERE table_schema = 'inventory_management_software' 


            

            // if($request->input('delete_status_'.$i)==1){
            //     continue;
            // }





            echo "<pre>";
            print_r($data_attribute_value);

        }








        

    }
}
