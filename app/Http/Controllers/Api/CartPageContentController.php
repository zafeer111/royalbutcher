<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartPageContent;
use App\Http\Resources\Content\CartPageContentResource;
use Illuminate\Http\Request;

class CartPageContentController extends Controller
{
    public function getPageContent()
    {
        $page = CartPageContent::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'title' => 'Order Details',
                'text_rewards_progress' => 'Your Rewards Progress',
                'text_rewards_status' => "You're {amount} from your coupon code",
                'placeholder_coupon' => 'Enter Coupon Code',
                'button_apply' => 'Apply',
                'text_total' => 'Total',
                'button_checkout' => 'Checkout',
            ]);
        }

        return new CartPageContentResource($page);
    }
}