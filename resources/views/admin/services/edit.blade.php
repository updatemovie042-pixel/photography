@extends('admin.layout')
@section('title', 'Edit Service')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="text-teal-700 text-[0.72rem] font-extrabold uppercase tracking-wider">Services</span>
        <h2 class="text-2xl font-black mt-0.5">Edit Service</h2>
    </div>
</div>

<form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
    @csrf @method('PUT')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
            <label class="block font-bold text-sm mb-1">Service Name</label>
            <input class="admin-input @error('name') is-invalid @enderror" name="name" value="{{ old('name', $service->name) }}" required>
            @error('name')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block font-bold text-sm mb-1">Category</label>
            <select class="admin-input @error('category_id') is-invalid @enderror" name="category_id" required>
                <option value="">Select category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(old('category_id', $service->category_id) == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block font-bold text-sm mb-1">Price (₹)</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 rounded-l-xl border border-r-0 border-slate-200 bg-slate-50 font-bold text-sm">₹</span>
                <input class="admin-input rounded-l-none @error('price') is-invalid @enderror" type="number" step="0.01" name="price" value="{{ old('price', $service->price) }}" required>
            </div>
            @error('price')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block font-bold text-sm mb-1">Duration</label>
            <input class="admin-input @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration', $service->duration) }}" placeholder="Duration (optional)">
            @error('duration')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="md:col-span-2">
            <label class="block font-bold text-sm mb-1">Description</label>
            <textarea class="admin-input @error('description') is-invalid @enderror" name="description" rows="4" style="min-height:100px;" required>{{ old('description', $service->description) }}</textarea>
            @error('description')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="md:col-span-2">
            <label class="block font-bold text-sm mb-1">Service Image</label>
            <input class="admin-input @error('image') is-invalid @enderror" type="file" name="image" accept="image/*">
            <div class="text-xs text-slate-500 mt-1">Leave empty to keep the current image.</div>
            @error('image')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="flex gap-2 mt-4">
        <button class="btn-admin"><i class="fas fa-floppy-disk"></i> Update Service</button>
        <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-bold text-sm border border-slate-200 text-slate-700 no-underline hover:border-teal-700 hover:text-teal-700 hover:bg-teal-50 transition-all duration-200">Cancel</a>
    </div>
</form>
@endsection