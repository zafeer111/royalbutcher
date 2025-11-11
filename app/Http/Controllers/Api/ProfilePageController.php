<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProfilePage;
use App\Http\Resources\Content\ProfilePageResource;
use Illuminate\Http\Request;

class ProfilePageController extends Controller
{
    public function getPageContent()
    {
        $page = ProfilePage::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'main_heading' => 'Create Your Profile',
                'sub_heading' => 'Enter your personal details to set up your account.',
                'name_hint' => 'Full Name',
                'email_hint' => 'Email Address',
                'password_hint' => 'Password',
                'name_placeholder' => 'Your Name',
                'email_placeholder' => 'ama@gmail.com',
                'password_placeholder' => '**********',
                'button_text' => 'Done',
            ]);
        }

        return new ProfilePageResource($page);
    }
}