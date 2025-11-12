<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SuccessfulPage;
use App\Http\Resources\Content\SuccessfulPageResource;
use Illuminate\Http\Request;

class SuccessfulPageController extends Controller
{
    public function getPageContent()
    {
        $page = SuccessfulPage::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'main_heading' => 'Thank You! Order Completed',
                'sub_heading' => 'Please rate your experience with Royal Butcher',
            ]);
        }

        return new SuccessfulPageResource($page);
    }
}