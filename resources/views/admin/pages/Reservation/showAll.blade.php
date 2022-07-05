@extends('admin.includes.master')
@section('title')
    Search Reservation
@endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- row --}}

                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Reservation </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example" class="display showTable" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="px-2 py-3">Guest</th>
                                                        <th>Hotel</th>
                                                        <th>Arrival</th>

                                                        <th>Departure</th>
                                                        <th>Agent</th>
                                                        <th>Rooms</th>
                                                        <th>Room Type</th>
                                                        <th>Hotel Rate</th>
                                                        <th>selling Rate</th>
                                                        <th>Operation</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="display: none">
                                                    @foreach ($guestReservations as $key => $guestReservation)
                                                        <tr title="{{$guestReservation->agentBalance}}" @if ($guestReservation->cancel == 1) style="background: rosybrown" @endif
                                                            @if ($guestReservation->total < $guestReservation->totalHotel) style="background: #baad22" @endif>

                                                            <td>{{ \App\Models\NewGuest::where('id', $guestReservation->guest_id)->value('name') }}
                                                            </td>
                                                            <td>{{ $guestReservation->hotels->name }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($guestReservation->from)) }}
                                                            </td>

                                                            <td>{{ \Carbon\Carbon::parse($guestReservation->to)->addDays(1)->format('d-m-Y') }}
                                                            </td>
                                                            <td>{{ $guestReservation->travelAgents->name }}</td>
                                                            <td>{{ $guestReservation->rooms }}</td>
                                                            <td>{{ $guestReservation->roomTypes->type }}</td>
                                                            <td>{{ $guestReservation->totalHotel  }}</td>
                                                            <td @if($guestReservation->agentBalance >= 0 ) style="background:#048018" @else style="background:#803905"   @endif >{{ $guestReservation->total}}</td>

                                                            <td class="d-flex">
                                                                <a href="{{ route('guest_reservation.edit', $guestReservation->id) }}"
                                                                    class="btn btn-success ml-1"><i class="far fa-edit "
                                                                        aria-hidden="true"></i></a>
                                                                <a href="{{ route('admin.detail.guest.delete', $guestReservation->id) }}"
                                                                    onclick="return confirm('Are you sure you want to cancel this reservation?');"
                                                                    class="btn  btn-danger ml-1"><i
                                                                        class="fas fa-trash-alt"></i></a>
                                                                <a @if((int)$guestReservation->agentHotel  >= (int)$guestReservation->total ) hidden="" @endif class="btn  btn-info " href="{{route('admin.collect.agent.reservation', $guestReservation->id)}}" title="collect Agent"><i
                                                                            class="fa fa-plus text-light	 text-light"></i>
                                                                </a>
                                                                <a class="btn  btn-info " href="{{route('admin.pay.agent.reservation', $guestReservation->id)}}" title="pay money"><i
                                                                            class=" far fa-money-bill-alt"></i></a>
                                                                <a href="{{ route('admin.detail.guest', $guestReservation->id) }}"
                                                                    target="_blank" class="btn  btn-success   ml-1"><i
                                                                        class="fas fa-eye text-light"></i></a>
                                                                <a class="btn  btn-info ml-1" target="_blank"
                                                                    href="{{ route('admin.reportReservation.guest', $guestReservation->id) }}"><i
                                                                        class="fas fa-print"></i></a>
                                                            </td>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Guest</th>
                                                        <th>Hotel</th>
                                                        <th>Arrival</th>
                                                        <th>Departure</th>
                                                        <th>Agent</th>
                                                        <th>Rooms</th>
                                                        <th>Room Type</th>
                                                        <th>Hotel Rate</th>
                                                        <th>selling Rate</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal delete-->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" class="w-100 form-control" placeholder="Search ' + title + '" />');
            });

            // DataTable
            var table = $('#example').DataTable({
                initComplete: function() {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;

                            $('input', this.footer()).on('keyup change clear', function() {
                                if (this.value !== '') {
                                    $('#example tbody').css({
                                        "display": "table-row-group"
                                    })
                                } else {
                                    $('#example tbody').css({
                                        "display": "none"
                                    })
                                }
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
            });
        });
    </script>
@endsection
