<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SelectCityPage;
use App\Http\Resources\Content\SelectCityPageResource;
use Illuminate\Http\Request;

class SelectCityPageController extends Controller
{
    /**
     * Mobile app ko active select city page ka content dega.
     * Hamesha sab se naya (latest) active item uthayega.
     */
    public function getCityPageContent()
    {
        $page = SelectCityPage::where('status', true)->latest()->first();

        if (!$page) {
            // Agar admin ne koi content add nahi kiya, toh default text bhej dein
             return response()->json([
                'main_heading' => 'Select Your City',
                'sub_heading' => 'Choose your city to start exploring nearby restaurants and cuisines.',
                'button_text' => 'Next',
            ]);
        }

        return new SelectCityPageResource($page);
    }
}