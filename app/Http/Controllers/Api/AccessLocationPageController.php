<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccessLocationPage;
use App\Http\Resources\Content\AccessLocationPageResource;
use Illuminate\Http\Request;

class AccessLocationPageController extends Controller
{
    public function getPageContent()
    {
        $page = AccessLocationPage::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'main_heading' => 'Access Your Location',
                'sub_heading' => 'It is very important that you choose the Always Allow option in the next dialog.It akes the system work better. Thank you.',
                'button_text' => 'Access Location',
            ]);
        }

        return new AccessLocationPageResource($page);
    }
}