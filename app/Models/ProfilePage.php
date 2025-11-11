<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePage extends Model
{
    use HasFactory;

    protected $table = 'profile_pages';

    protected $fillable = [
        'main_heading',
        'sub_heading',
        'name_hint',
        'email_hint',
        'password_hint',
        'name_placeholder',
        'email_placeholder',
        'password_placeholder',
        'button_text',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}