<?php

namespace App\Http\Controllers;

use App\Models\Units;
use App\Http\Requests\StoreUnitsRequest;
use App\Http\Requests\UpdateUnitsRequest;
use Illuminate\Validation\Rule;
use App\Models\CommonModel;
// Common Use
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Config;
use Cookie;
use URL;
use File;
use Symfony\Component\Console\Input\Input;

class UnitsController extends Controller
{
    protected $CommonModel;
    protected $Units;
    public function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->Units = new Units();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreUnitsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Units $units)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Units $units)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitsRequest $request, Units $units)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Units $units)
    {
        //
    }
}
