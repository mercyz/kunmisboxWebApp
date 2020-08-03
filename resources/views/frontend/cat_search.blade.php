@extends('layouts.frontend', ['title' => 'Products | Quality for everyone'])
@section('content')
 <!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="/">Home</a></li>
                <li class="active"><a href="{{route('shop')}}">Shop</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Shop Page Start -->
<div class="main-shop-page pb-60">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3  order-2">
                <div class="sidebar white-bg">
                    <div class="single-sidebar">
                        <div class="group-title">
                            <h2>categories</h2>
                        </div>
                        <ul>
                        	@foreach($categories as $category)
                            <li><a href="{{route('category.search', $category->slug)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single-sidebar single-banner zoom pt-20">
                        <a href="#" class="hidden-sm"><img src="img/banner/8.jpg" alt="slider-banner"></a>
                        <a href="#" class="visible-sm"><img src="img/banner/6.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div>
            <!-- Sidebar Shopping Option End -->                    
            <!-- Product Categorie List Start -->
            <div class="col-lg-9 order-lg-2">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding fix mb-30">
                    <div class="grid-list-view f-left">
                        <ul class="list-inline nav">
                            <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                            <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                            <li><span class="grid-item-list text-capitalize">{{$cat->name}}</span></li>
                        </ul>
                    </div>
                </div>
                <!-- Grid & List View End -->
                <div class="main-categorie">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content fix">
                        <div id="grid-view" class="tab-pane active">
                            <div class="row">
                            	@foreach($products as $product)
                                <!-- Single Product Start -->                    
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                             <a href="{{route('product.detail', $product->slug)}}">
                                                @if($product->featured_image !== 'productImage.png')
                                                <img class="primary-img" src="{{asset('storage/uploads/products/featured/' . $product->featured_image)}}">
                                                <img class="secondary-img" src="{{asset('storage/uploads/products/featured/' . $product->featured_image)}}">
                                                @else
                                                <img class="primary-img" src="{{asset('img/products/1.jpg')}}" alt="single-product">
                                                <img class="secondary-img" src="{{asset('img/products/2.jpg')}}" alt="single-product">
                                                @endif
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>                                
                                            <h4><a style="font-size: 0.85rem;" href="{{route('product.detail', $product->reference)}}">{{Str::limit($product->name, 50, '...')}}</a></h4>
                                            <p><span class="price">&#8358;{{$product->amount}}</span><del class="prev-price">&#8358;{{$product->previous_amount}}</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="{{$product->link}}" target="_blank" data-toggle="tooltip" title="Add to Cart">Buy Now</a>
                                                    <a href="#" data-toggle="tooltip" title="Buy Now"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                @endforeach
                            </div>                                    
                        </div>
                        <!-- #grid view End -->
                        <div id="list-view" class="tab-pane">
                        	@foreach($products as $product)
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                     <a href="{{route('product.detail', $product->slug)}}">
                                                @if($product->featured_image !== 'productImage.png')
                                                <img class="primary-img" src="{{asset('storage/uploads/products/featured/' . $product->featured_image)}}">
                                                <img class="secondary-img" src="{{asset('storage/uploads/products/featured/' . $product->featured_image)}}">
                                                @else
                                                <img class="primary-img" src="{{asset('img/products/1.jpg')}}" alt="single-product">
                                                <img class="secondary-img" src="{{asset('img/products/2.jpg')}}">
                                                @endif
                                            </a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>                                
                                    <h4><a href="{{route('product.detail', $product->reference)}}">{{Str::limit($product->name, 50, '...')}}</a></h4>
                                    <p><span class="price">&#8358;{{$product->amount}}</span><del class="prev-price">&#8358;{{$product->previous_amount}}</del></p>
                                    <p>{{Str::limit($product->description, 100, '...')}}</p>
                                    <div class="pro-actions">
                                        <div class="actions-secondary">
                                            <a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="add-cart" href="{{$product->link}}" target="_blank" data-toggle="tooltip" title="Buy Now">Buy Now</a>
                                            <a href="#" data-toggle="tooltip" title="Buy Now"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                           @endforeach
                                                        
                        </div>
                        <!-- #list view End -->
                    </div>
                    <!-- Grid & List Main Area End -->
                </div>
                <!--Breadcrumb and Page Show Start -->
            <div class="pagination-box fix">
             {{$products->links('partials.paginate')}}
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Shop Page End -->
@endsection