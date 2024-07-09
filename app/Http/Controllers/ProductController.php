<?php

namespace App\Http\Controllers;

use App\Models\CommonModel;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use Config;
use Cookie;
use URL;
use File;


class ProductController extends Controller
{
    protected $CommonModel;
    protected $ProductModel;
    public function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->ProductModel = new Product();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.grid');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
