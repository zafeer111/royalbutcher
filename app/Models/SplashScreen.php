<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SplashScreen extends Model
{
    use HasFactory;

    protected $table = 'splash_screens';

    protected $fillable = [
        'main_heading',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}