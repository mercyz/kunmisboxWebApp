@extends('layouts.backend')
@include('partials.backend_header')
@include('partials.backend_aside')
@section('content')
<main class="app-content">
  <div class="app-title">
     <h1>Products</h1>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Product</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">All Products</h3>
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
                    <th>Action</th>
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
                 	<td class="d-flex justify-content-between">
                 		<a class="text-primary" href="{{route('products.edit', $product->reference)}}"><i class="fa fa-pencil"></i> </a>
                 		<form action="{{route('products.destroy', $product->reference)}}" method="POST">
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
            	{{$products->links()}}
            </div>
      </div>
    </div>
  </div>
</main>



@endsection