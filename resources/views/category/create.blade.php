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
        <form class="" action="{{ route('category.store')}}" method="POST">
        @csrf
          <div class="form-group">
            <select class="form-control" name="name" >
              <option value="none"  >...</option>
              <option value="women" >Women</option>
              <option value="men" >Men</option>
              <option value="kids" > Kids</option>
              <option value="accessories" >Accessories</option>
              <option value="cloths" >Cloths</option>
              <option value="shoes" >Shoes</option>
              <option value="jewellery" >jewellery</option>
              <option value="watches" >watches</option>
              <option value="sports">Sports</option>
              <option value="health">health & beauty</option>
              <option value="uncategorized">uncategorized</option>
            </select>
            <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
          </div>
        </form>
      </div>
    </div>
@endsection
