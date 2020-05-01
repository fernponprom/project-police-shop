@extends('layouts.default')
@section('content')

@include('includes.cart')
<section class="content">
    <div class="row">
          <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="product_table" class="table table-bordered table-hover">
                <thead class="text-center">
                    <tr class="table100-head">
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ประเภท</th>
                        <th>สี</th>
                        <th>ไซส์</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="font-size: 12px;">
                    @foreach($product as $products)
                    <tr>
                        <td><b>{{$products->code}}</b></td>
                        <td>{{$products->name}}</td>
                        @if($products->type == 1)
                        <td>เสื้อ</td>
                        @elseif($products->type == 2)
                        <td>กางเกง</td>
                        @elseif($products->type == 3)
                        <td>รองเท้า</td>
                        @elseif($products->type == 4)
                        <td>กระเป๋า</td>
                        @elseif($products->type == 12)
                        <td>ถุงมือ</td>
                        @endif

                        @if($products->color == 1)
                        <td>ดำ</td>
                        @elseif($products->color == 2)
                        <td>กรม</td>
                        @elseif($products->color == 3)
                        <td>ทราย</td>
                        @elseif($products->color == 4)
                        <td>เขียว</td>
                        @elseif($products->color == 5)
                        <td>เทา</td>
                        @endif

                        <td>{{$products->size}}</td>
                        <td>{{number_format($products->price)}} ฿</td>
                        <td>{{$products->volume}}</td>
                        <td>
                          
                              
                                  <button class="btn bg-warning btn-sm" data-toggle="modal"
                                      data-target="#edit_product" onclick="getDatafromTable('{{$products->code}}');"
                                      data-id="{{$products->code}}"><i class="fa fa-pencil"></i> แก้ไข</button>
                              
                             
                                  <button class="btn btn-sm btn-danger"
                                      onclick="deleteProduct('{{$products->code}}');"><i class="fa fa-trash-o"></i> ลบ</button>
                              
                         
                        </td>
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
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">ชื่อ</label>
                            <input type="text" class="form-control" name="pd_name" placeholder="จำนวนโบนัส">
                        </div>
                        <div class="col-md-6 mt-4" style="margin-top: 10px">
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
                        <div class="col-md-6 mt-4">
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
                <form>
                    
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
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <!-- นำเข้า  Javascript  จาก   dataTables -->
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
  @stop