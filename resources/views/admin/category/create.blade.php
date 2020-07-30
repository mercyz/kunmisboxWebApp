@extends('layouts.backend')
@include('partials.backend_header')
@include('partials.backend_aside')
@section('content')
<main class="app-content">
   <div class="app-title">
      <h1><i class="fa fa-dashboard"></i> Add Category</h1>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Add Category</a></li>
    </ul>
  </div>
   <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Add Category</h3>
          @if ($errors->any())
            @foreach ($errors->all() as $error)
             <p style="padding:10px; color:#fff; background:red;">{{ $error }}</p>
            @endforeach
          @endif
         <form class="" action="{{ route('categories.store')}}" method="POST">
        @csrf
          <div class="form-group">
           <input type="text" placeholder="Add Category" class="form-control" name="name" required="required">
          </div>
            <button class="btn btn-success">Add Category</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</main>
@endsection
