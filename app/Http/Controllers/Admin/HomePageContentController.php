<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageContent;
use Illuminate\Http\Request;

class HomePageContentController extends Controller
{
    // Authorization 'role:Admin' middleware ke zariye routes/web.php mein hai

    public function index()
    {
        $homePages = HomePageContent::latest()->get();
        return view('dynamic_content.home_page.index', compact('homePages'));
    }

    public function create()
    {
        return view('dynamic_content.home_page.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        HomePageContent::create($request->all());
        return redirect()->route('home-page-contents.index')
                         ->with('success', 'Home Page content created successfully.');
    }

    public function show(HomePageContent $homePageContent)
    {
        return redirect()->route('home-page-contents.edit', $homePageContent);
    }

    public function edit(HomePageContent $homePageContent)
    {
        return view('dynamic_content.home_page.edit', compact('homePageContent'));
    }

    public function update(Request $request, HomePageContent $homePageContent)
    {
        $request->validate($this->getValidationRules());
        $homePageContent->update($request->all());
        return redirect()->route('home-page-contents.index')
                         ->with('success', 'Home Page content updated successfully.');
    }

    public function destroy(HomePageContent $homePageContent)
    {
        $homePageContent->delete();
        return redirect()->route('home-page-contents.index')
                         ->with('success', 'Home Page content deleted successfully.');
    }

    // Helper function for validation rules
    private function getValidationRules()
    {
        return [
            'tab_new_order' => 'required|string|max:100',
            'tab_newest' => 'required|string|max:100',
            'tab_most_favorite' => 'required|string|max:100',
            'title_hot_discounts' => 'required|string|max:100',
            'text_see_all' => 'required|string|max:50',
            'title_top_picks' => 'required|string|max:100',
            'title_for_you' => 'required|string|max:100',
            'title_order_again' => 'required|string|max:100',
            'status' => 'required|boolean',
        ];
    }
}