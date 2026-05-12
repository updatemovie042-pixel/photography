@extends('admin.layout')
@section('content')
<h2 class="mb-3">Add Package</h2>
<form method="POST" action="{{ route('admin.packages.store') }}" class="card p-4">@csrf
<input class="form-control mb-3" name="name" placeholder="Package Name" required>
<input class="form-control mb-3" name="price" placeholder="Price" type="number" step="0.01" required>
<textarea class="form-control mb-3" name="features" placeholder="Features"></textarea>
<select class="form-select mb-3" name="category_id" required><option value="">Category</option>@foreach($categories as $category)<option value="{{ $category->id }}">{{ $category->name }}</option>@endforeach</select>
<input class="form-control mb-3" name="duration" placeholder="Duration">
<button class="btn btn-dark">Save</button>
</form>
@endsection
