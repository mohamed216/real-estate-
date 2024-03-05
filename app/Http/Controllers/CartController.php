<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'property_id' => 'required|exists:properties,id',
    ]);

    $cart = Cart::create([
        'property_id' => $validatedData['property_id'],
        'user_id' => Auth::id(),
    ]);

    return redirect()->back()->with('success', 'Property added to cart successfully.');
}

public function index()
{
    $user = Auth::user();
    $cartCount = $user->carts->count();

    return view('carts.index', compact('cartCount'));
}

public function destroy(Cart $cart)
{
    $cart->delete();

    return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
}
}
