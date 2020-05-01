<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<style>
    .fix{
        position: fixed;
        bottom: 0;
    }
</style>
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
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('js/adminlte.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>

</html>

