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
        @foreach($categorys as $Category)
        <tr>
            <td>{{$Category->id}}</td>
            <td>{{$Category->name}}</td>
            <td>
                <a href="{{ route('category.edit',$Category->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('category.destroy', $Category->id)}}" method="post">
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