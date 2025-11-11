<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhoneNumberPage;
use Illuminate\Http\Request;

class PhoneNumberPageController extends Controller
{

    public function index()
    {
        $phonePages = PhoneNumberPage::latest()->get();
        return view('dynamic_content.phone_number_page.index', compact('phonePages'));
    }

    public function create()
    {
        return view('dynamic_content.phone_number_page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_heading1' => 'required|string|max:255',
            'main_heading2' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'hint' => 'required|string|max:100',
            'placeholder' => 'required|string|max:100',
            'button_text' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);

        PhoneNumberPage::create($request->all());

        return redirect()->route('phone-number-pages.index')
                         ->with('success', 'Phone Number Page content created successfully.');
    }

    public function show(PhoneNumberPage $phoneNumberPage)
    {
        return redirect()->route('phone-number-pages.edit', $phoneNumberPage);
    }

    public function edit(PhoneNumberPage $phoneNumberPage)
    {
        return view('dynamic_content.phone_number_page.edit', compact('phoneNumberPage'));
    }

    public function update(Request $request, PhoneNumberPage $phoneNumberPage)
    {
        $request->validate([
            'main_heading1' => 'required|string|max:255',
            'main_heading2' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'hint' => 'required|string|max:100',
            'placeholder' => 'required|string|max:100',
            'button_text' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);

        $phoneNumberPage->update($request->all());

        return redirect()->route('phone-number-pages.index')
                         ->with('success', 'Phone Number Page content updated successfully.');
    }

    public function destroy(PhoneNumberPage $phoneNumberPage)
    {
        $phoneNumberPage->delete();
        return redirect()->route('phone-number-pages.index')
                         ->with('success', 'Phone Number Page content deleted successfully.');
    }
}