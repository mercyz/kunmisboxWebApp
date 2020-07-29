@extends('layouts.backend')
@section('content')
<main class="app-content">
  <div class="app-title">
     <h1>AdBanner</h1>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">AdBanner</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">All AdBanner</h3>
        <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Ad-position</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($banners as $key => $banner)
                  <tr>
                  <td>{{$key +1}}</td>
                  <td class="text-capitalize">{{$banner->title}}</td>
                  <td class="text-capitalize">{{$banner->adposition}}</td>
                  <td>
                      @if($banner->status === 1)
                      <span class="badge badge-success">Active</span>
                      @else
                      <span class="badge  badge-warning">Inactive</span>
                      @endif
                  </td>
                  <td>
                    {{$banner->created_at->format('d, M, Y')}}
                  </td>
                  <td class="d-flex justify-content-between">
                    <a class="text-primary" href="{{route('adbanner.edit', $banner->id)}}"><i class="fa fa-pencil"></i> </a>
                    <form action="{{ route('adbanner.destroy', $banner->id)}}" method="POST">
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
              {{$banners->links()}}
            </div>
      </div>
    </div>
  </div>
</main>



@endsection