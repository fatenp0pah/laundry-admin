@extends('layouts.app')

@section('content')
<h1>Edit Order</h1>

<form action="{{ route('orders.update', $order->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="customer">Customer</label>
    <select name="customer_id">
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
        @endforeach
    </select>

    <label for="service">Service</label>
    <select name="service_id">
        @foreach($services as $service)
            <option value="{{ $service->id }}" {{ $service->id == $order->service_id ? 'selected' : '' }}>
                {{ $service->service_name }}
            </option>
        @endforeach
    </select>

    <label for="order_date">Order Date</label>
    <input type="date" name="order_date" value="{{ $order->order_date }}" required>

    <label for="status">Status</label>
    <input type="text" name="status" value="{{ $order->status }}" required>

    <button type="submit">Update Order</button>
</form>
@endsection
