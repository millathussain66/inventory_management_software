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
        Schema::create('sub_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Default Name'); // Add default value here
            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade')->nullable(); 
            $table->integer('created_by')->nullable();
            $table->timestamp('created_at')->nullable(); // Use timestamp for date-time columns
            $table->integer('update_by')->nullable();
            $table->timestamp('update_at')->nullable();
            $table->integer('delete_by')->nullable();
            $table->timestamp('delete_at')->nullable();
            $table->tinyInteger('status')->default(1)->comment("1=Active");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_sub_categories');
    }
};
