<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $customers = Customer::all();
        $services = Service::all();

        return view('orders.create', compact('customers', 'services'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $customers = Customer::all(); // Fetch all customers
        $services = Service::all();   // Fetch all services

        return view('orders.edit', compact('order', 'customers', 'services'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'order_date' => 'required|date',
            'status' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'date_taken' => 'nullable|date', // Add this line for date_taken
        ]);

        // Find the order by ID
        $order = Order::findOrFail($id);

        // Update order details
        $order->customer_id = $request->customer_id;
        $order->service_id = $request->service_id;
        $order->order_date = $request->order_date;
        $order->status = $request->status;
        $order->weight = $request->weight;
        $order->price = $request->price;
        $order->date_taken = $request->date_taken; // Add this line

        // Save the order
        $order->save();

        // Redirect back to the orders index with a success message
        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function index()
    {
        // Fetch all orders with their related customer and service
        $orders = Order::with(['customer', 'service'])->get();
        
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'order_date' => 'required|date',
            'status' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'date_taken' => 'nullable|date', // Add this line for date_taken
        ]);

        // Create a new order with all required fields
        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function destroy($id)
    {
        // Find the order by its ID
        $order = Order::findOrFail($id);
        
        // Delete the order
        $order->delete();

        // Redirect to the orders index with a success message
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
