<script src="{{ asset('public/admin/dist/js/swal.js') }}"></script>

@if (session()->has('errors'))
    <script>
        swal({
            title: " {{ session()->get('errors') }}",
            // text: "You clicked the button!",
            icon: "error",
            button: "ok!",
            timer: 2000

        });
    </script>
@endif
