<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CheckoutPageContent;
use Illuminate\Http\Request;

class CheckoutPageContentController extends Controller
{

    public function index()
    {
        $checkoutPages = CheckoutPageContent::latest()->get();
        return view('dynamic_content.checkout_page.index', compact('checkoutPages'));
    }

    public function create()
    {
        return view('dynamic_content.checkout_page.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        CheckoutPageContent::create($request->all());
        return redirect()->route('checkout-page-contents.index')
                         ->with('success', 'Checkout Page content created successfully.');
    }

    public function show(CheckoutPageContent $checkoutPageContent)
    {
        return redirect()->route('checkout-page-contents.edit', $checkoutPageContent);
    }

    public function edit(CheckoutPageContent $checkoutPageContent)
    {
        return view('dynamic_content.checkout_page.edit', compact('checkoutPageContent'));
    }

    public function update(Request $request, CheckoutPageContent $checkoutPageContent)
    {
        $request->validate($this->getValidationRules());
        $checkoutPageContent->update($request->all());
        return redirect()->route('checkout-page-contents.index')
                         ->with('success', 'Checkout Page content updated successfully.');
    }

    public function destroy(CheckoutPageContent $checkoutPageContent)
    {
        $checkoutPageContent->delete();
        return redirect()->route('checkout-page-contents.index')
                         ->with('success', 'Checkout Page content deleted successfully.');
    }

    private function getValidationRules()
    {
        return [
            'title' => 'required|string|max:100',
            'text_shipping' => 'required|string|max:100',
            'text_add_address' => 'required|string|max:100',
            'text_date_time' => 'required|string|max:100',
            'text_select_date_time' => 'required|string|max:100',
            'text_payment' => 'required|string|max:100',
            'text_select_payment_method' => 'required|string|max:100',
            'button_proceed' => 'required|string|max:50',
            'status' => 'required|boolean',
        ];
    }
}