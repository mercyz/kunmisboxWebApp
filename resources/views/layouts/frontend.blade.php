<!doctype html>
<html class="no-js" lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'KunmisBox') }} | {{ @$title }}</title>
    <meta name="description" content="Your On stop shope for everything">
    <meta name="canonical" content="Products, E-commerce, Shops, Onlinemarket">

    @stack('meta')
    <meta name="keywords" content="E-commerce, Onlinestore, onlineshop, Product, shop" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- place favicon.ico in the root directory -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png"> --}}
    <!-- Google Font css -->
    <link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet"> 

    <!-- mobile menu css -->
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- nivo slider css -->
    <link rel="stylesheet" href="{{asset('css/nivo-slider.css')}}">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- slick css -->
   <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <!-- price slider css -->
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
     <!-- fancybox css -->
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.css')}}">     
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- default css  -->
    <link rel="stylesheet" href="{{asset('css/default.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- modernizr js -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <style type="text/css">
        .logo a{
            font-size: 30px;
            font-weight: 800;
            font-family: Lily Script One;
        }
        .logo a:hover{
            color:#000;
        }
    </style>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Wrapper Start -->
<div class="wrapper homepage">
    <!-- Header Area Start -->
    <header>
        <!-- Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <!-- Header Top left Start -->                        
                    <div class="col-lg-4 col-md-12 d-center">
                        <div class="header-top-left">
                            <img src="img/icon/call.png" alt="">Call Us : +11 222 3333
                        </div>                        
                    </div>
                    <!-- Header Top left End -->
                    <!-- Search Box Start -->                                        
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <div class="search-box-view">
                            <form action="#">
                                <input type="text" class="email" placeholder="Search Your Product" name="product">
                                <button type="submit" class="submit"></button>
                            </form>
                        </div>                                           
                    </div>
                    <!-- Search Box End --> 
                    <!-- Header Top Right Start -->                                       
                    <div class="col-lg-4 col-md-12">
                        <div class="header-top-right">
                            <ul class="header-list-menu f-right">
                                <!-- Language Start -->
                                <li><a href="#">Language: English <i class="fa fa-angle-down"></i></a>
                                    <ul class="ht-dropdown">
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Bengali</a></li>
                                        <li><a href="#">Russian</a></li>
                                    </ul>
                                </li>
                                <!-- Language End -->                                
                                <!-- Currency Start -->
                                <li><a href="#">Currency:  USD <i class="fa fa-angle-down"></i></a>
                                    <ul class="ht-dropdown">
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">GBP</a></li>
                                        <li><a href="#">EUR</a></li>
                                    </ul>
                                </li>
                                <!-- Currency End -->
                            </ul>
                            <!-- Header-list-menu End -->
                        </div>
                    </div>
                    <!-- Header Top Right End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Top End -->
        <!-- Header Bottom Start -->
        <div class="header-bottom header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-2 col-sm-5 col-5">
                        <div class="logo">
                            {{-- <a href="/"><img src="{{asset('img/logo/logo.png')}}" alt="logo-image"></a> --}}
                            <a href="/">Kunmis<span style="color:#ff324d;">Box</span></a>
                        </div>
                    </div>
                    <!-- Primary Vertical-Menu End -->
                    <!-- Search Box Start -->
                    <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                        <div class="middle-menu pull-right">
                            <nav>
                                <ul class="middle-menu-list">
                                    <li><a href="/">home</a></li>
                                    <li><a href="{{route('about')}}">about us</a></li>
                                    <li><a href="{{route('shop')}}">shop</a></li>
                                    <li><a href="{{route('contact')}}">contact us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Search Box End -->
                    <!-- Cartt Box Start -->
                    <div class="col-lg-3 col-sm-7 col-7">
                        <div class="cart-box text-right">
                            <ul>
                                <li><a href="#"><i class="fa fa-cog"></i></a>
                                  {{--   <ul class="ht-dropdown">
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="account.html">Account</a></li>                                            
                                    </ul> --}}
                                </li>                                    
                                <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-basket"></i></a>
                                   {{--  <ul class="ht-dropdown main-cart-box">
                                        <li>
                                            <!-- Cart Box Start -->
                                            <div class="single-cart-box">
                                                <div class="cart-img">
                                                    <a href="#"><img src="img/menu/1.jpg" alt="cart-image"></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h6><a href="product.html">Products Name</a></h6>
                                                    <span>1 × $399.00</span>
                                                </div>
                                                <a class="del-icone" href="#"><i class="fa fa-window-close-o"></i></a>
                                            </div>
                                            <!-- Cart Box End -->
                                            <!-- Cart Box Start -->
                                            <div class="single-cart-box">
                                                <div class="cart-img">
                                                    <a href="#"><img src="img/menu/2.jpg" alt="cart-image"></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h6><a href="product.html">Products Name</a></h6>
                                                    <span>2 × $299.00</span>
                                                </div>
                                                <a class="del-icone" href="#"><i class="fa fa-window-close-o"></i></a>
                                            </div>
                                            <!-- Cart Box End -->
                                            <!-- Cart Footer Inner Start -->
                                            <div class="cart-footer fix">
                                                <h5>total :<span class="f-right">$698.00</span></h5>
                                                <div class="cart-actions">
                                                    <a class="checkout" href="checkout.html">Checkout</a>
                                                </div>
                                            </div>
                                            <!-- Cart Footer Inner End -->
                                        </li>
                                    </ul> 
                                 </li> --}}
                            </ul>
                        </div>
                    </div>
                    <!-- Cartt Box End -->
                    <div class="col-sm-12 d-lg-none">
                        <div class="mobile-menu">
                            <nav>
                                 <ul class="middle-menu-list">
                                    <li><a href="/">home</a></li>
                                    <li><a href="{{route('about')}}">about us</a></li>
                                    <li><a href="{{route('shop')}}">shop</a></li>
                                    <li><a href="{{route('contact')}}">contact us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Mobile Menu  End -->                        
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Bottom End -->
    </header>
    <!-- Header Area End -->

