<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Service</title>
</head>
<body>
    <div class="container">
        <from action="{{route ('services.store')}}"  method="POST">
            @csrf
            <div class="mb-3"><br>
                <label class="form-label" id="">title</label>
                <input type="text" class="form-control"  id="" name="title" placeholder="title">
                <br>
                <label class="form-label" id="">details</label>
                <input type="text" class="form-control"  id="" name="details" placeholder="details">
                <br>
                <label class="form-label" id="">price</label>
                <input type="number" class="form-control" id="" name="price" placeholder="price">
                <br>
                <select class="form-select" aria-label="Default select example" id="" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <br>
                <select class="form-select" aria-label="Default select example" id="" name="category_id">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-warning">Save</button>
            </div>
        </form>   
    </div>
</body>
</html>