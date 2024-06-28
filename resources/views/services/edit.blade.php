<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Service</title>
    <style>
        body {
            background-color: #e9f7f9;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
            color: #333333;
        }
        .form-control, .form-select {
            border: 2px solid #ced4da;
            padding: 10px;
            border-radius: 8px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #17a2b8;
            box-shadow: 0 0 10px rgba(23, 162, 184, 0.5);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            box-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #17a2b8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="float-end">
            <a href="{{ route('services.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
      <div class="header">
        <h1>Update Service</h1>
      </div>
        <form action="{{route('services.update' , $service->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label" id="">Title</label>
                <input type="text" class="form-control" id="" name="title" placeholder="title" value="{{ $service->title}}">
            </div>
            <div class="form-group">
                <label class="form-label" id="">Details</label>
                <input type="text" class="form-control" id="" name="details" placeholder="details" value="{{ $service->details}}">
            </div>
            <div class="form-group">
                <label class="form-label" id="">Price</label>
                <input type="text" class="form-control" id="" name="price" placeholder="price" value="{{ $service->price}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="category_id">Category Name</label>
                <select class="form-select" id="" aria-label="Default select example" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>             
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>   
    </div>
</body>
</html>