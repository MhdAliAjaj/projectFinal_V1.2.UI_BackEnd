<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Services</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Search for Services</a>
            <form class="d-flex" role="search" action="{{route('str')}}" method="GET">
            <input  class="form-control me-2" type="search" name="str" placeholder="Search" aria-label="Search">
            <input class="btn btn-outline-success" type="submit" value="Search">
            </form>
        </div>
    </nav><br>
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
                        <th scope="col">User Name</th>                                   
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
                            <td>{{$service->category->name}}</td>
                            <td>{{$service->user->name}}</td>
                           
                            <td>
                                
                                <form style="display: inline;" method='POST' action="{{route('services.destroy' , $service->id)}}">
                                    @csrf
                                    @method('DELETE')
                                     <a href="{{ route('services.show', $service->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                 
                                     <a href="{{route('services.edit' , $service->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                 
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>                     
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>