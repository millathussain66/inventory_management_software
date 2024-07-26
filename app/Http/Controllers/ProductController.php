<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Validation\Rule;
use App\Models\CommonModel;
use App\Models\SubCategory;
use App\Models\SubSubCategory;


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


        $data = [
            'category' => CommonModel::parameter_data('categories', 'id', 'status = 1', ['id', 'name']),
        ];
        return view('product.grid',$data);
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

    public function getSubCategories($categoryId)
    {
        $subCategories = SubCategory::where('category_id', $categoryId)->get();
        return response()->json($subCategories);
    }
    public function getSubSubCategories($subCategoryId)
    {
        $subSubCategories = SubSubCategory::where('sub_category_id', $subCategoryId)->get();
        return response()->json($subSubCategories);
    }


}
