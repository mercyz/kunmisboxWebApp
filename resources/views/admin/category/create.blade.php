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
        <form class="" action="{{ route('categories.store')}}" method="POST">
        @csrf
          <div class="form-group">
           <input type="text" class="form-control" name="name" required="required">
          </div>
            <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
        </form>
      </div>
    </div>
@endsection
