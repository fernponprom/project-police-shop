@extends('layouts.default')
@section('content')

@include('includes.cart')

<section class="content">
    <h2><center><i class="fa fa-shopping-cart" style="color:red"></i> <b> ตระกร้าสินค้า</b></center></h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  @if($product[0] == 'empty')
                    <div class="text-center">
                      <h4>กรุณาเลือกสินค้าของท่านที่หน้าร้านค้า</h4>
                      <a class="btn btn-primary btn-sm" href="http://localhost:8000/shop">ร้านค้า</a>
                    </div>
                  @else
                    <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr class="table100-head">
                                    <th></th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="font-size: 12px;">
                                  @foreach($product as $key => $products)
                                <tr>
                                    <td><img src="{{$products[0]->image}}" alt="" width="50px" height="20px"></td>
                                    <td><b>{{$cart[$key]->product_code}}</b></td>
                                    <td>{{$products[0]->name}}</td>
                                    <td><button class="btn" onclick="delCart('{{$products[0]->code}}')"><i class="fa fa-trash"></i></button><button class="btn m-3" onclick="decCart('{{$products[0]->code}}')"><i class="fa fa-minus-circle" style="color:red"></i></button>{{$cart[$key]->qty}}<button class="btn m-3" onclick="incCart('{{$products[0]->code}}')"><i class="fa fa-plus-circle"style="color:green"></i></button></td>
                                    <td>{{$cart[$key]->price}} ฿</td>
                                </tr>
                                  @endforeach                                 
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>ราคารวมทั้งหมด</td>
                                  <td>{{$sum}} ฿</td>
                            </tbody>
                        </table>
                        <button class="btn btn-success" onclick="payment('{{$cart[0]->order_id}}')">ชำระเงิน</button>
                    </div>
                </div>
                @endif
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<script>
  function incCart(itemCode){
    var customerId = '<?= Session::get('id') ?>'
    $.ajax({
      type: 'post',
            dataType: 'json',
            url: 'http://localhost:8000/incCart/',
            data: {
              "_token": "{{ csrf_token() }}",
                itemCode: itemCode,
                customerId: customerId,
            },
            success: function(data, dataType, state){
              if(data.status == 1){
                window.location.href = ''
              }else if(data.status == 2){
                alert('สินค้ามีจำนวนจำกัด')
              }else{
                alert('ไม่สามารถเพิ่มสินค้าได้')
              }
            }          
    })
  }

  function decCart(itemCode){
    var customerId = '<?= Session::get('id') ?>'
    $.ajax({
      type: 'post',
            dataType: 'json',
            url: 'http://localhost:8000/decCart/',
            data: {
              "_token": "{{ csrf_token() }}",
                itemCode: itemCode,
                customerId: customerId,
            },
            success: function(data, dataType, state){
              if(data.status == 1){
                window.location.href = ''
              }
            }
    })
  }

  function delCart(itemCode) {
    var customerId = '<?= Session::get('id') ?>'
    $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'http://localhost:8000/delCart',
      data: {
        "_token": "{{ csrf_token() }}",
        itemCode: itemCode,
        customerId: customerId,
      },
      success: function(data, dataType, state){
        if(data.status == 1){
          alert('ลบสินค้าจากตระกร้าเรียบร้อย')
          window.location.href = ''
        }else{
          alert('กรุณาติดต่อแอดมิน')
        }
      }
    })
  }
  
  function payment(orderId){
    console.log(orderId)
    $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'http://localhost:8000/payment',
      data: {
        "_token": "{{ csrf_token() }}",
        orderId: orderId
      },
      success: function(data, dataType, state){
        alert('กำลังทำรายการค่ะ')
        window.location.href = 'http://localhost:8000/orderlist'
      }
    })
  }
</script>
@stop
