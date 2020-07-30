@extends('layouts.backend')
@include('partials.backend_header')
@include('partials.backend_aside')
@section('content')
<main class="app-content">
  <div class="app-title">
     <h1>Category</h1>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Category</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">All Categories</h3>
        <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($categories as $key => $category)
                  <tr>
                  <td>{{$key +1}}</td>
                  <td class="text-capitalize">{{$category->name}}</td>
                  <td>
                    {{$category->created_at->format('d, M, Y')}}
                  </td>
                  <td class="d-flex justify-content-between">
                    <a class="text-primary" href="{{route('categories.edit', $category->id)}}"><i class="fa fa-pencil"></i> </a>
                    <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
                      @csrf @method('delete')
                      <button style="padding:none; border:none; background:transparent; cursor: pointer;" class="text-danger"> <i class="fa fa-trash"></i> </button>
                    </form>

                  </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div >
              {{$categories->links()}}
            </div>
      </div>
    </div>
  </div>
</main>



@endsection