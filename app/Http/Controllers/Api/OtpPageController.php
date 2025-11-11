<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OtpPage;
use App\Http\Resources\Content\OtpPageResource;
use Illuminate\Http\Request;

class OtpPageController extends Controller
{
    
    public function getOtpPageContent()
    {
        $page = OtpPage::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'main_heading' => 'Verify Your Phone Number',
                'sub_heading' => 'Enter the 4-digit code sent to you on',
                'button_text' => 'Continue',
                'did_not_receive_text' => "Didn't receive?",
                'send_again_text' => 'Send again',
            ]);
        }

        return new OtpPageResource($page);
    }
}