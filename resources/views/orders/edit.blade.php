@extends('layouts.app')

@section('content')
    <h1>Edit Order</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="customer">Customer</label>
        <select name="customer_id" id="customer">
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
        <input type="date" name="order_date" value="{{ $order->order_date }}">

        <label for="status">Status</label>
        <input type="text" name="status" value="{{ $order->status }}">

        <label for="weight">Weight</label>
        <input type="number" name="weight" value="{{ $order->weight }}">

        <label for="price">Price</label>
        <input type="number" name="price" value="{{ $order->price }}">

        <label for="date_taken">Order Date Taken</label>
        <input type="date" name="date_taken" value="{{ $order->date_taken }}">

        <button type="submit">Update Order</button>
    </form>
@endsection
