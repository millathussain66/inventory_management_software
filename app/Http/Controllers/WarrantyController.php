<?php

namespace App\Http\Controllers;

use App\Models\Warranty;
use App\Http\Requests\StoreWarrantyRequest;
use App\Http\Requests\UpdateWarrantyRequest;
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

class WarrantyController extends Controller
{
    protected $CommonModel;
    protected $Warranty;
    public function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->Warranty = new Warranty();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


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
    public function store(StoreWarrantyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Warranty $warranty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warranty $warranty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarrantyRequest $request, Warranty $warranty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warranty $warranty)
    {
        //
    }
}
