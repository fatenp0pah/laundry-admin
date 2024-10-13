@extends('layouts.app')

@section('content')
<h1>Create New Service</h1>

<form action="{{ route('services.store') }}" method="POST">
    @csrf
    <label for="service_name">Service Name</label>
    <input type="text" name="service_name" required>

    <label for="price">Price</label>
    <input type="number" step="0.01" name="price" required>

    <button type="submit">Create Service</button>
</form>
@endsection
