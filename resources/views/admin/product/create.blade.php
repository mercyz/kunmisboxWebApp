@extends('layouts.backend')
@section('content')

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="padding:10px; color:#fff; background:red;">{{$error}}</p>
    @endforeach
@endif


<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Name of product"> <br>
    <select name="category" id="">
    @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select> <br>
    <textarea name="description" id="" cols="30" rows="10"></textarea><br>
    <input type="text" name="amount" placeholder="Enter amount"><br/>
    <input type="text" name="previous_amount" placeholder="Enter Previous amount"><br>
    <input type="text" name="link" placeholder="Enter Product Buy Link"><br>
    <input type="file" name="featured_image"><br>
    <button type="submit">Add Product</button>
</form>

@endsection