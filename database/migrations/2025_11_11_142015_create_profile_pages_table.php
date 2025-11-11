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
        Schema::create('profile_pages', function (Blueprint $table) {
            $table->id();
            $table->string('main_heading');
            $table->string('sub_heading');
            $table->string('name_hint');
            $table->string('email_hint');
            $table->string('password_hint');
            $table->string('name_placeholder');
            $table->string('email_placeholder');
            $table->string('password_placeholder');
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
        Schema::dropIfExists('profile_pages');
    }
};
