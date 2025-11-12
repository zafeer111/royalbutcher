<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutPageContent extends Model
{
    use HasFactory;

    protected $table = 'checkout_page_contents';

    protected $fillable = [
        'title',
        'text_shipping',
        'text_add_address',
        'text_date_time',
        'text_select_date_time',
        'text_payment',
        'text_select_payment_method',
        'button_proceed',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}