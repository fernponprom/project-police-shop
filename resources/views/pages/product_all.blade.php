@extends('layouts.table')
@section('content')

@include('includes.cart')
<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table id="product_table">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">รหัสสินค้า</th>
                            <th class="column2">ชื่อสินค้า</th>
                            <th class="column3">ประเภท</th>
                            <th class="column3">สี</th>
                            <th class="column3">ไซส์</th>
                            <th class="column3">ราคา</th>
                            <th class="column5">จำนวน</th>
                            <th class="column6">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $products)
                        <tr>
                            <td class="column1"><b>{{$products->code}}</b></td>
                            <td class="column2">{{$products->name}}</td>
                            @if($products->type == 1)
                            <td class="column3">เสื้อ</td>
                            @elseif($products->type == 2)
                            <td class="column3">กางเกง</td>
                            @elseif($products->type == 3)
                            <td class="column3">รองเท้า</td>
                            @elseif($products->type == 4)
                            <td class="column3">กระเป๋า</td>
                            @endif

                            @if($products->color == 1)
                            <td class="column3">ดำ</td>
                            @elseif($products->color == 2)
                            <td class="column3">กรม</td>
                            @elseif($products->color == 3)
                            <td class="column3">ทราย</td>
                            @elseif($products->color == 4)
                            <td class="column3">เขียว</td>
                            @elseif($products->color == 5)
                            <td class="column3">เทา</td>
                            @endif

                            <td class="column3">{{$products->size}}</td>
                            <td class="column3">{{$products->price}} บาท</td>
                            <td class="column5">{{$products->volume}}</td>
                            <td class="column6">
                              <div class="row">
                                  <div class="col-md-5">
                                      <button class="btn bg-warning btn-sm" data-toggle="modal"
                                          data-target="#edit_product" onclick="getDatafromTable('{{$products->code}}');"
                                          data-id="{{$products->code}}"><i class="fa fa-pencil"></i> แก้ไข</button>
                                  </div>
                                  <div class="col-md-6">
                                      <button class="btn btn-sm btn-danger"
                                          onclick="deleteProduct('{{$products->code}}');"><i class="fa fa-trash-o"></i> ลบ</button>
                                  </div>
                              </div>
                             




                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    แก้ไขข้อมูลสินค้า
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form role="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">รหัส</label>
                                <input type="text" class="form-control" name="pd_code" placeholder="จำนวนโบนัส"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleInputPassword1">ชื่อ</label>
                            <input type="text" class="form-control" name="pd_name" placeholder="จำนวนโบนัส">
                        </div>
                        <div class="col-md-6 mt-2" style="margin-top: 10px">
                            <div class="form-group">
                                <label for="exampleInputPassword1">ประเภท</label>
                                <select name="pd_type" id="pd_type">
                                    <option value="0">กรุณาเลือกประเภท
                                    </option>
                                    <option value="1">เสื้อ</option>
                                    <option value="2">กางเกง</option>
                                    <option value="3">รองเท้า</option>
                                    <option value="4">กระเป๋า</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">สี</label>
                                <select name="pd_color" id="pd_color">
                                    <option value="0">กรุณาเลือกสี</option>
                                    <option value="1">ดำ</option>
                                    <option value="2">กรม</option>
                                    <option value="3">ทราย</option>
                                    <option value="4">เขียว</option>
                                    <option value="5">เทา</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">แบรนด์</label>
                                <input type="text" class="form-control" name="pd_brand">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">ไซส์</label>
                                <input type="text" class="form-control" name="pd_size">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">จำนวน</label>
                                <input type="text" class="form-control" name="pd_volume">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">ราคา</label>
                                <input type="text" class="form-control" name="pd_price">
                            </div>
                        </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="editProduct();">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>
</div>


<script src="{{asset('table/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('table/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('table/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('table/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('table/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
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

    function getDatafromTable(code) {
        var code = code;
        console.log(code);
        $.ajax({
            url: 'http://localhost:8000/getData/' + code,
            success: function (data) {
                $('input[name="pd_code"]').val(data[0].code);
                $('input[name="pd_name"]').val(data[0].name);
                $('#pd_type').val(data[0].type);
                $('#pd_color').val(data[0].color);
                $('input[name="pd_size"]').val(data[0].size);
                $('input[name="pd_brand"]').val(data[0].brand);
                $('input[name="pd_volume"]').val(data[0].volume);
                $('input[name="pd_price"]').val(data[0].price);
            }
        })
    }

    function editProduct() {
        if (confirm('ยืนยันที่จะแก้ไขข้อมูล')) {
            var pd_code = $('input[name="pd_code"]').val();
            var pd_name = $('input[name="pd_name"]').val();
            var pd_type = $('#pd_type').val();
            var pd_color = $('#pd_color').val();
            var pd_brand = $('input[name="pd_brand"]').val();
            var pd_size = $('input[name="pd_size"]').val();
            var pd_volume = $('input[name="pd_volume"]').val();
            var pd_price = $('input[name="pd_price"]').val();

            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'http://localhost:8000/editProduct/',
                data: {
                    "_token": "{{ csrf_token() }}",
                    code: pd_code,
                    name: pd_name,
                    type: pd_type,
                    color: pd_color,
                    volume: pd_volume,
                    price: pd_price,
                    brand: pd_brand,
                    size: pd_size
                },
                success: function (data, dataType, state) {
                    console.log(data)
                    if (data == 1) {
                        alert("แก้ไขข้อมูลเสร็จสิ้น!!");
                        window.location.href = '';
                    } else {
                        alert('ไม่สามารถแก้ไขข้อมูลได้')
                    }

                }

            })
        }
    }

    function deleteProduct(code) {
        if (confirm('ยืนยันที่จะลบสินค้าชิ้นนี้')) {
            var pd_code = code

            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'http://localhost:8000/deleteProduct/',
                data: {
                    "_token": "{{ csrf_token() }}",
                    code: pd_code
                },
                success: function (data, dataType, state) {
                    if (data == 1) {
                        alert('ลบสำเร็จ!!')
                        window.location.href = '';
                    } else {
                        alert('ลบผิดพลาด')
                    }
                }
            })
        }

    }

</script>