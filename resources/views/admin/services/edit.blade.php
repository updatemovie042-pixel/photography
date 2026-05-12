@extends('admin.layout')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="admin-eyebrow">Services</span>
        <h2>Edit Service</h2>
    </div>
</div>
<form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="admin-card">
    @csrf @method('PUT')
    <div class="row g-3">
        <div class="col-md-6"><label class="form-label fw-semibold">Service Name</label><input class="form-control" name="name" value="{{ old('name', $service->name) }}" required>@error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
        <div class="col-md-6"><label class="form-label fw-semibold">Category</label><input class="form-control" name="category" value="{{ old('category', $service->category) }}" required>@error('category')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
        <div class="col-md-6"><label class="form-label fw-semibold">Price</label><input class="form-control" type="number" step="0.01" name="price" value="{{ old('price', $service->price) }}" required>@error('price')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
        <div class="col-md-6"><label class="form-label fw-semibold">Duration</label><input class="form-control" name="duration" value="{{ old('duration', $service->duration) }}" placeholder="Duration (optional)">@error('duration')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
        <div class="col-12"><label class="form-label fw-semibold">Description</label><textarea class="form-control" name="description" rows="4" required>{{ old('description', $service->description) }}</textarea>@error('description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
        <div class="col-12"><label class="form-label fw-semibold">Service Image</label><input class="form-control" type="file" name="image" accept="image/*">@error('image')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
    </div>
    <button class="btn btn-admin-primary mt-4">Update Service</button>
</form>
@endsection
