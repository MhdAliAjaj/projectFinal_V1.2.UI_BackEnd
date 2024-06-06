<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Show Service</title>
</head>
<body>
    <div class="container">
        <from action="" method="">
            @csrf
            <div class="mb-3"><br>
                <label class="form-label" id="">title</label>
                <input type="text" class="form-control" id="" name="title" placeholder="title" value="{{ $service->title}}">
                <br>
                <label class="form-label" id="">details</label>
                <input type="text" class="form-control" id="" name="details" placeholder="details" value="{{ $service->details}}">
                <br>
                <label class="form-label" id="">price</label>
                <input type="text" class="form-control" id="" name="price" placeholder="price" value="{{ $service->price}}">
                <br> 
                <label class="form-label" id="">categoryName</label> 
                <input type="text" class="form-control" id="" name="categoryName" placeholder="categoryName" value="{{$service->category->name}}">
                <br>
                <label class="form-label" id="">userName</label> 
                <input type="text" class="form-control" id="" name="userName" placeholder="userName" value="{{$service->user->name}}">
                <br>
            </div>
        </form>   
    </div>
</body>
</html>