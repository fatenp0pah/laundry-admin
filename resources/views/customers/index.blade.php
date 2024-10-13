@extends('layouts.app')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laundry Service')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <h1>Welcome to Our Laundry Service</h1>
        <nav>
            <ul>
                <li><a href="{{ route('customers.index') }}">Customers</a></li>
                <li><a href="{{ route('orders.index') }}">Orders</a></li>
                <li><a href="{{ route('services.index') }}">Services</a></li>
                <li><a href="{{ url('/') }}">Home</a></li>
            </ul>
        </nav>
    </header>
@section('content')
<h1>Customers</h1>
<a href="{{ route('customers.create') }}">Add New Customer</a>
<ul>
    @foreach ($customers as $customer)
        <li>{{ $customer->name }} - {{ $customer->email }} 
            <a href="{{ route('customers.edit', $customer->id) }}">Edit</a></li>
    @endforeach
</ul>
@endsection
