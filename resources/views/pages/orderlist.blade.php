@extends('layouts.default')
@section('content')

@include('includes.cart')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                      <h3>รายการสั่งซื้อ</h3>
                    </div>
                    <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr class="table100-head">
                                    <th>เลขที่ออเดอร์</th>
                                    <th>วันที่</th>
                                    <th>รหัสลูกค้า</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>เบอร์โทร</th>
                                    <th>สินค้าที่สั่ง</th>
                                    <th>ราคา</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="font-size: 12px;">
                                @foreach($orderlist as $key => $order)
                                <tr>
                                    <td>{{$order->order_id}}</td>
                                    <td>{{$order->create_date}}</td>
                                    <td>{{$order->user_code}}</td>
                                    <td>{{$user[$key][0]->first_name}} {{$user[$key][0]->last_name}}</td>
                                    <td>{{$user[$key][0]->tel}}</td>
                                    <td><a class="btn btn-sm btn-link"
                                            href="/order/{{$order->order_id}}">คลิกเพื่อดูรายการ</a></td>
                                    <td>{{number_format($order->total_price, 2)}} ฿</td>
                                    @if($order->status == 1)
                                    <td class="text-warning blink-text">
                                        <blink><strong>รอลูกค้าจ่ายเงิน</strong></blink>
                                    </td>
                                    @elseif($order->status == 2)
                                    <td class="text-success"><strong>จ่ายเงินสำเร็จ</strong></td>
                                    @else
                                    <td class="text-danger"><strong>ไม่สำเร็จ</strong></td>
                                    @endif
                                    @if($order->status == 1)
                                    <td><button class="btn btn-sm"
                                            onclick="paymentSuccess('{{$order->order_id}}')"><span
                                                class="text-success">จ่ายสำเร็จ</span></button> | <button
                                            class="btn btn-sm" onclick="paymentFail('{{$order->order_id}}')"><span
                                                class="text-danger">ยกเลิกการจ่าย</span></button></td>
                                    @else
                                    <td>ทำรายการเสร็จสิ้น</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<style>
    blink {
        -webkit-animation: 2s linear infinite condemned_blink_effect;
        /* for Safari 4.0 - 8.0 */
        animation: 1.5s linear infinite condemned_blink_effect;
    }

    /* for Safari 4.0 - 8.0 */
    @-webkit-keyframes condemned_blink_effect {
        0% {
            visibility: hidden;
        }

        50% {
            visibility: hidden;
        }

        100% {
            visibility: visible;
        }
    }

    @keyframes condemned_blink_effect {
        0% {
            visibility: hidden;
        }

        50% {
            visibility: hidden;
        }

        100% {
            visibility: visible;
        }
    }

</style>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(function () {
        $('#product_table').DataTable({
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
    function alertss() {
        confirm('test');
    }

    function paymentSuccess(orderId) {
        $.ajax({
            type: "post",
            dataType: "json",
            url: "http://localhost:8000/paysuccess",
            data: {
                "_token": "{{ csrf_token() }}",
                orderId: orderId,
            },
            success: function (data) {
                if(data == 1) {
                    window.location.href = '';
                }
            }
        })
    }

    function paymentFail(orderId) {
        $.ajax({
            type: "post",
            dataType: "json",
            url: "http://localhost:8000/payfail",
            data: {
                "_token": "{{ csrf_token() }}",
                orderId: orderId,
            },
            success: function (data) {
                if(data == 1) {
                    window.location.href = '';
                }
            }
        })
    }

</script>
@stop
