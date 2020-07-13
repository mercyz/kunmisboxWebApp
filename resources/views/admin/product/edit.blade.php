@extends('layouts.backend')
@section('content')

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="padding:10px; color:#fff; background:red;">{{$error}}</p>
    @endforeach
@endif


<form action="{{route('products.update', $product->reference)}}" method="post" enctype="multipart/form-data">
    @csrf @method('put')
    <input type="text" name="name" placeholder="Name of product" value="{{$product->name}}"> <br>
    <select name="category" id="">
    <option value="{{$product->category_id}}">{{$product->category->name}}</option>
    @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select> <br>
    <textarea name="description" id="" cols="30" rows="10">{{$product->description}}</textarea><br>
    <input type="text" name="amount" value="{{$product->amount}}" placeholder="Enter amount"><br/>
    <input type="text" name="previous_amount" value="{{$product->previous_amount}}" placeholder="Enter Previous amount"><br>
    <input type="text" name="link" value="{{$product->link}}" placeholder="Enter Product Buy Link"><br>
    <input type="file" name="featured_image"><br>
    <button type="submit">Update Product</button>
</form>

@endsection