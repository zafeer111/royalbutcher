<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessfulPage extends Model
{
    use HasFactory;

    protected $table = 'successful_pages';

    protected $fillable = [
        'main_heading',
        'sub_heading',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}