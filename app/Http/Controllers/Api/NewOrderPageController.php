<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NewOrderPage;
use App\Http\Resources\Content\NewOrderPageResource;
use Illuminate\Http\Request;

class NewOrderPageController extends Controller
{
    public function getPageContent()
    {
        $page = NewOrderPage::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'title' => 'New Order',
            ]);
        }

        return new NewOrderPageResource($page);
    }
}