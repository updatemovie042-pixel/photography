@extends('admin.layout')
@section('content')
<h2 class="mb-3">Add Category</h2>
<form method="POST" enctype="multipart/form-data" action="{{ route('admin.categories.store') }}" class="card p-4">@csrf
<input class="form-control mb-3" name="name" placeholder="Name" required>
<textarea class="form-control mb-3" name="description" placeholder="Description"></textarea>
<input class="form-control mb-3" type="file" name="image">
<button class="btn btn-dark">Save</button>
</form>
@endsection
