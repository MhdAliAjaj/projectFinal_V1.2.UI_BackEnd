<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New category</title>
</head>
<body>
<h1>Create New  category</h1>
<form action="{{route('category.store')}}" method="POST">
    @csrf
    {{-- @method('POST') --}}
    <input type="text" name="name" id="" placeholder="name">
    
{{-- <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="user_id">
   @foreach ( $user  as $use )
   <option value={{$use->id}}>{{$use->name}}</option>

   @endforeach

    
  </select> --}}

    <input type="submit" >
</form>
</body>
</html>

