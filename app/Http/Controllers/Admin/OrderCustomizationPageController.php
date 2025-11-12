<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderCustomizationPage;
use Illuminate\Http\Request;

class OrderCustomizationPageController extends Controller
{
    // Authorization 'role:Admin' middleware ke zariye routes/web.php mein hai

    public function index()
    {
        $customizationPages = OrderCustomizationPage::latest()->get();
        return view('dynamic_content.order_customization_page.index', compact('customizationPages'));
    }

    public function create()
    {
        return view('dynamic_content.order_customization_page.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        OrderCustomizationPage::create($request->all());
        return redirect()->route('order-customization-pages.index')
                         ->with('success', 'Order Customization Page content created successfully.');
    }

    public function show(OrderCustomizationPage $orderCustomizationPage)
    {
        return redirect()->route('order-customization-pages.edit', $orderCustomizationPage);
    }

    public function edit(OrderCustomizationPage $orderCustomizationPage)
    {
        return view('dynamic_content.order_customization_page.edit', compact('orderCustomizationPage'));
    }

    public function update(Request $request, OrderCustomizationPage $orderCustomizationPage)
    {
        $request->validate($this->getValidationRules());
        $orderCustomizationPage->update($request->all());
        return redirect()->route('order-customization-pages.index')
                         ->with('success', 'Order Customization Page content updated successfully.');
    }

    public function destroy(OrderCustomizationPage $orderCustomizationPage)
    {
        $orderCustomizationPage->delete();
        return redirect()->route('order-customization-pages.index')
                         ->with('success', 'Order Customization Page content deleted successfully.');
    }

    // Helper function for validation rules
    private function getValidationRules()
    {
        return [
            'title' => 'required|string|max:100',
            'text_add_ons' => 'required|string|max:100',
            'text_portion' => 'required|string|max:100',
            'button_add_to_cart' => 'required|string|max:100',
            'text_total' => 'required|string|max:100',
            'status' => 'required|boolean',
        ];
    }
}