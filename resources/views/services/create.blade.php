<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Service</title>
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
<<<<<<< HEAD
=======
        .error {
            color: red;
            font-size: 0.875em;
        }
>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull)
    </style>
</head>
<body>
    <div class="container">
<<<<<<< HEAD
        <div class="float-end">
            <a href="{{ route('services.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
=======
>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull)
        <div class="header">
            <h1>Add New Service</h1>
        </div>
        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="title">Title</label>
<<<<<<< HEAD
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label class="form-label" for="details">Details</label>
                <input type="text" class="form-control" id="details" name="details" placeholder="Details">
            </div>
            <div class="form-group">
                <label class="form-label" for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Price">
=======
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                @if ($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label" for="details">Details</label>
                <input type="text" class="form-control" id="details" name="details" placeholder="Details" value="{{ old('details') }}">
                @if ($errors->has('title'))
                <div class="error">{{ $errors->first('details') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label" for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
                @if ($errors->has('title'))
                <div class="error">{{ $errors->first('price') }}</div>
                @endif
>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull)
            </div>
            <div class="form-group">
                <label class="form-label" for="category_id">Category Name</label>
                <select class="form-select" id="category_id" name="category_id">
                    @foreach($categories as $category)
<<<<<<< HEAD
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
=======
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('title'))
                <div class="error">{{ $errors->first('category_id') }}</div>
                @endif
>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull)
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</body>
</html>