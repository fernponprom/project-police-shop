<div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
    <!-- Classy Menu -->
    <nav class="classy-navbar" id="essenceNav">
        <!-- Logo -->
        <a class="nav-brand" href="<?php echo url('/');?>"><img src="{{asset('img/shop-img/logo-web.png')}}" alt="" width="180px" height="40px"></a>
        <!-- Navbar Toggler -->
        <div class="classy-navbar-toggler">
            <span class="navbarToggler"><span></span><span></span><span></span></span>
        </div>
        <!-- Menu -->
        <div class="classy-menu">
            <!-- close btn -->
            <div class="classycloseIcon">
                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
            </div>
            <!-- Nav Start -->
            <div class="classynav">
                <ul>
                    <li><a href="/">หน้าแรก</a>
                            <ul class="dropdown">
                                <li><a href="{{url('/')}}">หน้าหลัก</a></li>
                                <li><a href="{{url('/shop')}}">สินค้าทั้งหมด</a></li>
                                <li><a href="{{url('/contact')}}">ติดต่อ</a></li>
                            </ul>
                        </li>
                    <li><a href="/shop">สินค้า</a>
                        <div class="megamenu">
                            <ul class="single-mega cn-col-5">
                                <li class="title">เสื้อ</li>
                                <li><a href="{{ route('type', ['type' => "shirt"]) }}">เสื้อเกราะ</a></li>
                                <li><a href="{{ route('type', ['type' => "shirt"]) }}">ชุดเวส</a></li>
                            </ul>
                            <ul class="single-mega cn-col-5">
                                <li class="title">กางเกง</li>
                                <li><a href="{{ route('type', ['type' => "pants"]) }}">กางเกงขายาว</a></li>
                                <li><a href="{{ route('type', ['type' => "pants"]) }}">กางเกงขาสั้น</a></li>
                            </ul>
                            <ul class="single-mega cn-col-5">
                                <li class="title">รองเท้า</li>
                                <li><a href="{{ route('type', ['type' => "shoes"]) }}">รองเท้าฮาฟ</a></li>
                                <li><a href="{{ route('type', ['type' => "shoes"]) }}">รองเท้าคัชชู</a></li>
                                <li><a href="{{ route('type', ['type' => "shoes"]) }}">รองเท้าคอมแบ็ต</a></li>
                                <li><a href="{{ route('type', ['type' => "shoes"]) }}">รองเท้าแทคติคอล</a></li>
                                <li><a href="{{ route('type', ['type' => "shoes"]) }}">รองเท้าเดลต้า</a></li>
                                <li><a href="{{ route('type', ['type' => "shoes"]) }}">รองเท้า 5.11</a></li>
                            </ul>
                            <ul class="single-mega cn-col-5">
                                <li class="title">อุปกรณ์</li>
                                <li><a href="{{ route('type', ['type' => "accessories"]) }}">กระเป๋า</a></li>
                                <li><a href="{{ route('type', ['type' => "accessories"]) }}">สะพายไหล่ คาดเอว รัด หิ้ว</a></li>
                                <li><a href="{{ route('type', ['type' => "glove"]) }}">ถุงมือ</a></li>
                            </ul>
                        </div>
                    </li>
                    @if(Session::get('role') != 'admin')
                    <li><a href="/contact">ติดต่อเรา</a></li>
                    @endif
                    @if(Session::get('role') == 'admin')
                    <li><a href="/manage">จัดการสินค้า</a>
                        <ul class="dropdown">
                                <li><a href="{{url('/product')}}">เพิ่มสินค้า</a></li>
                                <li><a href="{{url('/manage')}}">แก้ไขสินค้า</a></li>
                                <li><a href="{{url('/manage')}}">ลบสินค้า</a></li>
                        </ul>
                    </li>
                    <li><a href="/user">จัดการผู้ใช้</a>
                    </li>
                    <li><a href="/orderlist_all">รายการสั่งของ</a></li>
                    <li><a href="/bestseller">รายงาน</a></li>
                    @endif
                </ul>
            </div>
            <!-- Nav End -->
        </div>
    </nav>
  
    <!-- Header Meta Data -->
    <div class="header-meta d-flex clearfix justify-content-end">
        <!-- Search Area -->
        {{-- <div class="search-area">
            <form action="#" method="post">
                <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div> --}}
        <!-- Favourite Area -->
        <div class="favourite-area">
            {{-- <a href="#"><img src="{{asset('img/core-img/heart.svg')}}" alt=""></a> --}}
            @if(Session::get('user'))
             <a> <i class="fa fa-user" style="color:green"></i> {{ Session::get('firstname')}}</a>
            @else
            
            <a href="/login"><img src="{{asset('img/core-img/user.svg')}}" alt=""></a>
            @endif
            
        </div>
        <!-- User Login Info -->
        <div class="user-login-info">
                {{-- <li><a href="/login"><img src="{{asset('img/core-img/user.svg')}}" alt=""></a></li> --}}
                @if(Session::get('user'))
                <div>
                        <a href="/logout" style="color:red"><i class="fa fa-sign-out"></i> logout</a>
                </div>
                
                @endif
        </div>
        <!-- Cart Area -->
        <div class="cart-area">
            @if(Session::get('user'))
        <a href="/cart" ><img src="{{asset('img/core-img/bag.svg')}}" alt=""> <span>{{(Session::get('count'))}}</span></a>
            @else
            <a href="/cart" ><img src="{{asset('img/core-img/bag.svg')}}" alt=""> <span></span></a>
            @endif
        </div>
    </div>
  
  </div>