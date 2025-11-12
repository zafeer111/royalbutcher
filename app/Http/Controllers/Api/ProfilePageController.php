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
                'name_label' => 'Full Name',
                'email_label' => 'Email Address',
                'password_label' => 'Password',
                'name_hint' => 'Enter your full name',
                'email_hint' => 'Enter your email',
                'password_hint' => 'Enter your password',
                'button_text' => 'Done',
            ]);
        }

        return new ProfilePageResource($page);
    }
}