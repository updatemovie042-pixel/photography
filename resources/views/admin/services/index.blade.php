@extends('admin.layout')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="admin-eyebrow">Services</span>
        <h2>Services</h2>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-admin-primary">Add Service</a>
</div>
<div class="admin-card table-responsive">
    <table class="table align-middle">
        <thead><tr><th>Image</th><th>Service Name</th><th>Category</th><th>Price</th><th>Duration</th><th>Action</th></tr></thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>@if($service->image)<img src="{{ asset('storage/'.$service->image) }}" width="80" class="rounded-3">@else<span class="text-muted">No image</span>@endif</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->category }}</td>
                    <td>₹{{ number_format($service->price, 2) }}</td>
                    <td>{{ $service->duration ?: '-' }}</td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" class="d-inline" action="{{ route('admin.services.destroy', $service) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No services found.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $services->links() }}
</div>
@endsection
