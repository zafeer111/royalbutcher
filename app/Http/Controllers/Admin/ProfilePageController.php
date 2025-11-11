<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilePage;
use Illuminate\Http\Request;

class ProfilePageController extends Controller
{

    public function index()
    {
        $profilePages = ProfilePage::latest()->get();
        return view('dynamic_content.profile_page.index', compact('profilePages'));
    }

    public function create()
    {
        return view('dynamic_content.profile_page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'name_hint' => 'required|string|max:100',
            'email_hint' => 'required|string|max:100',
            'password_hint' => 'required|string|max:100',
            'name_placeholder' => 'required|string|max:100',
            'email_placeholder' => 'required|string|max:100',
            'password_placeholder' => 'required|string|max:100',
            'button_text' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);

        ProfilePage::create($request->all());

        return redirect()->route('profile-pages.index')
                         ->with('success', 'Profile Page content created successfully.');
    }

    public function show(ProfilePage $profilePage)
    {
        return redirect()->route('profile-pages.edit', $profilePage);
    }

    public function edit(ProfilePage $profilePage)
    {
        return view('dynamic_content.profile_page.edit', compact('profilePage'));
    }

    public function update(Request $request, ProfilePage $profilePage)
    {
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'name_hint' => 'required|string|max:100',
            'email_hint' => 'required|string|max:100',
            'password_hint' => 'required|string|max:100',
            'name_placeholder' => 'required|string|max:100',
            'email_placeholder' => 'required|string|max:100',
            'password_placeholder' => 'required|string|max:100',
            'button_text' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);

        $profilePage->update($request->all());

        return redirect()->route('profile-pages.index')
                         ->with('success', 'Profile Page content updated successfully.');
    }

    public function destroy(ProfilePage $profilePage)
    {
        $profilePage->delete();
        return redirect()->route('profile-pages.index')
                         ->with('success', 'Profile Page content deleted successfully.');
    }
}