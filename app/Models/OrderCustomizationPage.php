<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCustomizationPage extends Model
{
    use HasFactory;

    protected $table = 'order_customization_pages';

    protected $fillable = [
        'title',
        'text_add_ons',
        'text_portion',
        'button_add_to_cart',
        'text_total',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}