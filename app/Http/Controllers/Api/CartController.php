<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Cart\CartResource;

class CartController extends Controller
{
    private function getCartSummary($userId)
    {
        $cartItems = Cart::with([
                'item:id,name,image,base_price,discount_percent,status'
            ])
            ->where('user_id', $userId)
            ->latest()
            ->get();

        $totalPrice = 0;
        $totalItems = 0;

        foreach ($cartItems as $cartItem) {
            if ($cartItem->item) {
                // Item model ka 'discounted_price' accessor istemaal karega
                $totalPrice += $cartItem->item->discounted_price * $cartItem->quantity;
                $totalItems += $cartItem->quantity;
            } else {
                // Agar item delete ho gaya ho, tou cart se nikal dein
                $cartItem->delete();
            }
        }

        return [
            'items' => $cartItems, // Raw collection
            'summary' => [
                'total_items' => $totalItems,
                'total_price' => round($totalPrice, 2),
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

        return response()->json([
            'items' => CartResource::collection($cartData['items']),
            'summary' => $cartData['summary']
        ]);
    }

    /**
     * Method 2: Add an item to the cart
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

        $item = Item::find($itemId);
        if (!$item || !$item->status) {
            return response()->json(['message' => 'Item is not available'], 404);
        }

        $cartItem = Cart::where('user_id', $userId)->where('item_id', $itemId)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $cartItem = Cart::create([
                'user_id' => $userId,
                'item_id' => $itemId,
                'quantity' => $quantity,
            ]);
        }

        $cartData = $this->getCartSummary($userId);
        return response()->json([
            'message' => 'Item added to cart successfully',
            'cart' => [
                'items' => CartResource::collection($cartData['items']),
                'summary' => $cartData['summary']
            ]
        ], 200);
    }

    /**
     * Method 3: Update item quantity (Toggle)
     * Endpoint: PUT /api/cart/update
     */
    public function updateCartItem(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:carts,item_id,user_id,' . Auth::id(),
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        $cartItem = Cart::where('user_id', $userId)
                        ->where('item_id', $request->item_id)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            
            $cartData = $this->getCartSummary($userId);
            return response()->json([
                'message' => 'Cart updated successfully',
                'cart' => [
                    'items' => CartResource::collection($cartData['items']),
                    'summary' => $cartData['summary']
                ]
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

        $cartData = $this->getCartSummary($userId);
        return response()->json([
            'message' => 'Item removed from cart successfully',
            'cart' => [
                'items' => CartResource::collection($cartData['items']),
                'summary' => $cartData['summary']
            ]
        ], 200);
    }
}