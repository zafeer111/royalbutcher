<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Helper function to get cart summary
     */
    private function getCartSummary($userId)
    {
        // Cart items ko unke item details ke sath fetch karein
        // Performance ke liye sirf zaroori item columns select kiye hain
        $cartItems = Cart::with([
            'item:id,name,image,base_price,discount_percent,status'
        ])->where('user_id', $userId)->get();

        $totalPrice = 0;
        $totalItems = 0;

        foreach ($cartItems as $cartItem) {
            // Agar item mojood hai (delete nahi howa)
            if ($cartItem->item) {
                // 'discounted_price' accessor (jo Item model mein hai) istemaal karein
                $totalPrice += $cartItem->item->discounted_price * $cartItem->quantity;
                $totalItems += $cartItem->quantity;
            } else {
                // Agar item database se delete ho gaya hai, tou cart se bhi hata dein
                $cartItem->delete();
            }
        }

        return [
            'items' => $cartItems,
            'summary' => [
                'total_items' => $totalItems,
                'total_price' => round($totalPrice, 2),
                // Yahan aap delivery fees waghera bhi add kar sakte hain
            ]
        ];
    }

    /**
     * Method 1: Get the current user's cart
     * Endpoint: GET /api/cart
     */
    public function getCart()
    {
        $cartData = $this->getCartSummary(Auth::id());
        return response()->json($cartData);
    }

    /**
     * Method 2: Add an item to the cart
     * Agar item pehle se hai, tou quantity barha dega.
     * Endpoint: POST /api/cart/add
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        $itemId = $request->item_id;
        $quantity = $request->quantity;

        // Check karein item available hai
        $item = Item::find($itemId);
        if (!$item || !$item->status) {
            return response()->json(['message' => 'Item is not available'], 404);
        }

        // Check karein agar item pehle se cart mein hai
        $cartItem = Cart::where('user_id', $userId)->where('item_id', $itemId)->first();

        if ($cartItem) {
            // Item pehle se hai: quantity update karein (add karein)
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Item naya hai: create karein
            $cartItem = Cart::create([
                'user_id' => $userId,
                'item_id' => $itemId,
                'quantity' => $quantity,
            ]);
        }

        return response()->json([
            'message' => 'Item added to cart successfully',
            'cart' => $this->getCartSummary($userId) // Updated cart wapis bhej dein
        ], 200);
    }

    /**
     * Method 3: Update item quantity (Toggle)
     * Yeh item ki quantity ko specific number par set kar dega
     * Endpoint: PUT /api/cart/update
     */
    public function updateCartItem(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:carts,item_id,user_id,' . Auth::id(),
            'quantity' => 'required|integer|min:1', // Quantity 1 se kam nahi ho sakti
        ]);

        $userId = Auth::id();
        $cartItem = Cart::where('user_id', $userId)
                        ->where('item_id', $request->item_id)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            
            return response()->json([
                'message' => 'Cart updated successfully',
                'cart' => $this->getCartSummary($userId)
            ], 200);
        }

        return response()->json(['message' => 'Item not found in cart'], 404);
    }

    /**
     * Method 4: Remove an item from the cart
     * Endpoint: DELETE /api/cart/remove
     */
    public function removeCartItem(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:carts,item_id,user_id,' . Auth::id(),
        ]);

        $userId = Auth::id();
        Cart::where('user_id', $userId)
            ->where('item_id', $request->item_id)
            ->delete();

        return response()->json([
            'message' => 'Item removed from cart successfully',
            'cart' => $this->getCartSummary($userId)
        ], 200);
    }
}