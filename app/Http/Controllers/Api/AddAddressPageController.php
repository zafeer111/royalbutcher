<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AddAddressPage;
use App\Http\Resources\Content\AddAddressPageResource;
use Illuminate\Http\Request;

class AddAddressPageController extends Controller
{
    public function getPageContent()
    {
        $page = AddAddressPage::where('status', true)->latest()->first();

        if (!$page) {
             return response()->json([
                'title' => 'Add Address',
                'text_recipient_info' => 'Recipient Information',
                'label_name' => 'Full name*',
                'label_phone' => 'Phone Number*',
                'label_email' => 'Email Address*',
                'text_shipping_address' => 'Shipping Address',
                'label_address_title' => 'Address Title',
                'label_address_line' => 'Address*',
                'label_street_number' => 'Street Number*',
                'label_landmark' => 'Nearest Landmark',
                'button_cancel' => 'Cancel',
                'button_save' => 'Save',
            ]);
        }

        return new AddAddressPageResource($page);
    }
}