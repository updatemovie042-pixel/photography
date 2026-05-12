@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between mb-3"><h2>Categories</h2><a href="{{ route('admin.categories.create') }}" class="btn btn-dark">Add Category</a></div>
<div class="table-responsive bg-white p-3 rounded-3"><table class="table"><thead><tr><th>Name</th><th>Description</th><th>Image</th><th>Action</th></tr></thead><tbody>
@foreach($categories as $category)
<tr><td>{{ $category->name }}</td><td>{{ $category->description }}</td><td>@if($category->image)<img src="{{ asset('storage/'.$category->image) }}" width="80">@endif</td><td>
<a href="{{ route('admin.categories.edit',$category) }}" class="btn btn-sm btn-primary">Edit</a>
<form class="d-inline" method="POST" action="{{ route('admin.categories.destroy', $category) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
</td></tr>
@endforeach
</tbody></table>{{ $categories->links() }}</div>
@endsection
