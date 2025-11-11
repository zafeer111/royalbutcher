<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SplashScreen;
use App\Http\Resources\Content\SplashScreenResource;
use Illuminate\Http\Request;

class SplashScreenController extends Controller
{
    public function getSplash()
    {
        $splash = SplashScreen::where('status', true)->latest()->first();

        if (!$splash) {
            return response()->json(['message' => 'Content not found'], 404);
        }

        return new SplashScreenResource($splash);
    }
}