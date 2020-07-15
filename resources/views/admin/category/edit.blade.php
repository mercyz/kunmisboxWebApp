@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
     @endif
        <form action="{{route('categories.update', $category->id)}}" method="POST">
        @csrf @method('put')
          <div class="form-group">
           <input type="text" class="form-control" value="{{$category->name}}" name="name" required="required">
          </div>
            <button class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
@endsection
