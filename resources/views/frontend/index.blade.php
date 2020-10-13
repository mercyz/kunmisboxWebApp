@extends('layouts.frontend', ['title' => 'Quality for everyone'])
@section('content')
@include('partials.banner-slides')
@push('start-css')
<style>
    .top-pro-img{
        height: 100px;
    }
    .top-pro-img > a{
        height: 100px
    }
    .top-pro-img > a > img{
        width: 100%;
        height: 100%;
        position: absolute;
    }
    .new-products .product-list{
        background: whitesmoke;
    }
</style>

@endpush
<!-- Banner Start -->
<div class="upper-banner banner pb-60">
    <div class="container">
       <div class="row">
           <!-- Single Banner Start -->
           @if($firstBanners->count() === 3 )
               @foreach($firstBanners as $firstBanner)
               <div class="col-sm-4">
                    <div class="single-banner zoom">
                        @if($firstBanner->image !== 'placeholder.png')
                        <a href="{{$firstBanner->link}}"><img src="{{asset('storage/uploads/adbanner/' .$firstBanner->image)}}" ></a>
                        @else
                         <a href="#"><img src="img/banner/3.jpg" alt="slider-banner"></a>
                        @endif
                    </div>
                </div>
               <!-- Single Banner End -->
               @endforeach
           @endif
       </div>
       <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Banner End -->


<!-- Best Products Start -->
<div class="best-seller-product pb-30">
    <div class="container">
        <div class="group-title">
            <h2>Men - Women<h2>
        </div>
        <!-- Best Product Activation Start -->
        <div class="hand-tool-active owl-carousel">
            <!-- Single Product Start -->
            @foreach($men_women as $mw)
            <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="{{route('product.detail', $mw->slug)}}">
                        @if($mw->featured_image !== 'productImage.png')
                            <img class="primary-img" src="{{asset('/storage/uploads/products/featured/' .$mw->featured_image)}}">
                            {{-- <img class="secondary-img" src="{{asset('/storage/uploads/products/featured/' .$mw->featured_image)}}"> --}}
                        @else
                        <img class="primary-img" src="img/products/7.jpg" alt="single-product">
                        <img class="secondary-img" src="img/products/8.jpg" alt="single-product">
                       @endif
                    </a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                	@if($mw->instock !== 0)
                		<span class="sticker-new">Sold</span>
                	@endif
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <h4><a style="font-size: 0.85rem;" href="{{route('product.detail', $mw->slug)}}">{{Str::limit($mw->name, 50, '...')}}</a></h4>
                    <p><span class="price">&#8358;{{$mw->amount}}</span>
                        @if($mw->previous_amount !== null)
                        <del class="prev-price">&#8358;{{$mw->previous_amount}}</del>
                        @endif
                    </p>
                    <div class="pro-actions">
                        <div class="actions-secondary">
                            <a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                            <a class="add-cart" href="{{$mw->link}}" target="_blank" target="_blank" data-toggle="tooltip" title="Buy Now">Buy Now</a>
                            <a href="#" data-toggle="tooltip" title="Buy"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Product Content End -->
            </div>
            @endforeach
            <!-- Single Product End -->
        </div>
        <!-- Best Product Activation End -->
    </div>
    <!-- Container End -->
</div>
<!-- Best Product End -->
 <!-- Banner Start -->
<div class="upper-banner banner pb-60" style="background:#fbfbfb;">
    <div class="container">
       <div class="row">
        @if($secondBanners->count() === 2)
        @foreach($secondBanners as $secondBanner)
           <!-- Single Banner Start -->
           <div class="col-sm-6">
                <div class="single-banner zoom">
                    @if($secondBanner->image !== 'placeholder.png')
                    <a href="{{$secondBanner->link}}"><img src="{{asset('storage/uploads/adbanner/' .$secondBanner->image)}}"></a>
                    @else
                    <a href="#"><img src="img/banner/1.png" alt="slider-banner"></a>
                    @endif
                </div>
            </div>
           <!-- Single Banner End -->
        @endforeach
        @endif
       </div>
       <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Banner End -->


 <!-- New Products Start -->
