<?php

namespace App\Http\Controllers;

use App\Models\VariantAttributes;
use App\Http\Requests\StoreVariantAttributesRequest;
use App\Http\Requests\UpdateVariantAttributesRequest;
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

class VariantAttributesController extends Controller
{
    protected $CommonModel;
    protected $VariantAttributes;
    public function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->VariantAttributes = new VariantAttributes();
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
    public function store(StoreVariantAttributesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VariantAttributes $variantAttributes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VariantAttributes $variantAttributes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVariantAttributesRequest $request, VariantAttributes $variantAttributes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VariantAttributes $variantAttributes)
    {
        //
    }
}
