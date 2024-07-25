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
        Schema::create('user_activity', function (Blueprint $table) {
            $table->id();
            $table->string('action_name')->nullable();
            $table->string('table_name')->nullable();
            $table->integer('table_row_id')->nullable();
            $table->text('remarks')->nullable();
            $table->string('ip_address',50)->nullable();
            $table->integer('e_by')->nullable()->comment("e=entry");
            $table->date('e_at')->nullable()->comment("e=entry");
            $table->tinyInteger('status')->default(1)->comment("1=Active");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activity');
    }
};
