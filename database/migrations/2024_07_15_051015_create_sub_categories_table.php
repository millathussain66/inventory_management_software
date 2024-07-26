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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')->default(1)->constrained()->onDelete('cascade'); // Example with default value 1
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->string('img_url')->nullable();
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
        Schema::dropIfExists('sub_categories');
    }
};
