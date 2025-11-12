<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewOrderPage extends Model
{
    use HasFactory;

    protected $table = 'new_order_pages';

    protected $fillable = [
        'title',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}