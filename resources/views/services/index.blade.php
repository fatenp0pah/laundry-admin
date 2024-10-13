@extends('layouts.app')

@section('content')
<h1>Services</h1>
<a href="{{ route('services.create') }}">Add New Service</a>

<table>
    <tr>
        <th>Service Name</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    @foreach ($services as $service)
    <tr>
        <td>{{ $service->service_name }}</td>
        <td>{{ $service->price }}</td>
        <td>
            <a href="{{ route('services.edit', $service->id) }}">Edit</a>
            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
