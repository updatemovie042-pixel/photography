@extends('admin.layout')
@section('content')
<h2 class="mb-3">Edit Package</h2>
<form method="POST" action="{{ route('admin.packages.update',$package) }}" class="card p-4">@csrf @method('PUT')
<input class="form-control mb-3" name="name" value="{{ $package->name }}" required>
<input class="form-control mb-3" name="price" value="{{ $package->price }}" type="number" step="0.01" required>
<textarea class="form-control mb-3" name="features">{{ $package->features }}</textarea>
<select class="form-select mb-3" name="category_id" required>@foreach($categories as $category)<option value="{{ $category->id }}" @selected($package->category_id===$category->id)>{{ $category->name }}</option>@endforeach</select>
<input class="form-control mb-3" name="duration" value="{{ $package->duration }}">
<button class="btn btn-dark">Update</button>
</form>
@endsection
