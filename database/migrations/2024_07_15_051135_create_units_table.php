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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sort_name');
            $table->integer('no_of_products');
            $table->string('img_url');
            $table->integer('created_by')->nullable();
            $table->date('created_at')->nullable();
            $table->integer('update_by')->nullable();
            $table->date('update_at')->nullable();
            $table->integer('delete_by')->nullable();
            $table->date('delete_at')->nullable();
            $table->tinyInteger('status')->default(1)->comment("1=Active");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
