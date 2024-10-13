@extends('layouts.app')

@section('content')
<h1>Add Customer</h1>
<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Phone Number: <input type="text" name="phone_number" required><br>
    <button type="submit">Add</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection

