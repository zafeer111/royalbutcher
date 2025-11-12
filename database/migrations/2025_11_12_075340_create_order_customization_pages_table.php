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
        Schema::create('order_customization_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text_add_ons');
            $table->string('text_portion');
            $table->string('button_add_to_cart');
            $table->string('text_total');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_customization_pages');
    }
};
