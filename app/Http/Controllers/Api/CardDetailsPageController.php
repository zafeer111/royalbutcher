<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CardDetailsPage;
use App\Http\Resources\Content\CardDetailsPageResource;
use Illuminate\Http\Request;

class CardDetailsPageController extends Controller
{
    public function getPageContent()
    {
        $page = CardDetailsPage::where('status', true)->latest()->first();

        if (!$page) {
            return response()->json([
                'title' => 'Card Details',
                'text_add_card' => 'Add Credit/Debit Card',
                'hint_card_holder' => "Card Holder's Name",
                'hint_card_number' => 'Card Number',
                'hint_expiry_date' => 'Expiry Date',
                'hint_cvc' => 'CVC',
                'text_remember_card' => 'Remember my card for next purchases',
                'text_total' => 'Total',
                'button_pay_now' => 'Pay Now',
            ]);
        }

        return new CardDetailsPageResource($page);
    }
}
