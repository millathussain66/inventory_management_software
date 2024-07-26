<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use App\Models\Product; // Replace with your product model

class ItemCodeHelper
{
    public static function generateItemCode($prefix = 'ITEM-')
    {
        do {
            $randomNumber = Str::random(5);
            $itemCode = $prefix . $randomNumber;
        } while (Product::where('item_code', $itemCode)->exists()); // Replace with your uniqueness check

        return $itemCode;
        //use App\Helpers\ItemCodeHelper;
        // Generate an item code
        // $itemCode = ItemCodeHelper::generateItemCode();
    }
}
