<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpPage extends Model
{
    use HasFactory;

    protected $table = 'otp_pages';

    protected $fillable = [
        'main_heading',
        'sub_heading',
        'button_text',
        'did_not_receive_text',
        'send_again_text',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}