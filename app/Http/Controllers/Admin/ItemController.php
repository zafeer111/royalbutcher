<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category; // Category model ko import karein
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Authorization is handled by 'role:Admin' middleware in routes/web.php
     */

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load the category relationship to avoid N+1 problems
        $items = Item::with('category')->latest()->get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Category dropdown ke liye categories fetch karein
        $categories = Category::where('status', true)->orderBy('name')->get();
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'base_price' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'status' => 'required|boolean',
            // 'customization_options' => 'nullable|json' // Agar form se JSON string aye
            'add_ons' => 'nullable|array',
            'add_ons.*.name' => 'nullable|string|max:255',
            'add_ons.*.price' => 'nullable|numeric|min:0',
        ]);

        $data = $request->except('image');
        $data['status'] = $request->status == 1;

        // Handle customization options (agar simple key-value form se aa raha hai)
        // Isay aap apne form ke mutabiq adjust kar sakte hain
        if ($request->has('options_name') && $request->has('options_price')) {
            $options = [];
            foreach ($request->options_name as $key => $name) {
                if (!empty($name) && isset($request->options_price[$key])) {
                    $options[] = ['name' => $name, 'price' => $request->options_price[$key]];
                }
            }
            $data['customization_options'] = json_encode($options);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('items', 'public');
            $data['image'] = $path;
        }

        // --- NEW: Handle Add-ons ---
        $addOnsData = [];
        if ($request->has('add_ons')) {
            foreach ($request->add_ons as $addOn) {
                // Sirf woh add-ons save karein jinka naam aur price ho
                if (!empty($addOn['name']) && isset($addOn['price'])) {
                    $addOnsData[] = [
                        'name' => $addOn['name'],
                        'price' => (float) $addOn['price'],
                    ];
                }
            }
        }
        $data['customization_options'] = $addOnsData; // Model isay automatically JSON bana dega
        // --- End of New Add-on Logic ---

        Item::create($data);

        return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        // Item details show karne ke liye
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $categories = Category::where('status', true)->orderBy('name')->get();
        return view('items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'base_price' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'status' => 'required|boolean',
            'add_ons' => 'nullable|array',
            'add_ons.*.name' => 'nullable|string|max:255',
            'add_ons.*.price' => 'nullable|numeric|min:0',
        ]);

        $data = $request->except('image');
        $data['status'] = $request->status == 1;

        // Customization options ka logic yahan bhi add karein agar zaroorat hai

        if ($request->hasFile('image')) {
            // Delete old image
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            // Store new image
            $path = $request->file('image')->store('items', 'public');
            $data['image'] = $path;
        }


        // --- NEW: Handle Add-ons ---
        $addOnsData = [];
        if ($request->has('add_ons')) {
            foreach ($request->add_ons as $addOn) {
                if (!empty($addOn['name']) && isset($addOn['price'])) {
                    $addOnsData[] = [
                        'name' => $addOn['name'],
                        'price' => (float) $addOn['price'],
                    ];
                }
            }
        }
        $data['customization_options'] = $addOnsData;
        // --- End of New Add-on Logic ---

        $item->update($data);

        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        // Delete image from storage
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}
