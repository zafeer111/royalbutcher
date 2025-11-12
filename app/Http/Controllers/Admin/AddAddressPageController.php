<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddAddressPage;
use Illuminate\Http\Request;

class AddAddressPageController extends Controller
{

    public function index()
    {
        $addAddressPages = AddAddressPage::latest()->get();
        return view('dynamic_content.add_address_page.index', compact('addAddressPages'));
    }

    public function create()
    {
        return view('dynamic_content.add_address_page.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        AddAddressPage::create($request->all());
        return redirect()->route('add-address-pages.index')
                         ->with('success', 'Add Address Page content created successfully.');
    }

    public function show(AddAddressPage $addAddressPage)
    {
        return redirect()->route('add-address-pages.edit', $addAddressPage);
    }

    public function edit(AddAddressPage $addAddressPage)
    {
        return view('dynamic_content.add_address_page.edit', compact('addAddressPage'));
    }

    public function update(Request $request, AddAddressPage $addAddressPage)
    {
        $request->validate($this->getValidationRules());
        $addAddressPage->update($request->all());
        return redirect()->route('add-address-pages.index')
                         ->with('success', 'Add Address Page content updated successfully.');
    }

    public function destroy(AddAddressPage $addAddressPage)
    {
        $addAddressPage->delete();
        return redirect()->route('add-address-pages.index')
                         ->with('success', 'Add Address Page content deleted successfully.');
    }

    private function getValidationRules()
    {
        return [
            'title' => 'required|string|max:100',
            'text_recipient_info' => 'required|string|max:100',
            'label_name' => 'required|string|max:100',
            'label_phone' => 'required|string|max:100',
            'label_email' => 'required|string|max:100',
            'text_shipping_address' => 'required|string|max:100',
            'label_address_title' => 'required|string|max:100',
            'label_address_line' => 'required|string|max:100',
            'label_street_number' => 'required|string|max:100',
            'label_landmark' => 'required|string|max:100',
            'button_cancel' => 'required|string|max:50',
            'button_save' => 'required|string|max:50',
            'status' => 'required|boolean',
        ];
    }
}