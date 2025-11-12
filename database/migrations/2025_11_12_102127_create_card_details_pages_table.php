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
        Schema::create('card_details_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('text_add_card')->nullable();
            $table->string('hint_card_holder')->nullable();
            $table->string('hint_card_number')->nullable();
            $table->string('hint_expiry_date')->nullable();
            $table->string('hint_cvc')->nullable();
            $table->string('text_remember_card')->nullable();
            $table->string('text_total')->nullable();
            $table->string('button_pay_now')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_details_pages');
    }
};
