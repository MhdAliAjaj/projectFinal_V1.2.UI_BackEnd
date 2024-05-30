<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit category</title>
</head>
<body>
<h1>Create New user</h1>
<form action={{route('category.update',$category->id)}} method="POST">
    
    @method('PUT')
    @csrf
    <input type="text" name="name" id="" placeholder="category name">

    <input type="submit" >
</form>
</body>
</html>
