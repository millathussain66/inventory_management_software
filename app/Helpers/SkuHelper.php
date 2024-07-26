<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use App\Models\Product; // Replace with your product model

class SkuHelper
{
    public static function generateSku($prefix = 'PRD-')
    {
        do {
            $randomNumber = Str::random(5);
            $sku = $prefix . $randomNumber;
        } while (Product::where('sku', $sku)->exists()); // Replace with your uniqueness check
        return $sku;
        // use App\Helpers\SkuHelper;
        // Generate a SKU
        // $sku = SkuHelper::generateSku();
    }
}
