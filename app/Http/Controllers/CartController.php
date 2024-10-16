<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, Menu $menu)
{
    // Find the user's cart, or create a new one if it doesn't exist
    $cart = Cart::firstOrCreate([
        'user_id' => Auth::id()
    ]);

    // Check if the item already exists in the cart
    $cartItem = CartItem::where('cart_id', $cart->id)
        ->where('menu_id', $menu->id)
        ->first();

    $quantity = $request->quantity;

    if ($cartItem) {
        // If the item exists, increment the quantity
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        // Otherwise, create a new cart item with the specified quantity
        CartItem::create([
            'cart_id' => $cart->id,
            'menu_id' => $menu->id,
            'quantity' => $quantity
        ]);
    }

    // Return JSON response for AJAX request
    return response()->json(['success' => true]);
}

    public function show()
    {
        // Load any data needed for the checkout process
        return view('checkout');
    }
    
    public function showCart()
    {
        $cart = Cart::with('cartItems.menu')->where('user_id', Auth::id())->first();
        return view('order', compact('cart'));
    }

    public function updateCart(Request $request, CartItem $cartItem)
    {
        // Check if the request is to increment or decrement the quantity
        if ($request->has('increment')) {
            // Increment the quantity
            $cartItem->quantity += 1;
        } elseif ($request->has('decrement') && $cartItem->quantity > 1) {
            // Decrement the quantity, but ensure it doesn't go below 1
            $cartItem->quantity -= 1;
        }

        // Save the updated cart item
        $cartItem->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Cart updated successfully.');
    }
    

    public function removeFromCart(CartItem $cartItem)
    {
        // Remove the item from the cart
        $cartItem->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Item removed from cart.');
    }


}