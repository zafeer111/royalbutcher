<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessLocationPage;
use Illuminate\Http\Request;

class AccessLocationPageController extends Controller
{

    public function index()
    {
        $locationPages = AccessLocationPage::latest()->get();
        return view('dynamic_content.access_location_page.index', compact('locationPages'));
    }

    public function create()
    {
        return view('dynamic_content.access_location_page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string',
            'button_text' => 'required|string|max:100',
            'status' => 'required|boolean',
        ]);

        AccessLocationPage::create($request->all());

        return redirect()->route('access-location-pages.index')
                         ->with('success', 'Access Location Page content created successfully.');
    }

    public function show(AccessLocationPage $accessLocationPage)
    {
        return redirect()->route('access-location-pages.edit', $accessLocationPage);
    }

    public function edit(AccessLocationPage $accessLocationPage)
    {
        return view('dynamic_content.access_location_page.edit', compact('accessLocationPage'));
    }

    public function update(Request $request, AccessLocationPage $accessLocationPage)
    {
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string',
            'button_text' => 'required|string|max:100',
            'status' => 'required|boolean',
        ]);

        $accessLocationPage->update($request->all());

        return redirect()->route('access-location-pages.index')
                         ->with('success', 'Access Location Page content updated successfully.');
    }

    public function destroy(AccessLocationPage $accessLocationPage)
    {
        $accessLocationPage->delete();
        return redirect()->route('access-location-pages.index')
                         ->with('success', 'Access Location Page content deleted successfully.');
    }
}