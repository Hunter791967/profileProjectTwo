</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>@lang('app.Copyrights') &copy; 2023</strong>
    @lang('app.Rights').
    <div class="float-right d-none d-sm-inline-block">
        <b>@lang('app.Version')</b> 2.3
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src=" {{ asset('AdminPanel/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src=" {{ asset('AdminPanel/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src=" {{ asset('AdminPanel/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src=" {{ asset('AdminPanel/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src=" {{ asset('AdminPanel/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src=" {{ asset('AdminPanel/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src=" {{ asset('AdminPanel/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src=" {{ asset('AdminPanel/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src=" {{ asset('AdminPanel/plugins/moment/moment.min.js') }}"></script>
<script src=" {{ asset('AdminPanel/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=" {{ asset('AdminPanel/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src=" {{ asset('AdminPanel/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src=" {{ asset('AdminPanel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src=" {{ asset('AdminPanel/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=" {{ asset('AdminPanel/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src=" {{ asset('AdminPanel/dist/js/demo.js') }}"></script> --}}

@yield('page_js')
</body>

</html>
