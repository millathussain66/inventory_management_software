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
            $sortdatafield = "table_name";
            $sortorder = "DESC";
        }
        $limit = 10;
        $offset = 0; // or any offset you need
        // $data = DB::table('information_schema.tables as j0')
        //     ->select(
        //         'j0.*',
        //         DB::raw("DATE_FORMAT(j0.CREATE_TIME, '%a %b %d %Y') as CREATE_DATE_TIME"),
        //         DB::raw("count(*) over() as total_row")
        //     )
        //     ->where('j0.table_schema', 'inventory_management_software')
        //     ->orderBy($sortdatafield, $sortorder)
        //     ->offset($offset)
        //     ->limit($limit);
        // $q = $data->get();

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

        //         SELECT 
        //     t.*, 
        //     COUNT(*) OVER() AS total_row,
        //     (SELECT COUNT(*) 
        //      FROM information_schema.columns 
        //      WHERE table_schema = 'inventory_management_software' 
        //      AND table_name = t.table_name) AS column_count
        // FROM 
        //     information_schema.tables t
        // WHERE 
        //     t.table_schema = 'inventory_management_software'
        // ORDER BY 
        //     t.table_name DESC 
        // LIMIT 
        //     10 OFFSET 0;



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
        $DB_STATEMENT = "CREATE TABLE $request->table_name_hidden (
            id INT PRIMARY KEY
        )";
        $DB_RESULT = DB::statement($DB_STATEMENT);
        if ($DB_RESULT == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
