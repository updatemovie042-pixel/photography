@extends('admin.layout')
@section('title', 'Categories')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="text-teal-700 text-[0.72rem] font-extrabold uppercase tracking-wider">Categories</span>
        <h2 class="text-2xl font-black mt-0.5">Categories</h2>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn-admin"><i class="fas fa-plus"></i> Add Category</a>
</div>

<form class="bg-white border border-slate-200 rounded-xl p-4 mb-4 grid grid-cols-1 sm:grid-cols-[1fr_auto] gap-3 items-end">
    <input name="search" class="admin-input" placeholder="Search by category name..." value="{{ request('search') }}">
    <button class="btn-admin w-full sm:w-auto justify-center"><i class="fas fa-search"></i> Search</button>
</form>

<div class="admin-card">
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead><tr><th>Name</th><th>Description</th><th>Image</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="font-semibold">{{ $category->name }}</td>
                        <td class="text-slate-500 max-w-[300px]">{{ $category->description ?: '-' }}</td>
                        <td>
                            @if($category->image)
                                <img src="{{ asset('storage/'.$category->image) }}" class="w-12 h-12 rounded-lg object-cover" alt="{{ $category->name }}">
                            @else
                                <span class="text-slate-400 text-xs">No image</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex flex-wrap gap-1">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="px-2.5 py-1 rounded-lg text-xs font-bold no-underline bg-blue-100 text-blue-800 hover:bg-blue-200 transition-colors">Edit</a>
                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="px-2.5 py-1 rounded-lg text-xs font-bold border-none cursor-pointer bg-red-100 text-red-800 hover:bg-red-200 transition-colors" onclick="return confirm('Delete this category?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-slate-100">{{ $categories->links('pagination::tailwind') }}</div>
</div>
@endsection