<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardDetailsPage;
use Illuminate\Http\Request;

class CardDetailsPageController extends Controller
{

    public function index()
    {
        $cardPages = CardDetailsPage::latest()->get();
        return view('dynamic_content.card_details_page.index', compact('cardPages'));
    }

    public function create()
    {
        return view('dynamic_content.card_details_page.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        CardDetailsPage::create($request->all());
        return redirect()->route('card-details-pages.index')
                         ->with('success', 'Card Details Page content created successfully.');
    }

    public function show(CardDetailsPage $cardDetailsPage)
    {
        return redirect()->route('card-details-pages.edit', $cardDetailsPage);
    }

    public function edit(CardDetailsPage $cardDetailsPage)
    {
        return view('dynamic_content.card_details_page.edit', compact('cardDetailsPage'));
    }

    public function update(Request $request, CardDetailsPage $cardDetailsPage)
    {
        $request->validate($this->getValidationRules());
        $cardDetailsPage->update($request->all());
        return redirect()->route('card-details-pages.index')
                         ->with('success', 'Card Details Page content updated successfully.');
    }

    public function destroy(CardDetailsPage $cardDetailsPage)
    {
        $cardDetailsPage->delete();
        return redirect()->route('card-details-pages.index')
                         ->with('success', 'Card Details Page content deleted successfully.');
    }

    private function getValidationRules()
    {
        return [
            'title' => 'required|string|max:100',
            'text_add_card' => 'required|string|max:100',
            'hint_card_holder' => 'required|string|max:100',
            'hint_card_number' => 'required|string|max:100',
            'hint_expiry_date' => 'required|string|max:100',
            'hint_cvc' => 'required|string|max:100',
            'text_remember_card' => 'required|string|max:100',
            'text_total' => 'required|string|max:50',
            'button_pay_now' => 'required|string|max:50',
            'status' => 'required|boolean',
        ];
    }
}