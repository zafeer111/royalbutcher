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
        Schema::create('otp_pages', function (Blueprint $table) {
            $table->id();
            $table->string('main_heading');
            $table->string('sub_heading');
            $table->string('button_text');
            $table->string('did_not_receive_text');
            $table->string('send_again_text');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_pages');
    }
};
