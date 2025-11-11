<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumberPage extends Model
{
    use HasFactory;

    protected $table = 'phone_number_pages';

    protected $fillable = [
        'main_heading1',
        'main_heading2',
        'sub_heading',
        'hint',
        'placeholder',
        'button_text',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}