@extends('layouts.backend')
@section('content')
<main class="app-content">
   <div class="app-title">
      <h1><i class="fa fa-dashboard"></i> Add Banner</h1>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Add Banner</a></li>
    </ul>
  </div>
   <div class="row">
    <div class="col-md-8">
      <div class="tile">
        <h3 class="tile-title">Add Banner</h3>
          @if ($errors->any())
            @foreach ($errors->all() as $error)
             <p style="padding:10px; color:#fff; background:red;">{{ $error }}</p>
            @endforeach
          @endif
         <form class="row" action="{{ route('adbanner.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group col-md-6">
            <label>Title <small class="text-danger">required*</small></label>
           <input type="text" placeholder="Add Title" class="form-control" name="title" required="required">
          </div>
          <div class="form-group col-md-6">
            <label>Select Position <small class="text-danger">required*</small></label>
             <select class="form-control" name="adposition" required="required">
              <option>Select A Position</option>
              <option value="first">First</option>
              <option value="second">Second</option>
              <option value="third">Third</option>
           </select>
          </div>
          <div class="form-group col-md-12">
            <label>Link to add details</label>
            <input type="text" name="link" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label>Banner <small class="text-danger">required*</small> <small>(370x205)(570x255)(870x240)</small></label>
            <input class="form-control" type="file" name="image" />
          </div>
          <div class="form-group col-md-6">
            <label>Status</label>
            <select class="form-control" name="status">
              <option value="1">Activate</option>
              <option value="0">Inactive</option>
            </select>
          </div>
          <div class="ml-3">
            <button class="btn btn-success">Add Banner</button>
          </div>
        </form>
      </div>
      </div>
      <div class="col-md-4">
        <div class="tile"></div>
      </div>
    </div>
  </div>
</main>
@endsection
