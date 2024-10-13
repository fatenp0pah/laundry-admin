@extends('layouts.app')

@section('content')
<h1>Orders</h1>
<a href="{{ route('orders.create') }}">Add New Order</a>

<table>
    <tr>
        <th>Customer</th>
        <th>Service</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach ($orders as $order)
    <tr>
        <td>{{ $order->customer->name }}</td>
        <td>{{ $order->service->service_name }}</td>
        <td>{{ $order->order_date }}</td>
        <td>{{ $order->status }}</td>
        <td>
            <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600">
                    Delete
                </button>
            </form>
        </td>
        
        
    </tr>
    @endforeach
</table>

<script>
    // Add event listeners to delete buttons
    document.querySelectorAll('[id^="deleteButton"]').forEach(button => {
        button.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-target');
            document.getElementById(modalId).classList.remove('hidden'); // Show the modal
        });
    });

    // Add event listeners to close buttons
    document.querySelectorAll('[data-modal-toggle^="deleteModal"]').forEach(button => {
        button.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-toggle');
            document.getElementById(modalId).classList.add('hidden'); // Hide the modal
        });
    });
</script>

@endsection
