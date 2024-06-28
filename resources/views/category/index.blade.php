
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Manage Category</div>
    <div class="card-body">
        @can('create-category')
            <a href="{{ route('category.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New category</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">S</th>
                    <th scope="col">Name</th>                
                    <th scope="col">User Name</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $categor)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $categor->name }}</td>
                    <td>{{ $categor->user?->name}}</td>
                   
                    <td>
                        <form action="{{ route('category.destroy', $categor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            
                            {{-- <a href="{{ route('category.show', $categor->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a> --}}

                            @can('edit-category')
                                <a href="{{ route('category.edit', $categor->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan
                           
                            @can('delete-category')
                                {{-- @if (Auth::user()->id != $categor->id) --}}
                                @if (Auth::user()->id )
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this user?');"><i class="bi bi-trash"></i> Delete</button>
                                @endif
                            @endcan
                   
                        </form> 
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>No category Found!</strong>
                        </span>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- {{ $categories ->links() }} --}}

    </div>
</div>

@endsection

