@extends('admin.layout')
@section('title', 'Customers')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="text-teal-700 text-[0.72rem] font-extrabold uppercase tracking-wider">Customers</span>
        <h2 class="text-2xl font-black mt-0.5">Users</h2>
    </div>
</div>

<form class="bg-white border border-slate-200 rounded-xl p-4 mb-4 grid grid-cols-1 sm:grid-cols-[1fr_auto] gap-3 items-end">
    <input name="search" class="admin-input" placeholder="Search by name or email..." value="{{ request('search') }}">
    <button class="btn-admin w-full sm:w-auto justify-center"><i class="fas fa-search"></i> Search</button>
</form>

<div class="admin-card">
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead><tr><th>Name</th><th>Email</th><th>Bookings</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="font-semibold">{{ $user->name }}</td>
                        <td class="text-slate-500">{{ $user->email }}</td>
                        <td><span class="status-pill text-xs font-bold rounded-full px-3 py-1 bg-teal-100 text-teal-700">{{ $user->bookings_count }}</span></td>
                        <td>
                            <div class="flex flex-wrap gap-1">
                                <a href="{{ route('admin.users.show', $user) }}" class="px-2.5 py-1 rounded-lg text-xs font-bold no-underline bg-blue-100 text-blue-800 hover:bg-blue-200 transition-colors inline-flex items-center gap-1"><i class="fas fa-eye"></i> View</a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="px-2.5 py-1 rounded-lg text-xs font-bold border-none cursor-pointer bg-red-100 text-red-800 hover:bg-red-200 transition-colors inline-flex items-center gap-1" onclick="return confirm('Delete this user and all associated data?')"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-slate-100">{{ $users->links('pagination::tailwind') }}</div>
</div>
@endsection