<div class="new-products pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 order-2">
                <div class="side-product-list">
                    <div class="group-title">
                        <h2>Top Products</h2>
                    </div>
                    <!-- Deal Pro Activation Start -->
                    <div class="slider-right-content side-product-list-active owl-carousel">
                        <!-- Double Product Start -->
                       {{--  @shuffle($productRecommended) --}}
                        @foreach($productRecommended->chunk(4) as $topProduct)
                        <div class="double-pro">
                            <!-- Single Product Start -->
                            @php $sh = collect($topProduct)->shuffle()->all() @endphp
                            @foreach($sh as $top)
                            <div class="single-product" style="flex-direction:row;">
                                <div class="pro-img top-pro-img">
                                    <a href="{{route('product.detail', $top->slug)}}">
                                        @if($top->featured_image !== "productImage.png")
                                        <img class="img" src="{{asset('storage/uploads/products/featured/' . $top->featured_image)}}">
                                        @else
                                        <img class="img" src="img/products/1.jpg" alt="product-image">
                                        @endif
                                    </a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="{{route('product.detail', $top->slug)}}">{{Str::limit($top->name, 20, '...')}}</a></h4>
                                    <p><span class="price">&#8358;{{$top->amount}}</span>
                                        @if($top->previous_amount  !== null)
                                        <del class="prev-price">&#8358;{{$top->previous_amount}}</del>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @endforeach

                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                        @endforeach
                    </div>
                    <!-- Deal Pro Activation End -->
                </div>
            </div>
            <div class="col-xl-9 col-lg-8  order-lg-2">
                <!-- New Pro Content End -->
                <div class="new-pro-content">
                    <div class="pro-tab-title border-line">
                        <!-- Featured Product List Item Start -->
                        <ul class=" nav  product-list product-tab-list mb-30">
                            <li><a  class="active" data-toggle="tab" href="#new-arrival">New Arrivals</a></li>
                            <li><a data-toggle="tab" href="#toprated">Featured</a></li>
                        </ul>
                        <!-- Featured Product List Item End -->
                    </div>
                    <div class="tab-content product-tab-content jump">
                        <div id="new-arrival" class="tab-pane active">
                            <!-- New Products Activation Start -->
                            <div class="new-pro-active owl-carousel">
                                <!-- Single Product Start -->
                               @foreach($products as $product)
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product.detail', $product->slug)}}">
                                            @if($product->featured_image !== "productImage.png")
                                            <img class="primary-img" src="{{asset('storage/uploads/products/featured/' . $product->featured_image)}}">
                                            <img class="secondary-img" src="{{asset('storage/uploads/products/featured/' . $product->featured_image)}}">
                                            @else
                                                <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/2.jpg" alt="single-product">
                                            @endif
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                    	@if($product->instock !== 0)
                                    		<span class="sticker-new">Sold</span>
                                    	@endif
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h4><a style="font-size: 0.85rem;"  href="{{route('product.detail', $product->slug)}}">{{Str::limit($product->name, 50, '...')}}</a></h4>
                                        <p><span class="price">&#8358;{{$product->amount}}</span>
                                            @if($product->previous_amount !== null)
                                            <del class="prev-price">&#8358;{{$product->previous_amount}}</del>
                                            @endif
                                        </p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="{{route('product.detail', $product->slug)}}" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="add-cart" href="{{$product->link}}" target="_blank" data-toggle="tooltip" title="Add to Cart">Buy Now</a>
                                                <a href="{{route('product.detail', $product->slug)}}" data-toggle="tooltip" title="Buy"><i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                               @endforeach
                            </div>
                            <!-- New Products Activation End -->
                        </div>
                        <!-- New Products End -->
                        <div id="toprated" class="tab-pane">
                            <!-- New Products Activation Start -->
                            <div class="new-pro-active owl-carousel">
                                <!-- Single Product Start -->
                               @foreach($featuredProducts as $featured)
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="#">
                                            @if($featured->featured_image !=="productImage.png")
                                            <img class="primary-img" src="{{asset('storage/uploads/products/featured/' .$featured->featured_image)}}">
                                            <img class="secondary-img" src="{{asset('storage/uploads/products/featured/' .$featured->featured_image)}}">
                                            @else
                                                <img class="primary-img" src="img/products/4.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/3.jpg" alt="single-product">
                                            @endif
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                    	@if($featured->instock !== 0)
                                    		<span class="sticker-new">Sold</span>
                                    	@endif
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h4><a style="font-size: 0.85rem;" href="{{route('product.detail', $featured->slug)}}">{{Str::limit($featured->name, 50, '...')}}</a></h4>
                                        <p><span class="price">&#8358;{{$featured->amount}}</span>
                                            @if($featured->previous_amount !== null)
                                            <del class="prev-price">&#8358;{{$featured->previous_amount}}</del>
                                            @endif
                                        </p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="add-cart" href="{{$featured->link}}" target="_blank" data-toggle="tooltip" title="Add to Cart">Buy Now</a>
                                                <a href="{{route('product.detail', $featured->slug)}}" data-toggle="tooltip" title="Buy"><i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- New Products Activation End -->
                        </div>
                    </div>
                    <!-- Tab-Content End -->
                <div class="single-banner zoom mt-30" style="height: 240px;">
                    @if($thirdBanners->count() >= 1)
                    @foreach($thirdBanners as $thirdBanner)
                    @if($thirdBanner->image !=='placeholder.png')
                    <a href="#" style="width: 870px;"><img style="height:auto" src="{{('storage/uploads/adbanner/' .$thirdBanner->image)}}"></a>
                    @else
                     <a href="#"><img src="{{asset('img/banner/tab-banner.jpg')}}" alt="slider-banner"></a>
                     @endif
                    @endforeach

                    @endif
                 </div>
                </div>
                <!-- New Pro Content End -->
            </div>
        </div>

    </div>
    <!-- Container End -->
