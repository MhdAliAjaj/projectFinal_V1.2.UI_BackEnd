<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Show Service</title>
    <style>
        /* تنسيقات مخصصة */
        body {
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .form-label {
            font-weight: bold;
            color: #333333;
        }
        .form-control {
            border: 2px solid #ced4da;
            padding: 10px;
            border-radius: 8px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }
        .form-control::placeholder {
            color: #6c757d;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #007bff;
        }
    </style>
</head>
<body>
    <br><br><br>
    <div class="container">
        <div class="float-end">
            <a href="{{ route('services.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
        <div class="header">
            <h1>Service Details</h1>
        </div>
        <form action="" method="">
            @csrf
            <div class="form-group">
                <label class="form-label" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $service->title }}">
            </div>
            <div class="form-group">
                <label class="form-label" for="details">Details</label>
                <input type="text" class="form-control" id="details" name="details" placeholder="Enter details" value="{{ $service->details }}">
            </div>
            <div class="form-group">
                <label class="form-label" for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ $service->price }}">
            </div>
            <div class="form-group">
                <label class="form-label" for="categoryName">Category Name</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" value="{{ $service->category->name }}">
            </div>
        </form>
    </div>
</body>
</html>