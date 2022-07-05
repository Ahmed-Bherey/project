<!DOCTYPE html>
<html lang="en">

@include('admin.includes.header')
<link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-buttons/css/printLand.css') }}">
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

@include('admin.includes.navbar')
@include('admin.includes.sidebar')
@yield('content')

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

@include('admin.includes.footer')
<script>
    let numFiled = document.querySelectorAll('.form-control'),
        i = 0;

    onkeyup = () => {
        numFiled.forEach(key)
    }
    onkeydown = () => {
        numFiled.forEach(key)
    }
    onkeypress = () => {
        numFiled.forEach(key)
    }
    onclick = () => {
        numFiled.forEach(key)
    }

    function key(ele) {
        if (ele.value < 0) {
            ele.value = 0
        }
    }
</script>
<!-- jQuery -->
<script src="{{ asset('public/admin/plugins/jquery/jquery.js') }}"></script>
<!-- Bootstrap 4 -->
<script src=" {{ asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src=" {{ asset('public/admin/plugins/bootstrap/bootstrap.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('public/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src=" {{ asset('public/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}">
</script>
<!-- InputMask -->
<script src="{{ asset('public/admin/plugins/moment/moment.min.js') }}"></script>
<script src=" {{ asset('public/admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Bootstrap Switch -->
<script src=" {{ asset('public/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
{{-- sweetalert2 --}}
<script src="{{ asset('public/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
{{-- toastr --}}
<script src="{{ asset('public/admin/plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/admin/dist/js/demo.js') }}"></script>
<!-- Select2 -->
<!-- jQuery -->
<script src="{{asset('public/admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('public/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-buttons/js/buttons.print2.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

@yield('jsDate')
@yield('counter')
</body>

</html>
