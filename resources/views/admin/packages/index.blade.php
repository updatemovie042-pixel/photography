@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between mb-3"><h2>Packages</h2><a href="{{ route('admin.packages.create') }}" class="btn btn-dark">Add Package</a></div>
<div class="table-responsive bg-white p-3 rounded-3"><table class="table"><thead><tr><th>Name</th><th>Price</th><th>Category</th><th>Duration</th><th>Action</th></tr></thead><tbody>
@foreach($packages as $package)
<tr><td>{{ $package->name }}</td><td>{{ $package->price }}</td><td>{{ $package->category->name }}</td><td>{{ $package->duration }}</td><td>
<a href="{{ route('admin.packages.edit',$package) }}" class="btn btn-sm btn-primary">Edit</a>
<form class="d-inline" method="POST" action="{{ route('admin.packages.destroy', $package) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
</td></tr>
@endforeach
</tbody></table>{{ $packages->links() }}</div>
@endsection
