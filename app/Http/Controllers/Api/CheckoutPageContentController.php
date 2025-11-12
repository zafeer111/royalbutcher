<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CheckoutPageContent;
use App\Http\Resources\Content\CheckoutPageContentResource;
use Illuminate\Http\Request;

class CheckoutPageContentController extends Controller
{
    public function getPageContent()
    {
        $page = CheckoutPageContent::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'title' => 'Checkout',
                'text_shipping' => 'Shipping',
                'text_add_address' => 'Add Address',
                'text_date_time' => 'Date & Time',
                'text_select_date_time' => 'Select Date & Time',
                'text_payment' => 'Payment',
                'text_select_payment_method' => 'Select Payment Method',
                'button_proceed' => 'Proceed',
            ]);
        }

        return new CheckoutPageContentResource($page);
    }
}