<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddAddressPage extends Model
{
    use HasFactory;

    protected $table = 'add_address_pages';

    protected $fillable = [
        'title',
        'text_recipient_info',
        'label_name',
        'label_phone',
        'label_email',
        'text_shipping_address',
        'label_address_title',
        'label_address_line',
        'label_street_number',
        'label_landmark',
        'button_cancel',
        'button_save',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}