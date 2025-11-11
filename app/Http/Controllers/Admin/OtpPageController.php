<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtpPage;
use Illuminate\Http\Request;

class OtpPageController extends Controller
{

    public function index()
    {
        $otpPages = OtpPage::latest()->get();
        return view('dynamic_content.otp_page.index', compact('otpPages'));
    }

    public function create()
    {
        return view('dynamic_content.otp_page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'button_text' => 'required|string|max:50',
            'did_not_receive_text' => 'required|string|max:100',
            'send_again_text' => 'required|string|max:100',
            'status' => 'required|boolean',
        ]);

        OtpPage::create($request->all());

        return redirect()->route('otp-pages.index')
                         ->with('success', 'OTP Page content created successfully.');
    }

    public function show(OtpPage $otpPage)
    {
        return redirect()->route('otp-pages.edit', $otpPage);
    }

    public function edit(OtpPage $otpPage)
    {
        return view('dynamic_content.otp_page.edit', compact('otpPage'));
    }

    public function update(Request $request, OtpPage $otpPage)
    {
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'button_text' => 'required|string|max:50',
            'did_not_receive_text' => 'required|string|max:100',
            'send_again_text' => 'required|string|max:100',
            'status' => 'required|boolean',
        ]);

        $otpPage->update($request->all());

        return redirect()->route('otp-pages.index')
                         ->with('success', 'OTP Page content updated successfully.');
    }

    public function destroy(OtpPage $otpPage)
    {
        $otpPage->delete();
        return redirect()->route('otp-pages.index')
                         ->with('success', 'OTP Page content deleted successfully.');
    }
}