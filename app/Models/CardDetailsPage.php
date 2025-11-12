<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardDetailsPage extends Model
{
    use HasFactory;

    protected $table = 'card_details_pages';

    protected $fillable = [
        'title',
        'text_add_card',
        'hint_card_holder',
        'hint_card_number',
        'hint_expiry_date',
        'hint_cvc',
        'text_remember_card',
        'text_total',
        'button_pay_now',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}