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
          <h2><b>500</b></h2>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="widget-small danger coloured-icon py-3 " style="background-color:purple; color:#fff;">
        <div class="info d-flex justify-content-between">
          <h4>Categories</h4>
          <h2><b>50</b></h2>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="widget-small danger coloured-icon py-3" style="background-color: blue; color:#fff;">
        <div class="info d-flex justify-content-between">
          <h4>Banners</h4>
          <h2><b>6</b></h2>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection