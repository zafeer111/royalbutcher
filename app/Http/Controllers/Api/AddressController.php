<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Address\AddressResource;

class AddressController extends Controller
{
    /**
     * API 1: Get all addresses for the logged-in user
     */
    public function index()
    {
        $addresses = Auth::user()->addresses()->with('user')->latest()->get();
        
        return response()->json([
            'addresses' => AddressResource::collection($addresses)
        ], 200);
    }

    /**
     * API 2: Store a new address
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address_title' => 'required|string|max:100',
            'address_line' => 'required|string|max:255',
            'street_number' => 'nullable|string|max:100',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'landmarks' => 'nullable|string|max:255',
            'is_default' => 'required|boolean',
        ]);

        $userId = Auth::id();

        if ($validated['is_default']) {
            Address::where('user_id', $userId)->update(['is_default' => false]);
        }

        $address = Address::create($validated + ['user_id' => $userId]);
        
        $address->load('user');

        return response()->json([
            'message' => 'Address added successfully.',
            'address' => new AddressResource($address)
        ], 201);
    }

    /**
     * API 3: Update an existing address
     */
    public function update(Request $request, Address $address)
    {
        if ($address->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address_title' => 'required|string|max:100',
            'address_line' => 'required|string|max:255',
            'street_number' => 'nullable|string|max:100',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'landmarks' => 'nullable|string|max:255',
            'is_default' => 'required|boolean',
        ]);

        if ($validated['is_default']) {
            Address::where('user_id', Auth::id())
                ->where('id', '!=', $address->id)
                ->update(['is_default' => false]);
        }

        $address->update($validated);
        
        $address->load('user');

        return response()->json([
            'message' => 'Address updated successfully.',
            'address' => new AddressResource($address)
        ], 200);
    }

    /**
     * API 4: Delete an address
     */
    public function destroy(Address $address)
    {
        if ($address->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        if ($address->is_default) {
            $newDefault = Address::where('user_id', Auth::id())
                ->where('id', '!=', $address->id)
                ->first();
            
            if ($newDefault) {
                $newDefault->update(['is_default' => true]);
            }
        }

        $address->delete();

        return response()->json(['message' => 'Address deleted successfully.'], 200);
    }

    /**
     * API 5: Set a specific address as default
     */
    public function setDefault(Address $address)
    {
        if ($address->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        Address::where('user_id', Auth::id())->update(['is_default' => false]);
        $address->update(['is_default' => true]);

        $addresses = Auth::user()->addresses()->with('user')->latest()->get();
        
        return response()->json([
            'message' => 'Default address updated successfully.',
            'addresses' => AddressResource::collection($addresses)
        ], 200);
    }
}