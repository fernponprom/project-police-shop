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
                                    <th>รหัสผู้ใช้</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>อีเมลล์</th>
                                    <th>เบอร์โทร</th>
                                    <th>วันที่สร้าง</th>
                                    <th>บทบาท</th>
                                    <th>การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="font-size: 12px;">
                                @foreach($user as $users)
                                <tr>
                                    <td><b>{{$users->user_code}}</b></td>
                                    <td>{{$users->first_name}} {{$users->last_name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->tel}}</td>
                                    <td>{{$users->create_date}}</td>
                                    <td>{{$users->role}}</td>
                                    <td>

                                        <button class="btn bg-primary btn-sm" data-toggle="modal"
                                            data-target="#user_detail" onclick="getUser('{{$users->user_code}}');"
                                            data-id=""><i class="fa fa-eye"></i><i class="fab fa-line"></i> ดู</button>

                                        <button class="btn bg-warning btn-sm" data-toggle="modal"
                                            data-target="#edit_user" onclick="getUser('{{$users->user_code}}');"
                                            data-id=""><i class="fa fa-pencil"></i> แก้ไข</button>


                                    <button class="btn btn-sm btn-danger" onclick="deleteUser('{{$users->user_code}}');"><i class="fa fa-trash-o"></i>
                                            ลบ</button>


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
<div class="modal fade" id="user_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    ดูข้อมูลลูกค้า
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form role="form">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fa fa-address-card"></i>
                                    รหัสประจำตัว</label>
                                <input type="text" class="form-control" name="user_code" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">บทบาท</label>
                                <input type="text" class="form-control" name="role" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">ชื่อ</label>
                                <input type="text" class="form-control" name="firstname" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">นามสกุล</label>
                                <input type="text" class="form-control" name="lastname" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fa fa-mobile 3x"></i> เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" name="tel" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fab fa-line"></i> อีเมลล์</label>
                                <input type="text" class="form-control" name="email" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fab fa-line"></i> ไลน์ไอดี</label>
                                <input type="text" class="form-control" name="line_id" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fab fa-line"></i> เฟสบุค</label>
                                <input type="text" class="form-control" name="facebook" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">ที่อยู่</label>
                                <textarea type="text" class="form-control form-control-sm" name="address" value=""
                                    cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    แก้ไขข้อมูลลูกค้า
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
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fa fa-address-card"></i>
                                    รหัสประจำตัว</label>
                                <input type="text" class="form-control" name="user_code" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">บทบาท</label>
                                <select name="role" id="role">
                                        <option value="0">บทบาท</option>
                                        <option value="admin">ผู้ดูแลสูงสุด</option>
                                        <option value="customer">ลูกค้า</option>
                                        <option value="moder">ผู้ดูแล</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">ชื่อ</label>
                                <input type="text" class="form-control" name="firstname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">นามสกุล</label>
                                <input type="text" class="form-control" name="lastname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fa fa-mobile 3x"></i> เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" name="tel">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fab fa-line"></i> อีเมลล์</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fab fa-line"></i> ไลน์ไอดี</label>
                                <input type="text" class="form-control" name="line_id2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fab fa-line"></i> เฟสบุค</label>
                                <input type="text" class="form-control" name="facebook2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">ที่อยู่</label>
                                <textarea type="text" class="form-control form-control-sm" name="address" value=""
                                    cols="40" rows="5"></textarea>
                            </div>
                        </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="editUser();">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>
</div>

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

    function getUser(code) {
        var code = code;
        console.log(code);
        $.ajax({
            url: 'http://localhost:8000/user/' + code,
            success: function (data) {
                $('input[name="user_code"]').val(data[0].user_code);
                $('input[name="firstname"]').val(data[0].first_name);
                $('input[name="lastname"]').val(data[0].last_name);
                $('input[name="tel"]').val(data[0].tel);
                $('input[name="email"]').val(data[0].email);
                $('textarea[name="address"]').val(data[0].address);
                $('input[name="line_id"]').val(data[0].line_id);
                $('input[name="facebook"]').val(data[0].facebook);
                $('input[name="role"]').val(data[0].role);
            }
        })
    }

    function editUser() {
        if (confirm('ยืนยันที่จะแก้ไขข้อมูล')) {
            var user_code = $('input[name="user_code"]').val();
            var first_name = $('input[name="firstname"]').val();
            var last_name = $('input[name="lastname"]').val();
            var tel = $('input[name="tel"]').val();
            var email = $('input[name="email"]').val();
            var line_id = $('input[name="line_id2"]').val();
            var facebook = $('input[name="facebook2"]').val();
            var address = $('textarea[name="address"]').val();
            var role = $('select[name="role"]').val();
            console.log("role ---> " + role)
            console.log("line_id --> " + line_id)
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'http://localhost:8000/editUser/',
                data: {
                    "_token": "{{ csrf_token() }}",
                    user_code: user_code,
                    first_name: first_name,
                    last_name: last_name,
                    tel: tel,
                    email: email,
                    line_id: line_id,
                    facebook: facebook,
                    address: address,
                    role: role
                },
                success: function (data, dataType, state) {
                    // console.log(data)
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

    function deleteUser(code) {
        if (confirm('ยืนยันที่จะลบสินค้าชิ้นนี้')) {
            var user_code = code

            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'http://localhost:8000/deleteUser/',
                data: {
                    "_token": "{{ csrf_token() }}",
                    user_code: user_code
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
