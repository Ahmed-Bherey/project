<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kayan | Arrival List 1</title>
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="shortcut icon" href="{{ asset('public/admin/dist/img/kayan.png') }}" type="image/x-icon">
    <!--css file-->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome-free-6.1.1-web/css/all.min.css') }}">
    <!--css file-->
    <link rel="stylesheet" href="{{ asset('public/admin/report/travel/css/charts.min.css') }}">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.6.3/css/buttons.dataTables.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <title>report</title>
    <link rel="stylesheet" href="{{ asset('public/admin/report/travel/css/report.css') }}">
</head>

<body>
    <div class="book">


        <!--start page1-->
        <div class="page">
            <div class="subpage">
                <!--start header-->
                <div class="header">
                    <div class="row justify-content-between ">
                        <div class="w-50">
                            <div class="img">
                                <img src="{{ asset('public/admin/dist/img/kayan2.png') }}" class="w-25"
                                    title="kayan" alt="kayan">
                            </div>
                        </div>
                        <div class="w-25 info">
                            <div class="d-flex justify-content-start align-items-center">
                                <p class=" ">

                                </p>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <p> <span class="ms-2"> form : </span>
                                        <span>{{ $from }}</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <p>
                                    <p> <span class="ms-2"> to : </span>
                                        <span>{{ $to }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end header-->
                <!--start contain-->
                <div class="contain">
                    <p class="Attend">Hotel: <span>{{ $hotel->name }}</span></p>
                    <table class=" info " id="example1" class="table display" style="width:100%">
                        <thead>
                            <tr>
                                <th rowspan="2" >Room</th>
                                @foreach ($dates as $date)
                                    <th>{{ Str::limit(date('l', strtotime($date)), '2') }}</th>
                                @endforeach
                                <th>total</th>
                            </tr>
                            <tr>
                                @foreach ($dates as $date)
                                    <th>{{ date('d', strtotime($date)) }} </th>
                                @endforeach
                                <td>--</td>
                                @foreach ($totalReservations as $totalReservation)
                            <tr>
                                <td>
                                    {{ $totalReservation->roomCategors->name }}
                                </td>
                                @foreach ($dates as $date)
                                    <th>
                                        {{ \App\Models\GuestReservation::where('cancel', null)->where('hotel_id', $hotel->id)->where('date', date('Y-m-d', strtotime($date)))->where('roomCategory_id', $totalReservation->roomCategory_id)->sum('rooms') }}
                                    </th>
                                @endforeach
                                <td> {{ \App\Models\GuestReservation::where('cancel', null)->where('hotel_id', $hotel->id)->where('date', '>=', $from)->where('date', '<=', $to)->where('roomCategory_id', $totalReservation->roomCategory_id)->sum('rooms') }}
                                </td>
                            </tr>
                            @endforeach

                        </thead>
                        <tbody>
                            <tr>
                                <th>Total sold</th>
                                @foreach ($dates as $date)
                                    <td>{{ \App\Models\GuestReservation::where('cancel', null)->where('hotel_id', $hotel->id)->where('date', date('Y-m-d', strtotime($date)))->sum('rooms') }}
                                    </td>
                                @endforeach
                                <td>{{ $countRoomCategorys }}</td>
                            </tr>
                            <tr>
                                <th>allocation</th>
                                @foreach ($dates as $date)
                                    <td>
                                        {{ \App\Models\Hotel::where('id', $hotel->id)->value('room_no') }}
                                    </td>
                                @endforeach
                                <td>{{ \App\Models\Hotel::where('id', $hotel->id)->sum('room_no') * ($days + 1) }}
                                </td>
                            </tr>
                            <tr>
                                <th>Available</th>
                                @foreach ($dates as $date)
                                    <td>{{ \App\Models\Hotel::where('id', $hotel->id)->sum('room_no') -\App\Models\GuestReservation::where('hotel_id', $hotel->id)->where('date', date('Y-m-d', strtotime($date)))->sum('rooms') }}
                                    </td>
                                @endforeach
                                <td>{{ \App\Models\Hotel::where('id', $hotel->id)->sum('room_no') * ($days + 1) - $countRoomCategorys }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <div class="row">
                        <div class="w-50">
                            <p class="mt-2"><i class="fa fa-envelope  me-2"></i>reservation@kayan-tours.com
                            </p>
                        </div>
                        <div class="w-50 location">
                            <p class="mt-2"><i class="fa fa-map-marker-alt me-2"></i>flat 12,1st
                                floor (Al Lewaa building) 2nd
                                of sherif ST, Abdeen, cairo-Egypt.</p>
                        </div>
                    </div>
                </div>
                <!--end contain-->
            </div>
        </div>
    </div>


    <!-- Select2 -->
    <!-- jQuery -->
    <script src="{{ asset('public/admin/plugins/jquery/jquery.min.js') }}"></script>
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
    <script src="{{ asset('public/admin/plugins/datatables-buttons/js/buttons.print3.js') }}"></script>
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






    <!--endpage 1-->
    {{-- <script>
        var $fileName = 'MyFileName';

        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'csv',
                        filename: $fileName
                    },
                    {
                        extend: 'excel',
                        filename: $fileName
                    },
                    {
                        extend: 'pdf',
                        filename: $fileName
                    }
                ]
            });
        });
    </script> --}}
</body>

</html>
