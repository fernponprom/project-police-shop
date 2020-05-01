@extends('layouts.default')
@section('content')

@include('includes.cart')

<section class="content">
    <div class="mb-5 mt-5">
        <center>
            <div class="card" style="width: 650px;">
                <div class="card-header">
                    ใบคำสั่งซื้อ
                </div>
                <div class="card-body">
                    <h5 class="card-title">เลขที่คำสั่งซื้อ {{$order[0]->order_id}}</h5>
                    @if($order[0]->status == 1)
                    <p>สถานะคำสั่งซื้อ: <span class="badge badge-warning" style="font-size: 15px">รอลูกค้าโอนเงิน</span>
                    </p>
                    @elseif($order[0]->status == 2)
                    <p>สถานะคำสั่งซื้อ: <span class="badge badge-success"
                            style="font-size: 15px">ลูกค้าโอนเงินสำเร็จ</span></p>
                    @endif
                    <div class="row">
                        <div class="col-4 text-center">
                            <strong>สินค้า</strong>
                        </div>
                        <div class="col-2 text-right">
                            <strong>สี</strong>
                        </div>
                        <div class="col-2 text-right">
                            <strong>จำนวน</strong>
                        </div>
                        <div class="col-2">
                            <strong>ราคาต่อชิ้น</strong>
                        </div>
                        <div class="col-2">
                            <strong>ราคารวม</strong>
                        </div>

                        @foreach($product as $key => $products)
                        <div class="col-4 text-left">
                            {{$products[0]->name}}
                        </div>
                        @if($products[0]->color == 1)
                        <div class="col-2 text-right">ดำ</div>
                        @elseif($products[0]->color == 2)
                        <div class="col-2 text-right">กรม</div>
                        @elseif($products[0]->color == 3)
                        <div class="col-2 text-right">ทราย</div>
                        @elseif($products[0]->color == 4)
                        <div class="col-2 text-right">เขียว</div>
                        @elseif($products[0]->color == 5)
                        <div class="col-2 text-right">เทา</div>
                        @endif
                        <div class="col-2 text-right">
                            x {{$item[$key]->qty}}
                        </div>
                        <div class="col-2">
                            {{number_format($products[0]->price)}} ฿
                        </div>
                        <div class="col-2">
                            {{number_format($item[$key]->price, 2)}} ฿
                        </div>
                        @endforeach
                        <div class="col-8 text-left">
                            <h5>ราคารวมทั้งหมด</h5>
                        </div>
                        <div class="col-4 text-right">
                            <h5>{{number_format($order[0]->total_price, 2)}} ฿</h5>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    แจ้งสลิปโดยการส่งหลักฐานการโอนเงินให้ทางไลน์
                </div>
                <a href="/orderlist_all" class="btn btn-primary">กลับไปหน้ารายการสั่งซื้อทั้งหมด</a>
            </div>
        </center>
    </div>
</section>
<script>

</script>
@stop