@yield('content')



<!-- Brand Logo Start -->
<div class="brand-area pb-60">
    <div class="container">
        <!-- Brand Banner Start -->
        <div class="brand-banner owl-carousel">
            <div class="single-brand">
                <a href="#"><img class="img" src="img/brand/1.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/2.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/3.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/4.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/5.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img class="img" src="img/brand/1.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/2.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/3.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/4.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/5.png" alt="brand-image"></a>
            </div>
        </div>
        <!-- Brand Banner End -->                
    </div>
</div>
<!-- Brand Logo End -->

<footer class="off-white-bg">
    <!-- Footer Top Start -->
    <div class="footer-top pt-50 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mr-auto ml-auto">
                    <div class="newsletter text-center">
                        <div class="main-news-desc">
                             <div class="news-desc">
                                 <h3>Sign Up For Newsletters</h3>
                                 <p>Get e-mail updates about our latest shop and special offers.</p>
                             </div>
                        </div>
                        <div class="newsletter-box">
                            <form action="#">
                                <input class="subscribe" placeholder="Enter your email address" name="email" id="subscribe" type="text">
                                <button type="submit" class="submit">subscribe</button>
                            </form>
                        </div>
                     </div>                            
                </div>
            </div>                    
            <div class="row">
                <!-- Single Footer Start -->
                <div class="col-lg-4  col-md-7 col-sm-6">
                    <div class="single-footer">
                        <h3>Contact us</h3>
                        <div class="footer-content">
                            <div class="loc-address">
                                <span><i class="fa fa-map-marker"></i>184 Main Rd E, St Albans VIC 3021, Australia.</span>
                                <span><i class="fa fa-envelope-o"></i>Mail Us : yourinfo@example.com</span>
                                <span><i class="fa fa-phone"></i>Phone: + 00 254 254565 54</span>
                            </div>
                            <div class="payment-mth"><a href="#"><img class="img" src="img/footer/1.png" alt="payment-image"></a></div>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-2  col-md-5 col-sm-6 footer-full">
                    <div class="single-footer">
                        <h3 class="footer-title">Information</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="#">Site Map</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-2  col-md-4 col-md-4 col-sm-6 footer-full">
                    <div class="single-footer">
                        <h3 class="footer-title">My Account</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="account.html">My account</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">address</a></li>
                                <li><a href="#">Order status</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-2 col-md-4 col-sm-6 footer-full">
                    <div class="single-footer">
                        <h3 class="footer-title">customer service</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="account.html">My account</a></li>
                                <li><a href="#">New</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Return Policy</a></li>
                                <li><a href="#">Your Orders</a></li>
                                <li><a href="#">Subway</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-2 col-md-4 col-sm-6 footer-full">
                    <div class="single-footer">
                        <h3 class="footer-title">Let Us Help You</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="#">Your Account</a></li>
                                <li><a href="#">Your Orders</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Amazon Prime</a></li>
                                <li><a href="#">Replacements</a></li>
                                <li><a href="#">Manage </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Top End -->
    <!-- Footer Bottom Start -->
        <div class="footer-bottom off-white-bg2">
            <div class="container">
                <div class="footer-bottom-content">
                    <p class="copy-right-text">Copyright © <a  href="#">Jantrik</a> All Rights Reserved.</p>
                    <div class="footer-social-content">
                        <ul class="social-content-list">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-wifi"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Footer Bottom End -->
    </footer>
    <!-- Footer End -->
</div>
    <!-- Wrapper End -->
    <!-- jquery 3.12.4 -->
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- mobile menu js  -->
    <script src="{{asset('js/jquery.meanmenu.min.js')}}"></script>
    <!-- scroll-up js -->
    <script src="{{asset('js/jquery.scrollUp.js')}}"></script>
    <!-- owl-carousel js -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <!-- slick js -->
    <script src="{{asset('js/slick.min.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('js/wow.min.js')}}"></script>
    <!-- price slider js -->
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <!-- nivo slider js -->
    <script src="{{asset('js/jquery.nivo.slider.js')}}"></script>
    <!-- fancybox js -->
    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- popper -->
    <script src="{{asset('js/popper.js')}}"></script>
    <!-- plugins -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>