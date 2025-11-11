<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PhoneNumberPage;
use App\Http\Resources\Content\PhoneNumberPageResource;
use Illuminate\Http\Request;

class PhoneNumberPageController extends Controller
{
    public function getPageContent()
    {
        $page = PhoneNumberPage::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'main_heading1' => 'Get started with',
                'main_heading2' => 'Royal Butcher',
                'sub_heading' => 'Enter your phone number to use Royal Butcher and enjoy!',
                'hint' => 'Phone Number',
                'placeholder' => '+44 999999999',
                'button_text' => 'Continue',
            ]);
        }

        return new PhoneNumberPageResource($page);
    }
}