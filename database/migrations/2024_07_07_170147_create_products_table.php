<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('category_name')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->string('sub_category_name')->nullable();
            $table->integer('sub_sub_category_id')->nullable();
            $table->string('sub_sub_category_name')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('brand_name')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('unit_name')->nullable();
            $table->integer('selling_type_id')->nullable();
            $table->string('selling_type_name')->nullable();
            $table->integer('barcode_symbology_id')->nullable();
            $table->string('barcode_symbology_name')->nullable();
            $table->string('item_code')->nullable();
            $table->integer('store_id')->nullable();
            $table->string('store_name')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->string('warehouse_name')->nullable();
            $table->text('description')->nullable();
            $table->string('product_type')->nullable()->comment('Singal Or Variable');
            $table->integer('created_by')->nullable();
            $table->date('created_at')->nullable();
            $table->date('update_by')->nullable();
            $table->integer('update_at')->nullable();
            $table->date('delete_by')->nullable();
            $table->date('delete_at')->nullable();
            $table->tinyInteger('status')->default(1)->comment("1=Active");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
