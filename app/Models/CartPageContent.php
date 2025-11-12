<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartPageContent extends Model
{
    use HasFactory;

    protected $table = 'cart_page_contents';

    protected $fillable = [
        'title',
        'text_rewards_progress',
        'text_rewards_status',
        'placeholder_coupon',
        'button_apply',
        'text_total',
        'button_checkout',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}