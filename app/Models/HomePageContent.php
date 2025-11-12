<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageContent extends Model
{
    use HasFactory;

    protected $table = 'home_page_contents';

    protected $fillable = [
        'tab_new_order',
        'tab_newest',
        'tab_most_favorite',
        'title_hot_discounts',
        'text_see_all',
        'title_top_picks',
        'title_for_you',
        'title_order_again',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}