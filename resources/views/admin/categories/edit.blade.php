@extends('admin.layout')
@section('content')
<h2 class="mb-3">Edit Category</h2>
<form method="POST" enctype="multipart/form-data" action="{{ route('admin.categories.update',$category) }}" class="card p-4">@csrf @method('PUT')
<input class="form-control mb-3" name="name" value="{{ $category->name }}" required>
<textarea class="form-control mb-3" name="description">{{ $category->description }}</textarea>
<input class="form-control mb-3" type="file" name="image">
<button class="btn btn-dark">Update</button>
</form>
@endsection
