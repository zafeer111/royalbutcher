<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SplashScreen; // <-- Model change karein
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SplashScreenController extends Controller
{
    // Authorization 'role:Admin' middleware ke zariye routes/web.php mein hai

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $splashScreens = SplashScreen::latest()->get();
        return view('dynamic_content.splash.index', compact('splashScreens')); // <-- Path update karein
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dynamic_content.splash.create'); // <-- Path update karein
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->except('image');
        $data['status'] = $request->status == 1;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('splash_screens', 'public');
            $data['image'] = $path;
        }

        SplashScreen::create($data);

        return redirect()->route('splash-screens.index') // <-- Route name update karein
                         ->with('success', 'Splash Screen created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SplashScreen $splashScreen)
    {
        // CRUD ke liye 'show' page ki zaroorat nahi, 'edit' hi kafi hai
        return redirect()->route('splash-screens.edit', $splashScreen);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SplashScreen $splashScreen)
    {
        return view('dynamic_content.splash.edit', compact('splashScreen')); // <-- Path update karein
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SplashScreen $splashScreen)
    {
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->except('image');
        $data['status'] = $request->status == 1;

        if ($request->hasFile('image')) {
            if ($splashScreen->image) {
                Storage::disk('public')->delete($splashScreen->image);
            }
            $path = $request->file('image')->store('splash_screens', 'public');
            $data['image'] = $path;
        }

        $splashScreen->update($data);

        return redirect()->route('splash-screens.index') // <-- Route name update karein
                         ->with('success', 'Splash Screen updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SplashScreen $splashScreen)
    {
        if ($splashScreen->image) {
            Storage::disk('public')->delete($splashScreen->image);
        }
        $splashScreen->delete();

        return redirect()->route('splash-screens.index') // <-- Route name update karein
                         ->with('success', 'Splash Screen deleted successfully.');
    }
}