<!DOCTYPE html>
<html lang="en">

@include('admin.includes.header')

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
    @include('admin.includes.scripts')
    @yield('jsDate')
    @yield('counter')
</body>

</html>
