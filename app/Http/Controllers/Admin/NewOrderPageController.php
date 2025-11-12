<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewOrderPage;
use Illuminate\Http\Request;

class NewOrderPageController extends Controller
{
    // Authorization 'role:Admin' middleware ke zariye routes/web.php mein hai

    public function index()
    {
        $newOrderPages = NewOrderPage::latest()->get();
        return view('dynamic_content.new_order_page.index', compact('newOrderPages'));
    }

    public function create()
    {
        return view('dynamic_content.new_order_page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        NewOrderPage::create($request->all());

        return redirect()->route('new-order-pages.index')
                         ->with('success', 'New Order Page content created successfully.');
    }

    public function show(NewOrderPage $newOrderPage)
    {
        return redirect()->route('new-order-pages.edit', $newOrderPage);
    }

    public function edit(NewOrderPage $newOrderPage)
    {
        return view('dynamic_content.new_order_page.edit', compact('newOrderPage'));
    }

    public function update(Request $request, NewOrderPage $newOrderPage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $newOrderPage->update($request->all());

        return redirect()->route('new-order-pages.index')
                         ->with('success', 'New Order Page content updated successfully.');
    }

    public function destroy(NewOrderPage $newOrderPage)
    {
        $newOrderPage->delete();
        return redirect()->route('new-order-pages.index')
                         ->with('success', 'New Order Page content deleted successfully.');
    }
}