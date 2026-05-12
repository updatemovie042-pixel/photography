@extends('admin.layout')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="admin-eyebrow">Customers</span>
        <h2>Users</h2>
    </div>
</div>
<div class="admin-card table-responsive"><table class="table align-middle"><thead><tr><th>Name</th><th>Email</th><th>Bookings</th><th>Action</th></tr></thead><tbody>
@foreach($users as $user)
<tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->bookings_count }}</td><td>
<a href="{{ route('admin.users.show',$user) }}" class="btn btn-sm btn-primary">View</a>
<form class="d-inline" method="POST" action="{{ route('admin.users.destroy',$user) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
</td></tr>
@endforeach
</tbody></table>{{ $users->links() }}</div>
@endsection
