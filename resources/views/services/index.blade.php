@extends('layouts.app')

@section('content')
<div  class="container-fluid"><h3>Manage service<h3></div>
<div class="card">
    <div class="card-header">
            <a class="navbar-brand">Search for Services</a>
            <form class="d-flex" role="search" action="{{route('search')}}" method="GET">
            <input  class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <input class="btn btn-outline-success" type="submit" value="Search">
            </form><br>
    </div>
         <div class="card-body">
           
        
    <div class="container-fluid">
    @can('create-service')
            <a href="{{ route('services.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Service</a>
    @endcan   
    </div>
    <div class=mt-3>
        <div class="text-center">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Details</th>
                        <th scope="col">Price</th>
                        <th scope="col">Ctegory Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$service->title}}</td>   
                            <td>{{$service->details}}</td>   
                            <td>{{$service->price}}</td>
                            <td>{{$service->category?->name}}</td>
                            <td>
                                
                                <form style="display: inline;" method='POST' action="{{route('services.destroy' , $service->id)}}">
                                    @csrf
                                    @method('DELETE')
                                     <a href="{{ route('services.show', $service->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                 
                                    @can('edit-service')
                                     <a href="{{route('services.edit' , $service->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    @endcan
                                     @can('delete-service')
                                        @if (Auth::user()->id )
                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this user?');"><i class="bi bi-trash"></i> Delete</button>
                                        @endif
                                    @endcan
                                </form>
                            </td>                     
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div><br>
    </div>
</div>
    @endsection
