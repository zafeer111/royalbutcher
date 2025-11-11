<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Items\ItemResource;
use App\Http\Resources\Items\ItemSummaryResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * API 1: Fetch all active items (paginated)
     * Recently uploaded items will come first.
     */
    public function index(Request $request)
    {
        // Eager load category, show only active items, order by latest
        $items = Item::with('category:id,name') // Sirf category ki ID aur Name fetch karein
            ->where('status', true) // Sirf active items dikhayein
            ->latest() // Shorthand for orderBy('created_at', 'DESC')
            ->paginate(15); // Mobile app ke liye pagination zaroori hai

        return ItemSummaryResource::collection($items);
    }

    /**
     * API 2: Fetch items with the highest discount (Hot Discounts)
     * Items with greater discount_percent will come first.
     */
    public function hotDiscounts()
    {
        // Eager load category, show active items, only where discount > 0
        $items = Item::with('category:id,name')
            ->where('status', true) // Sirf active items
            // ->where('discount_percent', '>', 0) // Sirf discount wale items
            ->orderBy('discount_percent', 'DESC') // Sabse zyada discount wale pehle
            ->limit(10) // Top 10 results
            ->get();

        return ItemSummaryResource::collection($items);
    }

    /**
     * API 3: Get details for a single item
     */
    public function show(Item $item)
    {
        if (!$item->status) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        
        $item->load('category:id,name');

        return new ItemResource($item);
    }
}