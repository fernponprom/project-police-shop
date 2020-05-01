@extends('layouts.default')
@section('content')
@include('includes.cart')
<!-- ##### Right Side Cart End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img">
    <div class="container h-100 bg-product">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>{{$type}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">ประเภทสินค้า</h6>

                        <!--  Catagories  -->
                        <div class="catagories-menu">
                            <ul id="menu-content2" class="menu-content collapse show">
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#clothing">
                                    <a href="{{ route('type', ['type' => "shirt"]) }}">เสื้อ เสื้อเกราะ</a>
                                </li>
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                    <a href="{{ route('type', ['type' => "pants"]) }}">กางเกง</a>
                                </li>
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                    <a href="{{ route('type', ['type' => "shoes"]) }}">รองเท้า</a>
                                </li>
                                <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                        <a href="{{ route('type', ['type' => "accessories"]) }}">กระเป๋า</a>
                                </li>
                                <li data-toggle="collapse" data-target="#glove" class="collapsed">
                                    <a href="{{ route('type', ['type' => "glove"]) }}">ถุงมือ</a>
                            </li>
                            </ul>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget price mb-50">
                        <!-- Widget Title -->
                        {{-- <h6 class="widget-title mb-30">Filter by</h6> --}}
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">ราคา</p>

                        <div class="widget-desc">
                            <div class="slider-range">
                                <div data-min="49" data-max="360" data-unit="$"
                                    class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                    data-value-min="49" data-value-max="360" data-label-result="Range:">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                                <div class="range-price">ตั้งแต่: 200.00 บาท - 3000.00 บาท</div>
                            </div>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget color mb-50">
                        <!-- Widget Title 2 -->
                        {{-- <p class="widget-title2 mb-30">Color</p>
                        <div class="widget-desc">
                            <ul class="d-flex">
                                <li><a href="#" class="color1"></a></li>
                                <li><a href="#" class="color2"></a></li>
                                <li><a href="#" class="color3"></a></li>
                                <li><a href="#" class="color4"></a></li>
                                <li><a href="#" class="color5"></a></li>
                                <li><a href="#" class="color6"></a></li>
                                <li><a href="#" class="color7"></a></li>
                                <li><a href="#" class="color8"></a></li>
                                <li><a href="#" class="color9"></a></li>
                                <li><a href="#" class="color10"></a></li>
                            </ul>
                        </div> --}}
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget brands mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">แบรนด์</p>
                        <div class="widget-desc">
                            <ul>
                                <li><a href="{{ route('type', ['type' => "BOGIE.1"]) }}">BOGIE.1</a></li>
                                <li><a href="{{ route('type', ['type' => "5.11"]) }}">5.11</a></li>
                                <li><a href="{{ route('type', ['type' => "MAGNUM"]) }}">MAGNUM</a></li>
                                <li><a href="{{ route('type', ['type' => "BANG BANG!"]) }}">BANG BANG!</a></li>
                                <li><a href="{{ route('type', ['type' => "DELTA"]) }}">DELTA</a></li>
                                <li><a href="{{ route('type', ['type' => "SECTOR SEVEN"]) }}">SECTOR SEVEN</a></li>
                                <li><a href="{{ route('type', ['type' => "TACTICAL"]) }}">TACTICAL</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                    <p><span>{{$count}}</span> products found</p>
                                </div>
                                <!-- Sorting -->
                                {{-- <div class="product-sorting d-flex">
                                    <p>Sort by:</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortByselect">
                                            <option value="value">Highest Rated</option>
                                            <option value="value">Newest</option>
                                            <option value="value">Price: $$ - $</option>
                                            <option value="value">Price: $ - $$</option>
                                        </select>
                                        <input type="submit" class="d-none" value="">
                                    </form>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Single Product -->
                            @foreach($product as $products)
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{$products->image}}" alt="" width="50" height="50">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="" alt="">
    
                                        <!-- Product Badge -->
                                        {{-- <div class="product-badge offer-badge">
                                            <span>-30%</span>
                                        </div> --}}
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>
    
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        @if($products->type == 1)
                                            <span>เสื้อ</span>
                                        @elseif($products->type == 2)
                                            <span>กางเกง</span>
                                        @elseif($products->type == 3)
                                            <span>รองเท้า</span>
                                        @endif
    
                                        <a href="{{ route('name', ['name' => $products->code]) }}">
                                                <h6>{{ $products->name }}</h6>
                                        </a>
                                        
                                        <p class="product-price">{{ $products->price }} ฿</p>
    
                                        @if($products->color == 1)
                                            <span>ดำ</span>
                                        @elseif($products->color == 2)
                                            <span>กรม</span>
                                        @elseif($products->color == 3)
                                            <span>ทราย</span>
                                        @elseif($products->color == 4)
                                            <span>เขียว</span>
                                        @elseif($products->color == 5)
                                            <span>เทา</span>
                                        @endif
    
                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <button href="#" class="btn essence-btn" onclick="addCart('{{$products->code}}');">หยิบใส่ตระกร้า</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        

                        <!-- Single Product -->
                        
                <!-- Pagination -->
                 {{-- <nav aria-label="navigation">
                    <ul class="pagination mt-50 mb-70">
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">21</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav> --}}
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- นำเข้า  Javascript  จาก   dataTables -->
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(function () {
        $('#product_all').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false
        });
    });

</script>
<script>

    // function alert(item){
    //     alert(item)
    //     console.log(item)
    // }

    function addCart(itemCode){
        var customerId = '<?= Session::get('id') ?>'
        if(customerId) {
            $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'http://localhost:8000/addCart/',
            data: {
                "_token": "{{ csrf_token() }}",
                itemCode: itemCode,
                customerId: customerId,
            },
            success: function(data, dataType, state){
                console.log(data)
                if(data.status == 1){
                    alert('เพิ่มลงตระกร้าเรียบร้อย')
                    window.location.href = ''
                }else{
                    alert('จำนวนสินค้าไม่เพียงพอ')
                }
            }
        })
        }else{
            alert('กรุณาล็อคอินเพื่อเพิ่มสินค้าในตระกร้า')
        }

    }
</script>
@stop
