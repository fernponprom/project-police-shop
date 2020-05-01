@extends('layouts.default')
@section('content')
@include('includes.cart')
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
                <img src="{{$product->image}}" alt="">
            {{-- <div class="product_thumbnail_slides owl-carousel">
                
                <img src="img/product-img/product-big-2.jpg" alt="">
                <img src="img/product-img/product-big-3.jpg" alt="">
            </div> --}}
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            @if($product->brand == '-')
            <span></span>
            @else
            <span>{{$product->brand}}</span>
            @endif
            <a href="{{ route('name', ['name' => $product->code]) }}">
                <h2>{{$product->name}}</h2>
            </a>
            <p class="product-price">{{$product->price}} บาท</p>
            <p class="product-desc">{{$product->description}}</p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
                <div class="select-box d-flex mt-50 mb-30">
                    <select name="select" id="productSize" class="mr-5">
                        @if($product->size == '-')
                        <option>ไซต์: ไม่มี</option>
                        @else
                        <option>ไซต์: {{$product->size}}</option>
                        @endif
                    </select>
                    <select name="select" id="productColor">
                            @if($product->color == 1)
                            <option>สี: ดำ</option>
                            @elseif($product->color == 2)
                            <option>สี: กรม</option>
                            @elseif($product->color == 3)
                            <option>สี: ทราย</option>
                            @elseif($product->color == 4)
                            <option>สี: เขียว</option>
                            @elseif($product->color == 5)
                            <option>สี: เทา</option>
                            @endif
                    </select>
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" onclick="addCart('{{$product->code}}');" class="btn essence-btn">หยิบใส่ตะกร้า</button>
                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
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