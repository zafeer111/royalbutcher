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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            
            // Price fields
            $table->decimal('base_price', 8, 2); // e.g., 999999.99
            $table->decimal('discount_percent', 5, 2)->default(0.00); // e.g., 15.50%
            
            // Note: discounted_price hum model mein calculate karengay (accessor)
            
            $table->boolean('status')->default(true); // Active/Inactive
            
            // JSON field for extra options
            $table->json('customization_options')->nullable(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
