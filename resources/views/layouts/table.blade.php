<!doctype html>
<html>
<head>
    @include('includes.headv2')
    @include('includes.head')
</head>
<body>


    <header class="header_area">
        @include('includes.nav')
    </header>

            @yield('content')

    <footer class="footer_area clearfix">
        @include('includes.footer')
    </footer>

</body>
<script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Plugins js -->
{{-- <script src="{{asset('js/plugins.js')}}"></script> --}}
<!-- Classy Nav js -->
<script src="{{asset('js/classy-nav.min.js')}}"></script>
<!-- Active js -->
<script src="{{asset('js/active.js')}}"></script>

</html>

