<?php

namespace App\Http\Controllers;

use App\Models\ParameterSetup;
use Illuminate\Http\Request;

use App\Models\CommonModel;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use Config;
use Cookie;
use URL;
use File;
use Symfony\Component\Console\Input\Input;

class ParameterSetupController extends Controller
{

    protected $CommonModel;
    protected $ParameterSetup;
    public function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->ParameterSetup = new ParameterSetup();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('parameter.grid');
    }

    public function grid(Request $request)
    {
        $pagenum = $request->pagenum;
        $pagesize = $request->pagesize;
        $start = $pagenum * $pagesize;
        $result = $this->ParameterSetup->get_grid_data(
            $request->filterscount,
            $request->sortdatafield,
            $request->sortorder,
            $pagesize,
            $start,
            $request
        );
        $data[] = array(
            'TotalRows' => $result['TotalRows'],
            'Rows'      => $result['Rows']
        );
        echo json_encode($data);
    }
    public function duplicate_check(Request $request)
    {
        $num_row = $this->ParameterSetup->duplicate_check($request);
        $var = [
            "Message" => "",
            "Status" => count($num_row) > '0' ? 'duplicate' : 'ok'
        ];
        echo json_encode($var);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        session()->regenerate();
        $csrf_token = csrf_token();
        $row = $this->ParameterSetup->store($request);
        $DB_TABLE = array();
        $DB_TABLE['csrf_token'] = $csrf_token;
        if ($row == '0') {
            $DB_TABLE['status'] = "fail";
            $DB_TABLE['errorMsgs'] = 1;
        } else {
            $DB_TABLE['status'] = "success";
            $DB_TABLE['errorMsgs'] = 0;
        }
        echo json_encode($DB_TABLE);
    }

    /**
     * Display the specified resource.
     */
    public function show(ParameterSetup $parameterSetup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParameterSetup $parameterSetup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParameterSetup $parameterSetup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        dd($request);
    }
    public function get_edit_data(Request $request)
    {
        $num_row = $this->ParameterSetup->get_edit_data($request);
        $var = [
            "data" => $num_row,
        ];
        echo json_encode($var);
    }

    public function table_attributes(Request $request)
    {
        $num_row = $this->ParameterSetup->table_attributes($request);
        $var = [
            "data" => $num_row,
        ];
        echo json_encode($var);
    }

    public function store_all(Request $request) {
        $num_row = $this->ParameterSetup->store_all($request);
    }

    

}