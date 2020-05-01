@extends('layouts.default')
@section('content')

@include('includes.cart')
<div class="contact-area d-flex align-items-center">

    <div class="google-map">
        <img src="{{asset('img/shop-img/shop.png')}}" alt="">
    </div>

    <div class="contact-info">
        <h2>ติดต่อเรา</h2>
        <p>ผู้ผลิตและจำหน่าย: เสื้อเกราะ กระเป๋าสะพายข้าง เป้หลัง ซองติดเวส ถุงมือ แว่นตา เข็มขัด อื่นๆ เครื่องแบบ ตำรวจ ตชด. เครื่องแบบสนามครบชุด ชุดหมี อุปกรณ์โรยตัว ไต่เขา รองเท้าคอมแบท จังเกิ้ล นอกและในประเทศ เต็นท์โดม ถุงนอน แผ่นพับปูนอน อื่นๆ</p>

        <div class="contact-address mt-50">
            <p><span>ที่อยู่ :</span> 36 ถ.สุขยางค์ ตำบลสะเตง อำเภอเมือง จังหวัดยะลา 95000</p>
            <p><span>โทร :</span> 084-4692328</p>
            <p><span>เปิด :</span> จันทร์ - เสาร์ เวลา 8.30 - 18.00 น.</p>
            <p><a href="mailto:contact@essence.com">  </a></p>
        </div>
    </div>

</div>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
<script src="js/map-active.js"></script> --}}
@stop