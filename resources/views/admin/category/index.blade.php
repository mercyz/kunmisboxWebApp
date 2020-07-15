@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Category</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $key => $category)
        <tr>
            <td>{{$key +1}}</td>
            <td>{{$category->name}}</td>
            <td>
                <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('categories.destroy', $category->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection