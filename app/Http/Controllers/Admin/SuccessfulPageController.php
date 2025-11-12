<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessfulPage;
use Illuminate\Http\Request;

class SuccessfulPageController extends Controller
{

    public function index()
    {
        $successfulPages = SuccessfulPage::latest()->get();
        return view('dynamic_content.successful_page.index', compact('successfulPages'));
    }

    public function create()
    {
        return view('dynamic_content.successful_page.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        SuccessfulPage::create($request->all());
        return redirect()->route('successful-pages.index')
                         ->with('success', 'Successful Page content created successfully.');
    }

    public function show(SuccessfulPage $successfulPage)
    {
        return redirect()->route('successful-pages.edit', $successfulPage);
    }

    public function edit(SuccessfulPage $successfulPage)
    {
        return view('dynamic_content.successful_page.edit', compact('successfulPage'));
    }

    public function update(Request $request, SuccessfulPage $successfulPage)
    {
        $request->validate($this->getValidationRules());
        $successfulPage->update($request->all());
        return redirect()->route('successful-pages.index')
                         ->with('success', 'Successful Page content updated successfully.');
    }

    public function destroy(SuccessfulPage $successfulPage)
    {
        $successfulPage->delete();
        return redirect()->route('successful-pages.index')
                         ->with('success', 'Successful Page content deleted successfully.');
    }

    private function getValidationRules()
    {
        return [
            'main_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'status' => 'required|boolean',
        ];
    }
}