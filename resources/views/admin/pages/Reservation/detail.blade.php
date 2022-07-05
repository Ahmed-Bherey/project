@extends('admin.includes.master')
@section('title')
    Reservation
@endsection
@section('content')
    {{--<script src="https://code.jquery.com/jquery-3.5.1.js"--}}
    {{--integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>--}}

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

                row
                start card
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Reservation </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1"
                                                   class="table table-bordered table-striped dataTable dtr-inline"
                                                   aria-describedby="example1_info">
                                                <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        #
                                                    </th>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        Guest Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Hotel
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        date
                                                    </th>


                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        rate
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        selling Rate
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        meal
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        room Type
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        adult
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        child
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Room Number
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        travel Agents
                                                    </th>
 <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Operation
                                                    </th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($guestReservations as $key=> $guestReservation)
                                                    <tr @if($guestReservation->cancel == 1) style="background: rosybrown" @endif>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $guestReservation->guests->name }}</td>
                                                        <td>{{ $guestReservation->hotels->name }}</td>

                                                        <td>{{ $guestReservation->date }}</td>
                                                        <td>{{ $guestReservation->rate }}</td>
                                                        <td>{{ $guestReservation->sellingRate }}</td>
                                                        <td>{{ $guestReservation->meals->name }}</td>
                                                        <td>{{ $guestReservation->roomTypes->type }}</td>
                                                        <td>{{ $guestReservation->adult }}</td>
                                                        <td>{{ $guestReservation->child }}</td>
                                                        <td>{{ $guestReservation->roomNumber }}</td>
                                                        <td>{{ $guestReservation->travelAgents->name }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.guest_reservation.edit', $guestReservation->id) }}"
                                                               class="btn btn-success "><i class="far fa-edit ml-1"
                                                                                           aria-hidden="true"></i></a>
                                                            <a href="{{ route('admin.cancel.reservation', $guestReservation->id) }}"
                                                               class="btn btn-danger "><i class="fas fa-trash-alt ml-1"
                                                                                           aria-hidden="true"></i></a>
                                                        </td>


                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal child-->


            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->

    </div>
@endsection


