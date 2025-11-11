<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SelectCityPage;
use Illuminate\Http\Request;

class SelectCityPageController extends Controller
{
    // Authorization 'role:Admin' middleware ke zariye routes/web.php mein hai

    public function index()
    {
        $cityPages = SelectCityPage::latest()->get();
        return view('dynamic_content.city_page.index', compact('cityPages'));
    }

    public function create()
    {
        return view('dynamic_content.city_page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'button_text' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);

        SelectCityPage::create($request->all());

        return redirect()->route('select-city-pages.index')
                         ->with('success', 'Select City Page content created successfully.');
    }

    public function show(SelectCityPage $selectCityPage)
    {
        return redirect()->route('select-city-pages.edit', $selectCityPage);
    }

    public function edit(SelectCityPage $selectCityPage)
    {
        return view('dynamic_content.city_page.edit', compact('selectCityPage'));
    }

    public function update(Request $request, SelectCityPage $selectCityPage)
    {
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'button_text' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);

        $selectCityPage->update($request->all());

        return redirect()->route('select-city-pages.index')
                         ->with('success', 'Select City Page content updated successfully.');
    }

    public function destroy(SelectCityPage $selectCityPage)
    {
        $selectCityPage->delete();
        return redirect()->route('select-city-pages.index')
                         ->with('success', 'Select City Page content deleted successfully.');
    }
}