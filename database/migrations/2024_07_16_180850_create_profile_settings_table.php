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
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->id();
            $table->text('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('language')->nullable();
            $table->tinyInteger('language_switcher')->default(0)->nullable();
            $table->string('timezone')->nullable();
            $table->string('date_format')->nullable();
            $table->string('time_format')->nullable();
            $table->integer('financial_year')->nullable();
            $table->string('starting_month')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('currency_position')->nullable();
            $table->string('decimal_separator')->nullable();
            $table->string('thousand_separator')->nullable();
            $table->string('countries_restriction')->nullable();
            $table->string('allowed_files')->nullable();
            $table->string('max_file_size')->nullable();
            $table->string('product_sku')->nullable();
            $table->string('supplier')->nullable();
            $table->string('purchase')->nullable();
            $table->string('purchase_return')->nullable();
            $table->string('sales')->nullable();
            $table->string('sales_return')->nullable();
            $table->string('customer')->nullable();
            $table->string('expense')->nullable();
            $table->string('stock_transfer')->nullable();
            $table->string('stock_adjustmentt')->nullable();
            $table->string('sales_order')->nullable();
            $table->string('pos_invoice')->nullable();
            $table->string('estimation')->nullable();
            $table->string('transaction')->nullable();
            $table->string('employee')->nullable();
            $table->string('invoice_logo')->nullable();
            $table->string('invoice_prefix')->nullable();
            $table->string('invoice_due')->nullable();
            $table->string('invoice_round_off')->nullable();
            $table->text('show_company_details')->nullable();
            $table->text('invoice_header_terms')->nullable();
            $table->integer('update_by')->nullable();
            $table->date('update_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_settings');
    }
};
