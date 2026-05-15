@extends('admin.layout')
@section('title', 'Edit Category')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="text-teal-700 text-[0.72rem] font-extrabold uppercase tracking-wider">Categories</span>
        <h2 class="text-2xl font-black mt-0.5">Edit Category</h2>
    </div>
</div>

<form method="POST" enctype="multipart/form-data" action="{{ route('admin.categories.update', $category) }}" class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
    @csrf @method('PUT')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
            <label class="block font-bold text-sm mb-1">Category Name</label>
            <input class="admin-input @error('name') is-invalid @enderror" name="name" value="{{ old('name', $category->name) }}" required>
            @error('name')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block font-bold text-sm mb-1">Image (optional)</label>
            <input class="admin-input @error('image') is-invalid @enderror" type="file" name="image" accept="image/*">
            @error('image')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
            <div class="text-xs text-slate-500 mt-1">Leave empty to keep current image.</div>
        </div>
        <div class="md:col-span-2">
            <label class="block font-bold text-sm mb-1">Description</label>
            <textarea class="admin-input @error('description') is-invalid @enderror" name="description" rows="3" style="min-height:80px;">{{ old('description', $category->description) }}</textarea>
            @error('description')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="flex gap-2 mt-4">
        <button class="btn-admin"><i class="fas fa-floppy-disk"></i> Update Category</button>
        <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-bold text-sm border border-slate-200 text-slate-700 no-underline hover:border-teal-700 hover:text-teal-700 hover:bg-teal-50 transition-all duration-200">Cancel</a>
    </div>
</form>
@endsection