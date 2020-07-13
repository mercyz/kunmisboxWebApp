@extends('layouts.backend')
@section('content')

<ul>
    @foreach($products as $product)
    <li>
        {{$product->name}}
        <a href="{{route('products.edit', $product->reference)}}">Edit</a>
    </li>
    @endforeach
</ul>

@endsection