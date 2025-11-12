<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartPageContent;
use Illuminate\Http\Request;

class CartPageContentController extends Controller
{

    public function index()
    {
        $cartPages = CartPageContent::latest()->get();
        return view('dynamic_content.cart_page.index', compact('cartPages'));
    }

    public function create()
    {
        return view('dynamic_content.cart_page.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        CartPageContent::create($request->all());
        return redirect()->route('cart-page-contents.index')
                         ->with('success', 'Cart Page content created successfully.');
    }

    public function show(CartPageContent $cartPageContent)
    {
        return redirect()->route('cart-page-contents.edit', $cartPageContent);
    }

    public function edit(CartPageContent $cartPageContent)
    {
        return view('dynamic_content.cart_page.edit', compact('cartPageContent'));
    }

    public function update(Request $request, CartPageContent $cartPageContent)
    {
        $request->validate($this->getValidationRules());
        $cartPageContent->update($request->all());
        return redirect()->route('cart-page-contents.index')
                         ->with('success', 'Cart Page content updated successfully.');
    }

    public function destroy(CartPageContent $cartPageContent)
    {
        $cartPageContent->delete();
        return redirect()->route('cart-page-contents.index')
                         ->with('success', 'Cart Page content deleted successfully.');
    }

    // Helper function for validation rules
    private function getValidationRules()
    {
        return [
            'title' => 'required|string|max:100',
            'text_rewards_progress' => 'required|string|max:100',
            'text_rewards_status' => 'required|string|max:100',
            'placeholder_coupon' => 'required|string|max:100',
            'button_apply' => 'required|string|max:50',
            'text_total' => 'required|string|max:50',
            'button_checkout' => 'required|string|max:50',
            'status' => 'required|boolean',
        ];
    }
}