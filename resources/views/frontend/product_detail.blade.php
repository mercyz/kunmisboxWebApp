@extends('layouts.frontend')
@section('content')
 <!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="{{route('shop')}}">Shop</a></li>
                <li class="active"><a href="#">Product</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail pb-60">
    <div class="container">
        <div class="row">
            <!-- Main Thumbnail Image Start -->
            <div class="col-lg-5">
                <!-- Thumbnail Large Image start -->
                <div class="tab-content">
                    <div id="thumb1" class="tab-pane active">
                        <a data-fancybox="images" href="{{asset('img/products/1.jpg')}}"><img src="{{asset('img/products/1.jpg')}}" alt="product-view"></a>
                    </div>
                    <div id="thumb2" class="tab-pane">
                        <a data-fancybox="images" href="img/products/2.jpg"><img src="img/products/2.jpg" alt="product-view"></a>
                    </div>
                    <div id="thumb3" class="tab-pane">
                        <a data-fancybox="images" href="img/products/3.jpg"><img src="img/products/3.jpg" alt="product-view"></a>
                    </div>
                    <div id="thumb4" class="tab-pane">
                        <a data-fancybox="images" href="img/products/4.jpg"><img src="img/products/4.jpg" alt="product-view"></a>
                    </div>
                </div>
                <!-- Thumbnail Large Image End -->

                <!-- Thumbnail Image End -->
                <div class="product-thumbnail">
                    <div class="thumb-menu nav">
                            <a class="active" data-toggle="tab" href="#thumb1"> <img src="img/products/1.jpg" alt="product-thumbnail"></a>
                            <a data-toggle="tab" href="#thumb2"> <img src="img/products/2.jpg" alt="product-thumbnail"></a>
                            <a data-toggle="tab" href="#thumb3"> <img src="img/products/3.jpg" alt="product-thumbnail"></a>
                            <a data-toggle="tab" href="#thumb4"> <img src="img/products/4.jpg" alt="product-thumbnail"></a>
                    </div>
                </div>
                <!-- Thumbnail image end -->
            </div>
            <!-- Main Thumbnail Image End -->
            <!-- Thumbnail Description Start -->
            <div class="col-lg-7">
                <div class="thubnail-desc fix">
                    <h3 class="product-header">{{$product->name}}</h3>
                    <div class="rating-summary fix mtb-10">
                        <div class="rating f-left">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="rating-feedback f-left">
                            <a href="#">(1 review)</a>
                            <a href="#">add to your review</a>
                        </div>
                    </div>
                    <div class="pro-price mb-10">
                        <p><span class="price">&#8358;{{$product->amount}}</span><del class="prev-price">&#8358;{{$product->previous_amount}}</del></p>
                    </div>
                    <div class="pro-ref mb-15">
                    	@if($product->instock !== 1)
                        <p><span class="in-stock badge badge-success">IN STOCK</span></p>
                        @else
                         <p><span class="in-stock badge badge-warning">SOLD</span></p>
                        @endif
                    </div>
                    <div class="box-quantity">
                        <a class="add-cart" href="{{$product->link}}">Buy Now</a>
                    </div>
                    {{-- <div class="product-link">
                        <ul class="list-inline">
                            <li><a href="#">Add to Wish List</a></li>
                            <li><a href="#">Add to compare</a></li>
                            <li><a href="#">Email</a></li>
                        </ul>
                    </div> --}}
                    <p class="ptb-20">{{Str::limit($product->description, 200, '...')}}</p>
                </div>
            </div>
            <!-- Thumbnail Description End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail End -->
 <!-- Product Thumbnail Description Start -->
<div class="thumnail-desc pb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="main-thumb-desc nav">
                    <li><a class="active" data-toggle="tab" href="#dtail">Details</a></li>
                    <li><a data-toggle="tab" href="#review">Reviews 1</a></li>
                </ul>
                <!-- Product Thumbnail Tab Content Start -->
                <div class="tab-content thumb-content border-default">
                    <div id="dtail" class="tab-pane in active">
                        <p>{{$product->description}}</p>
                    </div>
                    <div id="review" class="tab-pane">
                        <!-- Reviews Start -->
                        <div class="review">
                            <div class="group-title">
                                <h2>customer review</h2>
                            </div>
                            {{-- foreach --}}
                            <div class="review-detail">
                            	<h4 class="review-mini-title">Jantrik</h4>
	                          	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	                          	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	                          	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	                          	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	                          	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	                          	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	                        </div>
	                       {{-- endforeach --}}
                        </div>
                        <!-- Reviews End -->
                        <!-- Reviews Start -->
                        <br><br/>
                       <div class="group-title">
                       		<h2>Please Enter your Review about this product</h2>
                       </div>
                       <div class="col-md-6 mt-4">
                       		<form>
                       			<div class="form-group">
                       				<label>Name</label>
                       				<input required="required" class="form-control" type="text" placeholder="Your name" />
                       			</div>
                       			<div class="form-group">
                       				<label>Review <small class="text-danger">*(Not more than 150 characters)</small></label>
                       				<textarea required="required" class="form-control" maxlength="150" type="text" placeholder="Your Review"></textarea>
                       			</div>
                       			<button class="btn btn-primary">Submit</button>
                       		</form>
                       </div>
                        <!-- Reviews End -->
                    </div>
                </div>
                <!-- Product Thumbnail Tab Content End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail Description End -->
<!-- Realted Product Start -->
        <div class="related-product pb-30">
            <div class="container">
                <div class="related-box">
                    <div class="group-title">
                        <h2>related products</h2>
                    </div>
                    <!-- Realted Product Activation Start -->                    
                    <div class="new-upsell-pro owl-carousel">
                        <!-- Single Product Start -->
                        @foreach($relatedProducts as $related)                    
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="{{route('product.detail', $product->reference)}}">
                                    <img class="primary-img" src="{{asset('img/products/4.jpg')}}" alt="">
                                    <img class="secondary-img" src="img/products/2.jpg">
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
                                <h4><a href="#" style="font-size: 0.85rem;">{{$related->name}}</a></h4>
                                <p><span class="price">&#8358;{{$related->amount}}</span><del class="prev-price">&#8358;{{$related->previous_amount}}</del></p>
                                <div class="pro-actions">
                                    <div class="actions-secondary">
                                        <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                        <a class="add-cart" href="#" data-toggle="tooltip" title="Add to Cart">Buy Now</a>
                                        <a href="#" data-toggle="tooltip" title="Buy Now"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                            <span class="sticker-new">-32%</span>
                        </div>
                        <!-- Single Product End -->  
                        @endforeach
                    </div>
                    <!-- Realted Product Activation End -->
                </div>
            </div>
        </div>
        <!-- Realted Product End -->
@endsection