@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Manage Users</div>
        <div class="card-body">
            @can('create-user')
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New
                    User</a>
            @endcan
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->getRoleNames() as $role)
                                    <span class="badge custom-badge-dark">{{ $role }}</span>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-eye"></i> Show</a>

                                    @can('edit-user')
                                        @if (Auth::user()->roles_name === 'Admin' || Auth::user()->id == $user->id)
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        @endif
                                    @endcan

                                    @can('delete-user')
                                        @if (Auth::user()->id != $user->id && $user->role !== 'admin')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete this user?');"><i
                                                    class="bi bi-trash"></i> Delete</button>
                                        @endif
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <span class="text-danger">
                                    <strong>No User Found!</strong>
                                </span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $users->links() }}

        </div>
    </div>

@endsection