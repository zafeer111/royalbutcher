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
        Schema::create('checkout_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('text_shipping')->nullable();
            $table->string('text_add_address')->nullable();
            $table->string('text_date_time')->nullable();
            $table->string('text_select_date_time')->nullable();
            $table->string('text_payment')->nullable();
            $table->string('text_select_payment_method')->nullable();
            $table->string('button_proceed')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout_page_contents');
    }
};
