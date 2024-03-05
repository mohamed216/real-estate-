<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Property;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'property_id' => 'required|exists:properties,id',
        'payment_method' => 'required|in:cash,visa', // Adjust the payment methods based on your requirements
    ]);

    $order = Order::create([
        'property_id' => $validatedData['property_id'],
        'user_id' => Auth::id(),
        'payment_method' => $validatedData['payment_method'],
        'quantity' => 1, // Provide a suitable value for the quantity
    ]);

    return redirect()->back()->with('success', 'Order created successfully.');

    // return response()->json(['success' => 'Order created successfully. ']);
}

public function create(Property $property)
{
    return view('frontend.orders.create', compact('property'));
}

public function index()
{
    $orders = Order::with('property')->get();
    return view('frontend.orders.index', compact('orders'));
}

public function show(Order $order)
{
    // Eager load the property relationship
    $order->load('property');

    // You can add authorization logic here to ensure the user has access to the order

    // Check if the property relationship exists
    if ($order->property) {
        return view('frontend.orders.show', compact('order'));
    } else {
        return redirect()->route('frontend.orders.index')->with('error', 'No associated property found for this order.');
    }
}

public function adminDashboard()
{
    $orders = Order::all();
    return view('admin.orders.index', compact('orders'));
}
}
