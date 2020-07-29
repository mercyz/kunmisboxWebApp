@extends('layouts.backend')
@section('content')
<main class="app-content">
   <div class="app-title">
      <h1><i class="fa fa-dashboard"></i> Edit Category</h1>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Edit Category</a></li>
    </ul>
  </div>
   <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Edit Category</h3>
          @if ($errors->any())
            @foreach ($errors->all() as $error)
             <p style="padding:10px; color:#fff; background:red;">{{ $error }}</p>
            @endforeach
          @endif
         <form class="" action="{{route('categories.update', $category->id)}}" method="POST">
        @csrf @method('put')
          <div class="form-group">
           <input type="text" value="{{$category->name}}" placeholder="Add Category" class="form-control" name="name" required="required">
          </div>
            <button class="btn btn-success">Update Category</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</main>
@endsection