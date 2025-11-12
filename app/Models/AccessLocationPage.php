<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLocationPage extends Model
{
    use HasFactory;

    protected $table = 'access_location_pages';

    protected $fillable = [
        'main_heading',
        'sub_heading',
        'button_text',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}