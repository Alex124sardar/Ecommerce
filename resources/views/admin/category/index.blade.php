@extends('admin.layouts.master')
@section('component')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-4">
        <form action="{{route('store.category')}}" method="post">
            {{csrf_field()}}
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
            </div>
           
            <input type="submit"  value="Submit" class="btn btn-primary">
        </form>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $item)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$item->name}}</td>
                    <td><a href="{{route('edit.category',$item->id)}}" class="btn btn-primary">Edit</a><a href="{{route('delete.category',$item->id)}}" class="btn btn-danger ms-2">Delete</a></td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

@endsection