@extends('layouts.backend')
@section('content')
<main class="app-content">
   <div class="app-title">
      <h1><i class="fa fa-dashboard"></i> Edit Banner</h1>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Edit Banner</a></li>
    </ul>
  </div>
   <div class="row">
    <div class="col-md-8">
      <div class="tile">
        <h3 class="tile-title">Edit Banner</h3>
          @if ($errors->any())
            @foreach ($errors->all() as $error)
             <p style="padding:10px; color:#fff; background:red;">{{ $error }}</p>
            @endforeach
          @endif
         <form class="row" action="{{ route('adbanner.update', $adbanner->id)}}" method="POST" enctype="multipart/form-data">
        @csrf @method('put')
          <div class="form-group col-md-6">
            <label>Title <small class="text-danger">required*</small></label>
           <input type="text" placeholder="Add Title" value="{{$adbanner->title}}" class="form-control" name="title" required="required">
          </div>
          <div class="form-group col-md-6">
            <label>Select Position <small class="text-danger">required*</small></label>
             <select class="form-control" name="adposition" required="required">
              <option class="text-capitalize" value="{{$adbanner->adposition}}">{{$adbanner->adposition}}</option>
              <option value="first">First</option>
              <option value="second">Second</option>
              <option value="third">Third</option>
           </select>
          </div>
          <div class="form-group col-md-12">
            <label>Link to add details</label>
            <input value="{{$adbanner->link}}" type="text" name="link" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label>Banner <small class="text-danger">required*</small></label>
            <input class="form-control" type="file" name="image" />
          </div>
          <div class="form-group col-md-6">
            <label>Status</label>
            <select class="form-control" name="status">
              @if($adbanner->status === 1)
                <option value="1">Active</option>
                @else
                <option value="0">Inactive</option>
              @endif
              <option value="1">Activate</option>
              <option value="0">Inactive</option>
            </select>
          </div>
          <div class="ml-3">
            <button class="btn btn-success">Update Banner</button>
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
