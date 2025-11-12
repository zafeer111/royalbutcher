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
        Schema::create('home_page_contents', function (Blueprint $table) {
            $table->id();
            // Tab Texts
            $table->string('tab_new_order')->default('New order');
            $table->string('tab_newest')->default('Newest');
            $table->string('tab_most_favorite')->default('Most favorite');
            
            // Section Titles
            $table->string('title_hot_discounts')->default('Hot discounts');
            $table->string('title_top_picks')->default('Top picks');
            $table->string('title_for_you')->default('For You');
            $table->string('title_order_again')->default('Order Again');

            // Re-usable Texts
            $table->string('text_see_all')->default('See all');

            // Other Page Titles
            $table->string('title_new_order_page')->default('New Order');
            
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_contents');
    }
};