</div>
<!-- New Products End -->

<!-- Company Policy Start -->
<div class="company-policy pb-60 pb-sm-25">
    <div class="container">
        <div class="row">
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="img/icon/1.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Free Delivery</h3>
                        <p>Free shipping on all order</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="img/icon/2.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Online Support 24/7</h3>
                        <p>Support online 24 hours</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="img/icon/3.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Money Return</h3>
                        <p>Back guarantee under 7 days</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="img/icon/4.png" alt="">
                    </div>
                      <div class="policy-desc">
                        <h3>Member Discount</h3>
                        <p>Onevery order over $30.00</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
        </div>
    </div>
</div>
<!-- Company Policy End -->

 <!-- Best Products Start -->
<div class="best-seller-product pb-50 pb-sm-40" style="background: #ffffff;">
    <div class="container">
        <div class="group-title">
            <h2>Recommended For You</h2>
        </div>
        <!-- Best Product Activation Start -->
        <div class="best-seller-pro-active  owl-carousel slider-right-content">
            <!-- Double Product Start -->
          @foreach($productRecommended->chunk(2) as $recommend)
            <div class="double-pro">
                <!-- Single Product Start -->
                @foreach($recommend as $rec)
                <div class="single-product" style="flex-direction:row;">
                    <div class="pro-img top-pro-img">
                        @if($rec->featured_image !== 'productImage.png')
                        <a href="{{route('product.detail', $rec->slug)}}"><img class="img" src="{{asset('storage/uploads/products/featured/' . $rec->featured_image)}}"></a>
                        @else
                        <a href=""><img src="{{asset('img/products/1.jpg')}}"></a>
                        @endif
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="{{route('product.detail', $rec->slug)}}">{{Str::limit($rec->name, 30, '...')}}</a></h4>
                        <p><span class="price">&#8358;{{$rec->amount}}</span>
                            @if($rec->previous_amount !== null)
                            <del class="prev-price">&#8358;{{$rec->previous_amount}}</del>
                            @endif
                        </p>
                    </div>
                </div>
                <!-- Single Product End -->
                @endforeach
            </div>
            @endforeach
            <!-- Double Product End -->
        </div>
        <!-- Best Product Activation End -->
    </div>
    <!-- Container End -->
</div>
<!-- Best Product End -->
@endsection
