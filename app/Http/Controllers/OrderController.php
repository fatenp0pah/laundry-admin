<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer', 'service')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $services = Service::all();
        return view('orders.create', compact('customers', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'service_id' => 'required',
            'order_date' => 'required',
            'status' => 'required'
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index');
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        $services = Service::all();
        return view('orders.edit', compact('order', 'customers', 'services'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required',
            'service_id' => 'required',
            'order_date' => 'required',
            'status' => 'required'
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index');
    }

    public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
}

}
