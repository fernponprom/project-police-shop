@extends('layouts.default')
@section('content')

@include('includes.cart')
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url(img/shop-img/bg-cover-8.png);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                    <h6>พี่รัตน์ยะลา</h6>
                    <h3>ยินดีต้อนรับสู่</h3>
                    <h2>police equipment</h2>
                    <a href="{{url('/shop')}}" class="btn essence-btn">ดูสินค้า</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Welcome Area End ##### -->

<!-- ##### Top Catagory Area Start ##### -->
<div class="top_catagory_area section-padding-80 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/shop-img/bg-item-3.png);">
                    <div class="catagory-content">
                        <a href="{{ route('type', ['type' => "shirt"]) }}">เสื้อ</a>
                    </div>
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/shop-img/bg-item-1.png);">
                    <div class="catagory-content">
                        <a href="{{ route('type', ['type' => "pants"]) }}">กางเกง</a>
                    </div>
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/shop-img/bg-item-2.png);">
                    <div class="catagory-content">
                        <a href="{{ route('type', ['type' => "shoes"]) }}">รองเท้า</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- ##### Top Catagory Area End ##### -->

<!-- ##### CTA Area Start ##### -->
<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content bg-img background-overlay" style="background-image: url(img/shop-img/bg-cover-5.png);">
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="cta--text">
                            <h6>พิเศษซื้อก่อนใคร คลิกเลย!!</h6>
                            <h2>โปรโมชั่นวันนี้</h2>
                            <h4></h4>
                            <a href="#" class="btn essence-btn">ซื้อเลย</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### CTA Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
{{-- <section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Popular Products</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="img/product-img/product-1.jpg" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="img/product-img/product-2.jpg" alt="">
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>topshop</span>
                            <a href="single-product-details.html">
                                <h6>Knot Front Mini Dress</h6>
                            </a>
                            <p class="product-price">$80.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="img/product-img/product-2.jpg" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="img/product-img/product-3.jpg" alt="">
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>topshop</span>
                            <a href="single-product-details.html">
                                <h6>Poplin Displaced Wrap Dress</h6>
                            </a>
                            <p class="product-price">$80.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="img/product-img/product-3.jpg" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="img/product-img/product-4.jpg" alt="">

                            <!-- Product Badge -->
                            <div class="product-badge offer-badge">
                                <span>-30%</span>
                            </div>

                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>mango</span>
                            <a href="single-product-details.html">
                                <h6>PETITE Crepe Wrap Mini Dress</h6>
                            </a>
                            <p class="product-price"><span class="old-price">$75.00</span> $55.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="img/product-img/product-4.jpg" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="img/product-img/product-5.jpg" alt="">

                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                                <span>New</span>
                            </div>

                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>mango</span>
                            <a href="single-product-details.html">
                                <h6>PETITE Belted Jumper Dress</h6>
                            </a>
                            <p class="product-price">$80.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### Brands Area Start ##### -->
<div class="brands-area d-flex align-items-center justify-content-between">
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('img/shop-img/logo-1.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('img/shop-img/logo-2.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('img/shop-img/logo-3.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('img/shop-img/logo-4.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('img/shop-img/logo-5.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('img/shop-img/logo-6.png')}}" alt="">
    </div>
</div>
@stop

