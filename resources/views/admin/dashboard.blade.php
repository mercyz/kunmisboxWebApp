@extends('layouts.backend')
@include('partials.backend_header')
@include('partials.backend_aside')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>Welcome! Username</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-4">
       <div class="widget-small danger coloured-icon py-3" style="background-color: orange; color:#fff;">
        <div class="info d-flex justify-content-between">
          <h4>Products</h4>
          <h2><b>{{App\Models\Product::where('status', 1)->count()}}</b></h2>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="widget-small danger coloured-icon py-3 " style="background-color:purple; color:#fff;">
        <div class="info d-flex justify-content-between">
          <h4>Categories</h4>
          <h2><b>{{App\Models\Category::count()}}</b></h2>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="widget-small danger coloured-icon py-3" style="background-color: blue; color:#fff;">
        <div class="info d-flex justify-content-between">
          <h4>Banners</h4>
          <h2><b>{{App\Models\Adbanner::count()}}</b></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title"> Products</h3>
        @php $msgType = ['message', 'error'];  @endphp
          @foreach($msgType as $type)
              @if(session()->has($type))
                  <p style="padding:10px; color:#fff; background:red;">{{session()->get($type)}}<p>
              @endif
          @endforeach
        <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Reference</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                  <tr>
                  <td>{{$key +1}}</td>
                  <td>{{$product->reference}}</td>
                  <td class="text-capitalize">{{$product->name}}</td>
                  <td class="text-capitalize">{{$product->category->name}}</td>
                  <td>
                    @if($product->status === 1)
                    <span class="badge badge-success">Published</span>
                    @else
                    <span class="badge  badge-warning">Unpublish</span>
                    @endif
                  </td>
                  <td>
                    {{$product->created_at->format('d, M, Y')}}
                  </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div >
              {{$products->links()}}
            </div>
      </div>
    </div>
  </div>
</main>
@endsection