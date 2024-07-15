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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('user_name')->unique()->nullable();
            $table->string('img_url')->unique()->nullable();
            $table->tinyInteger('admin_status')->default(0)->comment("1=Admin 0=Normal User");
            $table->timestamp('email_verified_at')->nullable()->nullable();
            $table->string('password');
            $table->integer('created_by')->nullable();
            $table->date('created_at')->nullable();
            $table->integer('update_by')->nullable();
            $table->date('update_at')->nullable();
            $table->integer('delete_by')->nullable();
            $table->date('delete_at')->nullable();
            $table->tinyInteger('terms')->default(0)->comment("0=on 1=off");
            $table->tinyInteger('status')->default(1)->comment("1=Active");
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
