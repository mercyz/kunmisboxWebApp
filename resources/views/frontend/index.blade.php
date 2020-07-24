@extends('layouts.frontend')
@section('content')
@include('partials.banner-slides')
<!-- Banner Start -->
<div class="upper-banner banner pb-60">
    <div class="container">
       <div class="row">
           <!-- Single Banner Start -->
           <div class="col-sm-4">
                <div class="single-banner zoom">
                    <a href="#"><img src="img/banner/3.jpg" alt="slider-banner"></a>
                </div>
            </div>
           <!-- Single Banner End -->
            <!-- Single Banner Start -->
           <div class="col-sm-4">
                <div class="single-banner zoom">
                    <a href="#"><img src="img/banner/4.jpg" alt="slider-banner"></a>
                </div>
            </div>
           <!-- Single Banner End -->
            <!-- Single Banner Start -->
           <div class="col-sm-4">
                <div class="single-banner zoom">
                    <a href="#"><img src="img/banner/5.jpg" alt="slider-banner"></a>
                </div>
            </div>
           <!-- Single Banner End -->
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
                    <a href="product.html">
                        <img class="primary-img" src="img/products/7.jpg" alt="single-product">
                        <img class="secondary-img" src="img/products/8.jpg" alt="single-product">
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
                    <h4><a style="font-size: 0.85rem;" href="product.html">{{Str::limit($mw->name, 50, '...')}}</a></h4>
                    <p><span class="price">&#8358;{{$mw->amount}}</span><del class="prev-price">&#8358;{{$mw->previous_amount}}</del></p>
                    <div class="pro-actions">
                        <div class="actions-secondary">
                            <a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                            <a class="add-cart" href="{{$mw->link}}" data-toggle="tooltip" title="Add to Cart">Buy Now</a>
                            <a href="#" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
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
<div class="upper-banner banner pb-60">
    <div class="container">
       <div class="row">
           <!-- Single Banner Start -->
           <div class="col-sm-6">
                <div class="single-banner zoom">
                    <a href="#"><img src="img/banner/1.png" alt="slider-banner"></a>
                </div>
            </div>
           <!-- Single Banner End -->
            <!-- Single Banner Start -->
           <div class="col-sm-6">
                <div class="single-banner zoom">
                    <a href="#"><img src="img/banner/2.png" alt="slider-banner"></a>
                </div>
            </div>
           <!-- Single Banner End -->
       </div>
       <!-- Row End -->
    </div>
    <!-- Container End -->
</div>                                
<!-- Banner End -->
@endsection