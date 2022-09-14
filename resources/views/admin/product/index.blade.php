@extends('admin.layouts.master')
@section('component')
<div class="container mt-4">
    <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">unit_price</label>
            <input type="number" name="unit_price" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">SKU</label>
            <input type="number" name="sku" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category_ID</label>
            <select name="category_id" class="form-control" id="">
                <option value="">Select category</option>
                @foreach($category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">name</th>
                <th scope="col" width="50%">Image</th>
                <th scope="col">unit_price</th>
                <th scope="col">SKU</th>
                <th scope="col">Category</th>

            </tr>
        </thead>
        <tbody>
            @foreach($product as $item)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$item->name}}</td>
                <td><img src="{{$item->image}}" width="20%" alt=""></td>
                <td>{{$item->unit_price}}</td>
                <td>{{$item->sku}}</td>
                <td>{{$item->category['name']}}</td>
                <td><a href="{{route('edit.product',$item->id)}}" class="btn btn-primary">Edit</a><a href="{{route('delete.product',$item->id)}}" class="btn btn-danger ms-2">Delete</a></td>

            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
</div>

@endsection