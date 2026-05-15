@extends('admin.layout')
@section('title', 'Services')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="text-teal-700 text-[0.72rem] font-extrabold uppercase tracking-wider">Services</span>
        <h2 class="text-2xl font-black mt-0.5">Services</h2>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn-admin"><i class="fas fa-plus"></i> Add Service</a>
</div>

<form class="bg-white border border-slate-200 rounded-xl p-4 mb-4 grid grid-cols-1 sm:grid-cols-[1fr_auto] gap-3 items-end">
    <input name="search" class="admin-input" placeholder="Search by service name..." value="{{ request('search') }}">
    <button class="btn-admin w-full sm:w-auto justify-center"><i class="fas fa-search"></i> Search</button>
</form>

<div class="admin-card">
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead><tr><th>Image</th><th>Service Name</th><th>Category</th><th>Price</th><th>Duration</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td>
                            @if($service->image)
                                <img src="{{ asset('storage/'.$service->image) }}" class="w-12 h-12 rounded-lg object-cover" alt="{{ $service->name }}">
                            @else
                                <span class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-slate-100 text-slate-500 text-xs">N/A</span>
                            @endif
                        </td>
                        <td class="font-semibold">{{ $service->name }}</td>
                        <td><span class="status-pill text-xs font-bold rounded-full px-3 py-1 bg-teal-100 text-teal-700">{{ $service->category }}</span></td>
                        <td class="font-bold">₹{{ number_format($service->price, 2) }}</td>
                        <td class="text-slate-500">{{ $service->duration ?: '-' }}</td>
                        <td>
                            <div class="flex flex-wrap gap-1">
                                <a href="{{ route('admin.services.edit', $service) }}" class="px-2.5 py-1 rounded-lg text-xs font-bold no-underline bg-blue-100 text-blue-800 hover:bg-blue-200 transition-colors">Edit</a>
                                <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="px-2.5 py-1 rounded-lg text-xs font-bold border-none cursor-pointer bg-red-100 text-red-800 hover:bg-red-200 transition-colors" onclick="return confirm('Delete this service?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-slate-500">
                            <i class="fas fa-camera text-2xl mb-2 block"></i>No services found.
                            <a href="{{ route('admin.services.create') }}" class="block mt-2 font-bold text-teal-700">Add your first service</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-slate-100">{{ $services->links('pagination::tailwind') }}</div>
</div>
@endsection