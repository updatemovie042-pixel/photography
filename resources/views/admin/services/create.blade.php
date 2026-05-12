@extends('admin.layout')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="admin-eyebrow">Services</span>
        <h2>Add Service</h2>
    </div>
</div>
<form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="admin-card">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label fw-semibold">Service Name</label>
            <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Wedding Photography" required>
            @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold">Category</label>
            <input class="form-control" name="category" value="{{ old('category') }}" placeholder="Wedding" required>
            @error('category')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold">Price</label>
            <input class="form-control" type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="49999" required>
            @error('price')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold">Duration</label>
            <input class="form-control" name="duration" value="{{ old('duration') }}" placeholder="4 hours">
            @error('duration')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="col-12">
            <label class="form-label fw-semibold">Description</label>
            <textarea class="form-control" name="description" placeholder="Describe the service for customers" rows="4" required>{{ old('description') }}</textarea>
            @error('description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="col-12">
            <label class="form-label fw-semibold">Service Image</label>
            <input class="form-control" type="file" name="image" accept="image/*">
            @error('image')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>
    </div>
    <button class="btn btn-admin-primary mt-4">Save Service</button>
</form>
@endsection
