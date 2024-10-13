@extends('layouts.app')

@section('content')
<h1>Create New Order</h1>

<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <label for="customer">Customer</label>
    <select name="customer_id">
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>

    <label for="service">Service</label>
    <select name="service_id">
        @foreach($services as $service)
            <option value="{{ $service->id }}">{{ $service->service_name }}</option>
        @endforeach
    </select>

    <label for="order_date">Order Date</label>
    <input type="date" name="order_date" required>

    <label for="status">Status</label>
    <input type="text" name="status" required>
    <label for="weight">Weight (kg)</label>
<input type="number" step="0.01" name="weight" required>

<label for="price">Price (RM)</label>
<input type="number" step="0.01" name="price" required>

<label for="date_taken">Date Taken</label>
<input type="date" name="date_taken" required>
    <button type="submit">Create Order</button>
</form>
@endsection
