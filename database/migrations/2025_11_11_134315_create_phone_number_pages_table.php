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
        Schema::create('phone_number_pages', function (Blueprint $table) {
            $table->id();
            $table->string('main_heading1');
            $table->string('main_heading2');
            $table->string('sub_heading');
            $table->string('hint');
            $table->string('placeholder');
            $table->string('button_text');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_number_pages');
    }
};
