@extends('layouts.backend')
@include('partials.backend_header')
@include('partials.backend_aside')
@section('content')
@push('top-css')
    <style>
        .img-holder{
            width: 300px;
            height: 300px;
        }
        .img-holder img{
            width: 100%;
            height: 100%;
        }
        .img-container{
            width: 100px;
            height: 80px;
        }
        .bt-trash{
                position: absolute;
                /*bottom: 0;*/
                /*left: 22px;*/
                /*line-height: 25px;*/
                border: medium none;
                width: 25px;
                height: 25px;
                opacity: 1;
                text-align: center;
                background: #c6454a;
                color: #fff;
                padding-left: 6px;
                transition: all .5s ease-in-out;
                cursor: pointer;
        }
        .bt-trash:hover{
            background:#fff;
            color:#c6454a;
        }
    </style>
@endpush
<main class="app-content">
  <div class="app-title">
      <h1><i class="fa fa-dashboard"></i> Add Product</h1>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Add Product</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="tile">
        <h3 class="tile-title">Add a new product</h3>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p style="padding:10px; color:#fff; background:red;">{{$error}}</p>
            @endforeach
        @endif
            <form action="{{route('products.update', $product->reference)}}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="form-group">
                <label>Product Name <small class="text-danger">required *</small></label>
                <input type="text" name="name" value="{{$product->name}}" required="required" class="form-control" placeholder="Name of product">
            </div>
            <div class="form-group">
                <label>Category <small class="text-danger">required *</small></label>
                <select name="category"  class="form-control" required="required">
                <option value="{{$product->category_id}}">{{$product->category->name}}</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" class="text-capitalize">{{$category->name}}</option>
                @endforeach
                </select> 
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" cols="30" rows="10">{{$product->description}}</textarea>   
            </div>
            <div class="form-group">
                <label>Price <small class="text-danger">required *</small> </label>
                <input type="text" value="{{$product->amount}}" required="required" class="form-control" name="amount" placeholder="Enter amount">
            </div>
            <div class="form-group">
                <label>Previous Price <small class="text-danger">must be greater than current price</small> </label>
                <input type="text" value="{{$product->previous_amount}}"  class="form-control" name="previous_amount" placeholder="Enter Previous Price">
            </div>
            <div class="form-group">
                <label>Product Buy Link To Konga <small class="text-danger">required * </small> </label>
                <input type="text" value="{{$product->link}}"  name="link" class="form-control" placeholder="Enter Product Buy Link">
            </div>
           <div class="row">
                <div class="form-group col-md-6">
                    <label>Featured Image  <small class="text-danger">required *</small></label>
                    <input type="file" name="featured_image" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Status <small class="text-danger">required *</small></label>
                    <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
           </div>
            <div class="form-group">
                <label>Product Images</label>
                <input type="file" class="form-control" name="pro_image[]" multiple accept="image/*">
            </div>
            <button class="btn btn-success" type="submit">Update Product</button>
        </form>
      </div>
    </div>
    <div class="col-md-4">
        <div class="tile ">
            @if($product->featured_image)
            <div class="form-group img-holder">
                <img src="{{asset('storage/uploads/products/featured/' .$product->featured_image)}}">
            </div>
            @endif
            <div class="form-group img-holder d-flex block-3">
            @foreach($productImages as $productImage)
                <div class="img-container mx-1 ">
                    <img src="{{asset('storage/uploads/products/' .$productImage->name)}}">
                    <button type="button" class="bt-trash" data-id="{{$productImage->id}}"><i class="fa fa-trash" data-id="{{$productImage->id}}"></i></button>
                </div>
            @endforeach
            </div>
        </div>
    </div>
  </div>
</main>
@endsection
@push('js-end')
<script type="text/javascript">
    const block = document.querySelector(".block-3");
    block.addEventListener('click', deleteImageFunc);
    function deleteImageFunc(e){
        e.preventDefault();
        const url = "{{route('delProImage', $productImage->id)}}";
        const findMatch = (el) => {
            if(el.classList.contains('fa', 'fa-trash')) return el;
            if(el.classList.contains('bt-trash')) return el;
            if(el === block) return false;
            return findMatch(el.parentElement);
        }
        let actionBtn = findMatch(e.target)
        console.log(actionBtn)
        if(!actionBtn) return " ";
        const formData = new FormData();
            formData.append('_token', '{{csrf_token()}}');
            formData.append('id', actionBtn.getAttribute('data-id'));
        if(actionBtn){
            fetch(url, {
                method: 'POST',
                headers: {
                    "X-Requested-with": "XMLHttpRequest",
                },
                body:formData
            }).then(function(res){
                actionBtn.parentElement.outerHTML = '';
            })
          }
    }    
</script>
@endpush