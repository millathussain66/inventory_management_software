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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('e_by')->nullable()->comment("e=entry");
            $table->date('e_at')->nullable()->comment("e=entry");
            $table->integer('u_by')->nullable()->comment("u=update");
            $table->date('u_at')->nullable()->comment("u=update");
            $table->integer('d_by')->nullable()->comment("d=Delete");
            $table->date('d_at')->nullable()->comment("d=Delete");
            $table->tinyInteger('status')->default(1)->comment("1=Active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
