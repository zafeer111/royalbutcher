<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderCustomizationPage;
use App\Http\Resources\Content\OrderCustomizationPageResource;
use Illuminate\Http\Request;

class OrderCustomizationPageController extends Controller
{
    public function getPageContent()
    {
        $page = OrderCustomizationPage::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'title' => 'Order Customization',
                'text_add_ons' => 'Add-Ons',
                'text_portion' => 'Portion',
                'button_add_to_cart' => 'Add to cart',
                'text_total' => 'Total',
            ]);
        }

        return new OrderCustomizationPageResource($page);
    }
}