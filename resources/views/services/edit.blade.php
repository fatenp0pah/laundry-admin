@extends('layouts.app')

@section('content')
<h1>Edit Service</h1>

<form action="{{ route('services.update', $service->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="service_name">Service Name</label>
    <input type="text" name="service_name" value="{{ $service->service_name }}" required>

    <label for="price">Price</label>
    <input type="number" step="0.01" name="price" value="{{ $service->price }}" required>

    <button type="submit">Update Service</button>
</form>
@endsection
