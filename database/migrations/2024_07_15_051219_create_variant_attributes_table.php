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
        Schema::create('variant_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('values');
            $table->tinyInteger('status')->default(1)->comment("1=Active");
            $table->integer('created_by');
            $table->date('created_at');
            $table->integer('update_by');
            $table->date('update_at');
            $table->integer('delete_by');
            $table->date('delete_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variant_attributes');
    }
};
