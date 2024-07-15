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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('user_name')->unique();
            $table->string('img_url')->unique();
            $table->tinyInteger('admin_status')->default(0)->comment("1=Admin 0=Normal User");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('confrim_password');
            $table->integer('created_by');
            $table->date('created_at');
            $table->integer('update_by');
            $table->date('update_at');
            $table->integer('delete_by');
            $table->date('delete_at');
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
